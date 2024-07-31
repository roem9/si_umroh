<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Libraries\Pdfgenerator;
use App\Models\PenjualanProdukModel;
use App\Models\KomisiPenjualanProdukModel;
use App\Models\PenjualanProdukTravelModel;
use App\Models\KomisiPenjualanProdukTravelModel;
use App\Models\AgentModel;

class Komisi extends BaseController
{
    public $db;
    public $penjualanProdukModel;
    public $komisPenjualanProdukModel;
    public $penjualanProdukTravelModel;
    public $komisiPenjualanProdukTravelModel;
    public $agentModel;

    public function __construct(){
        $this->db = db_connect();
        $this->penjualanProdukModel = new PenjualanProdukModel();
        $this->komisiPenjualanProdukModel = new KomisiPenjualanProdukModel();
        $this->penjualanProdukTravelModel = new PenjualanProdukTravelModel();
        $this->komisiPenjualanProdukTravelModel = new KomisiPenjualanProdukTravelModel();
        $this->agentModel = new AgentModel();
    }

    public function produk()
    {
        $data['sidebar'] = "komisi";
        $data['title'] = "List Komisi Penjualan Produk";
        $data['collapse'] = "komisi";
        $data['collapseItem'] = 'listKomisiProduk';
        $data['deskripsi'] = "List seluruh komisi penjualan produk";

        return view('admin/pages/komisi-penjualan-produk', $data);
    }

    public function produkTravel()
    {
        $data['sidebar'] = "komisi";
        $data['title'] = "List Komisi Penjualan Produk Travel";
        $data['collapse'] = "komisi";
        $data['collapseItem'] = 'listKomisiProdukTravel';
        $data['deskripsi'] = "List seluruh komisi penjualan produk travel";

        return view('admin/pages/komisi-penjualan-produk-travel', $data);
    }

    public function input()
    {
        $data['sidebar'] = "komisi";
        $data['title'] = "Input Komisi";
        $data['collapse'] = "komisi";
        $data['collapseItem'] = 'listKomisiInput';
        $data['deskripsi'] = "List seluruh agent yang memiliki komisi yang belum dibayar";

        return view('admin/pages/komisi-input', $data);
    }

    public function history()
    {
        $data['sidebar'] = "komisi";
        $data['title'] = "History Komisi";
        $data['collapse'] = "komisi";
        $data['collapseItem'] = 'listKomisiHistory';
        $data['deskripsi'] = "List history komisi agent";

        return view('admin/pages/komisi-history', $data);
    }

