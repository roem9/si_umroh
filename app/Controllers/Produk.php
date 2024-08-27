<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\ProdukModel;
use App\Models\ProdukTravelModel;
use App\Models\TravelModel;
use App\Models\KnowledgeProdukModel;
use App\Models\KnowledgeProdukTravelModel;

class Produk extends BaseController
{
    public $produkModel;
    public $produkTravelModel;
    public $travelModel;
    public $knowledgeProdukModel;
    public $knowledgeProdukTravelModel;
    public $db;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->produkTravelModel = new ProdukTravelModel();
        $this->travelModel = new TravelModel();
        $this->knowledgeProdukModel = new KnowledgeProdukModel();
        $this->knowledgeProdukTravelModel = new KnowledgeProdukTravelModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $data['sidebar'] = "produk";
        $data['title'] = "List Produk";
        $data['collapse'] = "produk";
        $data['collapseItem'] = 'listProduk';
        $data['deskripsi'] = "List seluruh data produk";

        $data['travel'] = $this->travelModel->find();

        return view('admin/pages/produk', $data);
    }

    public function travel()
    {
        $data['sidebar'] = "produk";
        $data['title'] = "List Produk Travel";
        $data['collapse'] = "produk";
        $data['collapseItem'] = 'listProdukTravel';
        $data['deskripsi'] = "List seluruh data produk travel";

        $data['travel'] = $this->travelModel->find();

        return view('admin/pages/produk-travel', $data);
    }

    public function knowledgeProduk($pk_id_produk)
    {
        $produk = $this->produkModel->find($pk_id_produk);

        $data['breadcrumbs'] = ["<a class='opacity-5 text-light' href='" . base_url() . "/produk'>Produk</a>", "<span class='text-dark'>" . $produk['nama_produk'] . "</span>"];
        $data['sidebar'] = "produk";
        $data['title'] = "Knowledge Produk $produk[nama_produk]";
        $data['collapse'] = "produk";
        $data['collapseItem'] = 'listProduk';
        $data['deskripsi'] = "List seluruh data produk";
        $data['pk_id_produk'] = $pk_id_produk;

        return view('admin/pages/design-knowledge-produk', $data);
    }

    public function knowledgeProdukTravel($pk_id_produk_travel)
    {
        $produk = $this->produkTravelModel->find($pk_id_produk_travel);

        $data['breadcrumbs'] = ["<a class='opacity-5 text-light' href='" . base_url() . "/produk/travel'>Produk Travel</a>", "<span class='text-dark'>" . $produk['nama_produk'] . "</span>"];
        $data['sidebar'] = "produk";
        $data['title'] = "Knowledge Produk $produk[nama_produk]";
        $data['collapse'] = "produk";
        $data['collapseItem'] = 'listProdukTravel';
        $data['deskripsi'] = "List seluruh data produk";
        $data['pk_id_produk_travel'] = $pk_id_produk_travel;

        return view('admin/pages/design-knowledge-produk-travel', $data);
    }

    public function save()
    {
        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'fk_id_travel' => $this->request->getPost('fk_id_travel'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'jenis_produk' => $this->request->getPost('jenis_produk'),
            'link_lp' => $this->request->getPost('link_lp'),
            'page' => $this->request->getPost('page'),
            'jenis_komisi' => $this->request->getPost('jenis_komisi'),
            'harga_produk' => $this->request->getPost('harga_produk'),
            'komisi_agent' => $this->request->getPost('komisi_agent'),
            'komisi_leader_agent' => $this->request->getPost('komisi_leader_agent'),
            'passive_income_leader_agent' => $this->request->getPost('passive_income_leader_agent'),
            'json_lp' => $this->request->getPost('json_lp'),
            'send_wa_after_input_agent' => $this->request->getPost('send_wa_after_input_agent'),
            'send_wa_after_input_admin' => $this->request->getPost('send_wa_after_input_admin'),
            'wa_message' => $this->request->getPost('wa_message'),
            'send_email_after_input_agent' => $this->request->getPost('send_email_after_input_agent'),
            'send_email_after_input_admin' => $this->request->getPost('send_email_after_input_admin'),
            'email_message' => $this->request->getPost('email_message'),
            'subject_email' => $this->request->getPost('subject_email'),
            'show_lp' => $this->request->getPost('show_lp'),
            'to_agent' => $this->request->getPost('to_agent'),
            'tipe_agent' => $this->request->getPost('tipe_agent'),
            // 'message_after_input_agent' => $this->request->getPost('message_after_input_agent'),
        ];

        $pk_id_produk = $this->request->getPost('pk_id_produk');

        if ($data['send_wa_after_input_agent'] || $data['send_wa_after_input_admin']) {
            $this->produkModel->setValidationRule('wa_message', "required");
            $this->produkModel->setValidationMessage('wa_message', [
                'required' => 'pesan wa harus diisi',
            ]);
        }

        if ($data['send_email_after_input_agent'] || $data['send_email_after_input_admin']) {
            $this->produkModel->setValidationRule('email_message', "required");
            $this->produkModel->setValidationMessage('email_message', [
                'required' => 'pesan email harus diisi',
            ]);

            $this->produkModel->setValidationRule('subject_email', "required");
            $this->produkModel->setValidationMessage('subject_email', [
                'required' => 'subject email harus diisi',
            ]);
        }

        if ($data['show_lp'] == 1) {
            $this->produkModel->setValidationRule('link_lp', "required");
            $this->produkModel->setValidationMessage('link_lp', [
                'required' => 'Link LP harus diisi',
            ]);

            $this->produkModel->setValidationRule('page', "required");
            $this->produkModel->setValidationMessage('page', [
                'required' => 'page harus diisi',
            ]);
        }

        if ($data['to_agent'] == 1) {
            $this->produkModel->setValidationRule('tipe_agent', "required");
            $this->produkModel->setValidationMessage('tipe_agent', [
                'required' => 'Tipe agent harus diisi',
            ]);
        }

        $searchProduk = $this->produkModel->find($pk_id_produk);
        if ($searchProduk) {
            if ($this->produkModel->update($pk_id_produk, $data) === true) {
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil mengubah data produk'
                ];
            } else {
                $response = [
                    "error" => $this->produkModel->errors()
                ];
            }
        } else {
            if ($this->produkModel->save($data) === true) {
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil menambah data produk'
                ];
            } else {
                $response = [
                    "error" => $this->produkModel->errors()
                ];
            }
        }

        return json_encode($response);
    }

    public function getData($pk_id_produk)
    {
        $data = $this->produkModel->find($pk_id_produk);
        return json_encode($data);
    }

    public function getList()
    {
        $query = "
            CREATE TEMPORARY TABLE Listproduk AS
            SELECT
                a.*,
                b.nama_travel
            FROM produk a
            LEFT JOIN travel b ON a.fk_id_travel = b.pk_id_travel
            WHERE a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL;
        ";

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if (trim($query) != "") {
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('Listproduk');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listproduk");
        return DataTable::of($builder)->toJson(true);
    }

    public function delete($pk_id_produk)
    {
        if ($this->produkModel->delete($pk_id_produk) === true) {
            $response = [
                'status' => 'success',
                'message' => 'Berhasil menghapus data produk'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus data produk'
            ];
        }

        return json_encode($response);
    }

    public function saveProdukTravel()
    {
        $data = [
            'fk_id_travel' => $this->request->getPost('fk_id_travel'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'jenis_produk' => $this->request->getPost('jenis_produk'),
            'link_lp' => $this->request->getPost('link_lp'),
            'page' => $this->request->getPost('page'),
            'jenis_komisi' => $this->request->getPost('jenis_komisi'),
            'harga_produk' => $this->request->getPost('harga_produk'),
            'komisi_agent' => $this->request->getPost('komisi_agent'),
            'komisi_leader_agent' => $this->request->getPost('komisi_leader_agent'),
            'passive_income_leader_agent' => $this->request->getPost('passive_income_leader_agent'),
            'json_lp' => $this->request->getPost('json_lp'),
            'send_wa_after_input_agent' => $this->request->getPost('send_wa_after_input_agent'),
            'send_wa_after_input_admin' => $this->request->getPost('send_wa_after_input_admin'),
            'wa_message' => $this->request->getPost('wa_message'),
            'message_after_input_agent' => $this->request->getPost('message_after_input_agent'),
        ];

        $pk_id_produk_travel = $this->request->getPost('pk_id_produk_travel');

        if ($data['send_wa_after_input_agent'] || $data['send_wa_after_input_admin']) {
            $this->produkTravelModel->setValidationRule('wa_message', "required");
            $this->produkTravelModel->setValidationMessage('wa_message', [
                'required' => 'pesan wa harus diisi',
            ]);
        }

        $searchProduk = $this->produkTravelModel->find($pk_id_produk_travel);
        if ($searchProduk) {
            if ($this->produkTravelModel->update($pk_id_produk_travel, $data) === true) {
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil mengubah data produk'
                ];
            } else {
                $response = [
                    "error" => $this->produkTravelModel->errors()
                ];
            }
        } else {
            if ($this->produkTravelModel->save($data) === true) {
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil menambah data produk'
                ];
            } else {
                $response = [
                    "error" => $this->produkTravelModel->errors()
                ];
            }
        }

        return json_encode($response);
    }

    public function getDataProdukTravel($pk_id_produk_travel)
    {
        $data = $this->produkTravelModel->find($pk_id_produk_travel);
        return json_encode($data);
    }

    public function getListProdukTravel()
    {
        $query = "
            CREATE TEMPORARY TABLE Listproduk AS
            SELECT
                a.*,
                b.nama_travel
            FROM produk_travel a
            JOIN travel b ON a.fk_id_travel = b.pk_id_travel
            WHERE a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL;
        ";

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if (trim($query) != "") {
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('Listproduk');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listproduk");
        return DataTable::of($builder)->toJson(true);
    }

    public function deleteProdukTravel($pk_id_produk_travel)
    {
        if ($this->produkTravelModel->delete($pk_id_produk_travel) === true) {
            $response = [
                'status' => 'success',
                'message' => 'Berhasil menghapus data produk'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus data produk'
            ];
        }

        return json_encode($response);
    }

    public function getAllKnowledgeProduk($pk_id_produk)
    {
        $data = $this->knowledgeProdukModel->where('fk_id_produk', $pk_id_produk)->orderby('urutan')->findAll();
        return json_encode($data);
    }

    public function simpanKnowledgeProduk()
    {
        $pk_id_knowledge_produk = $this->request->getPost('pk_id_knowledge_produk');
        $fk_id_produk = $this->request->getPost('fk_id_produk');
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
                        'required' => 'Tipe materi harus diisi terlebih dahulu'
                    ]
                ],
            ];
        }

        if ($this->validate($rules)) {
            $data = [
                'fk_id_produk' => $fk_id_produk,
                'item' => $item
            ];

            if ($item == 'text' || $item == 'video') {
                $searchMateri = $this->knowledgeProdukModel->find($pk_id_knowledge_produk);
                if ($searchMateri) {
                    // $data['data'] = $this->request->getPost($item);
                    $data['data'] = $_POST[$item];
                    // var_dump($data);
                    // exit();
                    if ($this->knowledgeProdukModel->update($pk_id_knowledge_produk, $data) === true) {
                        $response = [
                            'status' => 'success',
                            'message' => 'Berhasil mengubah data knowledge produk'
                        ];
                    } else {
                        $response = [
                            "error" => $this->knowledgeProdukModel->errors()
                        ];
                    }
                } else {
                    // $data['data'] = $this->request->getPost($item);
                    $data['data'] = $_POST[$item];
                    // var_dump($data);
                    // exit();

                    if ($this->knowledgeProdukModel->save($data) === true) {
                        $response = [
                            'status' => 'success',
                            'message' => 'Berhasil menambahkan knowledge produk'
                        ];
                    } else {
                        $response = [
                            "error" => $this->knowledgeProdukModel->errors()
                        ];
                    }
                }
            } else {
                $move = 0;

                if ($file_audio) {
                    $move = ($file_audio->isValid() && !$file_audio->hasMoved()) ? 1 : 0;
                } else if ($file_file) {
                    $move = ($file_file->isValid() && !$file_file->hasMoved()) ? 1 : 0;
                } else if ($file_image) {
                    $move = ($file_image->isValid() && !$file_image->hasMoved()) ? 1 : 0;
                }

                if ($move) {
                    $nama_file = $this->request->getPost('nama_file');
                    // Get audio name and extension
                    // $name = $file->getName();
                    if ($file_audio) {
                        $ext = $file_audio->getClientExtension();
                    } else if ($file_file) {
                        $ext = $file_file->getClientExtension();
                    } else if ($file_image) {
                        $ext = $file_image->getClientExtension();
                    }

                    // Get random audio name
                    $name = $this->db->query("SELECT pk_id_knowledge_produk FROM knowledge_produk WHERE fk_id_produk = $fk_id_produk ORDER BY pk_id_knowledge_produk DESC LIMIT 1")->getRowArray();
                    if ($name) {
                        $newName = "$nama_file" . "_" . $name['pk_id_knowledge_produk'] + 1 . "." . $ext;
                    } else {
                        $newName = "$nama_file" . "_1." . $ext;
                    }

                    // Store audio in public/uploads/ folder
                    if ($item == 'audio') {
                        $file_audio->move('public/assets/knowledge-produk/audio/', $newName, true);
                    } else if ($item == 'file') {
                        $file_file->move('public/assets/knowledge-produk/file/', $newName, true);
                    } else if ($item == 'image') {
                        $file_image->move('public/assets/knowledge-produk/img/', $newName, true);
                    }
                    $data['data'] = $newName;
                    if ($this->knowledgeProdukModel->save($data) === true) {
                        $response = [
                            'status' => 'success',
                            'message' => 'Berhasil menambahkan knowledge produk'
                        ];
                    } else {
                        $response = [
                            "error" => $this->knowledgeProdukModel->errors()
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

    public function getKnowledgeProduk($pk_id_knowledge_produk)
    {
        $data = $this->knowledgeProdukModel->find($pk_id_knowledge_produk);
        return json_encode($data);
    }

    public function hapusKnowledgeProduk($pk_id_knowledge_produk)
    {
        $db = db_connect();
        $deleted = $db->query("SELECT * FROM knowledge_produk WHERE pk_id_knowledge_produk = $pk_id_knowledge_produk")->getRowArray();
        $db->query("UPDATE knowledge_produk SET urutan = urutan - 1 WHERE urutan > $deleted[urutan] AND fk_id_produk = $deleted[fk_id_produk]");
        $db->query("DELETE FROM knowledge_produk WHERE pk_id_knowledge_produk = $pk_id_knowledge_produk");
    }

    public function ubahUrutanKnowledgeProduk()
    {
        $pk_id_knowledge_produk = $this->request->getPost('pk_id_knowledge_produk');
        $pk_id_knowledge_produk_other = $this->request->getPost('pk_id_knowledge_produk_other');
        $urutan = $this->request->getPost('urutan');
        $arah = $this->request->getPost('arah');

        if ($arah == 'naik') {
            $this->db->query("UPDATE knowledge_produk SET urutan = $urutan WHERE pk_id_knowledge_produk = $pk_id_knowledge_produk_other");
            $this->db->query("UPDATE knowledge_produk SET urutan = $urutan - 1 WHERE pk_id_knowledge_produk = $pk_id_knowledge_produk");
        } else {
            $this->db->query("UPDATE knowledge_produk SET urutan = $urutan WHERE pk_id_knowledge_produk = $pk_id_knowledge_produk_other");
            $this->db->query("UPDATE knowledge_produk SET urutan = $urutan + 1 WHERE pk_id_knowledge_produk = $pk_id_knowledge_produk");
        }
    }

    // Produk Travel 
    public function getAllKnowledgeProdukTravel($pk_id_produk_travel)
    {
        $data = $this->knowledgeProdukTravelModel->where('fk_id_produk_travel', $pk_id_produk_travel)->orderby('urutan')->findAll();
        return json_encode($data);
    }

    public function simpanKnowledgeProdukTravel()
    {
        $pk_id_knowledge_produk_travel = $this->request->getPost('pk_id_knowledge_produk_travel');
        $fk_id_produk_travel = $this->request->getPost('fk_id_produk_travel');
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
                        'required' => 'Tipe materi harus diisi terlebih dahulu'
                    ]
                ],
            ];
        }

        if ($this->validate($rules)) {
            $data = [
                'fk_id_produk_travel' => $fk_id_produk_travel,
                'item' => $item
            ];

            if ($item == 'text' || $item == 'video') {
                $searchMateri = $this->knowledgeProdukTravelModel->find($pk_id_knowledge_produk_travel);
                if ($searchMateri) {
                    $data['data'] = $this->request->getPost($item);
                    if ($this->knowledgeProdukTravelModel->update($pk_id_knowledge_produk_travel, $data) === true) {
                        $response = [
                            'status' => 'success',
                            'message' => 'Berhasil mengubah data knowledge produk'
                        ];
                    } else {
                        $response = [
                            "error" => $this->knowledgeProdukTravelModel->errors()
                        ];
                    }
                } else {
                    $data['data'] = $this->request->getPost($item);

                    if ($this->knowledgeProdukTravelModel->save($data) === true) {
                        $response = [
                            'status' => 'success',
                            'message' => 'Berhasil menambahkan knowledge produk'
                        ];
                    } else {
                        $response = [
                            "error" => $this->knowledgeProdukTravelModel->errors()
                        ];
                    }
                }
            } else {
                $move = 0;

                if ($file_audio) {
                    $move = ($file_audio->isValid() && !$file_audio->hasMoved()) ? 1 : 0;
                } else if ($file_file) {
                    $move = ($file_file->isValid() && !$file_file->hasMoved()) ? 1 : 0;
                } else if ($file_image) {
                    $move = ($file_image->isValid() && !$file_image->hasMoved()) ? 1 : 0;
                }

                if ($move) {
                    $nama_file = $this->request->getPost('nama_file');
                    // Get audio name and extension
                    // $name = $file->getName();
                    if ($file_audio) {
                        $ext = $file_audio->getClientExtension();
                    } else if ($file_file) {
                        $ext = $file_file->getClientExtension();
                    } else if ($file_image) {
                        $ext = $file_image->getClientExtension();
                    }

                    // Get random audio name
                    $name = $this->db->query("SELECT pk_id_knowledge_produk_travel FROM knowledge_produk_travel WHERE fk_id_produk_travel = $fk_id_produk_travel ORDER BY pk_id_knowledge_produk_travel DESC LIMIT 1")->getRowArray();
                    if ($name) {
                        $newName = "$nama_file" . "_" . $name['pk_id_knowledge_produk_travel'] + 1 . "." . $ext;
                    } else {
                        $newName = "$nama_file" . "_1." . $ext;
                    }

                    // Store audio in public/uploads/ folder
                    if ($item == 'audio') {
                        $file_audio->move('public/assets/knowledge-produk/audio/', $newName, true);
                    } else if ($item == 'file') {
                        $file_file->move('public/assets/knowledge-produk/file/', $newName, true);
                    } else if ($item == 'image') {
                        $file_image->move('public/assets/knowledge-produk/img/', $newName, true);
                    }
                    $data['data'] = $newName;
                    if ($this->knowledgeProdukTravelModel->save($data) === true) {
                        $response = [
                            'status' => 'success',
                            'message' => 'Berhasil menambahkan knowledge produk'
                        ];
                    } else {
                        $response = [
                            "error" => $this->knowledgeProdukTravelModel->errors()
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

    public function getKnowledgeProdukTravel($pk_id_knowledge_produk_travel)
    {
        $data = $this->knowledgeProdukTravelModel->find($pk_id_knowledge_produk_travel);
        return json_encode($data);
    }

    public function hapusKnowledgeProdukTravel($pk_id_knowledge_produk_travel)
    {
        $db = db_connect();
        $deleted = $db->query("SELECT * FROM knowledge_produk_travel WHERE pk_id_knowledge_produk_travel = $pk_id_knowledge_produk_travel")->getRowArray();
        $db->query("UPDATE knowledge_produk_travel SET urutan = urutan - 1 WHERE urutan > $deleted[urutan] AND fk_id_produk_travel = $deleted[fk_id_produk_travel]");
        $db->query("DELETE FROM knowledge_produk_travel WHERE pk_id_knowledge_produk_travel = $pk_id_knowledge_produk_travel");
    }

    public function ubahUrutanKnowledgeProdukTravel()
    {
        $pk_id_knowledge_produk_travel = $this->request->getPost('pk_id_knowledge_produk_travel');
        $pk_id_knowledge_produk_travel_other = $this->request->getPost('pk_id_knowledge_produk_travel_other');
        $urutan = $this->request->getPost('urutan');
        $arah = $this->request->getPost('arah');

        if ($arah == 'naik') {
            $this->db->query("UPDATE knowledge_produk_travel SET urutan = $urutan WHERE pk_id_knowledge_produk_travel = $pk_id_knowledge_produk_travel_other");
            $this->db->query("UPDATE knowledge_produk_travel SET urutan = $urutan - 1 WHERE pk_id_knowledge_produk_travel = $pk_id_knowledge_produk_travel");
        } else {
            $this->db->query("UPDATE knowledge_produk_travel SET urutan = $urutan WHERE pk_id_knowledge_produk_travel = $pk_id_knowledge_produk_travel_other");
            $this->db->query("UPDATE knowledge_produk_travel SET urutan = $urutan + 1 WHERE pk_id_knowledge_produk_travel = $pk_id_knowledge_produk_travel");
        }
    }

    public function toggleStatus($pk_id_produk, $is_active)
    {
        $data = [
            "is_active" => !$is_active
        ];

        if ($this->produkModel->update($pk_id_produk, $data) === true) {
            $response = [
                'status' => 'success',
                'message' => 'Berhasil mengubah status produk'
            ];
        } else {
            $response = [
                "error" => $this->produkModel->errors()
            ];
        }

        return json_encode($response);
    }

    public function toggleStatusProdukTravel($pk_id_produk_travel, $is_active)
    {
        $data = [
            "is_active" => !$is_active
        ];

        if ($this->produkTravelModel->update($pk_id_produk_travel, $data) === true) {
            $response = [
                'status' => 'success',
                'message' => 'Berhasil mengubah status produk'
            ];
        } else {
            $response = [
                "error" => $this->produkTravelModel->errors()
            ];
        }

        return json_encode($response);
    }

    public function isProdukToAgent($nama_produk)
    {
        $data = $this->db->query("
            SELECT
                *
            FROM system_parameter 
            WHERE setting_name = 'produk_to_agent'
            AND setting_value LIKE '%$nama_produk%'
        ")->getRowArray();

        if ($data) {
            $data['response'] = 1;
        } else {
            $data['response'] = 0;
        }

        return json_encode($data);
    }
}
