<?php

namespace App\Models;

use CodeIgniter\Model;

class InfaqModel extends Model
{
	protected $table                = 'infaq';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;

	protected $allowedFields        = ["id", "id_user", "jumlah", "id_transaksi", 'created_at', 'updated_at', 'deleted_at'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';
}