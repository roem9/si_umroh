<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\TravelModel;

class Travel extends BaseController
{
    public $travelModel;
    public $db;

    public function __construct()
    {
        $this->travelModel = new TravelModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $data['sidebar'] = "travel";
        $data['title'] = "List Travel";
        $data['deskripsi'] = "List seluruh data travel";

        return view('admin/pages/travel', $data);
    }

    public function save()
    {
        $company_profile = $this->request->getFile('company_profile');

        $data = [
            'nama_travel' => $this->request->getPost('nama_travel'),
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
            'nama_pemilik' => $this->request->getPost('nama_pemilik'),
            'unit' => $this->request->getPost('unit'),
            'no_wa' => $this->request->getPost('no_wa'),
            'alamat' => $this->request->getPost('alamat'),
            'kelurahan' => $this->request->getPost('kelurahan'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kota_kabupaten' => $this->request->getPost('kota_kabupaten'),
            'provinsi' => $this->request->getPost('provinsi'),
            'link_landing_page' => $this->request->getPost('link_landing_page'),
            'tgl_bergabung' => $this->request->getPost('tgl_bergabung'),
            'bank_rekening' => $this->request->getPost('bank_rekening'),
            'no_rekening' => $this->request->getPost('no_rekening'),
            'ppiu' => $this->request->getPost('ppiu'),
            'pihk' => $this->request->getPost('pihk'),
        ];

        $pk_id_travel = $this->request->getPost('pk_id_travel');

        $searchTravel = $this->travelModel->find($pk_id_travel);
        if ($searchTravel) {
            if ($company_profile) {
                $rules = [
                    // 'company_profile' => [
                    //     'rules' => 'uploaded[company_profile]|max_size[company_profile,102400]|ext_in[company_profile,pdf]',
                    //     'errors' => [
                    //         'uploaded' => 'Company profile harus diupload',
                    //         'max_size' => 'File terlalu besar (max 100 MB)',
                    //         'ext_in' => 'file harus berupa pdf'
                    //     ]
                    // ]
                    'company_profile' => [
                        'rules' => 'max_size[company_profile,102400]|ext_in[company_profile,pdf]',
                        'errors' => [
                            'max_size' => 'File terlalu besar (max 100 MB)',
                            'ext_in' => 'file harus berupa pdf'
                        ]
                    ]
                ];

                if ($this->validate($rules)) {
                    if ($company_profile->isValid() && !$company_profile->hasMoved()) {
                        $newName = $company_profile->getRandomName();
                        if ($company_profile->move('public/assets/company-profile', $newName) ===  true) {
                            $data['company_profile'] = $newName;

                            if ($this->travelModel->update($pk_id_travel, $data) === true) {

                                $response = [
                                    'status' => 'success',
                                    'message' => 'Berhasil mengubah data travel'
                                ];
                            } else {
                                $response = [
                                    "error" => $this->travelModel->errors()
                                ];
                            }
                        } else {
                            $response = [
                                "error" => $file->getErrorString()
                            ];
                        }
                    } else {
                        // Response
                        $response = [
                            'status' => 'error',
                            'message' => 'Gagal mengupload file'
                        ];
                    }
                } else {
                    // Response
                    $response = [
                        "error" => $this->validator->getErrors()
                    ];
                }
            } else {
                if ($this->travelModel->update($pk_id_travel, $data) === true) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Berhasil mengubah data travel'
                    ];
                } else {
                    $response = [
                        "error" => $this->travelModel->errors()
                    ];
                }
            }
        } else {
            if ($company_profile) {
                $rules = [
                    // 'company_profile' => [
                    //     'rules' => 'uploaded[company_profile]|max_size[company_profile,102400]|ext_in[company_profile,pdf]',
                    //     'errors' => [
                    //         'uploaded' => 'Company profile harus diupload',
                    //         'max_size' => 'File terlalu besar (max 100 MB)',
                    //         'ext_in' => 'file harus berupa pdf'
                    //     ]
                    // ]
                    'company_profile' => [
                        'rules' => 'max_size[company_profile,102400]|ext_in[company_profile,pdf]',
                        'errors' => [
                            'max_size' => 'File terlalu besar (max 100 MB)',
                            'ext_in' => 'file harus berupa pdf'
                        ]
                    ]
                ];

                if ($this->validate($rules)) {
                    if ($company_profile->isValid() && !$company_profile->hasMoved()) {
                        $newName = $company_profile->getRandomName();

                        // Store file in public/uploads/ folder
                        if ($company_profile->move('public/assets/company-profile', $newName)) {
                            $data['company_profile'] = $newName;

                            if ($this->travelModel->save($data) === true) {
                                $response = [
                                    'status' => 'success',
                                    'message' => 'Berhasil menambah data travel'
                                ];
                            } else {
                                $response = [
                                    "error" => $this->travelModel->errors()
                                ];
                            }
                        } else {
                            $response = [
                                "error" => $company_profile->getErrorString()
                            ];
                        }
                    } else {
                        // Response
                        $response = [
                            'status' => 'error',
                            'message' => 'Gagal mengupload file'
                        ];
                    }
                } else {
                    // Response
                    $response = [
                        "error" => $this->validator->getErrors()
                    ];
                }
            } else {
                if ($this->travelModel->save($data) === true) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Berhasil menambahkan data travel'
                    ];
                } else {
                    $response = [
                        "error" => $this->travelModel->errors()
                    ];
                }
            }
        }

        return json_encode($response);
    }

    public function getData($pk_id_travel)
    {
        $data = $this->travelModel->find($pk_id_travel);
        return json_encode($data);
    }

    public function getList()
    {
        $query = "
            CREATE TEMPORARY TABLE Listtravel AS
            SELECT
                *,
                DATE_FORMAT(tgl_bergabung, '%d-%m-%Y') as tgl_bergabung_formatted
            FROM travel a
            WHERE a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL;
        ";

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if (trim($query) != "") {
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('Listtravel');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listtravel");
        return DataTable::of($builder)->toJson(true);
    }

    public function delete($pk_id_travel)
    {
        if ($this->travelModel->delete($pk_id_travel) === true) {
            $response = [
                'status' => 'success',
                'message' => 'Berhasil menghapus data travel'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus data travel'
            ];
        }

        return json_encode($response);
    }
}
