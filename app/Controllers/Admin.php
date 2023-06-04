<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Admin | SiAkad',
			'isi'	=>	'v_admin'
		];
		return view('layout/v_wrapper', $data);
	}
}
