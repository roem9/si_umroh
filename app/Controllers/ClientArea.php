<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class ClientArea extends BaseController
{
    public $db;
    public $session;
    public $pk_id_client;

    public function __construct(){
        $this->db = db_connect();
        $this->session = session();
        $this->pk_id_client = $this->session->get('pk_id_client');
    }

    public function index()
    {
        $db = db_connect();
        $pk_id_client = $this->session->get('pk_id_client');

        $data['session'] = $this->session;
        $data['sidebar'] = "dashboard";
        $data['title'] = "Dashboard";
        $data['breadcrumbs'] = ['Dashboard'];

        $data['bulan'] = $db->query("SELECT * FROM config WHERE field = 'bulan'")->getRowArray();
        $data['tahun'] = $db->query("SELECT * FROM config WHERE field = 'tahun'")->getRowArray();

        if($data['bulan']['value'] == "" && $data['tahun']['value'] == ""){
            $data['description'] = "Statistik Lembaga Anda Seluruh Periode";
        } else if($data['bulan']['value'] == "" && $data['tahun']['value'] != ""){
            $data['description'] = "Statistik Lembaga Anda Periode " . $data['tahun']['value'];
        } else if($data['tahun']['value'] == "" && $data['bulan']['value'] != ""){
            $data['description'] = "Statistik Lembaga Anda Periode " . bulanIndonesia($data['bulan']['value']) . "";
        } else {
            $data['description'] = "Statistik Lembaga Anda Periode " . bulanIndonesia($data['bulan']['value']) . " " .$data['tahun']['value'];
        }

        $db = db_connect();
        $data['peserta'] = COUNT($db->query("
            SELECT a.* 
            FROM kelas_member a
            JOIN member b ON a.fk_id_member = b.pk_id_member
            WHERE b.fk_id_client = $pk_id_client
            AND (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)")->getResult());
        $data['peserta_lulus'] = COUNT($db->query("
            SELECT a.* 
            FROM kelas_member a
            JOIN member b ON a.fk_id_member = b.pk_id_member
            WHERE b.fk_id_client = $pk_id_client
            AND (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL AND sertifikat = 1)")->getResult());
        $data['kelas'] = COUNT($db->query("
            SELECT * 
            FROM kelas 
            WHERE fk_id_client = $pk_id_client
            AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)")->getResult());
        $data['program'] = COUNT($db->query("
            SELECT * 
            FROM program 
            WHERE fk_id_client = $pk_id_client
            AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)")->getResult());

        return view('client_area/pages/dashboard', $data);
    }

    public function program()
    {
        $data['sidebar'] = "program";
        $data['title'] = "Program";
        $data['breadcrumbs'] = ["Program"];
        $data['searchButton'] = true;

        return view('client_area/pages/program', $data);
        // echo "cek";
    }

    public function designProgram($pk_id_program)
    {
        // $db = db_connect();
        $program = $this->db->query("
            SELECT * 
            FROM program 
            WHERE pk_id_program = $pk_id_program
            AND fk_id_client = $this->pk_id_client")->getRowArray();
        
        if($program){
            $allProgram = $this->db->query("
                SELECT * 
                FROM program 
                WHERE fk_id_client = $this->pk_id_client
                AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL) ORDER BY nama_program")->getResultArray();
    
            $data['sidebar'] = "program";
            $data['title'] = "Design Program $program[nama_program]";
            $data['breadcrumbs'] = ["<a class='opacity-5 text-light' href='".base_url()."/clientarea/program'>Program</a>"];
            $data['searchButton'] = false;
            $data['deskripsi'] = "Menu untuk mengelola design pertemuan program $program[nama_program]";
            $data['pk_id_program'] = $pk_id_program;
    
            $data['breadcrumbSelect'] = [];
            if ($allProgram) {
                foreach ($allProgram as $i) {
                    if ($i['pk_id_program'] == $program['pk_id_program']) {
                        array_push($data['breadcrumbSelect'], "<option selected value='designProgram/$i[pk_id_program]'>$i[nama_program]</option>");
                    } else {
                        array_push($data['breadcrumbSelect'], "<option value='designProgram/$i[pk_id_program]'>$i[nama_program]</option>");
                    }
                }
            }
            
            return view('client_area/pages/design-program', $data);
        } else {
            $data['title'] = 'Ooops';
            return view('client_area/pages/404', $data);
        }
    }

    public function materiPertemuan($pk_id_pertemuan_program)
    {
        $pertemuan = $this->db->query("SELECT * FROM pertemuan_program WHERE pk_id_pertemuan_program  = $pk_id_pertemuan_program AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)")->getRowArray();
        $program = $this->db->query("
            SELECT * 
            FROM program 
            WHERE pk_id_program  = $pertemuan[fk_id_program] 
            AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            AND fk_id_client = $this->pk_id_client")->getRowArray();
        $allPertemuan = $this->db->query("SELECT * FROM pertemuan_program WHERE fk_id_program  = $pertemuan[fk_id_program] AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)")->getResultArray();

        if($program){
            $data['sidebar'] = "program";
            $data['title'] = "Design Materi $pertemuan[nama_pertemuan]";
            $data['breadcrumbs'] = ["<a class='opacity-5 text-light' href='".base_url()."/clientarea/program'>Program</a>", "<a class='opacity-5 text-light' href='".base_url()."/clientarea/designProgram/$program[pk_id_program]'>$program[nama_program]</a>"];
            $data['searchButton'] = false;
            $data['deskripsi'] = "Menu untuk mengelola materi $pertemuan[nama_pertemuan]";
            $data['pk_id_pertemuan_program'] = $pk_id_pertemuan_program;
    
            $data['breadcrumbSelect'] = [];
            if ($allPertemuan) {
                foreach ($allPertemuan as $i) {
                    if ($i['pk_id_pertemuan_program'] == $pertemuan['pk_id_pertemuan_program']) {
                        array_push($data['breadcrumbSelect'], "<option selected value='materiPertemuan/$i[pk_id_pertemuan_program]'>$i[nama_pertemuan] (Materi)</option>");
                    } else {
                        array_push($data['breadcrumbSelect'], "<option value='materiPertemuan/$i[pk_id_pertemuan_program]'>$i[nama_pertemuan] (Materi)</option>");
                    }
                    if ($i['tipe_latihan'] != 'tidak ada latihan' && $i['tipe_latihan'] != 'Pre Test TOEFL' && $i['tipe_latihan'] != 'Post Test TOEFL' && $i['tipe_latihan'] != 'Pre Test IELTS Listening' && $i['tipe_latihan'] != 'Pre Test IELTS Reading' && $i['tipe_latihan'] != 'Pre Test IELTS Writing' && $i['tipe_latihan'] != 'Pre Test IELTS' && $i['tipe_latihan'] != 'Post Test IELTS Listening' && $i['tipe_latihan'] != 'Post Test IELTS Reading' && $i['tipe_latihan'] != 'Post Test IELTS Writing' && $i['tipe_latihan'] != 'Post Test IELTS') {
                        array_push($data['breadcrumbSelect'], "<option value='latihanPertemuan/$i[pk_id_pertemuan_program]'>$i[nama_pertemuan] (Latihan)</option>");
                    }
                }
            }
    
            return view('client_area/pages/design-materi-pertemuan', $data);
        } else {
            $data['title'] = 'Ooops';
            return view('client_area/pages/404', $data);
        }
    }

    public function latihanPertemuan($pk_id_pertemuan_program)
    {
        $pertemuan = $this->db->query("SELECT * FROM pertemuan_program WHERE pk_id_pertemuan_program  = $pk_id_pertemuan_program AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)")->getRowArray();
        $program = $this->db->query("
            SELECT * 
            FROM program 
            WHERE pk_id_program  = $pertemuan[fk_id_program] 
            AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            AND fk_id_client = $this->pk_id_client
        ")->getRowArray();
        $allPertemuan = $this->db->query("SELECT * FROM pertemuan_program WHERE fk_id_program  = $pertemuan[fk_id_program] AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)")->getResultArray();

        if($program){
            $data['sidebar'] = "program";
            $data['title'] = "Design Latihan $pertemuan[nama_pertemuan]";
            $data['breadcrumbs'] = ["<a class='opacity-5 text-light' href='".base_url()."/program'>Program</a>", "<a class='opacity-5 text-light' href='".base_url()."/program/designProgram/$program[pk_id_program]'>$program[nama_program]</a>"];
            $data['searchButton'] = false;
            $data['deskripsi'] = "Menu untuk mengelola latihan $pertemuan[nama_pertemuan]";
            $data['pk_id_pertemuan_program'] = $pk_id_pertemuan_program;
            $data['breadcrumbSelect'] = [];
            if ($allPertemuan) {
                foreach ($allPertemuan as $i) {
                    array_push($data['breadcrumbSelect'], "<option value='materiPertemuan/$i[pk_id_pertemuan_program]'>$i[nama_pertemuan] (Materi)</option>");
                    if ($i['tipe_latihan'] != 'tidak ada latihan' && $i['tipe_latihan'] != 'Pre Test TOEFL' && $i['tipe_latihan'] != 'Post Test TOEFL' && $i['tipe_latihan'] != 'Pre Test IELTS Listening' && $i['tipe_latihan'] != 'Pre Test IELTS Reading' && $i['tipe_latihan'] != 'Pre Test IELTS Writing' && $i['tipe_latihan'] != 'Pre Test IELTS' && $i['tipe_latihan'] != 'Post Test IELTS Listening' && $i['tipe_latihan'] != 'Post Test IELTS Reading' && $i['tipe_latihan'] != 'Post Test IELTS Writing' && $i['tipe_latihan'] != 'Post Test IELTS') {
                        if ($i['pk_id_pertemuan_program'] == $pertemuan['pk_id_pertemuan_program']) {
                            array_push($data['breadcrumbSelect'], "<option selected value='latihanPertemuan/$i[pk_id_pertemuan_program]'>$i[nama_pertemuan] (Latihan)</option>");
                        } else {
                            array_push($data['breadcrumbSelect'], "<option value='latihanPertemuan/$i[pk_id_pertemuan_program]'>$i[nama_pertemuan] (Latihan)</option>");
                        }
                    }
                }
            }
    
            return view('client_area/pages/design-latihan-pertemuan', $data);
        } else {
            $data['title'] = 'Ooops';
            return view('client_area/pages/404', $data);
        }
    }

    public function member()
    {
        $data['sidebar'] = "member";
        $data['collapse'] = "member";
        $data['collapseItem'] = 'listMember';
        $data['title'] = "List Member";

        return view('client_area/pages/member', $data);
    }

    public function wl()
    {
        $data['sidebar'] = "member";
        $data['collapse'] = "member";
        $data['collapseItem'] = 'waitingList';
        $data['title'] = "Waiting List";

        return view('client_area/pages/wl', $data);
    }

    public function kelas()
    {
        $data['sidebar'] = "kelas";

        $data['title'] = "List Kelas";
        
        // $data['bulan'] = $this->db->query("SELECT * FROM config WHERE field = 'bulan'")->getRowArray();
        // $data['tahun'] = $this->db->query("SELECT * FROM config WHERE field = 'tahun'")->getRowArray();
        $data['bulan']['value'] = "";
        $data['tahun']['value'] = "";

        if($data['bulan']['value'] == "" && $data['tahun']['value'] == ""){
            $data['description'] = "List Kelas Lembaga Anda Seluruh Periode";
        } else if($data['bulan']['value'] == "" && $data['tahun']['value'] != ""){
            $data['description'] = "List Kelas Lembaga Anda Periode " . $data['tahun']['value'];
        } else if($data['tahun']['value'] == "" && $data['bulan']['value'] != ""){
            $data['description'] = "List Kelas Lembaga Anda Periode " . bulanIndonesia($data['bulan']['value']) . "";
        } else {
            $data['description'] = "List Kelas Lembaga Anda Periode " . bulanIndonesia($data['bulan']['value']) . " " .$data['tahun']['value'];
        }


        return view('client_area/pages/kelas', $data);
    }

    public function class($pk_id_kelas)
    {
        $data['kelas'] = $this->db->query("
            SELECT 
                a.*, 
                b.nama_program, 
                b.deskripsi, 
                (SELECT COUNT(*) FROM kelas_member WHERE MD5(fk_id_kelas) = '$pk_id_kelas' AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)) AS peserta 
            FROM kelas a
            JOIN program b ON a.fk_id_program = b.pk_id_program 
            WHERE MD5(pk_id_kelas) = '$pk_id_kelas'
            AND a.fk_id_client = $this->pk_id_client
        ")->getRowArray();
        
        $data['id_kelas'] = $pk_id_kelas;

        $data['sidebar'] = "kelas";
        $data['title'] = $data['kelas']['nama_kelas'];
        $data['breadcrumbs'] = ["<a class='opacity-5 text-light' href='".base_url()."/clientarea/kelas'>Kelas</a>", $data['kelas']['nama_kelas']];

        return view('client_area/pages/class', $data);
    }

    public function latihanPertemuanKelas($id_pertemuan)
    {
        $db = db_connect();

        $cek_data = $this->db->query("
            SELECT
                *
            FROM pertemuan_program_kelas a
            JOIN program b ON a.fk_id_program = b.pk_id_program
            WHERE MD5(pk_id_pertemuan_program_kelas) = '$id_pertemuan'
            AND b.fk_id_client = $this->pk_id_client
        ")->getRowArray();

        if($cek_data){
            $pertemuan = $db->query("
                SELECT * 
                FROM pertemuan_program_kelas 
                WHERE MD5(pk_id_pertemuan_program_kelas)  = '$id_pertemuan' 
                AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            ")->getRowArray();
            $program = $db->query("
                SELECT * 
                FROM program 
                WHERE pk_id_program  = $pertemuan[fk_id_program] 
                AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            ")->getRowArray();
            $allPertemuan = $db->query("
                SELECT * 
                FROM pertemuan_program_kelas 
                WHERE fk_id_program  = $pertemuan[fk_id_program] 
                AND fk_id_kelas = $pertemuan[fk_id_kelas] 
                AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            ")->getResultArray();
            $kelas = $db->query("
                SELECT * 
                FROM kelas 
                WHERE pk_id_kelas  = $pertemuan[fk_id_kelas] 
                AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)")->getRowArray();
    
            $data['sidebar'] = "kelas";
            $data['title'] = "Design Latihan $pertemuan[nama_pertemuan]";
            $data['breadcrumbs'] = [
                "<a class='opacity-5 text-light' href='".base_url()."/clientarea/kelas'>Kelas</a>", 
                "<a class='opacity-5 text-light' href='".base_url()."/clientarea/class/".md5($kelas['pk_id_kelas'])."'>$kelas[nama_kelas]</a>"
            ];
            $data['searchButton'] = false;
            $data['deskripsi'] = "Menu untuk mengelola latihan $pertemuan[nama_pertemuan] pada kelas $kelas[nama_kelas]";
            $data['pk_id_pertemuan_program_kelas'] = $id_pertemuan;
            $data['breadcrumbSelect'] = [];
            if ($allPertemuan) {
                foreach ($allPertemuan as $i) {
                    array_push($data['breadcrumbSelect'], "<option value='materiPertemuanKelas/".MD5($i['pk_id_pertemuan_program_kelas'])."'>$i[nama_pertemuan] (Materi)</option>");
                    if ($i['tipe_latihan'] != 'tidak ada latihan' && $i['tipe_latihan'] != 'Pre Test TOEFL' && $i['tipe_latihan'] != 'Post Test TOEFL' && $i['tipe_latihan'] != 'Pre Test IELTS Listening' && $i['tipe_latihan'] != 'Pre Test IELTS Reading' && $i['tipe_latihan'] != 'Pre Test IELTS Writing' && $i['tipe_latihan'] != 'Pre Test IELTS' && $i['tipe_latihan'] != 'Post Test IELTS Listening' && $i['tipe_latihan'] != 'Post Test IELTS Reading' && $i['tipe_latihan'] != 'Post Test IELTS Writing' && $i['tipe_latihan'] != 'Post Test IELTS') {
                        if ($i['pk_id_pertemuan_program_kelas'] == $pertemuan['pk_id_pertemuan_program_kelas']) {
                            array_push($data['breadcrumbSelect'], "<option selected value='latihanPertemuanKelas/".MD5($i['pk_id_pertemuan_program_kelas'])."'>$i[nama_pertemuan] (Latihan)</option>");
                        } else {
                            array_push($data['breadcrumbSelect'], "<option value='latihanPertemuanKelas/".MD5($i['pk_id_pertemuan_program_kelas'])."'>$i[nama_pertemuan] (Latihan)</option>");
                        }
                    }
                }
            }
    
            return view('client_area/pages/design-latihan-pertemuan-kelas', $data);
        } else {
            $data['title'] = 'Oops';
            return view('client_area/pages/404', $data);
        }
    }

    public function materiPertemuanKelas($pk_id_pertemuan_program_kelas)
    {
        $cek_data = $this->db->query("
            SELECT
                *
            FROM pertemuan_program_kelas a
            JOIN program b ON a.fk_id_program = b.pk_id_program
            WHERE MD5(pk_id_pertemuan_program_kelas) = '$pk_id_pertemuan_program_kelas'
            AND b.fk_id_client = $this->pk_id_client
        ")->getRowArray();

        if($cek_data){
            $pertemuan = $this->db->query("
                SELECT * 
                FROM 
                pertemuan_program_kelas 
                WHERE MD5(pk_id_pertemuan_program_kelas)  = '$pk_id_pertemuan_program_kelas' 
                AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            ")->getRowArray();
            $kelas = $this->db->query("
                SELECT * 
                FROM kelas 
                WHERE pk_id_kelas  = $pertemuan[fk_id_kelas] 
                AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            ")->getRowArray();
            $program = $this->db->query("
                SELECT * 
                FROM program 
                WHERE pk_id_program  = $pertemuan[fk_id_program] 
                AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            ")->getRowArray();
            $allPertemuan = $this->db->query("
                SELECT * 
                FROM pertemuan_program_kelas 
                WHERE fk_id_program  = $pertemuan[fk_id_program] 
                AND fk_id_kelas = $pertemuan[fk_id_kelas] 
                AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            ")->getResultArray();

            $data['sidebar'] = "program";
            $data['title'] = "Design Materi $pertemuan[nama_pertemuan]";
            $data['breadcrumbs'] = [
                "<a class='opacity-5 text-light' href='".base_url()."/clientarea/kelas'>Kelas</a>", 
                "<a class='opacity-5 text-light' href='".base_url()."/clientarea/class/".md5($kelas['pk_id_kelas'])."'>$kelas[nama_kelas]</a>"
            ];
            $data['searchButton'] = false;
            $data['deskripsi'] = "Menu untuk mengelola materi $pertemuan[nama_pertemuan] pada kelas $kelas[nama_kelas]";
            $data['pk_id_pertemuan_program_kelas'] = $pk_id_pertemuan_program_kelas;

            $data['breadcrumbSelect'] = [];
            if ($allPertemuan) {
                foreach ($allPertemuan as $i) {
                    if ($i['pk_id_pertemuan_program_kelas'] == $pertemuan['pk_id_pertemuan_program_kelas']) {
                        array_push($data['breadcrumbSelect'], "<option selected value='materiPertemuanKelas/".MD5($i['pk_id_pertemuan_program_kelas'])."'>$i[nama_pertemuan] (Materi)</option>");
                    } else {
                        array_push($data['breadcrumbSelect'], "<option value='materiPertemuanKelas/".MD5($i['pk_id_pertemuan_program_kelas'])."'>$i[nama_pertemuan] (Materi)</option>");
                    }
                    if ($i['tipe_latihan'] != 'tidak ada latihan' && $i['tipe_latihan'] != 'Pre Test TOEFL' && $i['tipe_latihan'] != 'Post Test TOEFL' && $i['tipe_latihan'] != 'Pre Test IELTS Listening' && $i['tipe_latihan'] != 'Pre Test IELTS Reading' && $i['tipe_latihan'] != 'Pre Test IELTS Writing' && $i['tipe_latihan'] != 'Pre Test IELTS' && $i['tipe_latihan'] != 'Post Test IELTS Listening' && $i['tipe_latihan'] != 'Post Test IELTS Reading' && $i['tipe_latihan'] != 'Post Test IELTS Writing' && $i['tipe_latihan'] != 'Post Test IELTS') {
                        array_push($data['breadcrumbSelect'], "<option value='latihanPertemuanKelas/".MD5($i['pk_id_pertemuan_program_kelas'])."'>$i[nama_pertemuan] (Latihan)</option>");
                    }
                }
            }

            return view('client_area/pages/design-materi-pertemuan-kelas', $data);
        } else {
            $data['title'] = 'Oops';
            return view('client_area/pages/404', $data);
        }
    }

    public function laporanStatistik(){
        $db = db_connect();
        $pk_id_client = $this->session->get('pk_id_client');
        // $data['bulan'] = $db->query("SELECT * FROM config WHERE field = 'bulan'")->getRowArray();
        // $data['tahun'] = $db->query("SELECT * FROM config WHERE field = 'tahun'")->getRowArray();

        // $bulan = $data['bulan']['value'];
        // $tahun = $data['tahun']['value'];

        $bulan = "";
        $tahun = "";

        if($bulan == "" && $tahun == ""){
            // $conditionSubscription = "subscription_member.hapus = 0";
            $conditionKelas = "fk_id_client = $pk_id_client AND (kelas.deleted_at = '0000-00-00 00:00:00' OR kelas.deleted_at IS NULL)";
        } else if($bulan == "" && $tahun != ""){
            // $conditionSubscription = "YEAR(tgl_mulai) = $tahun AND subscription_member.hapus = 0";
            $conditionKelas = "((YEAR(tgl_mulai) = $tahun OR YEAR(tgl_selesai) = $tahun)) AND (kelas.deleted_at = '0000-00-00 00:00:00' OR kelas.deleted_at IS NULL)";
        } else if($tahun == "" && $bulan != ""){
            // $conditionSubscription = "MONTH(tgl_mulai) = $bulan AND subscription_member.hapus = 0";
            $conditionKelas = "((MONTH(tgl_mulai) = $bulan OR MONTH(tgl_selesai) = $bulan)) AND (kelas.deleted_at = '0000-00-00 00:00:00' OR kelas.deleted_at IS NULL)";
            $whereCondition = "((MONTH(tgl_mulai) = $bulan OR MONTH(tgl_selesai) = $bulan)) AND (kelas.deleted_at = '0000-00-00 00:00:00' OR kelas.deleted_at IS NULL)";
        } else {
            // $conditionSubscription = "MONTH(tgl_mulai) = $bulan AND YEAR(tgl_mulai) = $tahun AND subscription_member.hapus = 0";
            $conditionKelas = "((MONTH(tgl_mulai) = $bulan OR MONTH(tgl_selesai) = $bulan) AND (YEAR(tgl_mulai) = $tahun OR YEAR(tgl_selesai) = $tahun)) AND (kelas.deleted_at = '0000-00-00 00:00:00' OR kelas.deleted_at IS NULL)";
            $whereCondition = "((MONTH(tgl_mulai) = $bulan OR MONTH(tgl_selesai) = $bulan) AND (YEAR(tgl_mulai) = $tahun OR YEAR(tgl_selesai) = $tahun)) AND (kelas.deleted_at = '0000-00-00 00:00:00' OR kelas.deleted_at IS NULL)";
        }

        $data['label'] = [];
        $data['data'] = [];
        $dataProgram = $db->query("
            SELECT * 
            FROM program 
            WHERE fk_id_client = $pk_id_client
            AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)")->getResultArray();

        foreach ($dataProgram as $key => $dataProgram) {
            $data['label'][$key] = $dataProgram['nama_program'];
            // $subscription = $db->query("SELECT COUNT(id_subscription_member) as subscription FROM subscription_member WHERE $conditionSubscription AND fk_id_program = $dataProgram[id_program]")->getRowArray();
            $kelas = $db->query("SELECT COUNT(pk_id_kelas) as kelas FROM kelas WHERE $conditionKelas AND fk_id_program = $dataProgram[pk_id_program]")->getRowArray();
            $member = $db->query("SELECT COUNT(pk_id_kelas_member) as member FROM kelas_member WHERE fk_id_kelas IN (SELECT pk_id_kelas FROM kelas WHERE $conditionKelas AND fk_id_program = $dataProgram[pk_id_program]) AND (kelas_member.deleted_at = '0000-00-00 00:00:00' OR kelas_member.deleted_at IS NULL)")->getRowArray();

            // if($subscription['subscription'] === null){
            //     $subscription['subscription'] = 0;
            // }

            if($kelas['kelas'] === null){
                $kelas['kelas'] = 0;
            }

            if($member['member'] === null){
                $member['member'] = 0;
            }
            
            // $data['subscription'][$key] = $subscription['subscription'];
            $data['kelas'][$key] = $kelas['kelas'];
            $data['member'][$key] = $member['member'];
        }

        return json_encode($data);
    }
}
