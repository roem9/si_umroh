<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'client';
    protected $primaryKey       = 'pk_id_client';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username',
        'tgl_bergabung',
        'nama_client',
        'no_wa',
        'password',
        'cookie',
        'is_active'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'username' => 'required|max_length[30]',
        'tgl_bergabung' => 'required',
        'nama_client' => 'required|max_length[100]',
        'no_wa' => 'required|max_length[15]|numeric'
    ];
    protected $validationMessages   = [
        'username' => [
            'required' => 'username harus diisi',
            'max_length' => 'username maksimal 30 karakter',
        ],
        'tgl_bergabung' => [
            'required' => 'tanggal bergabung harus diisi'
        ],
        'nama_client' => [
            'required' => 'nama client harus diisi',
            'max_length' => 'nama client maksimal 100 karakter'
        ],
        'no_wa' => [
            'required' => 'nomor wa harus diisi',
            'max_length' => 'nomor wa maksimal 15 karakter',
            'numeric' => 'nomor wa harus karakter numeric'
        ]
    ];
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
}
