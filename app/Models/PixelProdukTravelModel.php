<?php

namespace App\Models;

use CodeIgniter\Model;

class PixelProdukTravelModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pixel_produk_travel';
    protected $primaryKey       = 'pk_id_pixel_produk_travel';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'fk_id_produk_travel',
        'fk_id_agent',
        'nama_pixel',
        'id_pixel',
        'code_pixel'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama_pixel' => 'required',
        'id_pixel' => 'required',
        'code_pixel' => 'required'
    ];
    protected $validationMessages   = [
        'nama_pixel' => [
            'required' => 'Nama pixel harus diisi.'
        ],
        'id_pixel' => [
            'required' => 'ID Pixel harus diisi.'
        ],
        'code_pixel' => [
            'required' => 'Code Pixel harus diisi.'
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
