<?php

namespace App\Models;

use CodeIgniter\Model;

class PertemuanProgramKelasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pertemuan_program_kelas';
    protected $primaryKey       = 'pk_id_pertemuan_program_kelas ';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'fk_id_kelas',
        'fk_id_program',
        'urutan',
        'nama_pertemuan',
        'tipe_latihan',
        'pengulangan_latihan',
        'pembahasan',
        'poin',
        'fk_id_soal_toefl',
        'fk_id_soal_ielts',
        'tipe_tes_ielts',
        'deskripsi',
        'is_show'
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
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
