<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
	protected $table                = 'transaksi';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;

	protected $allowedFields        = ["id", "jenis", "status", 'payment_type', 'bank', 'va_number', "total", 'created_at', 'updated_at', 'deleted_at'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';
}