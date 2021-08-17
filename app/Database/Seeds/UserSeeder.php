<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'name' => "bibiwu tak pernah salah",
			'email' => "bibiwu@email.com",
			'username' => "bibiwu",
			'password' => 'edij271100',
			'active' => 1
		];

		$userModel = model(UserModel::class);
		$user = new User($data);
		$userModel->withGroup('admin');
		$userModel->save($user);
	}
}