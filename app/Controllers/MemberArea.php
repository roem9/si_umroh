<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LatihanPertemuanMemberModel;
use App\Models\MateriPertemuanMemberModel;
use App\Models\KelasMemberModel;
use App\Models\LatihanPertemuanSubscriptionModel;
use App\Models\MateriPertemuanSubscriptionModel;
use App\Models\SubscriptionMemberModel;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use App\Libraries\Pdfgenerator;

class MemberArea extends BaseController
{
    public function myClass()
    {
        $session = session();
        $id_member = $session->get('id_member');
        $data['sidebar'] = "myClass";
        $data['title'] = "Kelas";

        $db = db_connect();
        $data['member'] = $db->query("SELECT * FROM member WHERE hapus = 0 AND id_member = $id_member")->getRowArray();

        return view('member/pages/list-kelas', $data);
    }

    public function mySubscription()
    {
        $session = session();
        $id_member = $session->get('id_member');
        $data['sidebar'] = "mySubscription";
        $data['title'] = "Subscription";

        $db = db_connect();
        $data['member'] = $db->query("SELECT * FROM member WHERE hapus = 0 AND id_member = $id_member")->getRowArray();

        return view('member/pages/subscription/list-subscription', $data);
    }

    public function myProfile()
    {
        $session = session();
        $id_member = $session->get('id_member');
        $data['sidebar'] = "profil";
        $data['title'] = "Profil";

        $db = db_connect();
        $data['profile'] = $db->query("SELECT * FROM member WHERE hapus = 0 AND id_member = $id_member")->getRowArray();
        return view('member/pages/profile', $data);
    }

