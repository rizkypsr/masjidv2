<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\ZakatModel;
use Config\Database;

class Zakat extends BaseController
{

	protected $zakatModel, $transaksiModel;

	public function __construct()
	{
		$this->zakatModel = new ZakatModel();
		$this->transaksiModel = new TransaksiModel();
	}

	public function index()
	{
		$db = Database::connect();
		$builder = $db->table('transaksi');
		$builder->select('*');
		$builder->join('zakat', 'transaksi.id = zakat.id_transaksi');

		$query = $builder->get()->getResult();

		$data = [
			"zakat" => $query,
		];

		return view("admin/zakat", $data);
	}

	public function delete($id)
	{
		$zakat = $this->zakatModel->find($id);

		$this->zakatModel->delete($id);
		$this->transaksiModel->delete($zakat["id_transaksi"]);

		return redirect()->to("/admin/zakat");
	}
}