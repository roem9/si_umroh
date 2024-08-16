<?php

namespace App\Models;

use CodeIgniter\Model;

class AgentModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'agent';
    protected $primaryKey       = 'pk_id_agent';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_agent',
        'username',
        'password',
        'cookie',
        'nama_agent',
        'gender',
        't4_lahir',
        'tgl_lahir',
        'no_wa',
        'email',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota_kabupaten',
        'provinsi',
        'bank_rekening',
        'no_rekening',
        'tipe_agent',
        'fk_id_leader_agent',
        'tgl_bergabung',
        'confirmed_at',
        'area_status',
        'batch',
        'la_double',
        'is_forget_password',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'username' => 'required|max_length[30]',
        'nama_agent' => 'required|max_length[100]',
        'gender' => 'required',
        't4_lahir' => 'required',
        'tgl_lahir' => 'required',
        'no_wa' => 'required|max_length[15]|numeric',
        'email' => 'required|valid_email',
        // 'alamat' => 'required',
        // 'kelurahan' => 'required',
        // 'kecamatan' => 'required',
        // 'kota_kabupaten' => 'required',
        // 'provinsi' => 'required',
        'bank_rekening' => 'required',
        'no_rekening' => 'required|numeric',
        'tipe_agent' => 'required',
        'tgl_bergabung' => 'required',
    ];
    protected $validationMessages   = [
        'username' => [
            'required' => 'Username wajib diisi.',
            'max_length' => 'Username tidak boleh lebih dari 30 karakter.'
        ],
        'nama_agent' => [
            'required' => 'Nama agent wajib diisi.',
            'max_length' => 'Nama agent tidak boleh lebih dari 100 karakter.'
        ],
        'gender' => [
            'required' => 'Jenis kelamin wajib diisi.'
        ],
        't4_lahir' => [
            'required' => 'Tempat lahir wajib diisi.'
        ],
        'tgl_lahir' => [
            'required' => 'Tanggal lahir wajib diisi.'
        ],
        'no_wa' => [
            'required' => 'Nomor WhatsApp wajib diisi.',
            'max_length' => 'Nomor WhatsApp tidak boleh lebih dari 15 karakter.',
            'numeric' => 'Nomor WhatsApp harus berupa angka.'
        ],
        'email' => [
            'required' => 'Email wajib diisi.',
            'valid_email' => 'Email tidak valid.'
        ],
        // 'alamat' => [
        //     'required' => 'Alamat wajib diisi.'
        // ],
        // 'kelurahan' => [
        //     'required' => 'Kelurahan wajib diisi.'
        // ],
        // 'kecamatan' => [
        //     'required' => 'Kecamatan wajib diisi.'
        // ],
        // 'kota_kabupaten' => [
        //     'required' => 'Kota/Kabupaten wajib diisi.'
        // ],
        // 'provinsi' => [
        //     'required' => 'Provinsi wajib diisi.'
        // ],
        'bank_rekening' => [
            'required' => 'Bank rekening wajib diisi.'
        ],
        'no_rekening' => [
            'required' => 'Nomor rekening wajib diisi.',
            'numeric' => 'Nomor rekening harus berupa angka.'
        ],
        'tipe_agent' => [
            'required' => 'Tipe agent wajib diisi.'
        ],
        'tgl_bergabung' => [
            'required' => 'Tanggal bergabung wajib diisi.'
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [
        'generateKodeAgent'
    ];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [
        'ifTipeChange'
    ];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function generateKodeAgent($data)
    {
        $db = db_connect();

        $lastId = $db->query("
            SELECT
                SUBSTRING(kode_agent, 8, 5) as last_id
            FROM agent
            ORDER BY SUBSTRING(kode_agent, 8, 5) desc
            LIMIT 1
        ")->getRowArray();

        $yearMonth = date('ym');
        if($lastId){
            $sequence = (int) $lastId['last_id'] + 1;
        } else {
            $sequence = 1;
        }
        $data['data']['kode_agent'] = sprintf('MU-%s%05d', $yearMonth, $sequence);

        return $data;
    }

    protected function ifTipeChange($data){
        if(isset($data['data']['tipe_agent'])){
            if($data['data']['tipe_agent'] == 'leader agent'){
                $data['data']['fk_id_leader_agent'] = NULL;
            }
        }

        return $data;
    }
}
