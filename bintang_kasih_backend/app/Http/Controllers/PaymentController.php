<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PaymentRequest; // Pastikan untuk mengimpor PaymentRequest
use App\Models\Payment;
use App\Models\Students;

use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        $student = Students::where('users_id', $user->id)->first();

        if (!$student) {
            return response()->json(['error' => 'Siswa tidak ditemukan.'], 404);
        }

        return response()->json([
            'user' => $user, // Menyertakan data pengguna jika diperlukan
            'students_id' => $student->id, // Mengembalikan ID siswa
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        // Ambil data siswa berdasarkan pengguna yang sedang login
        $user = Auth::user();
        $student = Students::where('users_id', $user->id)->first();

        if (!$student) {
            return response()->json(['error' => 'Siswa tidak ditemukan.'], 404);
        }

        // Tentukan gelombang (wave) dan harga default SPI berdasarkan waktu sekarang
        $currentMonth = now()->month;
        if ($currentMonth == 12 || $currentMonth == 1) {
            $regisWave = 'Gelombang 1 (Desember - Januari)';
            $paymentSPI = 1000000;
        } elseif ($currentMonth >= 2 && $currentMonth <= 3) {
            $regisWave = 'Gelombang 2 (Februari - Maret)';
            $paymentSPI = 1100000;
        } elseif ($currentMonth >= 4 && $currentMonth <= 7) {
            $regisWave = 'Gelombang 3 (April - Juli)';
            $paymentSPI = 1200000;
        } else {
            $regisWave = 'Gelombang 1 (Desember - Januari)';
            $paymentSPI = 1000000;
        }

        // Sesuaikan harga SPI jika anggota gereja
        if ($request->isChurch_Member === 'Ya') {
            $paymentSPI = 750000; // Ubah harga SPI menjadi 750 ribu
        }

        // Hitung SPP berdasarkan tipe kelas
        $paymentSPP = $this->calculateSPP($request->classType);

        // Hitung total pembayaran SPI berdasarkan metode pembayaran
        if ($request->paymentMethod === 'Partial') {
            $paymentSPI = $paymentSPI * 0.3; // Jika Partial, bayar 30% dari SPI
        }

        // Hitung total pembayaran keseluruhan
        $paymentTotal = $paymentSPI + $paymentSPP;

        // Simpan bukti pembayaran jika ada
        if ($request->hasFile('imagePayment')) {
            $file = $request->file('imagePayment');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $fotoPembayaran = $file->storeAs('uploads/imagePayment', $fileName, 'public');
        } else {
            $fotoPembayaran = null;
        }

        // Buat record pembayaran baru
        $payment = new Payment();
        $payment->students_id = $student->id;
        $payment->isChurch_Member = $request->isChurch_Member;
        $payment->regisWave = $regisWave;
        $payment->classType = $request->classType;
        $payment->paymentMethod = $request->paymentMethod;
        $payment->paymentSPI = $paymentSPI; // Total SPI yang sudah disesuaikan
        $payment->paymentSPP = $paymentSPP;
        $payment->paymentTotal = $paymentTotal;
        $payment->paymentStatus = 'PENDING';
        $payment->imagePayment = $fotoPembayaran;

        $payment->save();

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil disimpan!',
            'student_id' => $student->id // Tambahkan ID siswa ke response
        ], 201);
    }

    private function calculateSPP($classType)
    {
        return $classType === 'KB' ? 100000 : 115000;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
