<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\GreetingAgentModel;

class Greetingagent extends BaseController
{
    public $greetingAgentModel;
    public $db;

    public function __construct()
    {
        $this->greetingAgentModel = new GreetingAgentModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $data['sidebar'] = "greeting";
        $data['title'] = "Greeting Agent";

        return view('admin/pages/greeting-agent', $data);
    }

    public function getAllGreeting()
    {
        $data = $this->greetingAgentModel->orderby('urutan')->findAll();
        return json_encode($data);
    }

    public function simpanGreeting()
    {
        $pk_id_greeting_agent = $this->request->getPost('pk_id_greeting_agent');
        $item = $this->request->getPost('item');
        $akses_greeting = $this->request->getPost('akses_greeting');
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
                    'rules' => 'uploaded[file_audio]|max_size[file_audio,102400]|ext_in[file_audio,mp3]',
                    'errors' => [
                        'uploaded' => 'Audio harus diupload',
                        'max_size' => 'Audio terlalu besar (max 100 MB)',
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
                    'rules' => 'uploaded[file_file]|max_size[file_file,102400]|ext_in[file_file,pdf]',
                    'errors' => [
                        'uploaded' => 'File harus diupload',
                        'max_size' => 'File terlalu besar (max 100 MB)',
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
                'item' => $item,
                'akses_greeting' => $akses_greeting,
            ];

            if ($item == 'text' || $item == 'video') {
                $searchMateri = $this->greetingAgentModel->find($pk_id_greeting_agent);
                if ($searchMateri) {
                    $data['data'] = $this->request->getPost($item);
                    if ($this->greetingAgentModel->update($pk_id_greeting_agent, $data) === true) {
                        $response = [
                            'status' => 'success',
                            'message' => 'Berhasil mengubah data greeting'
                        ];
                    } else {
                        $response = [
                            "error" => $this->greetingAgentModel->errors()
                        ];
                    }
                } else {
                    $data['data'] = $this->request->getPost($item);

                    if ($this->greetingAgentModel->save($data) === true) {
                        $response = [
                            'status' => 'success',
                            'message' => 'Berhasil menambahkan greeting'
                        ];
                    } else {
                        $response = [
                            "error" => $this->greetingAgentModel->errors()
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
                    $name = $this->db->query("SELECT pk_id_greeting_agent FROM greeting_agent ORDER BY pk_id_greeting_agent DESC LIMIT 1")->getRowArray();
                    if ($name) {
                        $newName = "$nama_file" . "_" . $name['pk_id_greeting_agent'] + 1 . "." . $ext;
                    } else {
                        $newName = "$nama_file" . "_1." . $ext;
                    }

                    // Store audio in public/uploads/ folder
                    if ($item == 'audio') {
                        $file_audio->move('public/assets/greetingagent/audio/', $newName, true);
                    } else if ($item == 'file') {
                        $file_file->move('public/assets/greetingagent/file/', $newName, true);
                    } else if ($item == 'image') {
                        $file_image->move('public/assets/greetingagent/img/', $newName, true);
                    }
                    $data['data'] = $newName;
                    if ($this->greetingAgentModel->save($data) === true) {
                        $response = [
                            'status' => 'success',
                            'message' => 'Berhasil menambahkan greeting'
                        ];
                    } else {
                        $response = [
                            "error" => $this->greetingAgentModel->errors()
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

    public function getGreeting($pk_id_greeting_agent)
    {
        $data = $this->greetingAgentModel->find($pk_id_greeting_agent);
        return json_encode($data);
    }

    public function hapusGreeting($pk_id_greeting_agent)
    {
        $db = db_connect();
        $deleted = $db->query("SELECT * FROM greeting_agent WHERE pk_id_greeting_agent = $pk_id_greeting_agent")->getRowArray();
        $db->query("UPDATE greeting_agent SET urutan = urutan - 1 WHERE urutan > $deleted[urutan]");
        $db->query("DELETE FROM greeting_agent WHERE pk_id_greeting_agent = $pk_id_greeting_agent");
    }

    public function ubahUrutanGreeting()
    {
        $pk_id_greeting_agent = $this->request->getPost('pk_id_greeting_agent');
        $pk_id_greeting_agent_other = $this->request->getPost('pk_id_greeting_agent_other');
        $urutan = $this->request->getPost('urutan');
        $arah = $this->request->getPost('arah');

        if ($arah == 'naik') {
            $this->db->query("UPDATE greeting_agent SET urutan = $urutan WHERE pk_id_greeting_agent = $pk_id_greeting_agent_other");
            $this->db->query("UPDATE greeting_agent SET urutan = $urutan - 1 WHERE pk_id_greeting_agent = $pk_id_greeting_agent");
        } else {
            $this->db->query("UPDATE greeting_agent SET urutan = $urutan WHERE pk_id_greeting_agent = $pk_id_greeting_agent_other");
            $this->db->query("UPDATE greeting_agent SET urutan = $urutan + 1 WHERE pk_id_greeting_agent = $pk_id_greeting_agent");
        }
    }
}
