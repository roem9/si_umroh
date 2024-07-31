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
                return redirect()->to(base_url('/myProfile'));
            }
        }

        $session->destroy();
        $data['title'] = 'Login';
        return view('pages/sign-in', $data);
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

                    return redirect()->to(base_url('/agentarea/home'));
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
