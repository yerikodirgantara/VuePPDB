<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormulirRequest;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::all();

        return view('pages.admin.students.index', [
            'students' => $students
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
    public function store(FormRequest $request)
    {
        $data = $request->all();

        Students::create($data);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Students::with(['parent'])->findOrFail($id);

        return view('pages.admin.students.detail', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Students::findOrFail($id);

        return view('pages.admin.students.edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormulirRequest $request, $id)
    {
        // Temukan record siswa
        $student = Students::findOrFail($id);

        // Update data siswa tanpa gambar
        $studentData = $request->only([
            'nik',
            'fullName',
            'nickName',
            'gender',
            'birthPlace',
            'birthDate',
            'religion',
            'childOf',
            'domicileAddress',
            'kkAddress',
            'isPKH_KIP',
            'status', 
            'classType',
            'users_id'
        ]);

        // Handle upload gambar siswa
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($student->image && Storage::exists('public/' . $student->image)) {
                Storage::delete('public/' . $student->image);
                Log::info("Deleted old image: {$student->image}");
            }

            // Dapatkan file gambar baru
            $file = $request->file('image');
            $originalName = $file->getClientOriginalName();
            $fileName = time() . '_' . $originalName;

            // Simpan gambar baru
            $studentData['image'] = $file->storeAs('uploads/image', $fileName, 'public');
            Log::info("New image saved: {$studentData['image']}");
        }

        // Handle upload gambar KK (jika ada)
        if ($request->hasFile('imageKK')) {
            // Hapus gambar lama jika ada
            if ($student->imageKK && Storage::exists('public/' . $student->imageKK)) {
                Storage::delete('public/' . $student->imageKK);
                Log::info("Deleted old imageKK: {$student->imageKK}");
            }

            // Dapatkan file gambar baru
            $fileKK = $request->file('imageKK');
            $fileNameKK = time() . '_' . $fileKK->getClientOriginalName();

            // Simpan gambar KK baru
            $studentData['imageKK'] = $fileKK->storeAs('uploads/imageKK', $fileNameKK, 'public');
            Log::info("New imageKK saved: {$studentData['imageKK']}");
        }

        if ($request->hasFile('imageBirthCert')) {
            // Hapus gambar lama jika ada
            if ($student->imageBirthCert && Storage::exists('public/' . $student->imageBirthCert)) {
                Storage::delete('public/' . $student->imageBirthCert);
                Log::info("Deleted old imageBirthCert: {$student->imageBirthCert}");
            }

            $fileAkte = $request->file('imageBirthCert');
            $fileNameAkte = time() . '_' . $fileAkte->getClientOriginalName();

            // Simpan gambar baru
            $studentData['imageBirthCert'] = $fileAkte->storeAs('uploads/imageBirthCert', $fileNameAkte, 'public');
        }

        if ($request->hasFile('imagePKH_KIP')) {
            // Hapus gambar lama jika ada
            if ($student->imagePKH_KIP && Storage::exists('public/' . $student->imagePKH_KIP)) {
                Storage::delete('public/' . $student->imagePKH_KIP);
                Log::info("Deleted old imagePKH_KIP: {$student->imagePKH_KIP}");
            }

            $filePKH_KIP = $request->file('imagePKH_KIP');
            $fileNamePKH_KIP = time() . '_' . $filePKH_KIP->getClientOriginalName();

            // Simpan gambar baru
            $studentData['imagePKH_KIP'] = $filePKH_KIP->storeAs('uploads/imagePKH_KIP', $fileNamePKH_KIP, 'public');
        }

        // Gabungkan data siswa dengan path gambar baru
        $student->update($studentData);

        // Log sebelum dan sesudah menyimpan
        $student->save();

        // Update parent data if available
        if ($student->parent) {
            $parent = $student->parent;

            // Update parent data
            $parentData = $request->only([
                'fatherName',
                'fatherNIK',
                'fatherAddress',
                'fatherReligion',
                'fatherLastEdu',
                'fatherJob',
                'fatherSallary',
                'fatherPhone',
                'motherName',
                'motherNIK',
                'motherAddress',
                'motherReligion',
                'motherLastEdu',
                'motherJob',
                'motherSallary',
                'motherPhone'
            ]);
            $parent->update($parentData);

            // Handle parent image uploads
            if ($request->hasFile('imageFatherKTP')) {
                // Hapus gambar lama jika ada
                if ($parent->imageFatherKTP && Storage::exists('public/' . $parent->imageFatherKTP)) {
                    Storage::delete('public/' . $parent->imageFatherKTP);
                    Log::info("Deleted old imageFatherKTP: {$parent->imageFatherKTP}");
                }
                // Simpan gambar baru
                $parent->imageFatherKTP = $request->file('imageFatherKTP')->store('uploads/imageFatherKTP', 'public');
            }

            if ($request->hasFile('imageMotherKTP')) {
                // Hapus gambar lama jika ada
                if ($parent->imageMotherKTP && Storage::exists('public/' . $parent->imageMotherKTP)) {
                    Storage::delete('public/' . $parent->imageMotherKTP);
                    Log::info("Deleted old imageMotherKTP: {$parent->imageMotherKTP}");
                }
                // Simpan gambar baru
                $parent->imageMotherKTP = $request->file('imageMotherKTP')->store('uploads/imageMotherKTP', 'public');
            }

            // Simpan model orang tua agar perubahan tersimpan di database
            $parent->save();
        }

        return redirect()->route('students.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Students::findOrFail($id);
        $item->delete();

        return redirect()->route('students.index');
    }
}
