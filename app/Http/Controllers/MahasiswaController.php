<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function insert()
    {
        $result = DB::insert('insert into mahasiswas (npm,nama_mahasiswa, tempat_lahir, tanggal_lahir,
        alamat, create_at) values (?, ?, ?, ?, ?, ?)',['1923240030','Christopher Given','Palembang',
        '2000-01-01','JL Rajawali',now()]);
        dump($result);
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function select()
    {

    }
}
