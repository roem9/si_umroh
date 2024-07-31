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

class Akomisi extends BaseController
{
    public $db;
    public $penjualanProdukModel;
    public $komisPenjualanProdukModel;
    public $penjualanProdukTravelModel;
    public $komisiPenjualanProdukTravelModel;
    public $agentModel;
    public $ses_pk_id_agent;

    public function __construct(){
        $this->db = db_connect();
        $this->penjualanProdukModel = new PenjualanProdukModel();
        $this->komisiPenjualanProdukModel = new KomisiPenjualanProdukModel();
        $this->penjualanProdukTravelModel = new PenjualanProdukTravelModel();
        $this->komisiPenjualanProdukTravelModel = new KomisiPenjualanProdukTravelModel();
        $this->agentModel = new AgentModel();
        $this->ses_pk_id_agent = session()->get('pk_id_agent');
    }

    public function produk()
    {
        $data['sidebar'] = "komisi";
        $data['title'] = "List Komisi Penjualan Produk";
        $data['collapse'] = "komisi";
        $data['collapseItem'] = 'listKomisiProduk';
        $data['deskripsi'] = "List seluruh komisi penjualan produk";

        return view('agent_area/pages/komisi-penjualan-produk', $data);
    }

    public function produkTravel()
    {
        $data['sidebar'] = "komisi";
        $data['title'] = "List Komisi Penjualan Produk Travel";
        $data['collapse'] = "komisi";
        $data['collapseItem'] = 'listKomisiProdukTravel';
        $data['deskripsi'] = "List seluruh komisi penjualan produk travel";

        return view('agent_area/pages/komisi-penjualan-produk-travel', $data);
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
            AND a.fk_id_agent = $this->ses_pk_id_agent
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
            AND a.fk_id_agent = $this->ses_pk_id_agent
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
            AND a.fk_id_agent = $this->ses_pk_id_agent
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
            AND a.fk_id_agent = $this->ses_pk_id_agent
        ")->getRowArray();

        return json_encode($data);
    }
}
