<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kelas';
    protected $primaryKey       = 'pk_id_kelas';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_kelas', 
        'deskripsi', 
        'gambar_sampul', 
        'akses_kelas',
        'nama_mentor',
        'no_wa',
        'show_kelas',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama_kelas' => 'required',
        'deskripsi' => 'required',
        // 'gambar_sampul' => 'required|uploaded[file]|max_size[file,1024]|ext_in[file,png,jpg,jpeg]',
        'akses_kelas' => 'required',
        'show_kelas' => 'required',
        'nama_mentor' => 'required',
        'no_wa' => 'required',
    ];

    protected $validationMessages   = [
        'nama_kelas' => [
            'required' => 'Nama program harus diisi'
        ],
        'deskripsi' => [
            'required' => 'Deskripsi program harus diisi'
        ],
        // 'gambar_sampul' => [
        //     'required' => 'File gambar harus diupload',
        //     'uploaded' => 'File gambar harus diupload',
        //     'max_size' => 'Ukuran file gambar maksimal 1MB',
        //     'ext_in' => 'File gambar harus berupa png, jpg, atau jpeg'
        // ],
        'akses_kelas' => [
            'required' => 'Akses kelas harus diisi'
        ],
        'show_kelas' => [
            'required' => 'Form ini harus diisi'
        ],
        'nama_mentor' => [
            'required' => 'Nama mentor harus diisi'
        ],
        'no_wa' => [
            'required' => 'No Whatsapp harus diisi'
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
