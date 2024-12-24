<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Parents;
use App\Models\Students;
use App\Models\Payment;
use App\Models\User;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // DashboardUserController.php
    public function index()
    {
        $user = auth()->user(); // Dapatkan pengguna yang sedang login

        // Ambil data siswa dari tabel `students` berdasarkan `user_id` di `users`
        $student = Students::where('users_id', $user->id)
            ->with(['parent', 'payment']) // Pastikan `parent` dan `payment` memiliki relasi di model `Students`
            ->first();

        if (!$student) {
            return response()->json(['error' => 'Data siswa tidak ditemukan'], 404);
        }

        return response()->json([
            'student' => [
                'image' => $student->image ? asset('storage/' . $student->image) : null,
                'fullName' => $student->fullName,
                'nik' => $student->nik,
                'classType' => $student->classType,
                'status' => $student->status,
            ],
            'parent' => [
                'fatherName' => $student->parent->fatherName ?? 'N/A',
            ],
            'payment' => [
                'paymentStatus' => $student->payment->paymentStatus ?? 'PENDING',
            ],
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
    public function store(Request $request)
    {
        //
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
