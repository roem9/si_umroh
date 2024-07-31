<?php

namespace App\Models;

use CodeIgniter\Model;

class TravelModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'travel';
    protected $primaryKey       = 'pk_id_travel';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_travel',
        'unit',
        'nama_pemilik',
        'no_wa',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota_kabupaten',
        'provinsi',
        'link_landing_page',
        'tgl_bergabung',
        'bank_rekening',
        'no_rekening',
        'ppiu',
        'pihk',
        'company_profile'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama_travel' => 'required|alpha_space|min_length[3]|max_length[50]',
        'unit' => 'required',
        'nama_pemilik' => 'required|alpha_space|min_length[3]|max_length[50]',
        'no_wa' => 'required|numeric|min_length[10]|max_length[13]',
        'alamat' => 'required|string|min_length[10]|max_length[100]',
        'kelurahan' => 'required|string|min_length[3]|max_length[50]',
        'kecamatan' => 'required|string|min_length[3]|max_length[50]',
        'kota_kabupaten' => 'required|string|min_length[3]|max_length[50]',
        'provinsi' => 'required|string|min_length[3]|max_length[50]',
        'link_landing_page' => 'required|valid_url',
        'tgl_bergabung' => 'required|valid_date',
        'bank_rekening' => 'required|string|min_length[3]|max_length[50]',
        'no_rekening' => 'required|numeric|min_length[10]|max_length[20]',
        'ppiu' => 'required|string|min_length[3]|max_length[50]',
        'pihk' => 'required|string|min_length[3]|max_length[50]',
    ];

    protected $validationMessages   = [
        'nama_travel' => [
            'required' => 'Nama travel harus diisi',
            'alpha_space' => 'Nama travel hanya boleh mengandung huruf dan spasi',
            'min_length' => 'Nama travel minimal 3 karakter',
            'max_length' => 'Nama travel maksimal 50 karakter'
        ],
        'unit' => [
            'required' => 'Level travel harus diisi'
        ],
        'nama_pemilik' => [
            'required' => 'Nama pemilik harus diisi',
            'alpha_space' => 'Nama pemilik hanya boleh mengandung huruf dan spasi',
            'min_length' => 'Nama pemilik minimal 3 karakter',
            'max_length' => 'Nama pemilik maksimal 50 karakter'
        ],
        'no_wa' => [
            'required' => 'No WhatsApp harus diisi',
            'numeric' => 'No WhatsApp harus berupa angka',
            'min_length' => 'No WhatsApp minimal 10 digit',
            'max_length' => 'No WhatsApp maksimal 13 digit'
        ],
        'alamat' => [
            'required' => 'Alamat harus diisi',
            'string' => 'Alamat hanya boleh mengandung huruf dan spasi',
            'min_length' => 'Alamat minimal 10 karakter',
            'max_length' => 'Alamat maksimal 100 karakter'
        ],
        'kelurahan' => [
            'required' => 'Kelurahan harus diisi',
            'string' => 'Kelurahan hanya boleh mengandung huruf dan spasi',
            'min_length' => 'Kelurahan minimal 3 karakter',
            'max_length' => 'Kelurahan maksimal 50 karakter'
        ],
        'kecamatan' => [
            'required' => 'Kecamatan harus diisi',
            'string' => 'Kecamatan hanya boleh mengandung huruf dan spasi',
            'min_length' => 'Kecamatan minimal 3 karakter',
            'max_length' => 'Kecamatan maksimal 50 karakter'
        ],
        'kota_kabupaten' => [
            'required' => 'Kota/Kabupaten harus diisi',
            'string' => 'Kota/Kabupaten hanya boleh mengandung huruf dan spasi',
            'min_length' => 'Kota/Kabupaten minimal 3 karakter',
            'max_length' => 'Kota/Kabupaten maksimal 50 karakter'
        ],
        'provinsi' => [
            'required' => 'Provinsi harus diisi',
            'string' => 'Provinsi hanya boleh mengandung huruf dan spasi',
            'min_length' => 'Provinsi minimal 3 karakter',
            'max_length' => 'Provinsi maksimal 50 karakter'
        ],
        'link_landing_page' => [
            'required' => 'Link landing page harus diisi',
            'valid_url' => 'Link landing page tidak valid'
        ],
        'tgl_bergabung' => [
            'required' => 'Tanggal bergabung harus diisi',
            'valid_date' => 'Tanggal bergabung tidak valid'
        ],
        'bank_rekening' => [
            'required' => 'Bank rekening harus diisi',
            'string' => 'Bank rekening hanya boleh mengandung huruf dan spasi',
            'min_length' => 'Bank rekening minimal 3 karakter',
            'max_length' => 'Bank rekening maksimal 50 karakter'
        ],
        'no_rekening' => [
            'required' => 'No rekening harus diisi',
            'numeric' => 'No rekening harus berupa angka',
            'min_length' => 'No rekening minimal 10 digit',
            'max_length' => 'No rekening maksimal 20 digit'
        ],
        'ppiu' => [
            'required' => 'PPIU harus diisi',
            'string' => 'PPIU hanya boleh mengandung huruf dan spasi',
            'min_length' => 'PPIU minimal 3 karakter',
            'max_length' => 'PPIU maksimal 50 karakter'
        ],
        'pihk' => [
            'required' => 'PIHK harus diisi',
            'string' => 'PIHK hanya boleh mengandung huruf dan spasi',
            'min_length' => 'PIHK minimal 3 karakter',
            'max_length' => 'PIHK maksimal 50 karakter'
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
