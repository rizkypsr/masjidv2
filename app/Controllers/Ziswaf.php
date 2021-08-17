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

	public function wakafTransaksi()
	{
		$paket = $this->request->getVar("paket");

		switch ($paket) {
			case "Paket Single":
				$total = 750000;

				$detail["paket"] = $paket;
				$detail["total"] = $total;
				break;
			case "Paket 2":
				$total = 1500000;

				$detail["paket"] = $paket;
				$detail["total"] = $total;
				break;

			case "Paket 3":
				$total = 2000000;

				$detail["paket"] = $paket;
				$detail["total"] = $total;
				break;

			case "Paket 4":
				$total = 2500000;

				$detail["paket"] = $paket;
				$detail["total"] = $total;
				break;

			case "Paket 5":
				$total = 3000000;

				$detail["paket"] = $paket;
				$detail["total"] = $total;
				break;

			case "Paket Tambahan":
				$tambahan = ((int)$this->request->getVar("tambahan")) * 600000;
				$total = 3000000 + $tambahan;

				$detail["paket"] = $paket;
				$detail["total"] = $total;
				break;
		}

		$data = [
			"paket" => $paket,
			"total" => rupiah($total),
			"pembayaran" => $this->request->getVar("pembayaran")
		];

		return view("wakaf", $data);
	}
}