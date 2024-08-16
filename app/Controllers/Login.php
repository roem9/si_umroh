<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\AgentModel;
use App\Models\PengajarModel;
use App\Models\ClientModel;

class Login extends BaseController
{
    public function index()
    {
        $session = session();

        // Check if remember me cookie exists
        if (isset($_COOKIE['cookie_admin'])) {
            // Retrieve the remember me token from the cookie
            $token = $_COOKIE['cookie_admin'];

            // Check if the token exists in the database
            $model = new AdminModel();
            $data = $model->where('cookie', $token)->first();

            if ($data) {
                // Set session data
                $ses_data = [
                    'username'       => $data['username'],
                    'id_admin'       => $data['id_admin'],
                    'logged_in'      => TRUE,
                    'level'          => 'admin'
                ];
                $session->set($ses_data);

                // Redirect to the "produk" page
                return redirect()->to(base_url('/home'));
            }
        } else if (isset($_COOKIE['cookie_agent'])) {
            // Retrieve the remember me token from the cookie
            $token = $_COOKIE['cookie_agent'];

            // Check if the token exists in the database
            $model = new AgentModel();
            $data = $model->where('cookie', $token)->first();

            if ($data) {
                // Set session data
                $ses_data = [
                    'username'           => $data['username'],
                    'pk_id_agent'       => $data['pk_id_agent'],
                    'logged_in'      => TRUE,
                    'level'          => 'agent'
                ];
                $session->set($ses_data);

                // Redirect to the "produk" page
                $model->update($data['pk_id_agent'], [
                    'is_forget_password' => 0
                ]);

                return redirect()->to(base_url('/agentarea/home'));
            }
        }

        $session->destroy();
        $data['title'] = 'Login';
        return view('pages/sign-in', $data);
    }

    public function lupaPassword(){
        $data['title'] = 'Lupa Password';
        return view('pages/lupa-password', $data);
    }

