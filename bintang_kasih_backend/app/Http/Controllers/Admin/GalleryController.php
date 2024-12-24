<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest; // akan menggunakan request dari GalleryRequest yang telah dibuat
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Teachers;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Gallery::with(['teachers'])->get();

        return view('pages.admin.gallery.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teachers::all();
        return view('pages.admin.gallery.create', [
            'teachers' => $teachers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->all(); //berfungsi memanggil semua data form dan memasukan ke variable $data
        $data['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        ); //file foto yang diinput akan tersimpan di assets/gallery pada public

        Gallery::create($data);
        return redirect()->route('gallery.index');
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
    public function edit($id)
    {
        $item = Gallery::findOrFail($id); //findOrFail berfungsi jika data ada maka dimunculin, jika tidak ada maka akan return 404 atau data tidak ketemu
        $teachers = Teachers::all();

        return view('pages.admin.gallery.edit', [
            'item' => $item,
            'teachers' => $teachers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, $id)
    {
        $data = $request->all();

        $data['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        ); //file foto yang diinput akan tersimpan di assets/gallery pada public


        $item = Gallery::findOrFail($id);

        $item->update($data);

        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();

        return redirect()->route('gallery.index');
    }
}
