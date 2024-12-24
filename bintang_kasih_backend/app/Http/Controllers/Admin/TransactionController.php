<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest; // akan menggunakan request dari TransactionRequest yang telah dibuat
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Str; //memakai library atau fungsi string dari laravel

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Payment::with([
            'student_payment'
        ])->get();

        return view('pages.admin.transaction.index', [
            'items' => $items
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
    public function store(TransactionRequest $request)
    {
        $data = $request->all(); //berfungsi memanggil semua data form dan memasukan ke variable $data

        Payment::create($data);
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Payment::with([
            'student_payment'
        ])->findOrFail($id); //findOrFail berfungsi jika data ada maka dimunculin, jika tidak ada maka akan return 404 atau data tidak ketemu

        return view('pages.admin.transaction.detail', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Payment::findOrFail($id); //findOrFail berfungsi jika data ada maka dimunculin, jika tidak ada maka akan return 404 atau data tidak ketemu

        return view('pages.admin.transaction.edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $request, $id)
    {
        $data = $request->all();

        $item = Payment::findOrFail($id);

        $item->update($data);

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Payment::findOrFail($id);
        $item->delete();

        return redirect()->route('transaction.index');
    }
}