    public function getAllKelas()
    {
        $session = session();
        $id_member = $session->get('id_member');

        $db = db_connect();
        $kelas = $db->query("SELECT 
            b.nama_kelas
            , DATE_FORMAT(b.tgl_mulai, '%d-%M-%Y') as tgl_mulai
            , DATE_FORMAT(b.tgl_selesai, '%d-%M-%Y') as tgl_selesai
            , b.fk_id_program
            , c.nama_program
            , a.id_kelas_member
            , c.image
            , c.deskripsi
            , b.id_kelas
            , a.sertifikat
            , b.tipe_kelas 
            , case when (DATEDIFF(NOW(), b.tgl_selesai) > 0) then 0 
              else 1 end as access
            , is_active
            FROM kelas_member as a JOIN kelas as b ON a.fk_id_kelas = b.id_kelas JOIN program as c ON b.fk_id_program = c.id_program WHERE a.hapus = 0 AND a.fk_id_member = $id_member")->getResultArray();

        $data = [];
        foreach ($kelas as $i => $kelas) {
            $data[$i] = $kelas;
            $data[$i]['classId'] = md5($kelas['id_kelas']);
            $data[$i]['certificateId'] = md5($kelas['id_kelas_member']);
            // $totalPertemuanProgram = COUNT($db->query("SELECT * FROM pertemuan_program WHERE fk_id_program = $kelas[fk_id_program] AND hapus = 0")->getResultArray());
            // $totalPertemuanMember = COUNT($db->query("SELECT * FROM materi_pertemuan_member WHERE fk_id_kelas_member = $kelas[id_kelas_member] AND selesai = 'selesai'")->getResultArray());

            // var_dump($kelas);

            $totalPertemuanProgram = COUNT($db->query("SELECT * FROM pertemuan_program_kelas WHERE fk_id_kelas = $kelas[id_kelas] AND hapus = 0")->getResultArray());
            // $totalPertemuanMember = COUNT($db->query("
            //     SELECT * 
            //     FROM pertemuan_program_kelas a
            //     JOIN latihan_pertemuan_member b ON a.id_pertemuan = b.fk_id_pertemuan
            //     WHERE fk_id_kelas_member = $kelas[id_kelas_member]")->getResultArray());

            $totalPertemuanMember = COUNT($db->query("SELECT * FROM pertemuan_program_kelas WHERE fk_id_kelas = $kelas[id_kelas] AND is_show = 1 AND hapus = 0")->getResultArray());

            if($totalPertemuanMember !== 0){
                $data[$i]['progress'] = floor(($totalPertemuanMember / $totalPertemuanProgram) * 100);
            } else {
                $data[$i]['progress'] = 0;
            }
        }

        return json_encode($data);
    }

    public function getAllSubscription()
    {
        $session = session();
        $id_member = $session->get('id_member');

        $db = db_connect();
        $kelas = $db->query("SELECT id_subscription_member, b.nama_program, a.fk_id_program, DATE_FORMAT(a.tgl_mulai, '%d-%M-%Y') as tgl_mulai, DATE_FORMAT(a.tgl_berakhir, '%d-%M-%Y') as tgl_berakhir, tgl_berakhir as date_berakhir, b.image, b.deskripsi, a.sertifikat FROM subscription_member as a JOIN program as b ON a.fk_id_program = b.id_program WHERE a.hapus = 0 AND a.fk_id_member = $id_member")->getResultArray();

        $data = [];
        foreach ($kelas as $i => $kelas) {
            $isActive = true;

            if($kelas['tgl_berakhir'] == NULL){
                $kelas['tgl_berakhir'] = '&#8734;';
            }

            // date berakhir digunakan untuk menampilkan catatan jika langganan sudah habis 
            if($kelas['date_berakhir'] != '0000-00-00'){
                if ($kelas['date_berakhir'] < date("Y-m-d")) {
                    $isActive = false;
                }
            }

            $data[$i] = $kelas;
            $data[$i]['classId'] = md5($kelas['fk_id_program']);
            $data[$i]['certificateId'] = md5($kelas['id_subscription_member']);
            $data[$i]['isActive'] = $isActive;
            $totalPertemuanProgram = COUNT($db->query("SELECT * FROM pertemuan_program WHERE fk_id_program = $kelas[fk_id_program] AND hapus = 0")->getResultArray());
            $totalPertemuanMember = COUNT($db->query("SELECT * FROM materi_pertemuan_subscription WHERE fk_id_subscription_member = $kelas[id_subscription_member] AND selesai = 'selesai'")->getResultArray());
            if($totalPertemuanMember !== 0){
                $data[$i]['progress'] = floor(($totalPertemuanMember / $totalPertemuanProgram) * 100);
            } else {
                $data[$i]['progress'] = 0;
            }
        }

        return json_encode($data);
    }

    public function class($id_kelas)
    {
        // get session id_member
        $session = session();
        $id_member = $session->get('id_member');

        $db = db_connect();
        // query untuk data kelas 
        $kelas_member = $db->query("SELECT * FROM kelas_member WHERE md5(fk_id_kelas) = '$id_kelas' AND fk_id_member = $id_member")->getRowArray();
        $member = $db->query("SELECT * FROM member WHERE id_member = $id_member")->getRowArray();
        $kelas = $db->query("SELECT id_kelas, nama_kelas, fk_id_program, tipe_kelas, nama_program, deskripsi, tgl_mulai, tgl_selesai FROM kelas a JOIN program b ON a.fk_id_program = b.id_program WHERE id_kelas = {$kelas_member['fk_id_kelas']}")->getRowArray();

        // update last access class
        $db->query("UPDATE kelas_member SET last_access = NOW() WHERE id_kelas_member = $kelas_member[id_kelas_member]");
        // delete notfi
        $db->query("DELETE FROM notif_member WHERE fk_id_kelas = $kelas_member[fk_id_kelas] AND fk_id_member = $kelas_member[fk_id_member]");


        // $materipertemuanMember = $db->query("SELECT * FROM materi_pertemuan_member WHERE fk_id_kelas_member = {$kelas_member['id_kelas_member']}")->getResultArray();

        // if($kelas['tipe_kelas'] == 'Reguler'){
        //     $materipertemuanMember = $db->query("
        //     SELECT b.* FROM pertemuan_program_kelas a 
        //     JOIN user_access b ON a.id_pertemuan = b.fk_id_pertemuan AND b.fk_id_kelas_member = $kelas_member[id_kelas_member]
        //     WHERE fk_id_kelas = $kelas_member[fk_id_kelas]")->getResultArray();
        // } else {
        //     $materipertemuanMember = $db->query("SELECT * FROM pertemuan_program_kelas WHERE fk_id_kelas = {$kelas_member['fk_id_kelas']}")->getResultArray();
        // }

        // jika tidak ada pertemuan maka tambahkan 1 pertemuan 
        // if (!$materipertemuanMember) {

        //     $pertemuanAwal = $db->query("SELECT id_pertemuan FROM pertemuan_program WHERE fk_id_program = {$kelas['fk_id_program']} AND urutan = 1 AND hapus = 0")->getRowArray();

        //     $dataPertemuan = [
        //         'fk_id_kelas_member' => $kelas_member['id_kelas_member'],
        //         'fk_id_pertemuan' => $pertemuanAwal['id_pertemuan']
        //     ];

        //     $model = new MateriPertemuanMemberModel();
        //     $model->save($dataPertemuan);
        // }

        // $pertemuanProgram = $db->query("SELECT id_pertemuan, nama_pertemuan, deskripsi FROM pertemuan_program as a JOIN program as b ON a.fk_id_program = b.id_program WHERE id_program = {$kelas['fk_id_program']} AND a.hapus = 0  ORDER BY urutan ASC")->getResultArray();

        if($kelas['tipe_kelas'] == 'Reguler'){
            // $materipertemuanMember = $db->query("
            // SELECT b.* FROM pertemuan_program_kelas a 
            // JOIN user_access b ON a.id_pertemuan = b.fk_id_pertemuan AND b.fk_id_kelas_member = $kelas_member[id_kelas_member]
            // WHERE fk_id_kelas = $kelas_member[fk_id_kelas]")->getResultArray();

            $pertemuanProgram = $db->query("
                SELECT 
                    id_pertemuan
                    , nama_pertemuan
                    , a.*
                    , is_show
                FROM pertemuan_program_kelas a 
                JOIN program as b ON a.fk_id_program = b.id_program
                JOIN user_access c ON a.id_pertemuan = c.fk_id_pertemuan AND c.fk_id_kelas_member = $kelas_member[id_kelas_member]
                WHERE a.fk_id_kelas = {$kelas['id_kelas']} AND a.hapus = 0  ORDER BY urutan ASC")->getResultArray();
        } else {
            $pertemuanProgram = $db->query("
                SELECT 
                    id_pertemuan
                    , nama_pertemuan
                    , a.deskripsi 
                    , is_show
                FROM pertemuan_program_kelas a 
                JOIN program as b ON a.fk_id_program = b.id_program
                WHERE a.fk_id_kelas = {$kelas['id_kelas']} AND a.hapus = 0  ORDER BY urutan ASC")->getResultArray();
        }

        $data['pertemuanProgram'] = [];
        foreach ($pertemuanProgram as $i => $pertemuanProgram) {
            $data['pertemuanProgram'][$i] = $pertemuanProgram;
            // $pertemuanMember = $db->query("SELECT id, selesai FROM materi_pertemuan_member WHERE fk_id_kelas_member = {$kelas_member['id_kelas_member']} AND fk_id_pertemuan = {$pertemuanProgram['id_pertemuan']}")->getRowArray();

            // if ($pertemuanMember) {
            $data['pertemuanProgram'][$i]['statusPertemuan'] = ($pertemuanProgram['is_show'] == '1') ? 'selesai' : 'belum tersedia';
            $data['pertemuanProgram'][$i]['linkMateri'] = base_url()."/materi/" . md5($pertemuanProgram['id_pertemuan']);
            // $data['pertemuanProgram'][$i]['linkMateri'] = base_url()."/materi/" . $pertemuanProgram['id_pertemuan'];
            // } else {
            //     $data['pertemuanProgram'][$i]['statusPertemuan'] = "belum tersedia";
            //     $data['pertemuanProgram'][$i]['linkMateri'] = "";
            // }
        }

        $data['sidebar'] = "myClass";
        $data['breadcrumbs'] = ["<a class='opacity-5 text-light' href='".base_url()."/myClass'>Kelas</a>", $kelas['nama_kelas']];
        $data['title'] = $kelas['nama_kelas'];
        $data['kelas'] = $kelas;
        $data['kelas_member'] = $kelas_member;
        $data['member'] = $member;
        $data['kelas']['sertifikat'] = $kelas_member['sertifikat'];

        return view('member/pages/list-pertemuan-kelas', $data);
    }

    public function subscription($id_program)
    {
        // get session id_member
        $session = session();
        $id_member = $session->get('id_member');

        $db = db_connect();
        // query untuk data kelas 
        $subscription_member = $db->query("SELECT * FROM subscription_member WHERE md5(fk_id_program) = '$id_program' AND fk_id_member = $id_member")->getRowArray();
        $program = $db->query("SELECT id_program, nama_program FROM program WHERE id_program = {$subscription_member['fk_id_program']}")->getRowArray();

        $materipertemuanMember = $db->query("SELECT * FROM materi_pertemuan_subscription WHERE fk_id_subscription_member = {$subscription_member['id_subscription_member']}")->getResultArray();

        // jika tidak ada pertemuan maka tambahkan 1 pertemuan 
        if (!$materipertemuanMember) {

            $pertemuanAwal = $db->query("SELECT id_pertemuan FROM pertemuan_program WHERE fk_id_program = {$program['id_program']} AND urutan = 1 AND hapus = 0")->getRowArray();

            $dataPertemuan = [
                'fk_id_subscription_member' => $subscription_member['id_subscription_member'],
                'fk_id_pertemuan' => $pertemuanAwal['id_pertemuan']
            ];

            $model = new MateriPertemuanSubscriptionModel();
            $model->save($dataPertemuan);
        }

        $pertemuanProgram = $db->query("SELECT id_pertemuan, nama_pertemuan, deskripsi FROM pertemuan_program as a JOIN program as b ON a.fk_id_program = b.id_program WHERE id_program = {$program['id_program']} AND a.hapus = 0  ORDER BY urutan ASC")->getResultArray();

        $data['pertemuanProgram'] = [];
        foreach ($pertemuanProgram as $i => $pertemuanProgram) {
            $data['pertemuanProgram'][$i] = $pertemuanProgram;
            $pertemuanMember = $db->query("SELECT id, selesai FROM materi_pertemuan_subscription WHERE fk_id_subscription_member = {$subscription_member['id_subscription_member']} AND fk_id_pertemuan = {$pertemuanProgram['id_pertemuan']}")->getRowArray();

            if ($pertemuanMember) {
                $data['pertemuanProgram'][$i]['statusPertemuan'] = ($pertemuanMember['selesai'] == 'selesai') ? 'selesai' : 'belum selesai';
                $data['pertemuanProgram'][$i]['linkMateri'] = base_url()."/materisubscription/" . md5($pertemuanMember['id']);
            } else {
                $data['pertemuanProgram'][$i]['statusPertemuan'] = "belum tersedia";
                $data['pertemuanProgram'][$i]['linkMateri'] = "";
            }
        }

        $data['sidebar'] = "mySubscription";
        $data['breadcrumbs'] = ["<a class='opacity-5 text-dark' href='".base_url()."/mySubscription'>Subscription</a>", $program['nama_program']];
        $data['title'] = $program['nama_program'];
        $data['kelas'] = $program;
        $data['kelas']['sertifikat'] = $subscription_member['sertifikat'];

        return view('member/pages/subscription/list-pertemuan-subscription', $data);
    }

    public function materi($id_materi_pertemuan_member)
    {
        $db = db_connect();

        $session = session();
        $id_member = $session->get('id_member');

        // $materi_pertemuan_member = $db->query("SELECT * FROM pertemuan WHERE md5(id_pertemuan) = '$id_materi_pertemuan_member'")->getRowArray();
        $pertemuan = $db->query("SELECT * FROM pertemuan_program_kelas WHERE MD5(id_pertemuan) = '$id_materi_pertemuan_member' AND hapus = 0")->getRowArray();
        $kelas_member = $db->query("SELECT * FROM kelas_member WHERE fk_id_member = {$id_member} AND fk_id_kelas = $pertemuan[fk_id_kelas]")->getRowArray();
        $kelas = $db->query("SELECT nama_kelas, id_kelas FROM kelas WHERE id_kelas = {$kelas_member['fk_id_kelas']} AND hapus = 0")->getRowArray();
        $latihan_pertemuan_member = $db->query("SELECT * FROM latihan_pertemuan_member WHERE fk_id_kelas_member = {$kelas_member['id_kelas_member']} AND fk_id_pertemuan = {$pertemuan['id_pertemuan']}")->getRowArray();
        $jumlahSoal = $db->query("SELECT * FROM latihan_pertemuan_kelas WHERE fk_id_pertemuan = {$pertemuan['id_pertemuan']} AND (item = 'soal-pg' OR item = 'soal-esai')")->getResultArray();
        $materi = $db->query("SELECT * FROM materi_pertemuan_kelas WHERE MD5(fk_id_pertemuan) = '$id_materi_pertemuan_member' ORDER BY urutan")->getResultArray();

        $i = 0;

        $data['materi'] = [];
        foreach ($materi as $i => $materi) {
            $data['materi'][$i] = $materi;
            if ($materi['item'] == 'video') {
                $data['materi'][$i]['icon'] = 'ni-tv-2 text-info';
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Video</h6>
                <div class="ratio ratio-16x9">
                  <iframe class="object-fit-contain border rounded" src="' . $materi['data'] . '" allowfullscreen></iframe>
                </div>';
            } else if ($materi['item'] == 'file') {
                $data['materi'][$i]['icon'] = 'ni-single-copy-04 text-info';
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">File</h6>
                <a href="' . base_url() . '/public/assets/materi-pertemuan/file/' . $materi['data'] . '" target="_blank" download="' . $materi['data'] . '">
                  <span class="badge badge-sm bg-gradient-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                      <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                      <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                    </svg>
                    ' . $materi['data'] . '
                  </span>
                </a>';
            } else if ($materi['item'] == 'text') {
                $data['materi'][$i]['icon'] = 'ni-caps-small text-info';
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Text</h6><div class="text-dark">' . $materi['data'] . '</div>';
            } else if ($materi['item'] == 'audio') {
                $data['materi'][$i]['icon'] = 'ni-note-03 text-info';
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Audio</h6>
                <audio controls title="' . $materi['data'] . '">
                  <source src="' . base_url() . '/public/assets/materi-pertemuan/audio/' . $materi['data'] . '" type="audio/mpeg">
                </audio>';
            } else if ($materi['item'] == 'image') {
                $data['materi'][$i]['icon'] = 'ni-image text-info';
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Image</h6>
                <div class="ratio ratio-1x1">
                  <img src="' . base_url() . '/public/assets/materi-pertemuan/img/' . $materi['data'] . '" alt="gambar" onerror="this.onerror=null; this.src=\'../assets/img/curved-images/white-curved.jpg\'">
                </div>';
            }
        }

        $i++;

        $listNilai = '';

        // untuk menambahkan latihan pertemuan 
        if($pertemuan['tipe_latihan'] == 'Pre Test TOEFL Listening' || $pertemuan['tipe_latihan'] == 'Pre Test TOEFL Structure' || $pertemuan['tipe_latihan'] == 'Pre Test TOEFL Reading' || $pertemuan['tipe_latihan'] == 'Pre Test TOEFL' || $pertemuan['tipe_latihan'] == 'Post Test TOEFL Listening' || $pertemuan['tipe_latihan'] == 'Post Test TOEFL Structure' || $pertemuan['tipe_latihan'] == 'Post Test TOEFL Reading' || $pertemuan['tipe_latihan'] == 'Post Test TOEFL'){
            $latihanPertemuan = $db->query("
                select 
                    a.*,
                    b.fk_id_member,
                    c.*
                from pertemuan_program_kelas as a
                join kelas_member as b on a.fk_id_kelas = b.fk_id_kelas
                join peserta_toefl as c on b.id_kelas_member = c.fk_id_kelas_member and a.id_pertemuan = c.fk_id_pertemuan
                where b.id_kelas_member = $kelas_member[id_kelas_member] AND a.tipe_latihan = '$pertemuan[tipe_latihan]'
            ")->getRowArray();
            if ($latihanPertemuan) {
                $data['materi'][$i]['icon'] = 'ni-user-run text-warning';
                if($pertemuan['tipe_latihan'] == 'Pre Test TOEFL Listening' || $pertemuan['tipe_latihan'] == 'Post Test TOEFL Listening'){
                    $listNilai = '
                        Listening = '.poin("Listening", $latihanPertemuan['nilai_listening']).'
                    ';
                } else if($pertemuan['tipe_latihan'] == 'Pre Test TOEFL Structure' || $pertemuan['tipe_latihan'] == 'Post Test TOEFL Structure'){
                    $listNilai = '
                        Structure = '.poin("Structure", $latihanPertemuan['nilai_structure']).'
                    ';
                } else if($pertemuan['tipe_latihan'] == 'Pre Test TOEFL Reading' || $pertemuan['tipe_latihan'] == 'Post Test TOEFL Reading'){
                    $listNilai = '
                        Reading = '.poin("Reading", $latihanPertemuan['nilai_reading']).'
                    ';
                } else if($pertemuan['tipe_latihan'] == 'Pre Test TOEFL' || $pertemuan['tipe_latihan'] == 'Post Test TOEFL'){
                    $listNilai = '
                        Listening = '.poin("Listening", $latihanPertemuan['nilai_listening']).' <br>
                        Structure = '.poin("Structure", $latihanPertemuan['nilai_structure']).' <br>
                        Reading = '.poin("Reading", $latihanPertemuan['nilai_reading']).' <br>
                        SKOR = '.skor($latihanPertemuan['nilai_listening'], $latihanPertemuan['nilai_structure'], $latihanPertemuan['nilai_reading']) .'
                    ';
                }

                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Latihan</h6><div class="text-dark">
                    <p>
                        ' . $pertemuan['tipe_latihan'] . '<br><br>
                        ' .$listNilai. '
                    </p>
                </div>';
            } else {
                $data['materi'][$i]['icon'] = 'ni-user-run text-warning';
                if ($latihan_pertemuan_member) {
                    $button = '<span class="badge bg-gradient-success me-1">Nilai : ' . $latihan_pertemuan_member['nilai'] . ' / ' . COUNT($jumlahSoal) . '</span>';
                } else {
                    $button = '<a target="_blank" href="'.base_url().'/toefl/' . md5($kelas_member['id_kelas_member']) . '/' . md5($pertemuan['id_pertemuan']) . '"><span class="badge badge-sm bg-gradient-warning me-1">latihan</span></a>';
                }
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Latihan</h6><div class="text-dark">
                    <p>untuk mengerjakan latihan pada pertemuan ini silakan menekan tombol latihan dibawah ini. Anda hanya diberi kesempatan satu kali untuk mengisi latihan.</p>
                    ' . $button . '
                </div>';
            }
        } else if($pertemuan['tipe_latihan'] == 'Pre Test IELTS Listening' || $pertemuan['tipe_latihan'] == 'Pre Test IELTS Reading' || $pertemuan['tipe_latihan'] == 'Pre Test IELTS Writing' || $pertemuan['tipe_latihan'] == 'Pre Test IELTS Speaking' || $pertemuan['tipe_latihan'] == 'Pre Test IELTS' || $pertemuan['tipe_latihan'] == 'Post Test IELTS Listening' || $pertemuan['tipe_latihan'] == 'Post Test IELTS Reading' || $pertemuan['tipe_latihan'] == 'Post Test IELTS Writing' || $pertemuan['tipe_latihan'] == 'Post Test IELTS Speaking' || $pertemuan['tipe_latihan'] == 'Post Test IELTS'){
            $latihanPertemuan = $db->query("
                select 
                    a.*,
                    b.fk_id_member,
                    c.*
                from pertemuan_program_kelas as a
                join kelas_member as b on a.fk_id_kelas = b.fk_id_kelas
                join peserta_ielts as c on b.id_kelas_member = c.fk_id_kelas_member and a.id_pertemuan = c.fk_id_pertemuan
                where b.id_kelas_member = $kelas_member[id_kelas_member] AND a.tipe_latihan = '$pertemuan[tipe_latihan]'
            ")->getRowArray();
            if ($latihanPertemuan) {
                $data['materi'][$i]['icon'] = 'ni-user-run text-warning';
                if($pertemuan['tipe_latihan'] == 'Pre Test IELTS Listening' || $pertemuan['tipe_latihan'] == 'Post Test IELTS Listening'){
                    $listNilai = '
                        Listening = '.$latihanPertemuan['nilai_listening'].'
                    ';
                } else if($pertemuan['tipe_latihan'] == 'Pre Test IELTS Reading' || $pertemuan['tipe_latihan'] == 'Post Test IELTS Reading'){
                    $listNilai = '
                        Reading = '.$latihanPertemuan['nilai_reading'].'
                    ';
                } else if($pertemuan['tipe_latihan'] == 'Pre Test IELTS Speaking' || $pertemuan['tipe_latihan'] == 'Post Test IELTS Speaking'){
                    $listNilai = '
                        Speaking = '.$latihanPertemuan['nilai_speaking'].'
                    ';
                } else if($pertemuan['tipe_latihan'] == 'Pre Test IELTS Writing' || $pertemuan['tipe_latihan'] == 'Post Test IELTS Writing'){
                    $listNilai = '
                        Writing = '.$latihanPertemuan['nilai_writing'].'
                    ';
                } else if($pertemuan['tipe_latihan'] == 'Pre Test IELTS' || $pertemuan['tipe_latihan'] == 'Post Test IELTS'){
                    $listNilai = '
                        Listening = '.$latihanPertemuan['nilai_listening'].' <br>
                        Structure = '.$latihanPertemuan['nilai_structure'].' <br>
                        Reading = '.$latihanPertemuan['nilai_reading'].' <br>
                        Speaking = '.$latihanPertemuan['nilai_speaking'].' <br>
                        Writing = '.$latihanPertemuan['nilai_writing'].' <br>
                    ';
                }

                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Latihan</h6><div class="text-dark">
                    <p>
                        ' . $pertemuan['tipe_latihan'] . '<br><br>
                        ' .$listNilai. '
                    </p>
                </div>';
            } else {
                $data['materi'][$i]['icon'] = 'ni-user-run text-warning';
                if ($latihan_pertemuan_member) {
                    $button = '<span class="badge bg-gradient-success me-1">Nilai : ' . $latihan_pertemuan_member['nilai'] . ' / ' . COUNT($jumlahSoal) . '</span>';
                } else {
                    $button = '<a target="_blank" href="'.base_url().'/ielts/' . md5($kelas_member['id_kelas_member']) . '/' . md5($pertemuan['id_pertemuan']) . '"><span class="badge badge-sm bg-gradient-warning me-1">latihan</span></a>';
                }
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Latihan</h6><div class="text-dark">
                    <p>untuk mengerjakan latihan pada pertemuan ini silakan menekan tombol latihan dibawah ini. Anda hanya diberi kesempatan satu kali untuk mengisi latihan.</p>
                    ' . $button . '
                </div>';
            }
        } else if ($pertemuan['tipe_latihan'] != 'Tidak Ada Latihan') {
            $data['materi'][$i]['icon'] = 'ni-user-run text-warning';
            if ($pertemuan['pengulangan_latihan'] == 'Sekali') {
                if ($latihan_pertemuan_member) {
                    $button = '<span class="badge bg-gradient-success me-1">Nilai : ' . $latihan_pertemuan_member['nilai'] . ' / ' . COUNT($jumlahSoal) . '</span>';
                } else {
                    $button = '<a href="'.base_url().'/latihan/' . md5($kelas_member['id_kelas_member']) . '/' . md5($pertemuan['id_pertemuan']) . '"><span class="badge badge-sm bg-gradient-warning me-1">latihan</span></a>';
                }
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Latihan</h6><div class="text-dark">
                    <p>untuk mengerjakan latihan pada pertemuan ini silakan menekan tombol latihan dibawah ini. Anda hanya diberi kesempatan satu kali untuk mengisi latihan.</p>
                    ' . $button . '
                </div>';
            } else {
                if ($latihan_pertemuan_member) {
                    $button = '<span class="badge bg-gradient-success me-1">Nilai : ' . $latihan_pertemuan_member['nilai'] . ' / ' . COUNT($jumlahSoal) . '</span>';
                    $button .= '<a href="'.base_url().'/latihan/' . md5($kelas_member['id_kelas_member']) . '/' . md5($pertemuan['id_pertemuan']) . '"><span class="badge badge-sm bg-gradient-warning me-1">latihan</span></a>';
                } else {
                    $button = '<a href="'.base_url().'/latihan/' . md5($kelas_member['id_kelas_member']) . '/' . md5($pertemuan['id_pertemuan']) . '"><span class="badge badge-sm bg-gradient-warning me-1">latihan</span></a>';
                }
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Latihan</h6><div class="text-dark">
                <p>untuk mengerjakan latihan pada pertemuan ini silakan menekan tombol latihan dibawah ini</p>
                ' . $button . '
                </div>';
            }
        }

        $pertemuanTerakhir = $db->query("SELECT * FROM pertemuan_program_kelas WHERE fk_id_kelas = $pertemuan[fk_id_kelas] AND hapus = 0 ORDER BY urutan DESC LIMIT 1")->getRowArray();

        $selesaiPertemuan = $db->query("SELECT * FROM latihan_pertemuan_member WHERE fk_id_kelas_member = $kelas_member[id_kelas_member] AND fk_id_pertemuan = $pertemuan[id_pertemuan]")->getRowArray();

        $materi_pertemuan_member['pertemuan_terakhir'] = 'tidak';
        $materi_pertemuan_member['selesai'] = 'belum selesai';

        if($selesaiPertemuan){
            $materi_pertemuan_member['selesai'] = 'selesai';
        }

        if($pertemuanTerakhir['id_pertemuan'] == $pertemuan['id_pertemuan']){
            $materi_pertemuan_member['pertemuan_terakhir'] = 'ya';
        }



        // button untuk lanjut ke pertemuan selanjutnya
        if ($latihan_pertemuan_member || $pertemuan['tipe_latihan'] == 'Tidak Ada Latihan') {
            $i++;
            $data['materi'][$i]['icon'] = 'ni-check-bold text-success';
            if($materi_pertemuan_member['pertemuan_terakhir'] == 'ya'){
                if($materi_pertemuan_member['selesai'] == 'belum selesai'){
                    $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Selesai</h6><div class="text-dark">
                        <p>Selamat, Anda telah berhasil menyelesaikan kelas ini!. Silakan tandai selesai kemudian download sertifikat Anda di menu kelas</p>
                        <a href="'.base_url().'/materiSelesai/'.md5($pertemuan['id_pertemuan']).'"><span class="badge badge-sm bg-gradient-success me-1">Selesai</span></a>
                        </div>';
                } else {
                    $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Selesai</h6><div class="text-dark">
                        <p>Selamat, Anda telah berhasil menyelesaikan kelas ini!. Silakan download sertifikat Anda di menu kelas</p>
                            <a href="'.base_url().'/myClass"><span class="badge badge-sm bg-gradient-success me-1">Kelas</span></a>
                        </div>';
                }
            } else if($materi_pertemuan_member['selesai'] == 'belum selesai'){
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Selesai</h6><div class="text-dark">
                    <p>Selamat, Anda telah berhasil menyelesaikan materi ini. Terus berkembang dan jangan berhenti belajar!</p>
                    </div>';
            } else {
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Selesai</h6><div class="text-dark">
                    <p>Selamat, Anda telah berhasil menyelesaikan materi ini. Terus berkembang dan jangan berhenti belajar!</p>
                    </div>';
            }
        }

        // button navigasi pindah ke pertemuan
        // $navigasiPertemuan = $db->query("SELECT * FROM materi_pertemuan_member WHERE fk_id_kelas_member = {$materi_pertemuan_member['fk_id_kelas_member']}")->getResultArray();
        $navigasiPertemuan = $db->query("SELECT * FROM pertemuan_program_kelas WHERE fk_id_kelas = {$kelas['id_kelas']} AND hapus = 0 AND is_show = 1 ORDER BY urutan")->getResultArray();
        
        $arrNavigasi = [];
        foreach ($navigasiPertemuan as $i =>  $navigasiPertemuan) {
            $arrNavigasi[$i] = $navigasiPertemuan['id_pertemuan'];
        }

        // var_dump($arrNavigasi);
        $result = array_search($pertemuan['id_pertemuan'], $arrNavigasi);
        $data['navigasi'] = [];
        if(isset($arrNavigasi[$result - 1]) && isset($arrNavigasi[$result + 1])){
            $data['navigasi']['status'] = "lengkap";
            $data['navigasi']['before'] = "materi/" . md5($arrNavigasi[$result - 1]);
            $data['navigasi']['next'] = "materi/" . md5($arrNavigasi[$result + 1]);
        } else if(isset($arrNavigasi[$result - 1])){
            $data['navigasi']['status'] = "before";
            $data['navigasi']['before'] = "materi/" . md5($arrNavigasi[$result - 1]);
            $data['navigasi']['next'] = "";
        } else if(isset($arrNavigasi[$result + 1])){
            $data['navigasi']['status'] = "next";
            $data['navigasi']['before'] = "";
            $data['navigasi']['next'] = "materi/" . md5($arrNavigasi[$result + 1]);
        }



        $data['sidebar'] = "myClass";
        $data['breadcrumbs'] = ["<a class='opacity-5 text-light' href='".base_url()."/class/" . md5($kelas['id_kelas']) . "'>{$kelas['nama_kelas']}</a>", "{$pertemuan['nama_pertemuan']}"];
        $data['title'] = $pertemuan['nama_pertemuan'];
        // $data['materi'] = $materi;
        $data['deskripsi'] = "Menu ini berisikan list materi yang ada dalam {$pertemuan['nama_pertemuan']} kelas {$kelas['nama_kelas']}";

        return view('member/pages/list-materi-pertemuan', $data);
    }

    // sampai sini 
    public function materiSubscription($id_materi_pertemuan_member)
    {
        $db = db_connect();
        $materi_pertemuan_member = $db->query("SELECT * FROM materi_pertemuan_subscription WHERE md5(id) = '$id_materi_pertemuan_member'")->getRowArray();
        $subscription_member = $db->query("SELECT * FROM subscription_member WHERE id_subscription_member = {$materi_pertemuan_member['fk_id_subscription_member']}")->getRowArray();
        $program = $db->query("SELECT nama_program, id_program FROM program WHERE id_program = {$subscription_member['fk_id_program']} AND hapus = 0")->getRowArray();
        $pertemuan = $db->query("SELECT * FROM pertemuan_program WHERE id_pertemuan = {$materi_pertemuan_member['fk_id_pertemuan']} AND hapus = 0")->getRowArray();
        $latihan_pertemuan_member = $db->query("SELECT * FROM latihan_pertemuan_subscription WHERE fk_id_subscription_member = {$materi_pertemuan_member['fk_id_subscription_member']} AND fk_id_pertemuan = {$pertemuan['id_pertemuan']}")->getRowArray();
        $jumlahSoal = $db->query("SELECT * FROM latihan_pertemuan WHERE fk_id_pertemuan = {$pertemuan['id_pertemuan']} AND (item = 'soal-pg' OR item = 'soal-esai')")->getResultArray();
        $materi = $db->query("SELECT * FROM materi_pertemuan WHERE fk_id_pertemuan = {$materi_pertemuan_member['fk_id_pertemuan']} ORDER BY urutan")->getResultArray();

        $data['materi'] = [];
        foreach ($materi as $i => $materi) {
            $data['materi'][$i] = $materi;
            if ($materi['item'] == 'video') {
                $data['materi'][$i]['icon'] = 'ni-tv-2 text-info';
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Video</h6>
                <div class="ratio ratio-16x9">
                  <iframe class="object-fit-contain border rounded" src="' . $materi['data'] . '" allowfullscreen></iframe>
                </div>';
            } else if ($materi['item'] == 'file') {
                $data['materi'][$i]['icon'] = 'ni-single-copy-04 text-info';
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">File</h6>
                <a href="' . base_url() . '/public/assets/materi-pertemuan/file/' . $materi['data'] . '" target="_blank" download="' . $materi['data'] . '">
                  <span class="badge badge-sm bg-gradient-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                      <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                      <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                    </svg>
                    ' . $materi['data'] . '
                  </span>
                </a>';
            } else if ($materi['item'] == 'text') {
                $data['materi'][$i]['icon'] = 'ni-caps-small text-info';
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Text</h6><div class="text-dark">' . $materi['data'] . '</div>';
            } else if ($materi['item'] == 'audio') {
                $data['materi'][$i]['icon'] = 'ni-note-03 text-info';
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Audio</h6>
                <audio controls title="' . $materi['data'] . '">
                  <source src="' . base_url() . '/public/assets/materi-pertemuan/audio/' . $materi['data'] . '" type="audio/mpeg">
                </audio>';
            } else if ($materi['item'] == 'image') {
                $data['materi'][$i]['icon'] = 'ni-image text-info';
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Image</h6>
                <div class="ratio ratio-1x1">
                  <img src="' . base_url() . '/public/assets/materi-pertemuan/img/' . $materi['data'] . '" alt="gambar" onerror="this.onerror=null; this.src=\'../assets/img/curved-images/white-curved.jpg\'">
                </div>';
            }
        }

        // untuk menambahkan latihan pertemuan 
        if ($pertemuan['tipe_latihan'] != 'Tidak Ada Latihan') {
            $i++;
            $data['materi'][$i]['icon'] = 'ni-user-run text-warning';
            if ($pertemuan['pengulangan_latihan'] == 'Sekali') {
                if ($latihan_pertemuan_member) {
                    $button = '<span class="badge bg-gradient-success me-1">Nilai : ' . $latihan_pertemuan_member['nilai'] . ' / ' . COUNT($jumlahSoal) . '</span>';
                } else {
                    $button = '<a href="'.base_url().'/latihansubscription/' . md5($subscription_member['id_subscription_member']) . '/' . md5($pertemuan['id_pertemuan']) . '"><span class="badge badge-sm bg-gradient-warning me-1">latihan</span></a>';
                }
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Latihan</h6><div class="text-dark">
                    <p>untuk mengerjakan latihan pada pertemuan ini silakan menekan tombol latihan dibawah ini. Anda hanya diberi kesempatan satu kali untuk mengisi latihan.</p>
                    ' . $button . '
                </div>';
            } else {
                if ($latihan_pertemuan_member) {
                    $button = '<span class="badge bg-gradient-success me-1">Nilai : ' . $latihan_pertemuan_member['nilai'] . ' / ' . COUNT($jumlahSoal) . '</span>';
                    $button .= '<a href="'.base_url().'/latihansubscription/' . md5($subscription_member['id_subscription_member']) . '/' . md5($pertemuan['id_pertemuan']) . '"><span class="badge badge-sm bg-gradient-warning me-1">latihan</span></a>';
                } else {
                    $button = '<a href="'.base_url().'/latihansubscription/' . md5($subscription_member['id_subscription_member']) . '/' . md5($pertemuan['id_pertemuan']) . '"><span class="badge badge-sm bg-gradient-warning me-1">latihan</span></a>';
                }
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Latihan</h6><div class="text-dark">
                <p>untuk mengerjakan latihan pada pertemuan ini silakan menekan tombol latihan dibawah ini</p>
                ' . $button . '
                </div>';
            }
        }

        // button untuk lanjut ke pertemuan selanjutnya
        if ($latihan_pertemuan_member || $pertemuan['tipe_latihan'] == 'Tidak Ada Latihan') {
            $i++;
            $data['materi'][$i]['icon'] = 'ni-check-bold text-success';
            if($materi_pertemuan_member['pertemuan_terakhir'] == 'ya'){
                if($materi_pertemuan_member['selesai'] == 'belum selesai'){
                    $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Selesai</h6><div class="text-dark">
                        <p>Selamat, Anda telah berhasil menyelesaikan kelas ini!. Silakan tandai selesai kemudian download sertifikat Anda di menu kelas</p>
                        <a href="'.base_url().'/materiSubscriptionSelesai/'.md5($materi_pertemuan_member['id']).'"><span class="badge badge-sm bg-gradient-success me-1">Selesai</span></a>
                        </div>';
                } else {
                    $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Selesai</h6><div class="text-dark">
                        <p>Selamat, Anda telah berhasil menyelesaikan program ini!. Silakan download sertifikat Anda di menu subscription</p>
                            <a href="'.base_url().'/mySubscription"><span class="badge badge-sm bg-gradient-success me-1">Subscription</span></a>
                        </div>';
                }
            } else if($materi_pertemuan_member['selesai'] == 'belum selesai'){
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Selesai</h6><div class="text-dark">
                    <p>Selamat, Anda telah berhasil menyelesaikan materi ini. Terus berkembang dan jangan berhenti belajar!</p>
                    <a href="'.base_url().'/materiSubscriptionSelesai/'.md5($materi_pertemuan_member['id']).'"><span class="badge badge-sm bg-gradient-success me-1">materi selanjutnya</span></a>
                    </div>';
            } else {
                $data['materi'][$i]['data'] = '<h6 class="text-dark text-sm font-weight-bold mb-2">Selesai</h6><div class="text-dark">
                    <p>Selamat, Anda telah berhasil menyelesaikan materi ini. Terus berkembang dan jangan berhenti belajar!</p>
                    </div>';
            }
        }

        // button navigasi pindah ke pertemuan
        $navigasiPertemuan = $db->query("SELECT * FROM materi_pertemuan_subscription WHERE fk_id_subscription_member = {$materi_pertemuan_member['fk_id_subscription_member']}")->getResultArray();
        
        $arrNavigasi = [];
        foreach ($navigasiPertemuan as $i =>  $navigasiPertemuan) {
            $arrNavigasi[$i] = $navigasiPertemuan['id'];
        }

        // var_dump($arrNavigasi);
        $result = array_search($materi_pertemuan_member['id'], $arrNavigasi);
        $data['navigasi'] = [];
        if(isset($arrNavigasi[$result - 1]) && isset($arrNavigasi[$result + 1])){
            $data['navigasi']['status'] = "lengkap";
            $data['navigasi']['before'] = "materisubscription/" . md5($arrNavigasi[$result - 1]);
            $data['navigasi']['next'] = "materisubscription/" . md5($arrNavigasi[$result + 1]);
        } else if(isset($arrNavigasi[$result - 1])){
            $data['navigasi']['status'] = "before";
            $data['navigasi']['before'] = "materisubscription/" . md5($arrNavigasi[$result - 1]);
            $data['navigasi']['next'] = "";
        } else if(isset($arrNavigasi[$result + 1])){
            $data['navigasi']['status'] = "next";
            $data['navigasi']['before'] = "";
            $data['navigasi']['next'] = "materisubscription/" . md5($arrNavigasi[$result + 1]);
        }



        $data['sidebar'] = "mySubscription";
        $data['breadcrumbs'] = ["<a class='opacity-5 text-dark' href='".base_url()."/subscription/" . md5($program['id_program']) . "'>{$program['nama_program']}</a>", "{$pertemuan['nama_pertemuan']}"];
        $data['title'] = $pertemuan['nama_pertemuan'];
        // $data['materi'] = $materi;
        $data['deskripsi'] = "Menu ini berisikan list materi yang ada dalam {$pertemuan['nama_pertemuan']} program {$program['nama_program']}";

        return view('member/pages/list-materi-pertemuan', $data);
    }

    public function latihan($fk_id_kelas_member, $id_pertemuan)
    {
        // var_dump($fk_id_kelas_member, $id_pertemuan);
        $db = db_connect();
        // $materi_pertemuan_member = $db->query("SELECT * FROM materi_pertemuan_member WHERE md5(fk_id_kelas_member) = '$fk_id_kelas_member' AND md5(fk_id_pertemuan) = '$id_pertemuan'")->getRowArray();
        $pertemuan = $db->query("SELECT * FROM pertemuan_program_kelas WHERE md5(id_pertemuan) = '$id_pertemuan' AND hapus = 0")->getRowArray();
        $kelas_member = $db->query("SELECT * FROM kelas_member WHERE md5(id_kelas_member) = '$fk_id_kelas_member'")->getRowArray();
        $kelas = $db->query("SELECT nama_kelas, id_kelas FROM kelas WHERE id_kelas = {$kelas_member['fk_id_kelas']} AND hapus = 0")->getRowArray();
        $latihan = $db->query("SELECT * FROM latihan_pertemuan_kelas WHERE md5(fk_id_pertemuan) = '$id_pertemuan' ORDER BY urutan")->getResult();
        $latihanMember = $db->query("SELECT * FROM latihan_pertemuan_member WHERE md5(fk_id_kelas_member) = '$fk_id_kelas_member' AND md5(fk_id_pertemuan) = '$id_pertemuan'")->getRowArray();
        $jumlahSoal = $db->query("SELECT * FROM latihan_pertemuan_kelas WHERE md5(fk_id_pertemuan) = '$id_pertemuan' AND (item = 'soal-pg' OR item = 'soal-esai')")->getResultArray();

        $data['latihan'] = [];
        $nomor = 0;
        $index = 0;

        foreach ($latihan as $i => $latihan) {
            $obj = $latihan;
            if ($obj->item == 'video') {
                $data['latihan'][$i]['data'] = "<div class=\"ratio ratio-16x9\">
                <iframe class=\"object-fit-contain border rounded\" src=\"{$obj->data}\" allowfullscreen></iframe>
              </div>";
            } else if ($obj->item == 'petunjuk' || $obj->item == 'soal-pg' || $obj->item == 'soal-esai') {
                if ($obj->item == 'petunjuk') {
                    $data['latihan'][$i]['data'] = $obj->data;
                } else if ($obj->item == 'soal-pg') {
                    $nomor++;

                    $soal = json_decode($obj->data);
                    $soalWithNumber = preg_replace("/<p>/", "<p>$nomor. ", $soal->soal, 1);

                    $data['latihan'][$i]['data'] = $soalWithNumber;
                    $data['latihan'][$i]['data'] .= "<input type=\"hidden\" name=\"jawaban[$index]\" value=\"null\">";
                    foreach ($soal->pilihan as $z => $pilihan) {
                        $data['latihan'][$i]['data'] .= "<div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"radio\" name=\"pg$nomor\" id=\"pg-$nomor-$z\" data-jawaban=\"jawaban[{$index}]\" value=\"$pilihan\">
                                    <label class=\"form-check-label\" for=\"pg-$nomor-$z\">
                                      $pilihan
                                    </label>
                                  </div>";
                    }

                    $index++;
                } else if ($obj->item == 'soal-esai') {
                    $nomor++;

                    $soal = json_decode($obj->data);
                    $soalWithNumber = preg_replace("/<p>/", "<p>$nomor. ", $soal->soal, 1);

                    $data['latihan'][$i]['data'] = $soalWithNumber;
                    $data['latihan'][$i]['data'] .= "<div class=\"form-group mb-2\">
                    <textarea name=\"jawaban[$index]\" class=\"form-control pg\" rows=\"3\"></textarea>
                  </div>";

                    $index++;
                }
            }
        }

        $data['sidebar'] = "myClass";
        $data['breadcrumbs'] = ["<a class='opacity-5 text-light' href='".base_url()."/materi/" . md5($pertemuan['id_pertemuan']) . "'>{$pertemuan['nama_pertemuan']}</a>", "Latihan"];
        $data['title'] = "Latihan {$pertemuan['nama_pertemuan']}";
        // $data['latihan'] = $latihan;
        $data['deskripsi'] = "Latihan {$pertemuan['nama_pertemuan']} kelas {$kelas['nama_kelas']}";
        $data['id_materi_pertemuan_member'] = $pertemuan['id_pertemuan'];
        $data['fk_id_kelas_member'] = $kelas_member['id_kelas_member'];
        $data['fk_id_pertemuan'] = $pertemuan['id_pertemuan'];
        if ($latihanMember) {
            if ($pertemuan['pengulangan_latihan'] == 'Berkali-kali') {
                $data['ulang'] = true;
            } else {
                $data['ulang'] = false;
                $data['pesan'] = "
                <div class='card'>
                    <div class='card-body'>
                        <h2 class='text-center'>&#128079 SELAMAT &#128079</h2>
                        <p class='text-center'>Kamu Telah Berhasil Menyelesaikan <br>&quot;Latihan {$pertemuan['nama_pertemuan']}&quot; <br>Kelas {$kelas['nama_kelas']}</p>
                        <p class='text-center'>
                            Nilai Kamu Adalah : <br>
                            <span class='text-center' style='font-size: 5em;'><b>{$latihanMember['nilai']} / " . COUNT($jumlahSoal) * $pertemuan['poin'] . "</b></span>
                        </p>
                        <div class='d-flex justify-content-center'>
                        <a href='" . base_url() . "/materi/" . md5($data['id_materi_pertemuan_member']) . "' class='btn btn-success'> materi</a>
                    </div>
                    </div>
                </div>
                ";
            }
        }

        return view('member/pages/list-latihan-pertemuan', $data);
    }

    public function latihanSubscription($fk_id_subscription_member, $id_pertemuan)
    {
        // var_dump($fk_id_subscription_member, $id_pertemuan);
        $db = db_connect();
        $materi_pertemuan_subscription = $db->query("SELECT * FROM materi_pertemuan_subscription WHERE md5(fk_id_subscription_member) = '$fk_id_subscription_member' AND md5(fk_id_pertemuan) = '$id_pertemuan'")->getRowArray();
        $subscription_member = $db->query("SELECT * FROM subscription_member WHERE md5(id_subscription_member) = '$fk_id_subscription_member'")->getRowArray();
        $program = $db->query("SELECT nama_program, id_program FROM program WHERE id_program = {$subscription_member['fk_id_program']} AND hapus = 0")->getRowArray();
        $pertemuan = $db->query("SELECT * FROM pertemuan_program WHERE md5(id_pertemuan) = '$id_pertemuan' AND hapus = 0")->getRowArray();
        $latihan = $db->query("SELECT * FROM latihan_pertemuan WHERE md5(fk_id_pertemuan) = '$id_pertemuan' ORDER BY urutan")->getResult();
        $latihanMember = $db->query("SELECT * FROM latihan_pertemuan_subscription WHERE md5(fk_id_subscription_member) = '$fk_id_subscription_member' AND md5(fk_id_pertemuan) = '$id_pertemuan'")->getRowArray();
        $jumlahSoal = $db->query("SELECT * FROM latihan_pertemuan WHERE md5(fk_id_pertemuan) = '$id_pertemuan' AND (item = 'soal-pg' OR item = 'soal-esai')")->getResultArray();

        $data['latihan'] = [];
        $nomor = 0;
        $index = 0;

        foreach ($latihan as $i => $latihan) {
            $obj = $latihan;
            if ($obj->item == 'video') {
                $data['latihan'][$i]['data'] = "<div class=\"ratio ratio-16x9\">
                <iframe class=\"object-fit-contain border rounded\" src=\"{$obj->data}\" allowfullscreen></iframe>
              </div>";
            } else if ($obj->item == 'petunjuk' || $obj->item == 'soal-pg' || $obj->item == 'soal-esai') {
                if ($obj->item == 'petunjuk') {
                    $data['latihan'][$i]['data'] = $obj->data;
                } else if ($obj->item == 'soal-pg') {
                    $nomor++;

                    $soal = json_decode($obj->data);
                    $soalWithNumber = preg_replace("/<p>/", "<p>$nomor. ", $soal->soal, 1);

                    $data['latihan'][$i]['data'] = $soalWithNumber;
                    $data['latihan'][$i]['data'] .= "<input type=\"hidden\" name=\"jawaban[$index]\" value=\"null\">";
                    foreach ($soal->pilihan as $z => $pilihan) {
                        $data['latihan'][$i]['data'] .= "<div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"radio\" name=\"pg$nomor\" id=\"pg-$nomor-$z\" data-jawaban=\"jawaban[{$index}]\" value=\"$pilihan\">
                                    <label class=\"form-check-label\" for=\"pg-$nomor-$z\">
                                      $pilihan
                                    </label>
                                  </div>";
                    }

                    $index++;
                } else if ($obj->item == 'soal-esai') {
                    $nomor++;

                    $soal = json_decode($obj->data);
                    $soalWithNumber = preg_replace("/<p>/", "<p>$nomor. ", $soal->soal, 1);

                    $data['latihan'][$i]['data'] = $soalWithNumber;
                    $data['latihan'][$i]['data'] .= "<div class=\"form-group mb-2\">
                    <textarea name=\"jawaban[$index]\" class=\"form-control pg\" rows=\"3\"></textarea>
                  </div>";

                    $index++;
                }
            }
        }

        $data['sidebar'] = "mySubcription";
        $data['breadcrumbs'] = ["<a class='opacity-5 text-dark' href='".base_url()."/materisubscription/" . md5($materi_pertemuan_subscription['id']) . "'>{$pertemuan['nama_pertemuan']}</a>", "Latihan"];
        $data['title'] = "Latihan {$pertemuan['nama_pertemuan']}";
        // $data['latihan'] = $latihan;
        $data['deskripsi'] = "Latihan {$pertemuan['nama_pertemuan']} program {$program['nama_program']}";
        $data['id_materi_pertemuan_subscription'] = $materi_pertemuan_subscription['id'];
        $data['fk_id_subscription_member'] = $subscription_member['id_subscription_member'];
        $data['fk_id_pertemuan'] = $pertemuan['id_pertemuan'];
        if ($latihanMember) {
            if ($pertemuan['pengulangan_latihan'] == 'Berkali-kali') {
                $data['ulang'] = true;
            } else {
                $data['ulang'] = false;
                $data['pesan'] = "
                <div class='card'>
                    <div class='card-body'>
                        <h2 class='text-center'>&#128079 SELAMAT &#128079</h2>
                        <p class='text-center'>Kamu Telah Berhasil Menyelesaikan <br>&quot;Latihan {$pertemuan['nama_pertemuan']}&quot; <br>Program {$program['nama_program']}</p>
                        <p class='text-center'>
                            Nilai Kamu Adalah : <br>
                            <span class='text-center' style='font-size: 5em;'><b>{$latihanMember['nilai']} / " . COUNT($jumlahSoal) * $pertemuan['poin'] . "</b></span>
                        </p>
                        <div class='d-flex justify-content-center'>
                        <a href='" . base_url() . "/materisubscription/" . md5($data['id_materi_pertemuan_subscription']) . "' class='btn btn-success'> materi</a>
                    </div>
                    </div>
                </div>
                ";
            }
        }

        return view('member/pages/subscription/list-latihan-pertemuan-subscription', $data);
    }

    public function addLatihan()
    {
        $fk_id_kelas_member = $this->request->getPost("fk_id_kelas_member");
        $fk_id_pertemuan = $this->request->getPost("fk_id_pertemuan");
        $jawabanPeserta = $this->request->getPost("jawaban");

        $dataJawaban = [];
        $dataLatihan = [];

        $db = db_connect();
        $kelas_member = $db->query("SELECT * FROM kelas_member WHERE id_kelas_member = $fk_id_kelas_member")->getRowArray();
        $kelas = $db->query("SELECT * FROM kelas WHERE id_kelas = {$kelas_member['fk_id_kelas']}")->getRowArray();
        $pertemuan = $db->query("SELECT * FROM pertemuan_program_kelas WHERE id_pertemuan = '$fk_id_pertemuan'")->getRowArray();
        $jumlahSoal = $db->query("SELECT * FROM latihan_pertemuan_kelas WHERE fk_id_pertemuan = $fk_id_pertemuan AND (item = 'soal-pg' OR item = 'soal-esai')")->getResultArray();
        $latihan = $db->query("SELECT * FROM latihan_pertemuan_kelas WHERE fk_id_pertemuan = $fk_id_pertemuan ORDER BY urutan")->getResult();
        // $materi_pertemuan_member = $db->query("SELECT * FROM materi_pertemuan_member WHERE fk_id_kelas_member = $fk_id_kelas_member AND fk_id_pertemuan = $fk_id_pertemuan")->getRowArray();

        $indexSoal = 0;
        $benar = 0;
        $salah = 0;
        foreach ($latihan as $i => $latihan) {
            if ($latihan->item == 'petunjuk') {
            } else if ($latihan->item == 'audio') {
            } else if ($latihan->item == 'video') {
            } else if ($latihan->item == 'soal-pg') {
                $text = "";
                $jawaban = json_decode($latihan->data);
                array_push($dataJawaban, $jawaban->jawaban);

                if ($jawaban->jawaban == trim($jawabanPeserta[$indexSoal])) {
                    $statusJawaban = 'benar';
                    $benar++;
                } else {
                    $statusJawaban = 'salah';
                    $salah++;
                }

                $text .= "{\"item\":\"soal-pg\",\"urutan\":\"{$latihan->urutan}\",\"data\":{\"soal\":\"{$jawaban->soal}\",\"pilihan\":" . json_encode($jawaban->pilihan) . ",\"jawaban\":\"{$jawaban->jawaban}\",\"key\":\"{trim($jawabanPeserta[$indexSoal])}\",\"status\":\"{$statusJawaban}\"}}";

                array_push($dataLatihan, $text);
                $indexSoal++;
            } else if ($latihan->item == 'soal-esai') {
                $text = "";
                $jawaban = json_decode($latihan->data);
                array_push($dataJawaban, $jawaban->jawaban);

                if (strtolower($jawaban->jawaban) == strtolower(trim($jawabanPeserta[$indexSoal]))) {
                    $statusJawaban = 'benar';
                    $benar++;
                } else {
                    $statusJawaban = 'salah';
                    $salah++;
                }

                $text .= '{"item":"soal-pg","urutan":"' . $latihan->urutan . '","data":{"soal":"' . $jawaban->soal . '","jawaban":"' . $jawaban->jawaban . '","key":"' . trim($jawabanPeserta[$indexSoal]) . '","status":"' . $statusJawaban . '"}}';

                array_push($dataLatihan, $text);
                $indexSoal++;
            }
        }

        $nilai = $benar * $pertemuan['poin'];

        // $data['id_materi_pertemuan_member'] = $materi_pertemuan_member['id'];
        $data['id_materi_pertemuan_member'] = $pertemuan['id_pertemuan'];
        $data['fk_id_kelas_member'] = $fk_id_kelas_member;
        $data['fk_id_pertemuan'] = $fk_id_pertemuan;
        $data['nilai'] = $nilai;
        $data['total_soal'] = $benar + $salah;
        $data['data'] = "[";
        foreach ($dataLatihan as $dataLatihan) {
            $data['data'] .= $dataLatihan . ",";
        }

        $data['data'] = substr($data['data'], 0, -1);
        $data['data'] .= "]";

        $latihanMember = $db->query("SELECT * FROM latihan_pertemuan_member WHERE fk_id_kelas_member = '$fk_id_kelas_member' AND fk_id_pertemuan = '$fk_id_pertemuan'")->getRowArray();
        if ($latihanMember) {
            $model = new LatihanPertemuanMemberModel();
            $model->update($latihanMember['id'], $data);
        } else {
            $model = new LatihanPertemuanMemberModel();
            $model->save($data);
        }

        $session = session();

        $msg = "
                <h2 class='text-center'>&#128079 SELAMAT &#128079</h2>
                <p class='text-center'>Kamu Telah Berhasil Menyelesaikan <br>&quot;Latihan {$pertemuan['nama_pertemuan']}&quot; <br>Kelas {$kelas['nama_kelas']}</p>
                <p class='text-center'>
                    Nilai Kamu Adalah : <br>
                    <span class='text-center' style='font-size: 5em;'><b>{$nilai} / " . COUNT($jumlahSoal) * $pertemuan['poin'] . "</b></span>
                </p>
                <div class='d-flex justify-content-center'>
                    <a href='" . base_url() . "/materi/" . md5($data['id_materi_pertemuan_member']) . "' class='btn btn-success me-3'> materi</a>
                    <a href='" . base_url() . "/latihan/" . md5($data['fk_id_kelas_member']) . "/" . md5($data['fk_id_pertemuan']) . "' class='btn btn-warning'> ulangi</a>
                </div>
            ";

        $session->setFlashdata('pesan', $msg);
        $url = '/latihan/' . md5($data['fk_id_kelas_member']) . '/' . md5($data['fk_id_pertemuan']);
        return redirect()->to(base_url($url));
    }

    public function addLatihanSubscription()
    {
        $fk_id_subscription_member = $this->request->getPost("fk_id_subscription_member");
        $fk_id_pertemuan = $this->request->getPost("fk_id_pertemuan");
        $jawabanPeserta = $this->request->getPost("jawaban");

        $dataJawaban = [];
        $dataLatihan = [];

        $db = db_connect();
        $subscription_member = $db->query("SELECT * FROM subscription_member WHERE id_subscription_member = $fk_id_subscription_member")->getRowArray();
        $program = $db->query("SELECT * FROM program WHERE id_program = {$subscription_member['fk_id_program']}")->getRowArray();
        $pertemuan = $db->query("SELECT * FROM pertemuan_program WHERE id_pertemuan = '$fk_id_pertemuan'")->getRowArray();
        $jumlahSoal = $db->query("SELECT * FROM latihan_pertemuan WHERE fk_id_pertemuan = $fk_id_pertemuan AND (item = 'soal-pg' OR item = 'soal-esai')")->getResultArray();
        $latihan = $db->query("SELECT * FROM latihan_pertemuan WHERE fk_id_pertemuan = $fk_id_pertemuan ORDER BY urutan")->getResult();
        $materi_pertemuan_member = $db->query("SELECT * FROM materi_pertemuan_subscription WHERE fk_id_subscription_member = $fk_id_subscription_member AND fk_id_pertemuan = $fk_id_pertemuan")->getRowArray();

        $indexSoal = 0;
        $benar = 0;
        $salah = 0;
        foreach ($latihan as $i => $latihan) {
            if ($latihan->item == 'petunjuk') {
            } else if ($latihan->item == 'audio') {
            } else if ($latihan->item == 'video') {
            } else if ($latihan->item == 'soal-pg') {
                $text = "";
                $jawaban = json_decode($latihan->data);
                array_push($dataJawaban, $jawaban->jawaban);

                if ($jawaban->jawaban == trim($jawabanPeserta[$indexSoal])) {
                    $statusJawaban = 'benar';
                    $benar++;
                } else {
                    $statusJawaban = 'salah';
                    $salah++;
                }

                $text .= "{\"item\":\"soal-pg\",\"urutan\":\"{$latihan->urutan}\",\"data\":{\"soal\":\"{$jawaban->soal}\",\"pilihan\":" . json_encode($jawaban->pilihan) . ",\"jawaban\":\"{$jawaban->jawaban}\",\"key\":\"{trim($jawabanPeserta[$indexSoal])}\",\"status\":\"{$statusJawaban}\"}}";

                array_push($dataLatihan, $text);
                $indexSoal++;
            } else if ($latihan->item == 'soal-esai') {
                $text = "";
                $jawaban = json_decode($latihan->data);
                array_push($dataJawaban, $jawaban->jawaban);

                if (strtolower($jawaban->jawaban) == strtolower(trim($jawabanPeserta[$indexSoal]))) {
                    $statusJawaban = 'benar';
                    $benar++;
                } else {
                    $statusJawaban = 'salah';
                    $salah++;
                }

                $text .= '{"item":"soal-pg","urutan":"' . $latihan->urutan . '","data":{"soal":"' . $jawaban->soal . '","jawaban":"' . $jawaban->jawaban . '","key":"' . trim($jawabanPeserta[$indexSoal]) . '","status":"' . $statusJawaban . '"}}';

                array_push($dataLatihan, $text);
                $indexSoal++;
            }
        }

        $nilai = $benar * $pertemuan['poin'];
        
        $data['id_materi_pertemuan_subscription'] = $materi_pertemuan_member['id'];
        $data['fk_id_subscription_member'] = $fk_id_subscription_member;
        $data['fk_id_pertemuan'] = $fk_id_pertemuan;
        $data['nilai'] = $nilai;
        $data['data'] = "[";
        foreach ($dataLatihan as $dataLatihan) {
            $data['data'] .= $dataLatihan . ",";
        }

        $data['data'] = substr($data['data'], 0, -1);
        $data['data'] .= "]";

        $latihanMember = $db->query("SELECT * FROM latihan_pertemuan_subscription WHERE fk_id_subscription_member = '$fk_id_subscription_member' AND fk_id_pertemuan = '$fk_id_pertemuan'")->getRowArray();
        if ($latihanMember) {
            $model = new LatihanPertemuanSubscriptionModel();
            $model->update($latihanMember['id'], $data);
        } else {
            $model = new LatihanPertemuanSubscriptionModel();
            $model->save($data);
        }

        $session = session();

        $msg = "
                <h2 class='text-center'>&#128079 SELAMAT &#128079</h2>
                <p class='text-center'>Kamu Telah Berhasil Menyelesaikan <br>&quot;Latihan {$pertemuan['nama_pertemuan']}&quot; <br>Program {$program['nama_program']}</p>
                <p class='text-center'>
                    Nilai Kamu Adalah : <br>
                    <span class='text-center' style='font-size: 5em;'><b>{$nilai} / " . COUNT($jumlahSoal) * $pertemuan['poin'] . "</b></span>
                </p>
                <div class='d-flex justify-content-center'>
                    <a href='" . base_url() . "/materisubscription/" . md5($data['id_materi_pertemuan_subscription']) . "' class='btn btn-success me-3'> materi</a>
                    <a href='" . base_url() . "/latihansubscription/" . md5($data['fk_id_subscription_member']) . "/" . md5($data['fk_id_pertemuan']) . "' class='btn btn-warning'> ulangi</a>
                </div>
            ";

        $session->setFlashdata('pesan', $msg);
        $url = '/latihansubscription/' . md5($data['fk_id_subscription_member']) . '/' . md5($data['fk_id_pertemuan']);
        return redirect()->to(base_url($url));
    }

    public function materiSelesai($id_materi_pertemuan_member){
        $session = session();
        $id_member = $session->get('id_member');

        $db = db_connect();
        $materi_pertemuan_member = $db->query("SELECT * FROM materi_pertemuan_member WHERE MD5(id) = '$id_materi_pertemuan_member'")->getRowArray();
        $kelas_member = $db->query("SELECT * FROM kelas_member WHERE id_kelas_member = $materi_pertemuan_member[fk_id_kelas_member]")->getRowArray();
        $pertemuan = $db->query("SELECT * FROM pertemuan_program WHERE id_pertemuan = $materi_pertemuan_member[fk_id_pertemuan] AND hapus = 0")->getRowArray();
        $pertemuan_1 = $db->query("SELECT * FROM pertemuan_program WHERE fk_id_program = $pertemuan[fk_id_program] AND urutan = $pertemuan[urutan] + 1 AND hapus = 0")->getRowArray();
        $pertemuan_2 = $db->query("SELECT * FROM pertemuan_program WHERE fk_id_program = $pertemuan[fk_id_program] AND urutan = $pertemuan[urutan] + 2 AND hapus = 0")->getRowArray();

        $model = new MateriPertemuanMemberModel();
        $model->update($materi_pertemuan_member['id'], ['selesai' => 'selesai']);

        if($pertemuan_1){
            if($pertemuan_2){
                $data = [
                    "fk_id_kelas_member" => $materi_pertemuan_member['fk_id_kelas_member'],
                    "fk_id_pertemuan" => $pertemuan_1['id_pertemuan'],
                ];
            } else {
                $data = [
                    "fk_id_kelas_member" => $materi_pertemuan_member['fk_id_kelas_member'],
                    "fk_id_pertemuan" => $pertemuan_1['id_pertemuan'],
                    "pertemuan_terakhir" => "ya"
                ];
            }

            if ($model->save($data)) {
                $id_materi_pertemuan_member = $db->insertID();
            } 

            $url = '/materi/' . md5($id_materi_pertemuan_member);
            return redirect()->to(base_url($url));
        } else {
            $model = new KelasMemberModel();
            $model->update($kelas_member['id_kelas_member'], ['sertifikat' => 1]);
            $url = '/myClass';
            return redirect()->to(base_url($url));
        }

    }

    public function materiSubscriptionSelesai($id_materi_pertemuan_subscription){
        $session = session();
        $id_member = $session->get('id_member');

        $db = db_connect();
        $materi_pertemuan_subscription = $db->query("SELECT * FROM materi_pertemuan_subscription WHERE MD5(id) = '$id_materi_pertemuan_subscription'")->getRowArray();
        $subscription_member = $db->query("SELECT * FROM subscription_member WHERE id_subscription_member = $materi_pertemuan_subscription[fk_id_subscription_member]")->getRowArray();
        $pertemuan = $db->query("SELECT * FROM pertemuan_program WHERE id_pertemuan = $materi_pertemuan_subscription[fk_id_pertemuan] AND hapus = 0")->getRowArray();
        $pertemuan_1 = $db->query("SELECT * FROM pertemuan_program WHERE fk_id_program = $pertemuan[fk_id_program] AND urutan = $pertemuan[urutan] + 1 AND hapus = 0")->getRowArray();
        $pertemuan_2 = $db->query("SELECT * FROM pertemuan_program WHERE fk_id_program = $pertemuan[fk_id_program] AND urutan = $pertemuan[urutan] + 2 AND hapus = 0")->getRowArray();

        $model = new MateriPertemuanSubscriptionModel();
        $model->update($materi_pertemuan_subscription['id'], ['selesai' => 'selesai']);

        if($pertemuan_1){
            if($pertemuan_2){
                $data = [
                    "fk_id_subscription_member" => $materi_pertemuan_subscription['fk_id_subscription_member'],
                    "fk_id_pertemuan" => $pertemuan_1['id_pertemuan'],
                ];
            } else {
                $data = [
                    "fk_id_subscription_member" => $materi_pertemuan_subscription['fk_id_subscription_member'],
                    "fk_id_pertemuan" => $pertemuan_1['id_pertemuan'],
                    "pertemuan_terakhir" => "ya"
                ];
            }

            if ($model->save($data)) {
                $id_materi_pertemuan_susbcription = $db->insertID();
            } 

            $url = '/materisubscription/' . md5($id_materi_pertemuan_susbcription);
            return redirect()->to(base_url($url));
        } else {
            $model = new SubscriptionMemberModel();
            $model->update($subscription_member['id_subscription_member'], ['sertifikat' => 1]);
            $url = '/mySubscription';
            return redirect()->to(base_url($url));
        }

    }

    public function sertifikat($id_kelas_member){
        $session = session();
        $id_member = $session->get('id_member');

        $db = db_connect();
        $kelas_member = $db->query("SELECT nama_member, nama_kelas FROM kelas_member as a JOIN kelas as b ON a.fk_id_kelas = b.id_kelas JOIN member as c ON a.fk_id_member = c.id_member WHERE md5(id_kelas_member) = '$id_kelas_member' AND fk_id_member = $id_member")->getRowArray();

        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create(base_url()."/report/".$id_kelas_member)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0));

        // Create generic logo
        $logo = Logo::create( FCPATH .'/public/assets/img/logo.png')
            ->setResizeToWidth(150);

        $result = $writer->write($qrCode, $logo);
        
        $kelas_member['barcode'] = $result->getDataUri();

        $Pdfgenerator = new Pdfgenerator();
        // filename dari pdf ketika didownload
        $file_pdf = "$kelas_member[nama_member] - $kelas_member[nama_kelas]";
        // setting paper
        $paper = 'A5';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = view('member/pages/sertifikat', $kelas_member);

        // run dompdf
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        exit();
    }

    public function sertifikatSubscription($id_subscription_member){
        $session = session();
        $id_member = $session->get('id_member');

        $db = db_connect();
        $subscription_member = $db->query("SELECT nama_member, nama_program FROM subscription_member as a JOIN program as b ON a.fk_id_program = b.id_program JOIN member as c ON a.fk_id_member = c.id_member WHERE md5(id_subscription_member) = '$id_subscription_member' AND fk_id_member = $id_member")->getRowArray();

        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create(base_url()."/reportSubscription/".$id_subscription_member)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0));

        // Create generic logo
        $logo = Logo::create( FCPATH .'/public/assets/img/logo.png')
            ->setResizeToWidth(150);

        $result = $writer->write($qrCode, $logo);
        
        $subscription_member['barcode'] = $result->getDataUri();

        $Pdfgenerator = new Pdfgenerator();
        // filename dari pdf ketika didownload
        $file_pdf = "$subscription_member[nama_member] - $subscription_member[nama_program]";
        // setting paper
        $paper = 'A5';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = view('member/pages/subscription/sertifikat', $subscription_member);

        // run dompdf
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function report($id_kelas_member){

        $db = db_connect();
        $kelas_member = $db->query("SELECT nama_member, nama_kelas FROM kelas_member as a JOIN kelas as b ON a.fk_id_kelas = b.id_kelas JOIN member as c ON a.fk_id_member = c.id_member WHERE md5(id_kelas_member) = '$id_kelas_member'")->getRowArray();

        $kelas_member['title'] = 'Sertifikat';

        return view('member/pages/report', $kelas_member);
    }

    public function reportSubscription($id_subscription_member){

        $db = db_connect();
        $subscription_member = $db->query("SELECT nama_member, nama_program FROM subscription_member as a JOIN program as b ON a.fk_id_program = b.id_program JOIN member as c ON a.fk_id_member = c.id_member WHERE md5(id_subscription_member) = '$id_subscription_member'")->getRowArray();

        $subscription_member['title'] = 'Sertifikat';

        return view('member/pages/subscription/report', $subscription_member);
    }

    public function ubahPassword(){
        $db = db_connect();

        $validasi  = \Config\Services::validation();
        $aturan = [
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ];

        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            $session = session();
            $id_member = $session->get('id_member');

            $password = $this->request->getPost('password');
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $self_password = 1;

            $db->query("UPDATE member SET password = '$hashed_password', self_password = $self_password WHERE id_member = $id_member");

            // Cek apakah ada baris yang terpengaruh
            if ($db->affectedRows() > 0) {
                // Update berhasil
                $response = [
                    'status' => 'success',
                    'message' => 'Password berhasil diubah'
                ];
            } else {
                // Update gagal
                $response = [
                    'status' => 'error',
                    'message' => 'Gagal mengubah password'
                ];
            }
        } else {
            $response['error'] = $validasi->listErrors();
        }

        return json_encode($response);
    }
}
