<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\WakafModel;
use Config\Database;

class Wakaf extends BaseController
{

	protected $wakafModel, $transaksiModel;

	public function __construct()
	{
		$this->wakafModel = new WakafModel();
		$this->transaksiModel = new TransaksiModel();
	}

	public function index()
	{
		$db = Database::connect();
		$builder = $db->table('transaksi');
		$builder->select('*');
		$builder->join('wakaf', 'transaksi.id = wakaf.id_transaksi');

		$query = $builder->get()->getResult();

		$data = [
			"wakaf" => $query,
		];

		return view("admin/wakaf", $data);
	}

	public function delete($id)
	{
		$wakaf = $this->wakafModel->find($id);

		$this->wakafModel->delete($id);
		$this->transaksiModel->delete($wakaf["id_transaksi"]);

		return redirect()->to("/admin/wakaf");
	}
}