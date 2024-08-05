<?php

namespace App\Models;

use CodeIgniter\Model;

class ListSendWaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'list_send_wa';
    protected $primaryKey       = 'pk_id_list_send_wa';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'no_wa',
        'text',
        'is_send'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'no_wa' => 'required',
        'text' => 'required',
    ];

    protected $validationMessages   = [
        'no_wa' => [
            'required' => 'No wa tidak boleh kosong'
        ],
        'text' => [
            'required' => 'text tidak boleh kosong'
        ],
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
