<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasMemberModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kelas_member';
    protected $primaryKey       = 'pk_id_kelas_member';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'fk_id_kelas',
        'fk_id_member',
        'tgl_mulai',
        'fk_id_program',
        'no_doc',
        'sertifikat',
        'catatan',
        'last_access'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'tgl_mulai' => 'required',
        'fk_id_program' => 'required',
    ];

    protected $validationMessages   = [
        'tgl_mulai' => [
            'required' => 'Tanggal Mulai harus diisi'
        ],
        'fk_id_program' => [
            'required' => 'Program harus diisi'
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

    function setValidationRule($field, $rule)
    {
        $this->validationRules[$field] = $rule;
    }

    public function setValidationMessage($field, $fieldMessages)
    {
        $this->validationMessages[$field] = $fieldMessages;
    }
}