    public function getListInputKomisiPenjualan()
    {
        $query = "
            CREATE TEMPORARY TABLE ListAgent AS
            SELECT
                fk_id_agent,
                SUM(komisi) AS total_komisi
            FROM (
                SELECT
                    a.fk_id_agent,
                    SUM(nominal) AS komisi
                FROM 
                komisi_penjualan_produk a
                JOIN penjualan_produk b ON a.fk_id_penjualan_produk = b.pk_id_penjualan_produk
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND COALESCE(is_paid, 0) = 0
                AND COALESCE(fk_id_penjualan_produk, 0) <> 0
                AND is_reported = 1
                AND b.status = 'lunas'
                GROUP BY a.fk_id_agent

                UNION ALL

                SELECT
                    a.fk_id_agent,
                    SUM(nominal) AS komisi
                FROM 
                    komisi_penjualan_produk_travel a
                JOIN penjualan_produk_travel b ON a.fk_id_penjualan_produk_travel = b.pk_id_penjualan_produk_travel
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND COALESCE(is_paid, 0) = 0
                AND COALESCE(fk_id_penjualan_produk_travel, 0) <> 0
                AND is_reported = 1
                AND b.status = 'lunas'
                GROUP BY a.fk_id_agent
            ) AS combined
            GROUP BY fk_id_agent;

            CREATE TEMPORARY TABLE ListData AS
            SELECT 
                a.total_komisi,
                b.pk_id_agent,
                b.nama_agent,
                c.nama_agent as nama_leader_agent,
                b.tipe_agent
            FROM ListAgent a
            JOIN agent b ON a.fk_id_agent = b.pk_id_agent
            LEFT JOIN agent c ON b.fk_id_leader_agent = c.pk_id_agent;
        ";

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if(trim($query) != ""){
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('ListData');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listproduk");
        return DataTable::of($builder)->toJson(true);
    }

    public function getListHistoryKomisi()
    {
        $query = "
            CREATE TEMPORARY TABLE ListAgent AS
            SELECT
                fk_id_agent,
                SUM(komisi) AS total_komisi
            FROM (
                SELECT
                    a.fk_id_agent,
                    SUM(nominal) AS komisi
                FROM 
                komisi_penjualan_produk a
                JOIN penjualan_produk b ON a.fk_id_penjualan_produk = b.pk_id_penjualan_produk
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND COALESCE(fk_id_penjualan_produk, 0) <> 0
                AND b.status = 'lunas'
                GROUP BY a.fk_id_agent

                UNION ALL

                SELECT
                    a.fk_id_agent,
                    SUM(nominal) AS komisi
                FROM 
                    komisi_penjualan_produk_travel a
                JOIN penjualan_produk_travel b ON a.fk_id_penjualan_produk_travel = b.pk_id_penjualan_produk_travel
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND COALESCE(fk_id_penjualan_produk_travel, 0) <> 0
                AND b.status = 'lunas'
                GROUP BY a.fk_id_agent
            ) AS combined
            GROUP BY fk_id_agent;

            CREATE TEMPORARY TABLE ListData AS
            SELECT 
                a.total_komisi,
                b.pk_id_agent,
                b.nama_agent,
                c.nama_agent as nama_leader_agent,
                b.tipe_agent
            FROM ListAgent a
            JOIN agent b ON a.fk_id_agent = b.pk_id_agent
            LEFT JOIN agent c ON b.fk_id_leader_agent = c.pk_id_agent;
        ";

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if(trim($query) != ""){
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('ListData');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listproduk");
        return DataTable::of($builder)->toJson(true);
    }

    public function getListKomisiPenjualanProduk()
    {
        $query = "
            CREATE TEMPORARY TABLE ListData AS
            SELECT 
                a.pk_id_komisi_penjualan_produk,
                d.nama_customer,
                b.nama_produk,
                b.harga_produk,
                a.nominal,
                CASE
                    WHEN a.keterangan = 'Passive income leader agent' THEN  CONCAT(a.keterangan, ' dari ', bb.nama_agent)
                    ELSE a.keterangan
                END AS keterangan,
                c.nama_agent,
                e.nama_agent as nama_leader_agent,
                b.tgl_closing,
                a.is_paid
            FROM komisi_penjualan_produk a
            JOIN penjualan_produk b ON a.fk_id_penjualan_produk = b.pk_id_penjualan_produk
            JOIN agent bb ON b.fk_id_agent_closing = bb.pk_id_agent
            JOIN agent c ON a.fk_id_agent = c.pk_id_agent
            JOIN customer d ON b.fk_id_customer = d.pk_id_customer
            LEFT JOIN agent e ON c.fk_id_leader_agent = e.pk_id_agent
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND b.status = 'lunas'
            ORDER BY d.nama_customer;
        ";

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if(trim($query) != ""){
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('ListData');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listproduk");
        return DataTable::of($builder)->toJson(true);
    }

    public function getDataKomisiPenjualanProduk($pk_id_komisi_penjualan_produk){
        $data = $this->db->query("
            SELECT 
                a.pk_id_komisi_penjualan_produk,
                d.nama_customer,
                b.nama_produk,
                b.harga_produk,
                a.nominal,
                CASE
                    WHEN a.keterangan = 'Passive income leader agent' THEN  CONCAT(a.keterangan, ' dari ', bb.nama_agent)
                    ELSE a.keterangan
                END AS keterangan,
                c.nama_agent,
                e.nama_agent as nama_leader_agent,
                b.tgl_closing,
                a.is_paid
            FROM komisi_penjualan_produk a
            JOIN penjualan_produk b ON a.fk_id_penjualan_produk = b.pk_id_penjualan_produk
            JOIN agent bb ON b.fk_id_agent_closing = bb.pk_id_agent
            JOIN agent c ON a.fk_id_agent = c.pk_id_agent
            JOIN customer d ON b.fk_id_customer = d.pk_id_customer
            LEFT JOIN agent e ON c.fk_id_leader_agent = e.pk_id_agent
            WHERE a.pk_id_komisi_penjualan_produk = $pk_id_komisi_penjualan_produk
        ")->getRowArray();

        return json_encode($data);
    }

    public function getListKomisiPenjualanProdukTravel()
    {
        $query = "
            CREATE TEMPORARY TABLE ListData AS
            SELECT 
                a.pk_id_komisi_penjualan_produk_travel,
                d.nama_customer,
                b.nama_produk,
                b.harga_produk,
                a.nominal,
                CASE
                    WHEN a.keterangan = 'Passive income leader agent' THEN  CONCAT(a.keterangan, ' dari ', bb.nama_agent)
                    ELSE a.keterangan
                END AS keterangan,
                c.nama_agent,
                e.nama_agent as nama_leader_agent,
                b.tgl_closing,
                a.is_paid
            FROM komisi_penjualan_produk_travel a
            JOIN penjualan_produk_travel b ON a.fk_id_penjualan_produk_travel = b.pk_id_penjualan_produk_travel
            JOIN agent bb ON b.fk_id_agent_closing = bb.pk_id_agent
            JOIN agent c ON a.fk_id_agent = c.pk_id_agent
            JOIN customer d ON b.fk_id_customer = d.pk_id_customer
            LEFT JOIN agent e ON c.fk_id_leader_agent = e.pk_id_agent
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND b.status = 'lunas'
            ORDER BY d.nama_customer;
        ";

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if(trim($query) != ""){
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('ListData');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listproduk");
        return DataTable::of($builder)->toJson(true);
    }

    public function getDataKomisiPenjualanProdukTravel($pk_id_komisi_penjualan_produk_travel){
        $data = $this->db->query("
            SELECT 
                a.pk_id_komisi_penjualan_produk_travel,
                d.nama_customer,
                b.nama_produk,
                b.harga_produk,
                a.nominal,
                CASE
                    WHEN a.keterangan = 'Passive income leader agent' THEN  CONCAT(a.keterangan, ' dari ', bb.nama_agent)
                    ELSE a.keterangan
                END AS keterangan,
                c.nama_agent,
                e.nama_agent as nama_leader_agent,
                b.tgl_closing,
                a.is_paid
            FROM komisi_penjualan_produk_travel a
            JOIN penjualan_produk_travel b ON a.fk_id_penjualan_produk_travel = b.pk_id_penjualan_produk_travel
            JOIN agent bb ON b.fk_id_agent_closing = bb.pk_id_agent
            JOIN agent c ON a.fk_id_agent = c.pk_id_agent
            JOIN customer d ON b.fk_id_customer = d.pk_id_customer
            LEFT JOIN agent e ON c.fk_id_leader_agent = e.pk_id_agent
            WHERE a.pk_id_komisi_penjualan_produk_travel = $pk_id_komisi_penjualan_produk_travel
        ")->getRowArray();

        return json_encode($data);
    }

    public function exportKomisi(){
        $this->db->query("
            UPDATE komisi_penjualan_produk a
            JOIN penjualan_produk b ON a.fk_id_penjualan_produk = b.pk_id_penjualan_produk
            SET is_reported = 1
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND b.status = 'lunas'
            AND is_paid = 0
        ");

        $this->db->query("
            UPDATE komisi_penjualan_produk_travel a
            JOIN penjualan_produk_travel b ON a.fk_id_penjualan_produk_travel = b.pk_id_penjualan_produk_travel
            SET is_reported = 1
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND b.status = 'lunas'
            AND is_paid = 0
        ");

        $data = [
            'status' => 'success',
            'message' => 'berhasil'
        ];

        return json_encode($data);
    }

    public function laporan()
    {
        $agent = $this->db->query("
            SELECT
                fk_id_agent,
                nama_agent
            FROM (
                SELECT
                    a.fk_id_agent
                FROM komisi_penjualan_produk a
                JOIN penjualan_produk b ON a.fk_id_penjualan_produk = b.pk_id_penjualan_produk
                WHERE is_paid = 0
                AND is_reported = 1
                AND b.status = 'lunas'
                AND (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                GROUP BY a.fk_id_agent
                UNION
                SELECT
                    a.fk_id_agent
                FROM komisi_penjualan_produk_travel a
                JOIN penjualan_produk_travel b ON a.fk_id_penjualan_produk_travel = b.pk_id_penjualan_produk_travel
                WHERE is_paid = 0
                AND is_reported = 1
                AND b.status = 'lunas'
                AND (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                GROUP BY a.fk_id_agent
            ) as aa
            JOIN agent b ON aa.fk_id_agent = b.pk_id_agent
            GROUP BY fk_id_agent
            ORDER BY b.nama_agent
        ")->getResultArray();

        $data = [];

        foreach ($agent as $i => $agen) {
            $data['agent'][$i]['agent'] = $this->db->query("
                SELECT
                    a.*,
                    b.nama_agent as leader_agent
                FROM agent a
                LEFT JOIN agent b ON a.fk_id_leader_agent = b.pk_id_agent
                WHERE a.pk_id_agent = $agen[fk_id_agent]
            ")->getRowArray();

            $data['agent'][$i]['komisi_produk'] = $this->db->query("
                SELECT
                    a.fk_id_agent,
                    CASE
                        WHEN a.keterangan = 'Passive income leader agent' THEN  CONCAT(a.keterangan, ' dari ', bb.nama_agent)
                        ELSE a.keterangan
                    END AS keterangan,
                    a.nominal,
                    b.nama_produk,
                    c.nama_customer,
                    b.harga_produk
                FROM komisi_penjualan_produk a
                JOIN penjualan_produk b ON a.fk_id_penjualan_produk = b.pk_id_penjualan_produk
                JOIN agent bb ON b.fk_id_agent_closing = bb.pk_id_agent
                JOIN customer c ON b.fk_id_customer = c.pk_id_customer
                WHERE a.is_paid = 0 
                AND is_reported = 1
                AND (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.fk_id_agent = $agen[fk_id_agent]
            ")->getResultArray();

            $data['agent'][$i]['komisi_produk_travel'] = $this->db->query("
                SELECT
                    a.fk_id_agent,
                    CASE
                        WHEN a.keterangan = 'Passive income leader agent' THEN  CONCAT(a.keterangan, ' dari ', bb.nama_agent)
                        ELSE a.keterangan
                    END AS keterangan,
                    a.nominal,
                    b.nama_produk,
                    c.nama_customer,
                    b.harga_produk
                FROM komisi_penjualan_produk_travel a
                JOIN penjualan_produk_travel b ON a.fk_id_penjualan_produk_travel = b.pk_id_penjualan_produk_travel
                JOIN agent bb ON b.fk_id_agent_closing = bb.pk_id_agent
                JOIN customer c ON b.fk_id_customer = c.pk_id_customer
                WHERE a.is_paid = 0 
                AND is_reported = 1
                AND (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.fk_id_agent = $agen[fk_id_agent]
            ")->getResultArray();

            $data['agent'][$i]['total_komisi'] = 0;
            foreach ($data['agent'][$i]['komisi_produk'] as $komisi_produk) {
                $data['agent'][$i]['total_komisi'] += $komisi_produk['nominal'];
            }

            foreach ($data['agent'][$i]['komisi_produk_travel'] as $komisi_produk_travel) {
                $data['agent'][$i]['total_komisi'] += $komisi_produk_travel['nominal'];
            }
        }

        // echo '<pre style="background-color: #f9f9f9; border: 1px solid #ccc; padding: 10px; border-radius: 4px; font-size: 14px; line-height: 1.4; color: #333;">';
        // var_dump($data);
        // echo '</pre>';
        $Pdfgenerator = new Pdfgenerator();
        // filename dari pdf ketika didownload
        $file_pdf = "Laporan Komisi " . date('d-m-Y');
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "potrait";

        $html = view('admin/pages/laporan-komisi', $data);

        // run dompdf
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        exit();
    }

    public function historyKomisi($pk_id_agent){
        $data['agent'] = $this->agentModel->find($pk_id_agent);
        $data['komisi'] = 0;
        $data['komisi_produk'] = $this->db->query("
            SELECT
                a.pk_id_komisi_penjualan_produk,
                c.nama_customer,
                b.nama_produk,
                b.harga_produk,
                a.nominal,
                CASE
                    WHEN a.keterangan = 'Passive income leader agent' THEN  CONCAT(a.keterangan, ' dari ', bb.nama_agent)
                    ELSE a.keterangan
                END AS keterangan
            FROM komisi_penjualan_produk a
            JOIN penjualan_produk b ON b.pk_id_penjualan_produk = a.fk_id_penjualan_produk
            JOIN agent bb ON b.fk_id_agent_closing = bb.pk_id_agent
            JOIN customer c ON b.fk_id_customer = c.pk_id_customer
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND b.status = 'lunas'
            AND is_reported = 1
            AND a.fk_id_agent = $pk_id_agent
            AND COALESCE(a.is_paid, 0) = 0
        ")->getResultArray();
        $data['komisi_produk_travel'] = $this->db->query("
            SELECT
                a.pk_id_komisi_penjualan_produk_travel,
                c.nama_customer,
                b.nama_produk,
                b.harga_produk,
                a.nominal,
                CASE
                    WHEN a.keterangan = 'Passive income leader agent' THEN  CONCAT(a.keterangan, ' dari ', bb.nama_agent)
                    ELSE a.keterangan
                END AS keterangan
            FROM komisi_penjualan_produk_travel a
            JOIN penjualan_produk_travel b ON b.pk_id_penjualan_produk_travel = a.fk_id_penjualan_produk_travel
            JOIN agent bb ON b.fk_id_agent_closing = bb.pk_id_agent
            JOIN customer c ON b.fk_id_customer = c.pk_id_customer
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND b.status = 'lunas'
            AND is_reported = 1
            AND a.fk_id_agent = $pk_id_agent
            AND COALESCE(a.is_paid, 0) = 0
        ")->getResultArray();

        foreach ($data['komisi_produk'] as $komisi) {
            $data['komisi'] += $komisi['nominal'];
        }

        foreach ($data['komisi_produk_travel'] as $komisi) {
            $data['komisi'] += $komisi['nominal'];
        }

        return json_encode($data);
    }

    public function historyAllKomisi($pk_id_agent){
        $data['agent'] = $this->agentModel->find($pk_id_agent);
        $data['komisi'] = 0;
        $data['komisi_produk'] = $this->db->query("
            SELECT
                a.pk_id_komisi_penjualan_produk,
                c.nama_customer,
                b.nama_produk,
                b.harga_produk,
                a.nominal,
                a.keterangan,
                CASE 
                    WHEN a.is_paid = 0 THEN '
                        <span class=\"text-danger\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-x-circle-fill\" viewBox=\"0 0 16 16\">
                            <path d=\"M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z\"/>
                            </svg>
                        </span>
                    '
                    ELSE '
                        <span class=\"text-success\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-check-circle-fill\" viewBox=\"0 0 16 16\">
                                <path d=\"M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z\"/>
                            </svg>
                        </span>
                    '
                END as status_paid,
                a.is_paid,
                a.paid_at
            FROM komisi_penjualan_produk a
            JOIN penjualan_produk b ON b.pk_id_penjualan_produk = a.fk_id_penjualan_produk
            JOIN customer c ON b.fk_id_customer = c.pk_id_customer
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND b.status = 'lunas'
            AND a.fk_id_agent = $pk_id_agent
        ")->getResultArray();
        $data['komisi_produk_travel'] = $this->db->query("
            SELECT
                a.pk_id_komisi_penjualan_produk_travel,
                c.nama_customer,
                b.nama_produk,
                b.harga_produk,
                a.nominal,
                a.keterangan,
                CASE 
                    WHEN a.is_paid = 0 THEN '
                        <span class=\"text-danger\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-x-circle-fill\" viewBox=\"0 0 16 16\">
                            <path d=\"M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z\"/>
                            </svg>
                        </span>
                    '
                    ELSE '
                        <span class=\"text-success\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-check-circle-fill\" viewBox=\"0 0 16 16\">
                                <path d=\"M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z\"/>
                            </svg>
                        </span>
                    '
                END as status_paid,
                a.is_paid,
                a.paid_at
            FROM komisi_penjualan_produk_travel a
            JOIN penjualan_produk_travel b ON b.pk_id_penjualan_produk_travel = a.fk_id_penjualan_produk_travel
            JOIN customer c ON b.fk_id_customer = c.pk_id_customer
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND b.status = 'lunas'
            AND a.fk_id_agent = $pk_id_agent
        ")->getResultArray();

        foreach ($data['komisi_produk'] as $komisi) {
            $data['komisi'] += $komisi['nominal'];
        }

        foreach ($data['komisi_produk_travel'] as $komisi) {
            $data['komisi'] += $komisi['nominal'];
        }

        return json_encode($data);
    }

    public function paidKomisiProduk($pk_id_komisi_penjualan_produk){
        $data = [
            "is_paid" => 1,
            "paid_at" => date('Y-m-d h:i:s')
        ];

        if($this->komisiPenjualanProdukModel->update($pk_id_komisi_penjualan_produk, $data)){
            $response = [
                "status" => "success",
                "message" => "komisi telah dibayarkan"
            ];
        } else {
            $response = [
                "status" => "error",
                "message" => "terjadi kesalahan"
            ];
        }

        return json_encode($response);
    }

    public function paidKomisiProdukTravel($pk_id_komisi_penjualan_produk_travel){
        $data = [
            "is_paid" => 1,
            "paid_at" => date('Y-m-d h:i:s')
        ];

        if($this->komisiPenjualanProdukTravelModel->update($pk_id_komisi_penjualan_produk_travel, $data)){
            $response = [
                "status" => "success",
                "message" => "komisi telah dibayarkan"
            ];
        } else {
            $response = [
                "status" => "error",
                "message" => "terjadi kesalahan"
            ];
        }

        return json_encode($response);
    }

    public function paidAllKomisi($pk_id_agent){
        $this->db->query("
            UPDATE 
            komisi_penjualan_produk a
            JOIN penjualan_produk b ON a.fk_id_penjualan_produk = b.pk_id_penjualan_produk
            SET a.is_paid= 1, a.paid_at='" . date('Y-m-d h:i:s') . "'
            WHERE a.fk_id_agent = $pk_id_agent 
            AND a.is_paid = 0
            AND a.is_reported = 1
            AND (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND b.status = 'lunas'"
        );

        $this->db->query("
            UPDATE 
            komisi_penjualan_produk_travel a
            JOIN penjualan_produk_travel b ON a.fk_id_penjualan_produk_travel = b.pk_id_penjualan_produk_travel
            SET a.is_paid= 1, a.paid_at='" . date('Y-m-d h:i:s') . "'
            WHERE a.fk_id_agent = $pk_id_agent 
            AND a.is_paid = 0
            AND a.is_reported = 1
            AND (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND b.status = 'lunas'"
        );

        $response = [
            "status" => "success",
            "message" => "seluruh komisi telah dibayarkan"
        ];

        return json_encode($response);
    }

    public function changeStatusKomisiProduk($pk_id_komisi_penjualan_produk){
        $komisi = $this->komisiPenjualanProdukModel->find($pk_id_komisi_penjualan_produk);

        if($komisi['is_paid'] == 0){
            $data = [
                'is_paid' => 1,
                'paid_at' => date('Y-m-d h:i:s')
            ];
        } else {
            $data = [
                'is_paid' => 0,
                'paid_at' => NULL
            ];
        }

        if($this->komisiPenjualanProdukModel->update($pk_id_komisi_penjualan_produk, $data) === true){
            $response = [
                "status" => "success",
                "message" => "berhasil mengubah status"
            ];
        } else {
            $response = [
                "status" => "error",
                "message" => "terjadi kesalahan"
            ];
        }

        return json_encode($response);
    }

    public function changeStatusKomisiProdukTravel($pk_id_komisi_penjualan_produk_travel){
        $komisi = $this->komisiPenjualanProdukTravelModel->find($pk_id_komisi_penjualan_produk_travel);

        if($komisi['is_paid'] == 0){
            $data = [
                'is_paid' => 1,
                'paid_at' => date('Y-m-d h:i:s')
            ];
        } else {
            $data = [
                'is_paid' => 0,
                'paid_at' => NULL
            ];
        }

        if($this->komisiPenjualanProdukTravelModel->update($pk_id_komisi_penjualan_produk_travel, $data) === true){
            $response = [
                "status" => "success",
                "message" => "berhasil mengubah status"
            ];
        } else {
            $response = [
                "status" => "error",
                "message" => "terjadi kesalahan"
            ];
        }

        return json_encode($response);
    }
}
