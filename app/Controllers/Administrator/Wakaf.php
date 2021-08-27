<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\WakafModel;
use Config\Database;
use Myth\Auth\Models\UserModel;

class Wakaf extends BaseController
{

	protected $wakafModel, $transaksiModel, $usersModel;

	public function __construct()
	{
		$this->wakafModel = new WakafModel();
		$this->transaksiModel = new TransaksiModel();
		$this->usersModel = new UserModel();
	}

	public function index()
	{
		$db = Database::connect();
		$builder = $db->table('transaksi');
		$builder->select('wakaf.id, users.fullname, transaksi.total, transaksi.status, wakaf.created_at');
		$builder->join('wakaf', 'transaksi.id = wakaf.id_transaksi');
		$builder->join('users', 'users.id = wakaf.id_user');

		$query = $builder->get()->getResult();

		$currentUser = $this->usersModel->find(user_id());

		$data = [
			"wakaf" => $query,
			"currentUser" => $currentUser
		];

		return view("admin/wakaf", $data);
	}

	public function edit($id)
	{

		$wakaf = $this->wakafModel->find($id);
		$user = $this->usersModel->find($wakaf["id_user"]);
		$currentUser = $this->usersModel->find(user_id());
		$data = [
			"wakaf" => $wakaf,
			"user" => $user->fullname,
			"currentUser" => $currentUser
		];

		return view('/admin/editWakaf', $data);
	}

	public function update($id)
	{
		$data = [
			"fullname" => $this->request->getVar("fullname")
		];

		$this->usersModel->update($id, $data);

		return redirect()->to("/administrator/wakaf");
	}

	public function delete($id)
	{
		$wakaf = $this->wakafModel->find($id);

		$this->wakafModel->delete($id);
		$this->transaksiModel->delete($wakaf["id_transaksi"]);

		return redirect()->to("/administrator/wakaf");
	}
}