<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\PertemuanKelasModel;
use App\Models\MateriPertemuanModel;
use Hermawan\DataTables\DataTable;
use JsonException;

class Kelas extends BaseController
{
    public $kelasModel;
    public $pertemuanKelasModel;
    public $materiPertemuanModel;
    public $db;

    public function __construct(){
        $this->kelasModel = new KelasModel();
        $this->pertemuanKelasModel = new PertemuanKelasModel();
        $this->materiPertemuanModel = new MateriPertemuanModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $data['sidebar'] = "kelas";
        $data['title'] = "Kelas";
        $data['breadcrumbs'] = ["Kelas"];
        $data['searchButton'] = true;
        $data['deskripsi'] = 'Menu untuk mengelola seluruh data kelas';

        return view('admin/pages/kelas', $data);
    }

    public function designKelas($pk_id_kelas)
    {
        // $db = db_connect();
        $kelas = $this->db->query("SELECT * FROM kelas WHERE pk_id_kelas  = $pk_id_kelas")->getRowArray();
        $allKelas = $this->db->query("SELECT * FROM kelas WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL) ORDER BY nama_kelas")->getResultArray();

        $data['sidebar'] = "kelas";
        $data['title'] = "Design Kelas $kelas[nama_kelas]";
        $data['breadcrumbs'] = ["<a class='opacity-5 text-light' href='".base_url()."/kelas'>Kelas</a>"];
        $data['searchButton'] = false;
        $data['deskripsi'] = "Menu untuk mengelola materi kelas $kelas[nama_kelas]";
        $data['pk_id_kelas'] = $pk_id_kelas;

        $data['breadcrumbSelect'] = [];
        if ($allKelas) {
            foreach ($allKelas as $i) {
                if ($i['pk_id_kelas'] == $kelas['pk_id_kelas']) {
                    array_push($data['breadcrumbSelect'], "<option selected value='designKelas/$i[pk_id_kelas]'>$i[nama_kelas]</option>");
                } else {
                    array_push($data['breadcrumbSelect'], "<option value='designKelas/$i[pk_id_kelas]'>$i[nama_kelas]</option>");
                }
            }
        }

        return view('admin/pages/design-kelas', $data);
    }

    public function materiPertemuan($pk_id_pertemuan_kelas)
    {
        $pertemuan = $this->db->query("SELECT * FROM pertemuan_kelas WHERE pk_id_pertemuan_kelas  = $pk_id_pertemuan_kelas AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)")->getRowArray();
        $kelas = $this->db->query("SELECT * FROM kelas WHERE pk_id_kelas  = $pertemuan[fk_id_kelas] AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)")->getRowArray();
        $allPertemuan = $this->db->query("SELECT * FROM pertemuan_kelas WHERE fk_id_kelas  = $pertemuan[fk_id_kelas] AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)")->getResultArray();

        $data['sidebar'] = "kelas";
        $data['title'] = "Design Materi Kelas $pertemuan[nama_pertemuan]";
        $data['breadcrumbs'] = ["<a class='opacity-5 text-light' href='".base_url()."/kelas'>Kelas</a>", "<a class='opacity-5 text-light' href='".base_url()."/kelas/designKelas/$kelas[pk_id_kelas]'>$kelas[nama_kelas]</a>"];
        $data['searchButton'] = false;
        $data['deskripsi'] = "Menu untuk mengelola materi $pertemuan[nama_pertemuan]";
        $data['pk_id_pertemuan_kelas'] = $pk_id_pertemuan_kelas;

        $data['breadcrumbSelect'] = [];
        if ($allPertemuan) {
            foreach ($allPertemuan as $i) {
                if ($i['pk_id_pertemuan_kelas'] == $pertemuan['pk_id_pertemuan_kelas']) {
                    array_push($data['breadcrumbSelect'], "<option selected value='materiPertemuan/$i[pk_id_pertemuan_kelas]'>$i[nama_pertemuan] (Materi)</option>");
                } else {
                    array_push($data['breadcrumbSelect'], "<option value='materiPertemuan/$i[pk_id_pertemuan_kelas]'>$i[nama_pertemuan] (Materi)</option>");
                }
            }
        }

        return view('admin/pages/design-materi-pertemuan', $data);
    }

