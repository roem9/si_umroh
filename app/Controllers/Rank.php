<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class Rank extends BaseController
{
    public $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function agent()
    {
        $data['sidebar'] = "rank";
        $data['title'] = "Rank Agent";
        $data['collapse'] = "rank";
        $data['collapseItem'] = 'listRankAgent';
        $data['deskripsi'] = "List Agent diurutkan berdasarkan banyaknya closingan";

        return view('admin/pages/rank-agent', $data);
    }

    public function leaderagent()
    {
        $data['sidebar'] = "rank";
        $data['title'] = "Rank Leader Agent";
        $data['collapse'] = "rank";
        $data['collapseItem'] = 'listRankLeaderAgent';
        $data['deskripsi'] = "List Leader Agent diurutkan berdasarkan banyaknya closingan";

        return view('admin/pages/rank-leader-agent', $data);
    }

    public function travel()
    {
        $data['sidebar'] = "rank";
        $data['title'] = "Rank Travel";
        $data['collapse'] = "rank";
        $data['collapseItem'] = 'listRankTravel';
        $data['deskripsi'] = "List Travel diurutkan berdasarkan banyaknya closingan";

        return view('admin/pages/rank-travel', $data);
    }

    public function kota()
    {
        $data['sidebar'] = "rank";
        $data['title'] = "Rank Kota/Kabupaten";
        $data['collapse'] = "rank";
        $data['collapseItem'] = 'listRankKota';
        $data['deskripsi'] = "List Kota diurutkan berdasarkan banyaknya closingan";

        return view('admin/pages/rank-kota-kabupaten', $data);
    }

    public function freeoffer()
    {
        $data['sidebar'] = "rank";
        $data['title'] = "Rank Free Offer";
        $data['collapse'] = "rank";
        $data['collapseItem'] = 'listRankFreeOffer';
        $data['deskripsi'] = "List Produk Free Offer diurutkan berdasarkan banyaknya leads";

        return view('admin/pages/free-offer', $data);
    }

    public function tripwired()
    {
        $data['sidebar'] = "rank";
        $data['title'] = "Rank Tripwired";
        $data['collapse'] = "rank";
        $data['collapseItem'] = 'listRankTripwired';
        $data['deskripsi'] = "List Produk Tripwired diurutkan berdasarkan banyaknya closingan";

        return view('admin/pages/tripwired', $data);
    }

    public function coreoffer()
    {
        $data['sidebar'] = "rank";
        $data['title'] = "Rank Core Offer";
        $data['collapse'] = "rank";
        $data['collapseItem'] = 'listRankCoreOffer';
        $data['deskripsi'] = "List Produk Core Offer diurutkan berdasarkan banyaknya closingan";

        return view('admin/pages/core-offer', $data);
    }

    public function getListRankAgent()
    {
        $tgl_awal = $this->request->getGet('tgl_awal');
        $tgl_akhir = $this->request->getGet('tgl_akhir');

        if ($tgl_awal && $tgl_akhir) {
            $query = "
                CREATE TEMPORARY TABLE ClosingProduk AS
                SELECT
                    fk_id_agent_closing,
                    COUNT(*) as total_closing,
                    SUM(komisi_agent) as total_komisi,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                JOIN agent b ON a.fk_id_agent_closing = b.pk_id_agent
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND b.tipe_agent != 'leader agent'
                AND a.status != 'pending'
                AND (a.tgl_closing BETWEEN '$tgl_awal' AND '$tgl_akhir')
                GROUP BY fk_id_agent_closing;
    
                CREATE TEMPORARY TABLE ClosingProdukTravel AS
                SELECT
                    fk_id_agent_closing,
                    COUNT(*) as total_closing,
                    SUM(komisi_agent) as total_komisi,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk_travel a
                JOIN agent b ON a.fk_id_agent_closing = b.pk_id_agent
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND b.tipe_agent != 'leader agent'
                AND a.status != 'pending'
                AND (a.tgl_closing BETWEEN '$tgl_awal' AND '$tgl_akhir')
                GROUP BY fk_id_agent_closing;
    
                CREATE TEMPORARY TABLE ClosingAgent AS
                SELECT
                    a.pk_id_agent,
                    a.nama_agent,
                    COALESCE(b.total_closing, 0) + COALESCE(c.total_closing, 0) as closing,
                    COALESCE(b.total_komisi, 0) + COALESCE(c.total_komisi, 0) as komisi,
                    COALESCE(b.total_omset, 0) + COALESCE(c.total_omset, 0) as omset,
                    d.nama_agent as nama_leader_agent,
                    a.no_wa,
                    a.kota_kabupaten
                FROM agent a
                LEFT JOIN ClosingProduk b ON a.pk_id_agent = b.fk_id_agent_closing
                LEFT JOIN ClosingProdukTravel c ON a.pk_id_agent = c.fk_id_agent_closing
                JOIN agent d ON a.fk_id_leader_agent = d.pk_id_agent
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                HAVING closing > 0;
            ";
        } else {
            $query = "
                CREATE TEMPORARY TABLE ClosingProduk AS
                SELECT
                    fk_id_agent_closing,
                    COUNT(*) as total_closing,
                    SUM(komisi_agent) as total_komisi,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                JOIN agent b ON a.fk_id_agent_closing = b.pk_id_agent
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND b.tipe_agent != 'leader agent'
                GROUP BY fk_id_agent_closing;
    
                CREATE TEMPORARY TABLE ClosingProdukTravel AS
                SELECT
                    fk_id_agent_closing,
                    COUNT(*) as total_closing,
                    SUM(komisi_agent) as total_komisi,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk_travel a
                JOIN agent b ON a.fk_id_agent_closing = b.pk_id_agent
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND b.tipe_agent != 'leader agent'
                GROUP BY fk_id_agent_closing;
    
                CREATE TEMPORARY TABLE ClosingAgent AS
                SELECT
                    a.pk_id_agent,
                    a.nama_agent,
                    COALESCE(b.total_closing, 0) + COALESCE(c.total_closing, 0) as closing,
                    COALESCE(b.total_komisi, 0) + COALESCE(c.total_komisi, 0) as komisi,
                    COALESCE(b.total_omset, 0) + COALESCE(c.total_omset, 0) as omset,
                    d.nama_agent as nama_leader_agent,
                    a.no_wa,
                    a.kota_kabupaten
                FROM agent a
                LEFT JOIN ClosingProduk b ON a.pk_id_agent = b.fk_id_agent_closing
                LEFT JOIN ClosingProdukTravel c ON a.pk_id_agent = c.fk_id_agent_closing
                JOIN agent d ON a.fk_id_leader_agent = d.pk_id_agent
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                HAVING closing > 0;
            ";
        }

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if (trim($query) != "") {
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('ClosingAgent');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listproduk");
        return DataTable::of($builder)->toJson(true);
    }

    public function getListRankLeaderAgent()
    {
        $tgl_awal = $this->request->getGet('tgl_awal');
        $tgl_akhir = $this->request->getGet('tgl_akhir');

        if ($tgl_awal && $tgl_akhir) {
            $query = "
                CREATE TEMPORARY TABLE PIProduk
                SELECT
                    fk_id_leader_agent,
                    COUNT(*) as closing_agent,
                    SUM(passive_income_leader_agent) as passive_income,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND (a.tgl_closing BETWEEN '$tgl_awal' AND '$tgl_akhir')
                AND a.fk_id_agent IS NOT NULL
                GROUP BY fk_id_leader_agent;


                CREATE TEMPORARY TABLE CProduk
                SELECT
                    fk_id_leader_agent,
                    COUNT(*) as closing_agent,
                    SUM(komisi_leader_agent) as komisi_leader,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND (a.tgl_closing BETWEEN '$tgl_awal' AND '$tgl_akhir')
                AND a.fk_id_agent IS NULL
                GROUP BY fk_id_leader_agent;

                CREATE TEMPORARY TABLE CAProduk
                SELECT
                    fk_id_agent,
                    COUNT(*) as closing_agent,
                    SUM(komisi_agent) as komisi_leader,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND (a.tgl_closing BETWEEN '$tgl_awal' AND '$tgl_akhir')
                AND a.fk_id_agent IS NOT NULL AND fk_id_leader_agent IS NULL
                GROUP BY fk_id_agent;

                CREATE TEMPORARY TABLE ClosingAgent AS
                SELECT
                    a.pk_id_agent,
                    a.nama_agent,
                    COALESCE(b.closing_agent, 0) as closing_agent,
                    COALESCE(d.closing_agent,0) + COALESCE(e.closing_agent, 0) as closing_leader_agent,
                    COALESCE(b.closing_agent, 0) + COALESCE(d.closing_agent, 0) + COALESCE(e.closing_agent, 0) as total_closing,
                    COALESCE(b.passive_income, 0) as passive_income,
                    COALESCE(d.komisi_leader, 0) + COALESCE(e.komisi_leader, 0) as komisi,
                    COALESCE(b.passive_income, 0) + COALESCE(d.komisi_leader, 0) + COALESCE(e.komisi_leader, 0) as total_komisi,
                    COALESCE(b.total_omset, 0) + COALESCE(d.total_omset, 0) + COALESCE(e.total_omset, 0) as total_omset,
                    a.no_wa,
                    a.kota_kabupaten
                FROM agent a
                LEFT JOIN PIProduk b ON a.pk_id_agent = b.fk_id_leader_agent
                LEFT JOIN CProduk d ON a.pk_id_agent = d.fk_id_leader_agent
                LEFT JOIN CAProduk e ON a.pk_id_agent = e.fk_id_agent
                HAVING closing_agent + closing_leader_agent > 0;
            ";
        } else {
            $query = "
                CREATE TEMPORARY TABLE PIProduk
                SELECT
                    fk_id_leader_agent,
                    COUNT(*) as closing_agent,
                    SUM(passive_income_leader_agent) as passive_income,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND a.fk_id_agent IS NOT NULL
                GROUP BY fk_id_leader_agent;


                CREATE TEMPORARY TABLE CProduk
                SELECT
                    fk_id_leader_agent,
                    COUNT(*) as closing_agent,
                    SUM(komisi_leader_agent) as komisi_leader,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND a.fk_id_agent IS NULL
                GROUP BY fk_id_leader_agent;

                CREATE TEMPORARY TABLE CAProduk
                SELECT
                    fk_id_agent,
                    COUNT(*) as closing_agent,
                    SUM(komisi_agent) as komisi_leader,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND a.fk_id_agent IS NOT NULL AND fk_id_leader_agent IS NULL
                GROUP BY fk_id_agent;

                CREATE TEMPORARY TABLE ClosingAgent AS
                SELECT
                    a.pk_id_agent,
                    a.nama_agent,
                    COALESCE(b.closing_agent, 0) as closing_agent,
                    COALESCE(d.closing_agent,0) + COALESCE(e.closing_agent, 0) as closing_leader_agent,
                    COALESCE(b.closing_agent, 0) + COALESCE(d.closing_agent, 0) + COALESCE(e.closing_agent, 0) as total_closing,
                    COALESCE(b.passive_income, 0) as passive_income,
                    COALESCE(d.komisi_leader, 0) + COALESCE(e.komisi_leader, 0) as komisi,
                    COALESCE(b.passive_income, 0) + COALESCE(d.komisi_leader, 0) + COALESCE(e.komisi_leader, 0) as total_komisi,
                    COALESCE(b.total_omset, 0) + COALESCE(d.total_omset, 0) + COALESCE(e.total_omset, 0) as total_omset,
                    a.no_wa,
                    a.kota_kabupaten
                FROM agent a
                LEFT JOIN PIProduk b ON a.pk_id_agent = b.fk_id_leader_agent
                LEFT JOIN CProduk d ON a.pk_id_agent = d.fk_id_leader_agent
                LEFT JOIN CAProduk e ON a.pk_id_agent = e.fk_id_agent
                HAVING closing_agent + closing_leader_agent > 0;
            ";
        }

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if (trim($query) != "") {
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('ClosingAgent');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listproduk");
        return DataTable::of($builder)->toJson(true);
    }

    public function getListRankTravel()
    {
        $tgl_awal = $this->request->getGet('tgl_awal');
        $tgl_akhir = $this->request->getGet('tgl_akhir');

        if ($tgl_awal && $tgl_akhir) {
            $query = "
                CREATE TEMPORARY TABLE ClosingProduk AS
                SELECT
                    fk_id_travel,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND (a.tgl_closing BETWEEN '$tgl_awal' AND '$tgl_akhir')
                GROUP BY fk_id_travel;
    
                CREATE TEMPORARY TABLE ClosingProdukTravel AS
                SELECT
                    fk_id_travel,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk_travel a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND (a.tgl_closing BETWEEN '$tgl_awal' AND '$tgl_akhir')
                GROUP BY fk_id_travel;
    
                CREATE TEMPORARY TABLE ClosingAgent AS
                SELECT
                    a.pk_id_travel,
                    a.nama_travel,
                    a.nama_pemilik,
                    a.no_wa,
                    COALESCE(b.total_closing, 0) + COALESCE(c.total_closing, 0) as closing,
                    COALESCE(b.total_omset, 0) + COALESCE(c.total_omset, 0) as omset,
                    a.kota_kabupaten
                FROM travel a
                LEFT JOIN ClosingProduk b ON a.pk_id_travel = b.fk_id_travel
                LEFT JOIN ClosingProdukTravel c ON a.pk_id_travel = c.fk_id_travel
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                HAVING closing > 0;
            ";
        } else {
            $query = "
                CREATE TEMPORARY TABLE ClosingProduk AS
                SELECT
                    fk_id_travel,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                GROUP BY fk_id_travel;
    
                CREATE TEMPORARY TABLE ClosingProdukTravel AS
                SELECT
                    fk_id_travel,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk_travel a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                GROUP BY fk_id_travel;
    
                CREATE TEMPORARY TABLE ClosingAgent AS
                SELECT
                    a.pk_id_travel,
                    a.nama_travel,
                    a.nama_pemilik,
                    a.no_wa,
                    COALESCE(b.total_closing, 0) + COALESCE(c.total_closing, 0) as closing,
                    COALESCE(b.total_omset, 0) + COALESCE(c.total_omset, 0) as omset,
                    a.kota_kabupaten
                FROM travel a
                LEFT JOIN ClosingProduk b ON a.pk_id_travel = b.fk_id_travel
                LEFT JOIN ClosingProdukTravel c ON a.pk_id_travel = c.fk_id_travel
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                HAVING closing > 0;
            ";
        }

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if (trim($query) != "") {
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('ClosingAgent');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listproduk");
        return DataTable::of($builder)->toJson(true);
    }

    public function getListRankKota()
    {
        $tgl_awal = $this->request->getGet('tgl_awal');
        $tgl_akhir = $this->request->getGet('tgl_akhir');

        if ($tgl_awal && $tgl_akhir) {
            $query = "
                CREATE TEMPORARY TABLE ClosingProduk AS
                SELECT
                    CASE 
                        WHEN kota_kabupaten IS NULL OR kota_kabupaten = '' THEN '' 
                        ELSE kota_kabupaten 
                    END AS kota_kabupaten,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND (a.tgl_closing BETWEEN '$tgl_awal' AND '$tgl_akhir')
                GROUP BY kota_kabupaten;

                CREATE TEMPORARY TABLE ClosingProdukTravel AS
                SELECT
                    CASE 
                        WHEN kota_kabupaten IS NULL OR kota_kabupaten = '' THEN '' 
                        ELSE kota_kabupaten 
                    END AS kota_kabupaten,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk_travel a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND (a.tgl_closing BETWEEN '$tgl_awal' AND '$tgl_akhir')
                GROUP BY kota_kabupaten;

                CREATE TEMPORARY TABLE CombinedClosing AS
                SELECT
                    kota_kabupaten,
                    SUM(total_closing) as total_closing,
                    SUM(total_omset) as total_omset
                FROM (
                    SELECT kota_kabupaten, total_closing, total_omset FROM ClosingProduk
                    UNION ALL
                    SELECT kota_kabupaten, total_closing, total_omset FROM ClosingProdukTravel
                ) AS Combined
                GROUP BY kota_kabupaten;
            ";
        } else {
            $query = "
                CREATE TEMPORARY TABLE ClosingProduk AS
                SELECT
                    CASE 
                        WHEN kota_kabupaten IS NULL OR kota_kabupaten = '' THEN '' 
                        ELSE kota_kabupaten 
                    END AS kota_kabupaten,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                GROUP BY kota_kabupaten;

                CREATE TEMPORARY TABLE ClosingProdukTravel AS
                SELECT
                    CASE 
                        WHEN kota_kabupaten IS NULL OR kota_kabupaten = '' THEN '' 
                        ELSE kota_kabupaten 
                    END AS kota_kabupaten,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk_travel a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                GROUP BY kota_kabupaten;

                CREATE TEMPORARY TABLE CombinedClosing AS
                SELECT
                    kota_kabupaten,
                    SUM(total_closing) as total_closing,
                    SUM(total_omset) as total_omset
                FROM (
                    SELECT kota_kabupaten, total_closing, total_omset FROM ClosingProduk
                    UNION ALL
                    SELECT kota_kabupaten, total_closing, total_omset FROM ClosingProdukTravel
                ) AS Combined
                GROUP BY kota_kabupaten;
            ";
        }

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if (trim($query) != "") {
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('CombinedClosing');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listproduk");
        return DataTable::of($builder)->toJson(true);
    }

    public function getListRankFreeOffer()
    {
        $tgl_awal = $this->request->getGet('tgl_awal');
        $tgl_akhir = $this->request->getGet('tgl_akhir');

        if ($tgl_awal && $tgl_akhir) {
            $query = "
                CREATE TEMPORARY TABLE ClosingProduk AS
                SELECT
                    a.fk_id_produk,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND (a.tgl_closing BETWEEN '$tgl_awal' AND '$tgl_akhir')
                GROUP BY a.fk_id_produk;

                CREATE TEMPORARY TABLE ClosingProdukTravel AS
                SELECT
                    a.fk_id_produk_travel,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk_travel a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND (a.tgl_closing BETWEEN '$tgl_awal' AND '$tgl_akhir')
                GROUP BY a.fk_id_produk_travel;

                CREATE TEMPORARY TABLE DataClosingProduk AS
                SELECT
                    a.pk_id_produk,
                    a.nama_produk,
                    '-' AS nama_travel,
                    b.total_closing as closing,
                    b.total_omset as omset
                FROM produk a
                JOIN ClosingProduk b ON a.pk_id_produk = b.fk_id_produk
                WHERE a.jenis_produk = 'free offer';

                CREATE TEMPORARY TABLE DataClosingProdukTravel AS
                SELECT
                    a.pk_id_produk_travel as pk_id_produk,
                    a.nama_produk,
                    c.nama_travel,
                    b.total_closing as closing,
                    b.total_omset as omset
                FROM produk_travel a
                JOIN ClosingProdukTravel b ON a.pk_id_produk_travel = b.fk_id_produk_travel
                JOIN travel c ON a.fk_id_travel = c.pk_id_travel
                WHERE a.jenis_produk = 'free offer';

                CREATE TEMPORARY TABLE Closing AS
                SELECT * FROM DataClosingProduk
                UNION ALL
                SELECT * FROM DataClosingProdukTravel
            ";
        } else {
            $query = "
                CREATE TEMPORARY TABLE ClosingProduk AS
                SELECT
                    a.fk_id_produk,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                GROUP BY a.fk_id_produk;

                CREATE TEMPORARY TABLE ClosingProdukTravel AS
                SELECT
                    a.fk_id_produk_travel,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk_travel a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                GROUP BY a.fk_id_produk_travel;

                CREATE TEMPORARY TABLE DataClosingProduk AS
                SELECT
                    a.pk_id_produk,
                    a.nama_produk,
                    '-' AS nama_travel,
                    b.total_closing as closing,
                    b.total_omset as omset
                FROM produk a
                JOIN ClosingProduk b ON a.pk_id_produk = b.fk_id_produk
                WHERE a.jenis_produk = 'free offer';

                CREATE TEMPORARY TABLE DataClosingProdukTravel AS
                SELECT
                    a.pk_id_produk_travel as pk_id_produk,
                    a.nama_produk,
                    c.nama_travel,
                    b.total_closing as closing,
                    b.total_omset as omset
                FROM produk_travel a
                JOIN ClosingProdukTravel b ON a.pk_id_produk_travel = b.fk_id_produk_travel
                JOIN travel c ON a.fk_id_travel = c.pk_id_travel
                WHERE a.jenis_produk = 'free offer';

                CREATE TEMPORARY TABLE Closing AS
                SELECT * FROM DataClosingProduk
                UNION ALL
                SELECT * FROM DataClosingProdukTravel
            ";
        }

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if (trim($query) != "") {
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('Closing');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listproduk");
        return DataTable::of($builder)->toJson(true);
    }

    public function getListRankTripwired()
    {
        $tgl_awal = $this->request->getGet('tgl_awal');
        $tgl_akhir = $this->request->getGet('tgl_akhir');

        if ($tgl_awal && $tgl_akhir) {
            $query = "
                CREATE TEMPORARY TABLE ClosingProduk AS
                SELECT
                    a.fk_id_produk,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND (a.tgl_closing BETWEEN '$tgl_awal' AND '$tgl_akhir')
                GROUP BY a.fk_id_produk;
    
                CREATE TEMPORARY TABLE ClosingProdukTravel AS
                SELECT
                    a.fk_id_produk_travel,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk_travel a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND (a.tgl_closing BETWEEN '$tgl_awal' AND '$tgl_akhir')
                GROUP BY a.fk_id_produk_travel;
    
                CREATE TEMPORARY TABLE DataClosingProduk AS
                SELECT
                    a.pk_id_produk,
                    a.nama_produk,
                    '-' AS nama_travel,
                    b.total_closing as closing,
                    b.total_omset as omset
                FROM produk a
                JOIN ClosingProduk b ON a.pk_id_produk = b.fk_id_produk
                WHERE a.jenis_produk = 'tripwired';
    
                CREATE TEMPORARY TABLE DataClosingProdukTravel AS
                SELECT
                    a.pk_id_produk_travel as pk_id_produk,
                    a.nama_produk,
                    c.nama_travel,
                    b.total_closing as closing,
                    b.total_omset as omset
                FROM produk_travel a
                JOIN ClosingProdukTravel b ON a.pk_id_produk_travel = b.fk_id_produk_travel
                JOIN travel c ON a.fk_id_travel = c.pk_id_travel
                WHERE a.jenis_produk = 'tripwired';
    
                CREATE TEMPORARY TABLE Closing AS
                SELECT * FROM DataClosingProduk
                UNION ALL
                SELECT * FROM DataClosingProdukTravel
            ";
        } else {
            $query = "
                CREATE TEMPORARY TABLE ClosingProduk AS
                SELECT
                    a.fk_id_produk,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                GROUP BY a.fk_id_produk;
    
                CREATE TEMPORARY TABLE ClosingProdukTravel AS
                SELECT
                    a.fk_id_produk_travel,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk_travel a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                GROUP BY a.fk_id_produk_travel;
    
                CREATE TEMPORARY TABLE DataClosingProduk AS
                SELECT
                    a.pk_id_produk,
                    a.nama_produk,
                    '-' AS nama_travel,
                    b.total_closing as closing,
                    b.total_omset as omset
                FROM produk a
                JOIN ClosingProduk b ON a.pk_id_produk = b.fk_id_produk
                WHERE a.jenis_produk = 'tripwired';
    
                CREATE TEMPORARY TABLE DataClosingProdukTravel AS
                SELECT
                    a.pk_id_produk_travel as pk_id_produk,
                    a.nama_produk,
                    c.nama_travel,
                    b.total_closing as closing,
                    b.total_omset as omset
                FROM produk_travel a
                JOIN ClosingProdukTravel b ON a.pk_id_produk_travel = b.fk_id_produk_travel
                JOIN travel c ON a.fk_id_travel = c.pk_id_travel
                WHERE a.jenis_produk = 'tripwired';
    
                CREATE TEMPORARY TABLE Closing AS
                SELECT * FROM DataClosingProduk
                UNION ALL
                SELECT * FROM DataClosingProdukTravel
            ";
        }

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if (trim($query) != "") {
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('Closing');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listproduk");
        return DataTable::of($builder)->toJson(true);
    }

    public function getListRankCoreOffer()
    {
        $tgl_awal = $this->request->getGet('tgl_awal');
        $tgl_akhir = $this->request->getGet('tgl_akhir');

        if ($tgl_awal && $tgl_akhir) {
            $query = "
                CREATE TEMPORARY TABLE ClosingProduk AS
                SELECT
                    a.fk_id_produk,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND (a.tgl_closing BETWEEN '$tgl_awal' AND '$tgl_akhir')
                GROUP BY a.fk_id_produk;
    
                CREATE TEMPORARY TABLE ClosingProdukTravel AS
                SELECT
                    a.fk_id_produk_travel,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk_travel a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                AND (a.tgl_closing BETWEEN '$tgl_awal' AND '$tgl_akhir')
                GROUP BY a.fk_id_produk_travel;
    
                CREATE TEMPORARY TABLE DataClosingProduk AS
                SELECT
                    a.pk_id_produk,
                    a.nama_produk,
                    '-' AS nama_travel,
                    b.total_closing as closing,
                    b.total_omset as omset
                FROM produk a
                JOIN ClosingProduk b ON a.pk_id_produk = b.fk_id_produk
                WHERE a.jenis_produk = 'core offer';
    
                CREATE TEMPORARY TABLE DataClosingProdukTravel AS
                SELECT
                    a.pk_id_produk_travel as pk_id_produk,
                    a.nama_produk,
                    c.nama_travel,
                    b.total_closing as closing,
                    b.total_omset as omset
                FROM produk_travel a
                JOIN ClosingProdukTravel b ON a.pk_id_produk_travel = b.fk_id_produk_travel
                JOIN travel c ON a.fk_id_travel = c.pk_id_travel
                WHERE a.jenis_produk = 'core offer';
    
                CREATE TEMPORARY TABLE Closing AS
                SELECT * FROM DataClosingProduk
                UNION ALL
                SELECT * FROM DataClosingProdukTravel
            ";
        } else {
            $query = "
                CREATE TEMPORARY TABLE ClosingProduk AS
                SELECT
                    a.fk_id_produk,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                GROUP BY a.fk_id_produk;
    
                CREATE TEMPORARY TABLE ClosingProdukTravel AS
                SELECT
                    a.fk_id_produk_travel,
                    COUNT(*) as total_closing,
                    SUM(harga_produk) as total_omset
                FROM penjualan_produk_travel a
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.status != 'pending'
                GROUP BY a.fk_id_produk_travel;
    
                CREATE TEMPORARY TABLE DataClosingProduk AS
                SELECT
                    a.pk_id_produk,
                    a.nama_produk,
                    '-' AS nama_travel,
                    b.total_closing as closing,
                    b.total_omset as omset
                FROM produk a
                JOIN ClosingProduk b ON a.pk_id_produk = b.fk_id_produk
                WHERE a.jenis_produk = 'core offer';
    
                CREATE TEMPORARY TABLE DataClosingProdukTravel AS
                SELECT
                    a.pk_id_produk_travel as pk_id_produk,
                    a.nama_produk,
                    c.nama_travel,
                    b.total_closing as closing,
                    b.total_omset as omset
                FROM produk_travel a
                JOIN ClosingProdukTravel b ON a.pk_id_produk_travel = b.fk_id_produk_travel
                JOIN travel c ON a.fk_id_travel = c.pk_id_travel
                WHERE a.jenis_produk = 'core offer';
    
                CREATE TEMPORARY TABLE Closing AS
                SELECT * FROM DataClosingProduk
                UNION ALL
                SELECT * FROM DataClosingProdukTravel
            ";
        }

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if (trim($query) != "") {
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('Closing');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listproduk");
        return DataTable::of($builder)->toJson(true);
    }
}
