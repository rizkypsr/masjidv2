<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InfaqModel;
use App\Models\TransaksiModel;
use App\Models\WakafModel;
use App\Models\ZakatModel;
use Config\Database;
use Exception;
use Midtrans\Config;
use Midtrans\Snap;

class Transaksi extends BaseController
{

	protected $transaksiModel, $wakafModel, $infaqModel, $zakatModel;

	public function __construct()
	{
		$this->transaksiModel = new TransaksiModel();
		$this->wakafModel = new WakafModel();
		$this->infaqModel = new InfaqModel();
		$this->zakatModel = new ZakatModel();
	}

	public function index()
	{
		return view("transaksi/transaksi");
	}

	public function infaq()
	{
		$db = Database::connect();
		$builder = $db->table('transaksi');
		$builder->select('transaksi.id as id_transaksi, transaksi.jenis as jenis, infaq.jumlah as jumlah, transaksi.status, transaksi.created_at');
		$builder->join('infaq', 'transaksi.id = infaq.id_transaksi');
		$query = $builder->get()->getResult();

		$data = [
			"transaksi" => $query,
		];

		return view("transaksi/transaksi", $data);
	}

	public function wakaf()
	{
		$db = Database::connect();
		$builder = $db->table('transaksi');
		$builder->select('transaksi.id as id_transaksi, transaksi.jenis as jenis, wakaf.total as jumlah, transaksi.status, transaksi.created_at');
		$builder->join('wakaf', 'transaksi.id = wakaf.id_transaksi');
		$query = $builder->get()->getResult();

		$data = [
			"transaksi" => $query,
		];

		return view("transaksi/transaksi", $data);
	}

	public function zakat()
	{
		$db = Database::connect();
		$builder = $db->table('transaksi');
		$builder->select('transaksi.id as id_transaksi, transaksi.jenis as jenis, zakat.jumlah as jumlah, transaksi.status, transaksi.created_at');
		$builder->join('zakat', 'transaksi.id = zakat.id_transaksi');
		$query = $builder->get()->getResult();

		$data = [
			"transaksi" => $query,
		];

		return view("transaksi/transaksi", $data);
	}

	public function checkout($jenis)
	{
		$dataTransaksi = [
			"jenis" => $jenis,
		];

		$transaksi = $this->transaksiModel->insert($dataTransaksi);


		if ($jenis == "infaq") {
			$jumlah = $this->request->getVar("total");

			$dataInfaq = [
				"id_user" => '10',
				"id_transaksi" => $transaksi,
				"jumlah" => $jumlah,
			];

			$infaq = $this->infaqModel->insert($dataInfaq);

			$infaq = $this->infaqModel->find($infaq);
		}

		if ($jenis == "zakat") {
			$jumlah = $this->request->getVar("total");
			$jenis = $this->request->getVar("jenis");

			$dataZakat = [
				"id_user" => '10',
				"id_transaksi" => $transaksi,
				"jumlah" => $jumlah,
				"jenis" => $jenis,
			];

			$zakat = $this->zakatModel->insert($dataZakat);

			$zakat = $this->zakatModel->find($zakat);
		}

		if ($jenis == "wakaf") {
			$jumlah = $this->request->getVar("total");
			$keterangan = $this->request->getVar("keterangan");

			$dataWakaf = [
				"id_user" => '10',
				"id_transaksi" => $transaksi,
				"total" => $jumlah,
				"keterangan" => $keterangan,
			];

			$wakaf = $this->wakafModel->insert($dataWakaf);

			$wakaf = $this->wakafModel->find($wakaf);
		}

		Config::$serverKey = 'SB-Mid-server-Ysozo8JlNh3Qp8ECQyJ4zKlu';
		Config::$isProduction = false;
		Config::$isSanitized = true;
		Config::$is3ds = true;

		$midtrans = [
			'transaction_details' => [
				'order_id' => $transaksi,
				'gross_amount' => (int) $jumlah,
			],
			'customer_details' => [
				'first_name' => "Farkhan",
				'email' => "farkhan@email.com",
			],
			'enabled_payments' => ['gopay', 'dana', 'ovo', 'bank_transfer'],
			'vtweb' => []
		];

		try {

			$snapToken = Snap::getSnapToken($midtrans);
			echo $snapToken;
		} catch (Exception $e) {
			throw $e;
		}
	}
}