    // Get All Kelas
    public function getAllKelas()
    {
        $data = $this->db->query("
            SELECT 
                pk_id_kelas,
                nama_kelas,
                deskripsi,
                gambar_sampul,
                akses_kelas
            FROM kelas 
            WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            ORDER BY nama_kelas
        ")->getResult();

        return json_encode($data);
    }

    public function getListKelas($nama_kelas = "")
    {
        // $model = new KelasModel();
        if ($nama_kelas != "") {
            $data = $this->db->query("SELECT 
                pk_id_kelas
                , nama_kelas
                , deskripsi
                , gambar_sampul
                FROM kelas WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL) AND nama_kelas LIKE '%$nama_kelas%' ORDER BY nama_kelas")->getResult();
            return json_encode($data);
        } else {
            $data = $this->db->query("
                SELECT 
                    pk_id_kelas, 
                    nama_kelas, 
                    deskripsi, 
                    gambar_sampul,
                    akses_kelas
                FROM kelas WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL) ORDER BY nama_kelas
            ")->getResult();
            return json_encode($data);
        }
    }

    // Get Kelas
    public function getKelas($pk_id_kelas)
    {
        $data = $this->kelasModel->find($pk_id_kelas);
        return json_encode($data);
    }

    public function simpan()
    {
        $pk_id_kelas = $this->request->getPost('pk_id_kelas');
        $nama_kelas = $this->request->getPost('nama_kelas');
        $nama_mentor = $this->request->getPost('nama_mentor');
        $no_wa = $this->request->getPost('no_wa');
        $deskripsi = $this->request->getPost('deskripsi');
        $gambar_sampul = $this->request->getFile('gambar_sampul');
        $akses_kelas = $this->request->getPost('akses_kelas');

        $data = [
            'nama_kelas' => $nama_kelas,
            'deskripsi' => $deskripsi,
            'akses_kelas' => $akses_kelas,
            'nama_mentor' => $nama_mentor,
            'no_wa' => $no_wa,
        ];

        $searchKelas = $this->kelasModel->find($pk_id_kelas);
        if ($searchKelas) {
            if ($gambar_sampul) {
                $rules = [
                    'gambar_sampul' => [
                        'rules' => 'uploaded[gambar_sampul]|max_size[gambar_sampul,1024]|ext_in[gambar_sampul,png,jpg,jpeg]',
                        'errors' => [
                            'uploaded' => 'Gambar harus diisi',
                            'max_size' => 'Gambar terlalu besar',
                            'ext_in' => 'Gambar harus berupa png, jpg, atau jpeg'
                        ]
                    ]
                ];

                if($this->validate($rules)){
                    if ($gambar_sampul->isValid() && !$gambar_sampul->hasMoved()) {
                        // Get file name and extension
                        // $name = $file->getName();
                        // $ext = $file->getClientExtension();
        
                        // Get random file name
                        $newName = $gambar_sampul->getRandomName();
                        if($gambar_sampul->move('public/assets/img-kelas', $newName) ===  true){
                            $data['gambar_sampul'] = $newName;
            
                            if($this->kelasModel->update($pk_id_kelas, $data) === true){
                                $response = [
                                    'status' => 'success',
                                    'message' => 'Berhasil mengubah data kelas'
                                ];
                            } else {
                                $response = [
                                    "error" => $this->kelasModel->errors()
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
                if($this->kelasModel->update($pk_id_kelas, $data) === true){
                    $response = [
                        'status' => 'success',
                        'message' => 'Berhasil mengubah data kelas'
                    ];
                } else {
                    $response = [
                        "error" => $this->kelasModel->errors()
                    ];
                }
            }
        } else {
            $rules = [
                'gambar_sampul' => [
                    'rules' => 'uploaded[gambar_sampul]|max_size[gambar_sampul,1024]|ext_in[gambar_sampul,png,jpg,jpeg]',
                    'errors' => [
                        'uploaded' => 'Gambar harus diisi',
                        'max_size' => 'Gambar terlalu besar',
                        'ext_in' => 'Gambar harus berupa png, jpg, atau jpeg'
                    ]
                ]
            ];

            // var_dump('cek');
            // exit();

            if($this->validate($rules)){
                if ($gambar_sampul->isValid() && !$gambar_sampul->hasMoved()) {
                    // Get file name and extension
                    // $name = $gambar_sampul->getName();
                    // $ext = $gambar_sampul->getClientExtension();

                    // Get random file name
                    $newName = $gambar_sampul->getRandomName();

                    // Store file in public/uploads/ folder
                    if($gambar_sampul->move('public/assets/img-kelas', $newName)){
                        $data['gambar_sampul'] = $newName;

                        if($this->kelasModel->save($data) === true){
                            $response = [
                                'status' => 'success',
                                'message' => 'Berhasil menambahkan data kelas'
                            ];
                        } else {
                            $response = [
                                "error" => $this->kelasModel->errors()
                            ];
                        }
                    } else {
                        $response = [
                            "error" => $gambar_sampul->getErrorString()
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
        }

        return json_encode($response);
    }

    public function hapusKelas($pk_id_kelas)
    {
        // $model = new KelasModel();
        // $model->update($id, ["hapus" => 1]);
        if($this->kelasModel->delete($pk_id_kelas) === true){
            $response = [
                "status" => 'success',
                "message" => 'Berhasil menghapus kelas'
            ];
        } else {
            $response = [
                "status" => 'error',
                "message" => 'Gagal menghapus kelas'
            ];
        }

        return json_encode($response);
    }

    public function duplicateKelas($id)
    {
        $db = db_connect();
        $model = new KelasModel();
        
        $dataCopyKelas = $db->query("
            SELECT
                *
            FROM kelas WHERE
            pk_id_kelas = $id
        ")->getRowArray();

        $data = [
            "nama_kelas" => $dataCopyKelas['nama_kelas'] . " (copy)",
            "deskripsi" => $dataCopyKelas['deskripsi'],
            "gambar_sampul" => $dataCopyKelas['gambar_sampul'],
            "akses_kelas" => $dataCopyKelas['akses_kelas'],
            "nama_mentor" => $dataCopyKelas['nama_mentor'],
            "no_wa" => $dataCopyKelas['no_wa'],
        ];

        $model->save($data);
        $last_insert_id = $model->getInsertID();

        // insert latihan, materi, pertemuan
        $idPertemuanKelas = $db->query("
            SELECT
                pk_id_pertemuan_kelas
            FROM pertemuan_kelas
            WHERE fk_id_kelas = $id
        ")->getResultArray();

        foreach ($idPertemuanKelas as $idPertemuanKelas) {
            // copy pertemuan kelas berdasarkan id
            $dataPertemuan = $db->query("
                SELECT 
                    *
                FROM pertemuan_kelas WHERE pk_id_pertemuan_kelas = $idPertemuanKelas[pk_id_pertemuan_kelas]
            ")->getRowArray();

            $dataPertemuan['fk_id_kelas'] = $last_insert_id;

            $pertemuanModel = new  PertemuanKelasModel();
            $pertemuanModel->save($dataPertemuan);

            $lastIdPertemuan = $pertemuanModel->getInsertID();

            $dataMateri = $db->query("
                SELECT 
                    item,
                    data,
                    urutan
                FROM materi_pertemuan WHERE fk_id_pertemuan_kelas = $idPertemuanKelas[pk_id_pertemuan_kelas]
            ")->getResultArray();

            foreach ($dataMateri as $data_materi) {
                $data_materi['fk_id_pertemuan_kelas'] = $lastIdPertemuan;
    
                $materiModel = new MateriPertemuanModel();
                $materiModel->save($data_materi);
            }

        }

        $response = [
            'status' => 'success',
            'message' => 'duplikat kelas berhasil'
        ];

        return json_encode($response);
    }

    // view list pertemuan kelas
    public function getAllPertemuan($pk_id_kelas)
    {
        $data = $this->pertemuanKelasModel->where('fk_id_kelas', $pk_id_kelas)->orderby("urutan")->findAll();
        return json_encode($data);
    }

    public function simpanPertemuanKelas()
    {
        $pk_id_pertemuan_kelas = $this->request->getPost('pk_id_pertemuan_kelas');
        $fk_id_kelas = $this->request->getPost('fk_id_kelas');
        $nama_pertemuan = $this->request->getPost('nama_pertemuan');
        $deskripsi = $this->request->getPost('deskripsi');

        $data = [
            'fk_id_kelas' => $fk_id_kelas,
            'nama_pertemuan' => $nama_pertemuan,
            'deskripsi' => $deskripsi
        ];

        $searchPertemuan = $this->pertemuanKelasModel->find($pk_id_pertemuan_kelas);
        if ($searchPertemuan) {
            if($this->pertemuanKelasModel->update($pk_id_pertemuan_kelas, $data) === true){
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil mengubah data pertemuan'
                ];
            } else {
                $response = [
                    "error" => $this->pertemuanKelasModel->errors()
                ];
            }
        } else {
            if($this->pertemuanKelasModel->save($data) === true){
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil menambahkan data pertemuan'
                ];
            } else {
                $response = [
                    "error" => $this->pertemuanKelasModel->errors()
                ];
            }
        }

        return json_encode($response);
    }

    public function getPertemuanKelas($pk_id_pertemuan_kelas)
    {
        $data = $this->pertemuanKelasModel->find($pk_id_pertemuan_kelas);
        return json_encode($data);
    }

    public function hapusPertemuanKelas($pk_id_pertemuan_kelas)
    {
        if($this->pertemuanKelasModel->delete($pk_id_pertemuan_kelas) === true){
            $response = [
                'status' => 'success',
                'message' => 'Berhasil menghapus data'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus data'
            ];
        }

        return json_encode($response);
    }

    public function ubahUrutan()
    {
        $pk_id_pertemuan_kelas = $this->request->getPost('pk_id_pertemuan_kelas');
        $pk_id_pertemuan_kelas_other = $this->request->getPost('pk_id_pertemuan_kelas_other');
        $urutan = $this->request->getPost('urutan');
        $arah = $this->request->getPost('arah');

        if ($arah == 'naik') {
            $this->db->query("UPDATE pertemuan_kelas SET urutan = $urutan WHERE pk_id_pertemuan_kelas = $pk_id_pertemuan_kelas_other");
            $this->db->query("UPDATE pertemuan_kelas SET urutan = $urutan - 1 WHERE pk_id_pertemuan_kelas = $pk_id_pertemuan_kelas");
        } else {
            $this->db->query("UPDATE pertemuan_kelas SET urutan = $urutan WHERE pk_id_pertemuan_kelas = $pk_id_pertemuan_kelas_other");
            $this->db->query("UPDATE pertemuan_kelas SET urutan = $urutan + 1 WHERE pk_id_pertemuan_kelas = $pk_id_pertemuan_kelas");
        }
    }

    public function simpanMateriPertemuan()
    {
        $pk_id_materi_pertemuan = $this->request->getPost('pk_id_materi_pertemuan');
        $fk_id_pertemuan_kelas = $this->request->getPost('fk_id_pertemuan_kelas');
        $item = $this->request->getPost('item');
        $file_audio = $this->request->getFile("file_audio");
        $file_file = $this->request->getFile("file_file");
        $file_image = $this->request->getFile("file_image");

        $rules = [];

        if ($item == 'audio') {
            $rules = [
                'nama_file' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama file harus diisi'
                    ]
                ],
                'file_audio' => [
                    'rules' => 'uploaded[file_audio]|max_size[file_audio,5120]|ext_in[file_audio,mp3]',
                    'errors' => [
                        'uploaded' => 'Audio harus diupload',
                        'max_size' => 'Audio terlalu besar (max 5 mb)',
                        'ext_in' => 'Audio harus berupa mp3'
                    ]
                ]
            ];
        } else if ($item == 'file') {
            $rules = [
                'nama_file' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama file harus diisi'
                    ]
                ],
                'file_file' => [
                    'rules' => 'uploaded[file_file]|max_size[file_file,5120]|ext_in[file_file,pdf]',
                    'errors' => [
                        'uploaded' => 'File harus diupload',
                        'max_size' => 'File terlalu besar (max 5 mb)',
                        'ext_in' => 'file harus berupa pdf'
                    ]
                ]
            ];
        } else if ($item == 'image') {
            $rules = [
                'nama_file' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama file harus diisi'
                    ]
                ],
                'file_image' => [
                    'rules' => 'uploaded[file_image]|max_size[file_image,1024]|ext_in[file_image,png,jpg,jpeg]',
                    'errors' => [
                        'uploaded' => 'Gambar harus diisi',
                        'max_size' => 'Gambar terlalu besar (max 1 mb)',
                        'ext_in' => 'Gambar harus berupa png, jpg, atau jpeg'
                    ]
                ]
            ];
        } else if ($item == 'text') {
            $rules = [
                'text' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Text harus diisi'
                    ]
                ]
            ];
        } else if ($item == 'video') {
            $rules = [
                'video' => [
                    'label' => 'Video',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Link video harus diisi'
                    ]
                ]
            ];
        } else {
            $rules = [
                'item' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tipe item materi harus diisi terlebih dahulu'
                    ]
                ],
            ];
        }

        if($this->validate($rules)){
            $data = [
                'fk_id_pertemuan_kelas' => $fk_id_pertemuan_kelas,
                'item' => $item
            ];

            if ($item == 'text' || $item == 'video') {
                $searchMateri = $this->materiPertemuanModel->find($pk_id_materi_pertemuan);
                if ($searchMateri) {
                    $data['data'] = $this->request->getPost($item);
                    if($this->materiPertemuanModel->update($pk_id_materi_pertemuan, $data) === true){
                        $response = [
                            'status' => 'success',
                            'message' => 'Berhasil mengubah data item materi'
                        ];
                    } else {
                        $response = [
                            "error" => $this->materiPertemuanModel->errors()
                        ];
                    }
                } else {
                    $data['data'] = $this->request->getPost($item);

                    if($this->materiPertemuanModel->save($data) === true){
                        $response = [
                            'status' => 'success',
                            'message' => 'Berhasil menambahkan item materi'
                        ];
                    } else {
                        $response = [
                            "error" => $this->materiPertemuanModel->errors()
                        ];
                    }
                }
            } else {
                $move = 0;

                if($file_audio){
                    $move = ($file_audio->isValid() && !$file_audio->hasMoved()) ? 1 : 0;
                } else if ($file_file){
                    $move = ($file_file->isValid() && !$file_file->hasMoved()) ? 1 : 0;
                } else if ($file_image){
                    $move = ($file_image->isValid() && !$file_image->hasMoved()) ? 1 : 0;
                }

                if ($move) {
                    $nama_file = $this->request->getPost('nama_file');
                    // Get audio name and extension
                    // $name = $file->getName();
                    if($file_audio){
                        $ext = $file_audio->getClientExtension();
                    } else if($file_file){
                        $ext = $file_file->getClientExtension();
                    } else if($file_image){
                        $ext = $file_image->getClientExtension();
                    }

                    // Get random audio name
                    $name = $this->db->query("SELECT pk_id_materi_pertemuan FROM materi_pertemuan WHERE fk_id_pertemuan_kelas = $fk_id_pertemuan_kelas ORDER BY pk_id_materi_pertemuan DESC LIMIT 1")->getRowArray();
                    if ($name) {
                        $newName = "$nama_file" . "_" . $name['pk_id_materi_pertemuan'] + 1 . "." . $ext;
                    } else {
                        $newName = "$nama_file" . "_1." . $ext;
                    }

                    // Store audio in public/uploads/ folder
                    if ($item == 'audio') {
                        $file_audio->move('public/assets/materi-pertemuan/audio/', $newName, true);
                    } else if ($item == 'file') {
                        $file_file->move('public/assets/materi-pertemuan/file/', $newName, true);
                    } else if ($item == 'image') {
                        $file_image->move('public/assets/materi-pertemuan/img/', $newName, true);
                    }
                    $data['data'] = $newName;
                    if($this->materiPertemuanModel->save($data) === true){
                        $response = [
                            'status' => 'success',
                            'message' => 'Berhasil menambahkan item materi'
                        ];
                    } else {
                        $response = [
                            "error" => $this->materiPertemuanModel->errors()
                        ];
                    }
                } else {
                    // Response
                    $response = [
                        'status' => 'error',
                        'message' => 'Gagal mengupload file'
                    ];
                }
            }
        } else {
            // Response
            $response = [
                "error" => $this->validator->getErrors()
            ];
        }

        return json_encode($response);
    }

    public function getAllMateriPertemuan($pk_id_pertemuan_kelas)
    {
        $data = $this->materiPertemuanModel->where('fk_id_pertemuan_kelas', $pk_id_pertemuan_kelas)->orderby('urutan')->findAll();
        return json_encode($data);
    }

    public function ubahUrutanMateri()
    {
        $pk_id_materi_pertemuan = $this->request->getPost('pk_id_materi_pertemuan');
        $pk_id_materi_pertemuan_other = $this->request->getPost('pk_id_materi_pertemuan_other');
        $urutan = $this->request->getPost('urutan');
        $arah = $this->request->getPost('arah');

        if ($arah == 'naik') {
            $this->db->query("UPDATE materi_pertemuan SET urutan = $urutan WHERE pk_id_materi_pertemuan = $pk_id_materi_pertemuan_other");
            $this->db->query("UPDATE materi_pertemuan SET urutan = $urutan - 1 WHERE pk_id_materi_pertemuan = $pk_id_materi_pertemuan");
        } else {
            $this->db->query("UPDATE materi_pertemuan SET urutan = $urutan WHERE pk_id_materi_pertemuan = $pk_id_materi_pertemuan_other");
            $this->db->query("UPDATE materi_pertemuan SET urutan = $urutan + 1 WHERE pk_id_materi_pertemuan = $pk_id_materi_pertemuan");
        }
    }

    public function hapusMateriPertemuan($pk_id_materi_pertemuan)
    {
        $db = db_connect();
        $deleted = $db->query("SELECT * FROM materi_pertemuan WHERE pk_id_materi_pertemuan = $pk_id_materi_pertemuan")->getRowArray();
        $db->query("UPDATE materi_pertemuan SET urutan = urutan - 1 WHERE urutan > $deleted[urutan] AND fk_id_pertemuan_kelas = $deleted[fk_id_pertemuan_kelas]");
        $db->query("DELETE FROM materi_pertemuan WHERE pk_id_materi_pertemuan = $pk_id_materi_pertemuan");

        // if ($deleted['item'] == 'audio') {
        //     unlink("public/assets/materi-pertemuan/audio/" . $deleted['data']);
        // } else if ($deleted['item'] == 'image') {
        //     unlink("public/assets/materi-pertemuan/img/" . $deleted['data']);
        // } else if ($deleted['item'] == 'file') {
        //     unlink("public/assets/materi-pertemuan/file/" . $deleted['data']);
        // }
    }

    public function getMateriPertemuan($pk_id_materi_pertemuan)
    {
        $data = $this->materiPertemuanModel->find($pk_id_materi_pertemuan);
        return json_encode($data);
    }
}