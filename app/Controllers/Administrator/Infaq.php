<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Models\InfaqModel;
use App\Models\TransaksiModel;
use Config\Database;
use Myth\Auth\Models\UserModel;

class Infaq extends BaseController
{
	protected $infaqModel, $transaksiModel, $usersModel;

	public function __construct()
	{
		$this->infaqModel = new InfaqModel();
		$this->transaksiModel = new TransaksiModel();
		$this->usersModel =  new UserModel();
	}

	public function index()
	{
		$db = Database::connect();
		$builder = $db->table('transaksi');
		$builder->select('*');
		$builder->join('infaq', 'transaksi.id = infaq.id_transaksi');

		$query = $builder->get()->getResult();

		$currentUser = $this->usersModel->find(user_id());

		$data = [
			"infaq" => $query,
			'currentUser' => $currentUser
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