<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }

	public function index()
	{
		$data = [
			'title' => 'Home | SiAkad',
			'isi'	=>	'v_login'
		];
		return view('layout/v_wrapper', $data);
	}

    public function cek_login(){
       

        // Validation Login
        if($this->validate([
            'username' => [
                'label'  => 'username',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi'
                ]
            ],
            'level' => [
                'label'  => 'level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi'
                ]
            ],
            'password' => [
                'label'  => 'password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi'
                ]
            ],
        ])){
            // jika valid
            $username   = $this->request->getPost('username');
            $level      = $this->request->getPost('level');
            $password   = $this->request->getPost('password');

            if($level == 1){
                $cek_user = $this->ModelAuth->login_user($username, $password);
                if($cek_user){
                    // Jika Datanya Cocok
                    session()->set('log', true);
                    session()->set('nama_user', $cek_user['nama_user']);
                    session()->set('username', $cek_user['username']);
                    session()->set('foto', $cek_user['foto']);
                    session()->set('level', $level);

                    // login
                    return redirect()->to(base_url('admin'));
                }else {
                    // Jika Data Tidak Cocok
                    session()->setFlashdata('gagal', 'Login Gagal !!, Username Atau Password Salah');
                    return redirect()->to(base_url('auth'));
                }
            }elseif($level == 2){
                echo "Mahasiswa";
            }elseif($level == 3){
                echo "Dosen";
            }
        }else {
            # jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth'));
        }
    }

    public function logout(){
        session()->remove('log');
        session()->remove('nama_user');
        session()->remove('username');
        session()->remove('foto');
        session()->remove('level');
        session()->setFlashdata('logout', 'Anda Berhasil Logout');
        return redirect()->to(base_url('auth'));
    }
}
