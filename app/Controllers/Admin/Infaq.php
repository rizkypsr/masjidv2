<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InfaqModel;
use App\Models\TransaksiModel;
use Config\Database;

class Infaq extends BaseController
{
	protected $infaqModel, $transaksiModel;

	public function __construct()
	{
		$this->infaqModel = new InfaqModel();
		$this->transaksiModel = new TransaksiModel();
	}

	public function index()
	{
		$db = Database::connect();
		$builder = $db->table('transaksi');
		$builder->select('*');
		$builder->join('infaq', 'transaksi.id = infaq.id_transaksi');

		$query = $builder->get()->getResult();

		$data = [
			"infaq" => $query,
		];

		return view("admin/infaq", $data);
	}

	public function delete($id)
	{
		$infaq = $this->infaqModel->find($id);

		$this->infaqModel->delete($id);
		$this->transaksiModel->delete($infaq["id_transaksi"]);

		return redirect()->to("/admin/infaq");
	}
}