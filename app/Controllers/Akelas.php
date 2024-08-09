<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\AgentModel;
use App\Models\PertemuanKelasModel;
use App\Models\MateriPertemuanModel;
use Hermawan\DataTables\DataTable;
use JsonException;

class Akelas extends BaseController
{
    public $kelasModel;
    public $agentModel;
    public $pertemuanKelasModel;
    public $materiPertemuanModel;
    public $db;
    public $ses_pk_id_agent;
    public $ses_tipe_agent;

    public function __construct(){
        $this->kelasModel = new KelasModel();
        $this->agentModel = new AgentModel();
        $this->pertemuanKelasModel = new PertemuanKelasModel();
        $this->materiPertemuanModel = new MateriPertemuanModel();
        $this->db = db_connect();
        $this->ses_pk_id_agent = session()->get('pk_id_agent');
        $this->ses_tipe_agent = session()->get('tipe_agent');
    }

    public function index()
    {
        $data['sidebar'] = "kelas";
        $data['title'] = "Kelas";

        return view('agent_area/pages/list-kelas', $data);
    }

    public function kelas($pk_id_kelas)
    {
        $kelas = $this->db->query("SELECT * FROM kelas WHERE MD5(pk_id_kelas) = '$pk_id_kelas'")->getRowArray();
        $pertemuanProgram = $this->db->query("
            SELECT 
                pk_id_pertemuan_kelas
                , nama_pertemuan
                , a.deskripsi 
            FROM pertemuan_kelas a 
            WHERE a.fk_id_kelas = {$kelas['pk_id_kelas']} 
            AND (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            ORDER BY urutan ASC")->getResultArray();

        $data['pertemuanProgram'] = [];
        foreach ($pertemuanProgram as $i => $pertemuanProgram) {
            $data['pertemuanProgram'][$i] = $pertemuanProgram;
            $data['pertemuanProgram'][$i]['linkMateri'] = base_url()."/agentarea/materi/" . md5($pertemuanProgram['pk_id_pertemuan_kelas']);
        }

        $data['sidebar'] = "kelas";
        $data['breadcrumbs'] = ["<a class='opacity-5 text-light' href='".base_url()."/agentarea/kelas'>Kelas</a>", $kelas['nama_kelas']];
        $data['title'] = $kelas['nama_kelas'];
        $data['kelas'] = $kelas;

        return view('agent_area/pages/list-pertemuan-kelas', $data);
    }

    public function materi($pk_id_pertemuan_kelas)
    {
        $pertemuan = $this->db->query("SELECT * FROM pertemuan_kelas WHERE MD5(pk_id_pertemuan_kelas) = '$pk_id_pertemuan_kelas'")->getRowArray();
        $kelas = $this->db->query("SELECT nama_kelas, pk_id_kelas FROM kelas WHERE pk_id_kelas = {$pertemuan['fk_id_kelas']}")->getRowArray();
        $materi = $this->db->query("
            SELECT * 
            FROM materi_pertemuan 
            WHERE MD5(fk_id_pertemuan_kelas) = '$pk_id_pertemuan_kelas' 
            AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            ORDER BY urutan
        ")->getResultArray();

        $i = 0;

        $data['materi'] = [];
        foreach ($materi as $i => $materi) {
            $data['materi'][$i] = $materi;
            if ($materi['item'] == 'video') {
                $data['materi'][$i]['icon'] = 'ni-tv-2 text-gold-custom';
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Video</h6>
                <div class="ratio ratio-16x9">
                  <iframe class="object-fit-contain border rounded" src="' . $materi['data'] . '" allowfullscreen></iframe>
                </div>';
            } else if ($materi['item'] == 'file') {
                $data['materi'][$i]['icon'] = 'ni-single-copy-04 text-gold-custom';
                $data['materi'][$i]['data'] = '
                    <h6 class="text-dark text-sm font-weight-bold mb-2">File</h6>
                    <a href=\'javascript:void(0)\' class=\'btnPdf\' data-title=\'' . $materi['data'] . '\' data-url=\''.base_url().'/public/assets/materi-pertemuan/file/' . $materi['data'] . '\' data-bs-toggle="modal" data-bs-target="#pdfModal">
                        <span class="badge badge-sm bg-gradient-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                            <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                            </svg>
                            ' . $materi['data'] . '
                        </span>
                    </a>
                    <br>
                    <a class="btn btn-sm bg-gold-custom mt-2" href="'. base_url() .'/public/assets/materi-pertemuan/file/' . $materi['data'] . '" download="' . $materi['data'] . '">Download</a>
                    ';
            } else if ($materi['item'] == 'text') {
                $data['materi'][$i]['icon'] = 'ni-caps-small text-gold-custom';
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Text</h6><div class="text-dark">' . $materi['data'] . '</div>';
            } else if ($materi['item'] == 'audio') {
                $data['materi'][$i]['icon'] = 'ni-note-03 text-gold-custom';
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Audio</h6>
                <audio controls title="' . $materi['data'] . '">
                  <source src="' . base_url() . '/public/assets/materi-pertemuan/audio/' . $materi['data'] . '" type="audio/mpeg">
                </audio>
                <br>
                <a class="btn btn-sm bg-gold-custom mt-2" href="'. base_url() .'/public/assets/materi-pertemuan/audio/' . $materi['data'] . '" download="' . $materi['data'] . '">Download</a>
                ';
            } else if ($materi['item'] == 'image') {
                $data['materi'][$i]['icon'] = 'ni-image text-gold-custom';
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Gambar</h6>
                <a href=\'javascript:void(0)\' class=\'btnImage\' data-title=\''.$materi['data'].'\' data-url=\''.base_url().'/public/assets/materi-pertemuan/img/'.$materi['data'].'\' data-bs-toggle="modal" data-bs-target="#imageModal">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="ratio ratio-1x1">
                            <img src="' . base_url() . '/public/assets/materi-pertemuan/img/' . $materi['data'] . '" alt="gambar" onerror="this.onerror=null; this.src=\'../assets/img/curved-images/white-curved.jpg\'">
                            </div>
                        </div>
                    </div>
                </a>
                <br>
                <a class="btn btn-sm bg-gold-custom mt-2" href="'. base_url() .'/public/assets/materi-pertemuan/img/' . $materi['data'] . '" download="' . $materi['data'] . '">Download</a>
                ';
            }
        }

        $pertemuanTerakhir = $this->db->query("
            SELECT * 
            FROM pertemuan_kelas 
            WHERE fk_id_kelas = $pertemuan[fk_id_kelas] 
            AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL) 
            ORDER BY urutan DESC LIMIT 1")->getRowArray();

        $materi_pertemuan_member['pertemuan_terakhir'] = 'tidak';

        if($pertemuanTerakhir['pk_id_pertemuan_kelas'] == $pertemuan['pk_id_pertemuan_kelas']){
            $materi_pertemuan_member['pertemuan_terakhir'] = 'ya';
        }


        $i++;
        if($materi_pertemuan_member['pertemuan_terakhir'] == 'ya'){
            $data['materi'][$i]['icon'] = 'ni-check-bold text-success';
            $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Selesai</h6><div class="text-dark">
                    <p>Selamat, Anda telah berhasil menyelesaikan kelas ini!.</p>
                    </div>';
        }

        $navigasiPertemuan = $this->db->query("
            SELECT * 
            FROM pertemuan_kelas 
            WHERE fk_id_kelas = {$kelas['pk_id_kelas']} 
            AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            ORDER BY urutan
        ")->getResultArray();
        
        $arrNavigasi = [];
        foreach ($navigasiPertemuan as $i =>  $navigasiPertemuan) {
            $arrNavigasi[$i] = $navigasiPertemuan['pk_id_pertemuan_kelas'];
        }

        // var_dump($arrNavigasi);
        $result = array_search($pertemuan['pk_id_pertemuan_kelas'], $arrNavigasi);
        $data['navigasi'] = [];
        if(isset($arrNavigasi[$result - 1]) && isset($arrNavigasi[$result + 1])){
            $data['navigasi']['status'] = "lengkap";
            $data['navigasi']['before'] = "agentarea/materi/" . md5($arrNavigasi[$result - 1]);
            $data['navigasi']['next'] = "agentarea/materi/" . md5($arrNavigasi[$result + 1]);
        } else if(isset($arrNavigasi[$result - 1])){
            $data['navigasi']['status'] = "before";
            $data['navigasi']['before'] = "agentarea/materi/" . md5($arrNavigasi[$result - 1]);
            $data['navigasi']['next'] = "";
        } else if(isset($arrNavigasi[$result + 1])){
            $data['navigasi']['status'] = "next";
            $data['navigasi']['before'] = "";
            $data['navigasi']['next'] = "agentarea/materi/" . md5($arrNavigasi[$result + 1]);
        }



        $data['sidebar'] = "kelas";
        $data['breadcrumbs'] = ["<a class='opacity-5 text-light' href='".base_url()."/agentarea/kelas/" . md5($kelas['pk_id_kelas']) . "'>{$kelas['nama_kelas']}</a>", "{$pertemuan['nama_pertemuan']}"];
        $data['title'] = $pertemuan['nama_pertemuan'];
        // $data['materi'] = $materi;
        $data['deskripsi'] = "Menu ini berisikan list materi yang ada dalam {$pertemuan['nama_pertemuan']} kelas {$kelas['nama_kelas']}";

        return view('agent_area/pages/list-materi-pertemuan', $data);
    }

    public function getAllKelas()
    {
        // if($this->ses_tipe_agent == 'leader agent'){
        //     $kelas = $this->db->query("
        //         SELECT 
        //         *,
        //         'on' AS akses
        //         FROM kelas a
        //         where (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
        //         AND (a.akses_kelas = 'semua agent' OR a.akses_kelas = '$this->ses_tipe_agent')
        //     ")->getResultArray();
        // } else {
        //     $kelas = $this->db->query("
        //         SELECT 
        //         *,
        //         CASE 
        //             WHEN (a.akses_kelas = 'semua agent') THEN 'on'
        //             WHEN (a.akses_kelas LIKE '%$this->ses_tipe_agent%') THEN 'on'
        //             ELSE 'off'
        //         END AS akses
        //         FROM kelas a
        //         where (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
        //         ORDER BY akses DESC
        //     ")->getResultArray();
        // }

        $kelas = $this->db->query("
            SELECT
                *,
                CASE 
                    WHEN (a.akses_kelas = 'semua agent') THEN 'on'
                    WHEN (a.akses_kelas LIKE '%$this->ses_tipe_agent%') THEN 'on'
                    ELSE 'off'
                END AS akses
            FROM kelas a
            where (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND (a.show_kelas LIKE '%$this->ses_tipe_agent%' OR a.show_kelas = 'semua agent')
            ORDER BY akses DESC
        ")->getResultArray();

        $data = [];
        foreach ($kelas as $i => $kelas) {
            $data['kelas'][$i] = $kelas;
            $data['kelas'][$i]['classId'] = md5($kelas['pk_id_kelas']);
        }

        $data['agent'] = $this->agentModel->find($this->ses_pk_id_agent);

        return json_encode($data);
    }

    function getMessage(){
        $no_wa = $this->db->query("
            SELECT
                *
            FROM system_parameter
            WHERE setting_name = 'no_wa'
        ")->getRowArray();

        $message = $this->db->query("
            SELECT
                *
            FROM system_parameter
            WHERE setting_name = 'alert_kelas_message'
        ")->getRowArray();

        $data['no_wa'] = $no_wa['setting_value'];
        $data['message'] = $message['setting_value'];

        return json_encode($data);
    }
}