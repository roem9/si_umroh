<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\ProdukModel;
use App\Models\PixelProdukModel;
use App\Models\ProdukTravelModel;
use App\Models\PixelProdukTravelModel;
use App\Models\TravelModel;
use App\Models\KnowledgeProdukModel;
use App\Models\KnowledgeProdukTravelModel;

class Aproduk extends BaseController
{
    public $produkModel;
    public $pixelProdukModel;
    public $produkTravelModel;
    public $pixelProdukTravelModel;
    public $travelModel;
    public $knowledgeProdukModel;
    public $knowledgeProdukTravelModel;
    public $username;
    public $pk_id_agent;
    public $db;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->pixelProdukModel = new PixelProdukModel();
        $this->produkTravelModel = new ProdukTravelModel();
        $this->pixelProdukTravelModel = new PixelProdukTravelModel();
        $this->travelModel = new TravelModel();
        $this->knowledgeProdukModel = new KnowledgeProdukModel();
        $this->knowledgeProdukTravelModel = new KnowledgeProdukTravelModel();
        $this->username = session()->get('username');
        $this->pk_id_agent = session()->get('pk_id_agent');
        $this->db = db_connect();
    }

    public function index()
    {
        $data['sidebar'] = "produk";
        $data['title'] = "List Produk";
        $data['collapse'] = "produk";
        $data['collapseItem'] = 'listProduk';
        $data['deskripsi'] = "List seluruh data produk";

        return view('agent_area/pages/produk', $data);
    }

    public function travel()
    {
        $data['sidebar'] = "produk";
        $data['title'] = "List Produk Travel";
        $data['collapse'] = "produk";
        $data['collapseItem'] = 'listProdukTravel';
        $data['deskripsi'] = "List seluruh data produk travel";

        $data['travel'] = $this->travelModel->find();

        return view('agent_area/pages/produk-travel', $data);
    }

    public function knowledgeProduk($pk_id_produk)
    {
        $produk = $this->produkModel->find($pk_id_produk);

        $data['breadcrumbs'] = ["<a class='opacity-5 text-light' href='" . base_url() . "/agentarea/produk'>Produk</a>", "<span class='text-dark'>" . $produk['nama_produk'] . "</span>"];
        $data['sidebar'] = "produk";
        $data['title'] = "Knowledge Produk $produk[nama_produk]";
        $data['collapse'] = "produk";
        $data['collapseItem'] = 'listProduk';
        $data['deskripsi'] = "List seluruh data produk";
        $data['pk_id_produk'] = $pk_id_produk;

        return view('agent_area/pages/design-knowledge-produk', $data);
    }

    public function knowledgeProdukTravel($pk_id_produk_travel)
    {
        $produk = $this->produkTravelModel->find($pk_id_produk_travel);

        $data['breadcrumbs'] = ["<a class='opacity-5 text-light' href='" . base_url() . "/agentarea/produk/travel'>Produk Travel</a>", "<span class='text-dark'>" . $produk['nama_produk'] . "</span>"];
        $data['sidebar'] = "produk";
        $data['title'] = "Knowledge Produk $produk[nama_produk]";
        $data['collapse'] = "produk";
        $data['collapseItem'] = 'listProdukTravel';
        $data['deskripsi'] = "List seluruh data produk";
        $data['pk_id_produk_travel'] = $pk_id_produk_travel;

        return view('agent_area/pages/design-knowledge-produk-travel', $data);
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
                *,
                CASE 
                    WHEN link_lp LIKE 'https://www.%' THEN CONCAT('https://www.$this->username.', SUBSTRING(link_lp, 13))
                    WHEN link_lp LIKE 'https://%' THEN CONCAT('https://$this->username.', SUBSTRING(link_lp, 9))
                    ELSE link_lp
                END AS modified_link_lp,
                CASE 
                    WHEN link_lp LIKE 'https://www.%' THEN 
                        REPLACE(CONCAT('https://www.$this->username.', SUBSTRING(link_lp, 12)), page, CONCAT('setordata/', page))
                    WHEN link_lp LIKE 'https://%' THEN 
                        REPLACE(CONCAT('https://$this->username.', SUBSTRING(link_lp, 9)), page, CONCAT('setordata/', page))
                END AS registration_link
            FROM produk a
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND is_active = 1;
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
                CASE 
                    WHEN link_lp LIKE 'https://www.%' THEN CONCAT('https://www.$this->username.', SUBSTRING(link_lp, 12))
                    WHEN link_lp LIKE 'https://%' THEN CONCAT('https://$this->username.', SUBSTRING(link_lp, 9))
                    ELSE link_lp
                END AS modified_link_lp,
                CASE 
                    WHEN link_lp LIKE 'https://www.%' THEN 
                        REPLACE(CONCAT('https://www.$this->username.', SUBSTRING(link_lp, 12)), page, CONCAT('registrasi/', page))
                    WHEN link_lp LIKE 'https://%' THEN 
                        REPLACE(CONCAT('https://$this->username.', SUBSTRING(link_lp, 9)), page, CONCAT('registrasi/', page))
                END AS registration_link,
                b.nama_travel
            FROM produk_travel a
            JOIN travel b ON a.fk_id_travel = b.pk_id_travel
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND is_active = 1;
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

    public function getAllKnowledgeProduk($pk_id_produk)
    {
        $data = $this->knowledgeProdukModel->where('fk_id_produk', $pk_id_produk)->orderby('urutan')->findAll();
        return json_encode($data);
    }

    // Produk Travel 
    public function getAllKnowledgeProdukTravel($pk_id_produk_travel)
    {
        $data = $this->knowledgeProdukTravelModel->where('fk_id_produk_travel', $pk_id_produk_travel)->orderby('urutan')->findAll();
        return json_encode($data);
    }

    // data pixel produk
    public function historyPixelProduk($pk_id_produk)
    {
        $data['produk'] = $this->db->query("
            SELECT
                *,
                CASE 
                    WHEN link_lp LIKE 'https://www.%' THEN CONCAT('https://www.$this->username.', SUBSTRING(link_lp, 12))
                    WHEN link_lp LIKE 'https://%' THEN CONCAT('https://$this->username.', SUBSTRING(link_lp, 9))
                    ELSE link_lp
                END AS modified_link_lp
            FROM produk
            WHERE pk_id_produk = $pk_id_produk
        ")->getRowArray();
        $data['pixel'] = $this->db->query("
            SELECT
                *
            FROM pixel_produk
            WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            AND fk_id_produk = $pk_id_produk
            AND fk_id_agent = $this->pk_id_agent
        ")->getResultArray();

        return json_encode($data);
    }

    public function saveDataPixel()
    {
        $data = [
            'nama_pixel' => $this->request->getPost('nama_pixel'),
            'fk_id_produk' => $this->request->getPost('fk_id_produk'),
            // 'id_pixel' => $this->request->getPost('id_pixel'),
            'code_pixel' => $this->request->getPost('code_pixel'),
            'fk_id_agent' => $this->pk_id_agent,
        ];

        $pk_id_pixel_produk = $this->request->getPost('pk_id_pixel_produk');

        $searchPixelProduk = $this->pixelProdukModel->find($pk_id_pixel_produk);
        if ($searchPixelProduk) {
            // $this->pixelProdukModel->setValidationRule('id_pixel', "is_unique[pixel_produk.id_pixel,pk_id_pixel_produk,$pk_id_pixel_produk]");
            // $this->pixelProdukModel->setValidationMessage('id_pixel', [
            //     'is_unique' => 'id pixel dan code pixel telah digunakan'
            // ]);

            if ($this->pixelProdukModel->update($pk_id_pixel_produk, $data) === true) {
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil mengubah data pixel'
                ];
            } else {
                $response = [
                    "error" => $this->pixelProdukModel->errors()
                ];
            }
        } else {
            // $this->pixelProdukModel->setValidationRule('id_pixel', "is_unique[pixel_produk.id_pixel]");
            // $this->pixelProdukModel->setValidationMessage('id_pixel', [
            //     'is_unique' => 'id pixel dan code pixel telah digunakan'
            // ]);

            if ($this->pixelProdukModel->save($data) === true) {
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil menambah data pixel'
                ];
            } else {
                $response = [
                    "error" => $this->pixelProdukModel->errors()
                ];
            }
        }

        return json_encode($response);
    }

    public function hapusDataPixel($pk_id_pixel_produk)
    {
        if ($this->pixelProdukModel->delete($pk_id_pixel_produk) === true) {
            $response = [
                'status' => 'success',
                'message' => 'Berhasil menghapus data pixel'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus data pixel'
            ];
        }

        return json_encode($response);
    }

    public function getDataPixelProduk($pk_id_pixel_produk)
    {
        $data = $this->pixelProdukModel->find($pk_id_pixel_produk);
        return json_encode($data);
    }

    // data pixel produk travel
    public function historyPixelProdukTravel($pk_id_produk_travel)
    {
        $data['produk'] = $this->db->query("
            SELECT
                *,
                CASE 
                    WHEN link_lp LIKE 'https://www.%' THEN CONCAT('https://www.$this->username.', SUBSTRING(link_lp, 12))
                    WHEN link_lp LIKE 'https://%' THEN CONCAT('https://$this->username.', SUBSTRING(link_lp, 9))
                    ELSE link_lp
                END AS modified_link_lp
            FROM produk_travel
            WHERE pk_id_produk_travel = $pk_id_produk_travel
        ")->getRowArray();
        $data['pixel'] = $this->db->query("
            SELECT
                *
            FROM pixel_produk_travel
            WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            AND fk_id_produk_travel = $pk_id_produk_travel
            AND fk_id_agent = $this->pk_id_agent
        ")->getResultArray();

        return json_encode($data);
    }

    public function saveDataPixelTravel()
    {
        $data = [
            'nama_pixel' => $this->request->getPost('nama_pixel'),
            'fk_id_produk_travel' => $this->request->getPost('fk_id_produk_travel'),
            'id_pixel' => $this->request->getPost('id_pixel'),
            'code_pixel' => $this->request->getPost('code_pixel'),
            'fk_id_agent' => $this->pk_id_agent,
        ];

        $pk_id_pixel_produk_travel = $this->request->getPost('pk_id_pixel_produk_travel');

        $searchPixelProduk = $this->pixelProdukTravelModel->find($pk_id_pixel_produk_travel);
        if ($searchPixelProduk) {
            $this->pixelProdukTravelModel->setValidationRule('id_pixel', "is_unique[pixel_produk_travel.id_pixel,pk_id_pixel_produk,$pk_id_pixel_produk]");
            $this->pixelProdukTravelModel->setValidationMessage('id_pixel', [
                'is_unique' => 'id pixel dan code pixel telah digunakan'
            ]);

            if ($this->pixelProdukTravelModel->update($pk_id_pixel_produk, $data) === true) {
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil mengubah data pixel'
                ];
            } else {
                $response = [
                    "error" => $this->pixelProdukTravelModel->errors()
                ];
            }
        } else {
            $this->pixelProdukTravelModel->setValidationRule('id_pixel', "is_unique[pixel_produk_travel.id_pixel]");
            $this->pixelProdukTravelModel->setValidationMessage('id_pixel', [
                'is_unique' => 'id pixel dan code pixel telah digunakan'
            ]);

            if ($this->pixelProdukTravelModel->save($data) === true) {
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil menambah data pixel'
                ];
            } else {
                $response = [
                    "error" => $this->pixelProdukTravelModel->errors()
                ];
            }
        }

        return json_encode($response);
    }

    public function hapusDataPixelTravel($pk_id_pixel_produk_travel)
    {
        if ($this->pixelProdukTravelModel->delete($pk_id_pixel_produk_travel) === true) {
            $response = [
                'status' => 'success',
                'message' => 'Berhasil menghapus data pixel'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus data pixel'
            ];
        }

        return json_encode($response);
    }

    public function getDataPixelProdukTravel($pk_id_pixel_produk_travel)
    {
        $data = $this->pixelProdukTravelModel->find($pk_id_pixel_produk_travel);
        return json_encode($data);
    }
}
