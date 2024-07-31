<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranPenjualanProdukTravelModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pembayaran_penjualan_produk_travel';
    protected $primaryKey       = 'pk_id_pembayaran_penjualan_produk_travel';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'fk_id_penjualan_produk_travel',
        'tgl_pembayaran',
        'nominal',
        'keterangan',
        'bukti_pembayaran'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'tgl_pembayaran' => 'required',
        'nominal' => 'required',
        'keterangan' => 'required'
    ];

    protected $validationMessages   = [
        'tgl_pembayaran' => [
            'required' => 'Tgl Pembayaran harus diisi.'
        ],
        'nominal' => [
            'required' => 'Nominal pembayaran harus diisi.'
        ],
        'keterangan' => [
            'required' => 'Keterangan pembayaran harus diisi.'
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
