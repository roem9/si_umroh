<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaIeltsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'peserta_ielts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_tes', 'no_doc', 'first_name', 'last_name', 't4_lahir', 'tgl_lahir', 'email', 'link_speaking', 'text_listening_reading', 'text_writing', 'nilai_speaking', 'nilai_listening', 'nilai_reading', 'nilai_writing', 'kriteria_ta_1', 'nilai_ta_1', 'kriteria_cc_1', 'nilai_cc_1', 'kriteria_gra_1', 'nilai_gra_1', 'kriteria_lr_1', 'nilai_lr_1', 'kriteria_ta_2', 'nilai_ta_2', 'kriteria_cc_2', 'nilai_cc_2', 'kriteria_gra_2','nilai_gra_2', 'kriteria_lr_2', 'nilai_lr_2','kriteria_topic', 'nilai_topic', 'kriteria_fluency', 'nilai_fluency', 'kriteria_grammar', 'nilai_grammar', 'kriteria_vocabulary', 'nilai_vocabulary', 'fk_id_kelas_member', 'fk_id_pertemuan'];

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