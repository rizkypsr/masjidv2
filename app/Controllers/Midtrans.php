<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use Config\Database;
use Midtrans\Config;
use Midtrans\Notification;

class Midtrans extends BaseController
{

	protected $transaksiModel;

	public function __construct()
	{
		$this->transaksiModel = new TransaksiModel();
	}

	public function callback()
	{
		Config::$serverKey = 'SB-Mid-server-Ysozo8JlNh3Qp8ECQyJ4zKlu';
		Config::$isProduction = false;
		Config::$isSanitized = true;
		Config::$is3ds = true;

		$notification = new Notification();

		$status = $notification->transaction_status;
		$type = $notification->payment_type;
		$fraud = $notification->fraud_status;
		$order_id = $notification->order_id;

		if ($status == 'capture') {

			if ($type == "credit_card") {
				if ($fraud == "challenge") {
					$this->transaksiModel->update($order_id, ["status" => "PENDING"]);
				} else {
					$this->transaksiModel->update($order_id, ["status" => "SUCCESS"]);
				}
			}
		} else if ($status == 'settlement') {
			$this->transaksiModel->update($order_id, ["status" => "SUCCESS"]);
		} else if ($status == 'pending') {
			$this->transaksiModel->update($order_id, ["status" => "PENDING"]);
		} else if ($status == 'deny') {
			$this->transaksiModel->update($order_id, ["status" => "CANCELED"]);
		} else if ($status == 'expire') {
			$this->transaksiModel->update($order_id, ["status" => "CANCELED"]);
		} else if ($status == 'cancel') {
			$this->transaksiModel->update($order_id, ["status" => "CANCELED"]);
		}
	}

	public function success($id_transaksi)
	{
		$transaksi = $this->transaksiModel->find($id_transaksi);

		$data = [
			"transaksi" => $transaksi,
		];

		return view("midtrans/success", $data);
	}

	public function unfinish()
	{
		return view("midtrans/unfinish");
	}

	public function finish()
	{
		$resultType = $this->request->getVar('result_type');
		$result = json_decode($this->request->getVar('result_data'));

		if ($resultType == "close") {
			$db = Database::connect();
			$builder = $db->table('transaksi');
			$builder->select("*")->orderBy("id", "DESC")->limit(1);
			$newTransaksi = $builder->get()->getResult();

			$this->transaksiModel->delete($newTransaksi[0]->id);

			return redirect()->back();
		}

		$data = [
			"status" => $result->transaction_status,
			"payment_type" => $result->payment_type,
			"bank" => $result->va_numbers[0]->bank ?? null,
			"va_number" => $result->va_numbers[0]->va_number ?? null,
			"total" => $result->gross_amount,
		];

		$transaksi = $this->transaksiModel->update($result->order_id, $data);

		if ($transaksi) {
			return redirect()->to("/midtrans/success/$result->order_id");
		}

		return redirect()->to("/midtrans/failed");
	}

	public function failed()
	{
		return view("midtrans/failed");
	}
}