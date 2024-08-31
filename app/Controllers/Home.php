<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{
    public function index()
    {
        $data['sidebar'] = "dashboard";
        $data['title'] = "Dashboard";
        $data['breadcrumbs'] = ['Dashboard'];

        $db = db_connect();
        // $data['agent_silver'] = $db->query("
        //     SELECT COUNT(*) as total
        //     FROM agent 
        //     WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
        //     AND tipe_agent = 'silver'
        // ")->getRowArray();

        // $data['agent_gold'] = $db->query("
        //     SELECT COUNT(*) as total
        //     FROM agent 
        //     WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
        //     AND tipe_agent = 'gold'
        // ")->getRowArray();

        $data['agent'] = $db->query("
            SELECT COUNT(*) as total
            FROM agent
            WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            AND tipe_agent != 'leader agent'
        ")->getRowArray();

        $data['agent_leader'] = $db->query("
            SELECT COUNT(*) as total
            FROM agent 
            WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            AND tipe_agent = 'leader agent'
        ")->getRowArray();

        $data['customer'] = $db->query("
            SELECT COUNT(*) as total
            FROM customer 
            WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
        ")->getRowArray();

        $data['omset'] = 0;
        $penjualan_produk = $db->query("
            SELECT
                *
            FROM penjualan_produk
            WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            AND status != 'pending'
        ")->getResultArray();

        $penjualan_produk_travel = $db->query("
            SELECT
                *
            FROM penjualan_produk_travel
            WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            AND status != 'pending'
        ")->getResultArray();

        $data['travel'] = $db->query("
            SELECT
                COUNT(*) as total
            FROM travel
            WHERE deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL
        ")->getRowArray();

        $data['piutang'] = 0;
        foreach ($penjualan_produk as $penjualan) {
            $data['omset'] += $penjualan['harga_produk'];
            if ($penjualan['status'] == 'cicil') {
                $pembayaran = $db->query("
                    SELECT
                        SUM(nominal) as total
                    FROM pembayaran_penjualan_produk
                    WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
                    AND fk_id_penjualan_produk = $penjualan[pk_id_penjualan_produk]
                ")->getRowArray();

                $data['piutang'] += $penjualan['harga_produk'] - $pembayaran['total'];
            }
        }

        foreach ($penjualan_produk_travel as $penjualan) {
            $data['omset'] += $penjualan['harga_produk'];

            if ($penjualan['status'] == 'cicil') {
                $pembayaran = $db->query("
                    SELECT
                        SUM(nominal) as total
                    FROM pembayaran_penjualan_produk_travel
                    WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
                    AND fk_id_penjualan_produk_travel = $penjualan[pk_id_penjualan_produk_travel]
                ")->getRowArray();

                $data['piutang'] += $penjualan['harga_produk'] - $pembayaran['total'];
            }
        }

        $data['total_penjualan'] = COUNT($penjualan_produk) + COUNT($penjualan_produk_travel);

        $data['agent_aktif'] = $db->query("
            SELECT 
            COUNT(*) as total
            FROM agent WHERE area_status = 1
            AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
        ")->getRowArray();

        $data['agent_nonaktif'] = $db->query("
            SELECT 
            COUNT(*) as total
            FROM agent WHERE area_status = 0
            AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
        ")->getRowArray();

        return view('admin/pages/dashboard', $data);
    }
}
