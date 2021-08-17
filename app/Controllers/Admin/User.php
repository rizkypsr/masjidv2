<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Entities\User as EntitiesUser;
use Myth\Auth\Models\UserModel;

class User extends BaseController
{
	protected $userModel;

	public function __construct()
	{
		$this->userModel = model(UserModel::class);
	}

	public function index()
	{
		$users = $this->userModel->findAll();

		$data = [
			"users" => $users,
		];

		return view("admin/user", $data);
	}

	public function create()
	{
		return view("admin/createUser");
	}

	public function save()
	{
		helper(['form', 'url']);

		$rules = [
			'name' 	   => [
				'rules' => 'required',
				'errors' => [
					'required' => "Nama harus diisi"
				],
			],
			'username' => [
				'rules' => 'required|is_unique[users.username]',
				'errors' => [
					'required' => "Username harus diisi",
					'is_unique' => "Username sudah digunakan"
				],
			],
			'email'    => [
				'rules' => 'required|valid_email|is_unique[users.email]',
				'errors' => [
					'required' => "Email harus diisi",
					'is_unique' => "Email sudah digunakan"
				],
			],
		];

		if (!$this->validate($rules)) {

			return view("admin/createUser", [
				'validation' => $this->validator
			]);
		}

		$data = [
			'name' => $this->request->getVar("name"),
			'email' =>  $this->request->getVar("email"),
			'username' =>  $this->request->getVar("username"),
			'password' => 'evdscsdc122121w',
			'active' => 0
		];

		$user = new EntitiesUser($data);
		$this->userModel->save($user);

		return redirect()->to("/admin/user");
	}

	public function edit($id)
	{
		$user = $this->userModel->find($id);

		$data = [
			"user" => $user
		];

		return view("admin/editUser", $data);
	}

	public function update()
	{

		$id = $this->request->getVar("id");

		$data = [
			'name' => $this->request->getVar("name"),
			'email' => $this->request->getVar("email"),
			'username' => $this->request->getVar("username"),
			'active' => $this->request->getVar("active"),
		];

		helper(['form', 'url']);

		$rules = [
			'name' 	   => [
				'rules' => 'required',
				'errors' => [
					'required' => "Nama harus diisi"
				],
			],
			'username' => [
				'rules' => 'required|is_unique[users.username]',
				'errors' => [
					'required' => "Username harus diisi",
					'is_unique' => "Username sudah digunakan"
				],
			],
			'email'    => [
				'rules' => 'required|valid_email|is_unique[users.email]',
				'errors' => [
					'required' => "Email harus diisi",
					'is_unique' => "Email sudah digunakan"
				],
			],
		];

		if (!$this->validate($rules)) {

			$user = new EntitiesUser($this->request->getVar());

			return view("admin/editUser", [
				'user' => $user,
				'validation' => $this->validator
			]);
		}

		$user = new EntitiesUser($data);
		$this->userModel->update($id, $user);

		return redirect()->to("/admin/user");
	}

	public function delete($id)
	{
		$this->userModel->delete($id);

		return redirect()->to("/admin/user");
	}
}