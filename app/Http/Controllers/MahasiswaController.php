<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function insert()
    {
        $result = DB::insert('insert into mahasiswas (npm, nama_mahasiswa, tempat_lahir, 
        tanggal_lahir, alamat, created_at) values (?, ?, ?, ?, ?, ?)', ['1923240030', 
        'Christopher Given', 'Palembang', '2021-06-04', 'Cinde', now()]);
        dump($result);
    }

    public function update()
    {
        $result = DB::update('update mahasiswas set nama_mahasiswa = "CGiven", 
        alamat = "Rajawali", updated_at = now() where npm = ?', ['1923240030']);
        dump($result);
    }

    public function delete()
    {
        $result = DB::delete('delete from mahasiswas where npm = ?', ['1923240030']);
        dump($result);
    }

    public function select()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select * from mahasiswas');
        // dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    public function insertQb()
    {
        $result = DB::table('mahasiswas')->insert(
            [
                'npm' => '1923240003',
                'nama_mahasiswa' => 'Lionel Messi',
                'tempat_lahir' => 'Argentina',
                'tanggal_lahir' => '1987-06-24',
                'alamat' => 'Barcelona',
                'created_at' => now()
            ]
        );
        dump($result);    
    }

    public function updateQb()
    {
        $result = DB::table('mahasiswas')
            ->where('npm', '1923240003')
            ->update(
                [
                    'nama_mahasiswa' => 'Messi',
                    'updated_at' => now()
                ]
            );
        dump($result);
    }

    public function deleteQb()
    {
        $result = DB::table('mahasiswas')
            ->where('npm', '=', '1923240003')
            ->delete();
        dump($result);
    }

    public function selectQb()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::table('mahasiswas')->get();
        // dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    public function insertElq()
    {
        $mahasiswa = new Mahasiswa; // instansiasi class mahasiswa
        $mahasiswa->npm = '1923240010'; // isi property
        $mahasiswa->nama_mahasiswa = 'Ronaldo';
        $mahasiswa->tempat_lahir = 'Portugal';
        $mahasiswa->tanggal_lahir = '1985-02-05';
        $mahasiswa->alamat = 'Turin';
        $mahasiswa->save(); // menyimpan data ke tabel mahasiswa
        dump($mahasiswa); // melihat isi $mahasiswa
    }

    public function updateElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '1923240010')->first(); // cari data berdasarkan npm
        $mahasiswa->nama_mahasiswa = 'Cristiano Ronaldo';
        $mahasiswa->save(); // save data
        dump($mahasiswa); // show data
    }

    public function deleteElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '1923240010')->first(); // cari data berdasarkan npm
        $mahasiswa->delete(); // delete data npm tsb
        dump($mahasiswa); // show data
    }

    public function selectElq()
    {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::all();
        // dump($allmahasiswa);
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswa, 'kampus' => $kampus]);
    }
}
