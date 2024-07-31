<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kelas';
    protected $primaryKey       = 'pk_id_kelas';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'fk_id_program',
        'nama_kelas',
        'tgl_mulai',
        'tgl_selesai',
        'is_active',
        'fk_id_client',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'fk_id_program' => 'required',
        'nama_kelas' => 'required',
        'tgl_mulai' => 'required',
        'tgl_selesai' => 'required',
    ];

    protected $validationMessages   = [
        'fk_id_program' => [
            'required' => 'Program harus diisi'
        ],
        'nama_kelas' => [
            'required' => 'Nama kelas harus diisi'
        ],
        'tgl_mulai' => [
            'required' => 'Tanggal mulai harus diisi'
        ],
        'tgl_selesai' => [
            'required' => 'Tanggal selesai harus diisi'
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
