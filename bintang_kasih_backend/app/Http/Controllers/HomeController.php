<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data dari model, sesuaikan dengan model yang kamu gunakan
        // $data = DataModel::all();  // Misalnya DataModel mengambil data dari tabel tertentu

        // Kirim data ke view 'home'
        // return view('pages.home');
        
        $isLoggedIn = auth()->check();
        return view('pages.home', ['isLoggedIn' => $isLoggedIn]);
    }
}
