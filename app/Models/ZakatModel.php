<?php

namespace App\Models;

use CodeIgniter\Model;

class ZakatModel extends Model
{
	protected $table                = 'zakat';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;

	protected $allowedFields        = ["id", "id_user", "jenis", "jumlah", "id_transaksi"];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';
}