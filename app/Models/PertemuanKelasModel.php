<?php

namespace App\Models;

use CodeIgniter\Model;

class PertemuanKelasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pertemuan_kelas';
    protected $primaryKey       = 'pk_id_pertemuan_kelas';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'fk_id_kelas'
        , 'nama_pertemuan'
        , 'urutan'
        , 'deskripsi'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama_pertemuan' => 'required',
        // 'urutan' => 'required',
        'deskripsi' => 'required',
    ];
    protected $validationMessages   = [
        'nama_pertemuan' => [
            'required' => 'Nama pertemuan harus diisi'
        ],
        'deskripsi' => [
            'required' => 'Deskripsi harus diisi'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [
        'generateUrutanPertemuan'
    ];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function generateUrutanPertemuan($data)
    {
        $urutan_terakhir = $this->where("fk_id_kelas", $data['data']['fk_id_kelas'])->orderBy("urutan", "DESC")->first();
        if ($urutan_terakhir) {
            $data['data']['urutan'] = $urutan_terakhir['urutan'] + 1;
        } else {
            $data['data']['urutan'] = 1;
        }

        return $data;
    }
}
