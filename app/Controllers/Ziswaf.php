<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Ziswaf extends BaseController
{
	public function index($type = 'wakaf')
	{
		$data["type"] = $type;

		return view('ziswaf', $data);
	}
}