    public function gantipassword($pk_id_agent){
        $data['title'] = 'Lupa Password';
        $db = db_connect();
        $agent = $db->query("
            SELECT
                *
            FROM agent
            WHERE MD5(pk_id_agent) = '$pk_id_agent'
            AND (deleted_at IS NULL OR deleted_at = '0000-00-00 00:00:00')
            AND is_forget_password = 1
        ")->getRowArray();

        if($agent){
            $messageData = $db->query("
                SELECT 
                    *
                FROM system_parameter
                WHERE setting_name = 'message_success_reset_password'
            ")->getRowArray();

            $replace = [
                '$link$' => "<a href='".base_url()."'>link agent area</a>"
            ];
    
            // Replace placeholders with actual values
            $data['message'] = str_replace(array_keys($replace), array_values($replace), $messageData['setting_value']);
            $data['agent'] = $agent;

            return view('pages/form-ganti-password', $data);
        } else {
            return redirect()->to(base_url('/login'));
        }

    }

    public function saveLupaPassword(){
        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('confirm_password');

        if($password != $confirm_password){
            $response['error'] = [
                "password" => 'password tidak sama dengan konfirmasi password',
                "confirm_password" => 'Konfirmasi password tidak sama dengan konfirmasi password',
            ];

            return json_encode($response);
        }

        $pk_id_agent = $this->request->getPost('pk_id_agent');

        $agentModel = new AgentModel();
        $searchAgent = $agentModel->find($pk_id_agent);
        if ($searchAgent) {
            $data = [
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'is_forget_password' => 0,
            ];

            if($agentModel->update($pk_id_agent, $data) === true){
                $response = [
                    'status' => 'success',
                    'message' => 'berhasil reset password'
                ];
            } else {
                $response = [
                    "error" => $agentModel->errors()
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'terjadi kesalahan, silakan muat ulang halaman'
            ];
        }

        return json_encode($response);
    }

    public function sendEmailResetPassword(){
        $db = db_connect();
        $email = $this->request->getPost('email');

        $agent = $db->query("
            SELECT
                *
            FROM agent
            WHERE email = '$email'
        ")->getRowArray();

        if($agent){
            $db->query("
                UPDATE agent SET is_forget_password = 1 WHERE email = '$email'
                AND (deleted_at IS NULL OR deleted_at = '0000-00-00 00:00:00')
            ");

            $email_message = $db->query("
                SELECT
                    *
                FROM system_parameter
                WHERE setting_name = 'email_reset_password_agent'
            ")->getRowArray();
    
            $email_subject = $db->query("
                SELECT
                    *
                FROM system_parameter
                WHERE setting_name = 'subject_email_reset_password'
            ")->getRowArray();
    
            $messageData = $email_message['setting_value'];
            $messageSubject = $email_subject['setting_value'];
        
            $replace = [
                '$nama_agent$' => $agent['nama_agent'],
                '$link_reset_password$' => base_url()."/gantipassword/".md5($agent['pk_id_agent'])
            ];
    
            // Replace placeholders with actual values
            $message = str_replace(array_keys($replace), array_values($replace), $messageData);
    
            $emailSender = new EmailSender();
            $emailSender->send($email, $messageSubject, $message);

            
            $session = session();
            $session->setFlashdata('success', 'Email berhasil terkirim');
            return redirect()->to(base_url('/lupapassword'));
        } else {
            $session = session();
            $session->setFlashdata('error', 'Mohon Maaf, Email Anda tidak terdaftar');
            return redirect()->to(base_url('/lupapassword'));
        }
    }

    public function auth()
    {
        $session = session();
        $model = new AdminModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $remember = $this->request->getPost('remember');

        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'username'       => $data['username'],
                    'id_admin'       => $data['id_admin'],
                    'logged_in'      => TRUE,
                    'level'          => 'admin'
                ];
                $session->set($ses_data);

                // If "Remember Me" is checked, set a cookie
                if ($remember) {
                    // Generate a remember me token
                    $token = bin2hex(random_bytes(32));

                    // Store the token in the database
                    $model->update($data['id_admin'], ['cookie' => $token]);

                    // Set the remember me cookie
                    setcookie('cookie_admin', $token, time() + (30 * 24 * 60 * 60), '/');
                }

                return redirect()->to(base_url('/'));
            } else {
                $session->setFlashdata('msg', 'Password salah');
                return redirect()->to(base_url('/login'));
            }
        } else {
            $model = new AgentModel();
            $data = $model->where(['username' => $username])->first();
            if ($data) {
                $verify_pass = false;
                $pass = $data['password'];
                $verify_pass = password_verify($password, $pass);

                if($data['area_status'] == 0){
                    $session->setFlashdata('msg', 'Agent Anda belum diaktifkan. Silakan menghubungi Admin');
                    return redirect()->to(base_url('/login'));
                }

                if ($verify_pass) {
                    $ses_data = [
                        'username'           => $data['username'],
                        'pk_id_agent'       => $data['pk_id_agent'],
                        'tipe_agent'       => $data['tipe_agent'],
                        'logged_in'      => TRUE,
                        'level'          => 'agent'
                    ];
                    $session->set($ses_data);

                    // If "Remember Me" is checked, set a cookie
                    if ($remember) {
                        // Generate a remember me token
                        $token = bin2hex(random_bytes(32));

                        // Store the token in the database
                        $model->update($data['pk_id_agent'], ['cookie' => $token]);

                        // Set the remember me cookie
                        setcookie('cookie_agent', $token, time() + (30 * 24 * 60 * 60), '/');
                    }

                    if($model->update($data['pk_id_agent'], [
                        'is_forget_password' => 0
                    ]) === true){
                        return redirect()->to(base_url('/agentarea/home'));
                    }
                } else {
                    $session->setFlashdata('msg', 'Password salah');
                    return redirect()->to(base_url('/login'));
                }
            } else {
                return redirect()->to(base_url('/login'));
            }
        }
    }

    public function logout()
    {
        $session = session();

        // Check if the remember me cookie exists
        if (isset($_COOKIE['cookie_admin'])) {
            // Delete the remember me cookie by setting an expired time
            setcookie('cookie_admin', '', time() - 3600, '/');
        }

        if (isset($_COOKIE['cookie_agent'])) {
            // Delete the remember me cookie by setting an expired time
            setcookie('cookie_agent', '', time() - 3600, '/');
        }

        $session->destroy();
        return redirect()->to(base_url('/login'));
    }

    
}
