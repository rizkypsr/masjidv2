<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\ZakatModel;
use Config\Database;
use Myth\Auth\Models\UserModel;

class Zakat extends BaseController
{

	protected $zakatModel, $transaksiModel, $usersModel;

	public function __construct()
	{
		$this->zakatModel = new ZakatModel();
		$this->transaksiModel = new TransaksiModel();
		$this->usersModel =  new UserModel();
	}

	public function index()
	{
		$db = Database::connect();
		$builder = $db->table('transaksi');
		$builder->select('*');
		$builder->join('zakat', 'transaksi.id = zakat.id_transaksi');

		$query = $builder->get()->getResult();

		$currentUser = $this->usersModel->find(user_id());

		$data = [
			"zakat" => $query,
			"currentUser" => $currentUser
		];

		return view("admin/zakat", $data);
	}

	public function delete($id)
	{
		$zakat = $this->zakatModel->find($id);

		$this->zakatModel->delete($id);
		$this->transaksiModel->delete($zakat["id_transaksi"]);

		return redirect()->to("/administrator/zakat");
	}
}