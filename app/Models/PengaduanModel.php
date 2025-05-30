<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table            = 'pengaduans';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'user_id',
        'judul',
        'kategori',
        'isi_laporan',
        'tanggal_kejadian',
        'lokasi_kejadian',
        'foto',
        'status',
        'admin_id',
        'tanggapan',
        'foto_tanggapan',
        'created_at',
        'updated_at',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function withUser($id)
    {
        return $this->select('pengaduan.*, users.name as user_name')
            ->join('users', 'users.id = pengaduan.user_id')
            ->where('pengaduan.id', $id)
            ->first();
    }

    public function tanggapan($id)
    {
        return $this->select('pengaduan.*, tanggapan.*')
            ->join('tanggapan', 'tanggapan.pengaduan_id = pengaduan.id')
            ->where('pengaduan.id', $id)
            ->first();
    }
}
