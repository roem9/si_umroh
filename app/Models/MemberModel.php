<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'member';
    protected $primaryKey       = 'pk_id_member';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'fk_id_client',
        'nim', 
        'nama_member', 
        'alamat', 
        't4_lahir', 
        'tgl_lahir', 
        'no_wa',
        'self_password',
        'password',
        'cookie'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama_member' => 'required',
        'alamat' => 'required',
        't4_lahir' => 'required',
        'tgl_lahir' => 'required',
        'no_wa' => 'required|numeric',
    ];
    protected $validationMessages   = [
        'nama_member' => [
            'required' => 'Nama member harus diisi'
        ],
        'alamat' => [
            'required' => 'Alamat harus diisi'
        ],
        't4_lahir' => [
            'required' => 'Tempat lahir harus diisi'
        ],
        'tgl_lahir' => [
            'required' => 'Tanggal lahir harus diisi'
        ],
        'no_wa' => [
            'required' => 'Nomor WA harus diisi',
            'numeric' => 'Nomor WA harus berupa angka'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [
        'generateNimMember'
    ];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function generateNimMember($data)
    {
        $tahun = date("Y");

        $nim = $this->where("YEAR(created_at)", $tahun)->orderBy("pk_id_member", "DESC")->first();

        if ($nim) {
            $id = $nim['pk_id_member'] + 1;
        } else {
            $id = 1;
        }

        if ($id >= 1 && $id < 10) {
            $nimNumber = date('ym') . "000" . $id;
        } else if ($id >= 10 && $id < 100) {
            $nimNumber = date('ym') . "00" . $id;
        } else if ($id >= 100 && $id < 1000) {
            $nimNumber = date('ym') . "0" . $id;
        } else {
            $nimNumber = date('ym') . $id;
        }

        $data['data']['nim'] = $nimNumber;
        return $data;
    }

}
