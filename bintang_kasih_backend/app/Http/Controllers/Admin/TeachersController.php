<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeachersRequest; // akan menggunakan request dari TravelPackageRequest yang telah dibuat
use Illuminate\Http\Request;
use App\Models\Teachers;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Teachers::all(); //karena akan mengambil semua data travel package

        return view('pages.admin.teachers.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeachersRequest $request)
    {
        $data = $request->all(); //berfungsi memanggil semua data form dan memasukan ke variable $data

        Teachers::create($data);
        return redirect()->route('teachers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Teachers::find($id); //findOrFail berfungsi jika data ada maka dimunculin, jika tidak ada maka akan return 404 atau data tidak ketemu

        return view('pages.admin.teachers.detail', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Teachers::findOrFail($id); //findOrFail berfungsi jika data ada maka dimunculin, jika tidak ada maka akan return 404 atau data tidak ketemu

        return view('pages.admin.teachers.edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeachersRequest $request, $id)
    {
        $data = $request->all();

        $item = Teachers::findOrFail($id);

        $item->update($data);

        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Teachers::findOrFail($id);
        $item->delete();

        return redirect()->route('teachers.index');
    }
}
