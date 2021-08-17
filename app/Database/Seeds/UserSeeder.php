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
			'name' => "123",
			'email' => "123@email.com",
			'username' => "123",
			'password' => 'evdscsdc122121w',
			'active' => 1
		];

		$userModel = model(UserModel::class);
		$user = new User($data);
		$userModel->withGroup('admin');
		$userModel->save($user);
	}
}