<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaToeflModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'peserta_toefl';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_tes', 'nama', 't4_lahir', 'tgl_lahir', 'jk', 'alamat', 'no_wa', 'email', 'nilai_listening', 'nilai_structure', 'nilai_reading', 'text', 'sertifikat', 'no_doc', 'country', 'language', 'fk_id_kelas_member', 'fk_id_pertemuan'];

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
}
