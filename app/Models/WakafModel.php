<?php

namespace App\Models;

use CodeIgniter\Model;

class WakafModel extends Model
{
	protected $table                = 'wakaf';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;

	protected $protectFields        = true;
	protected $allowedFields        = ["id", "id_user", "keterangan", "total", "id_transaksi"];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';
}