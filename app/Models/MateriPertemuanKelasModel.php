<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriPertemuanKelasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'materi_pertemuan_kelas';
    protected $primaryKey       = 'pk_id_materi_pertemuan_kelas';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'fk_id_kelas',
        'fk_id_pertemuan_program_kelas',
        'item',
        'data',
        'urutan',
    ];

    // Dates
    protected $useTimestamps = true;
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
    protected $beforeInsert   = [
        'generateUrutanMateri'
    ];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function generateUrutanMateri($data)
    {
        $urutan_terakhir = $this->where("fk_id_pertemuan_program_kelas", $data['data']['fk_id_pertemuan_program_kelas'])->orderBy("urutan", "DESC")->first();
        if ($urutan_terakhir) {
            $data['data']['urutan'] = $urutan_terakhir['urutan'] + 1;
        } else {
            $data['data']['urutan'] = 1;
        }

        return $data;
    }
}
