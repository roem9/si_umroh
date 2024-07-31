<?php

namespace App\Models;

use CodeIgniter\Model;

class LatihanPertemuanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'latihan_pertemuan';
    protected $primaryKey       = 'pk_id_latihan_pertemuan ';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'fk_id_pertemuan_program',
        'item',
        'data',
        'urutan'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'fk_id_pertemuan_program' => 'required',
        'item' => 'required',
        'data' => 'required'
    ];

    protected $validationMessages   = [
        'fk_id_pertemuan_program' => [
            'required' => 'id tidak ditemukan'
        ],
        'item' => [
            'required' => 'item harus diisi'
        ],
        'data' => [
            'required' => 'data harus diisi'
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [
        'generateUrutanLatihan'
    ];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function generateUrutanLatihan($data)
    {
        $urutan_terakhir = $this->where("fk_id_pertemuan_program", $data['data']['fk_id_pertemuan_program'])->orderBy("urutan", "DESC")->first();
        if ($urutan_terakhir) {
            $data['data']['urutan'] = $urutan_terakhir['urutan'] + 1;
        } else {
            $data['data']['urutan'] = 1;
        }

        return $data;
    }
}
