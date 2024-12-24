<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Parents;
use App\Models\Students;
use App\Http\Requests\FormulirRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FormulirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'user' => auth()->user() // Mendapatkan user yang sedang login
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
    public function store(FormulirRequest $request)
    {
        // Ambil NIK dari user yang login
        // $$user = Auth::user();

        // // Debugging: Tampilkan user data
        // dd($user);

        // // Ambil NIK dari user yang login
        // $nik = $user->nik;

        try {
            // Handle file uploads
            $imagePKH_KIP = null;
            $fotoAnak = null;
            $fotoKK = null;
            $fotoAkte = null;

            // Handle imagePKH_KIP upload if necessary
            if ($request->isPKH_KIP === 'Ya' && $request->hasFile('imagePKH_KIP')) {
                $file = $request->file('imagePKH_KIP');

                // Dapatkan nama asli file
                $originalName = $file->getClientOriginalName();

                // Tambahkan timestamp untuk memastikan nama unik
                $fileName = time() . '_' . $originalName;

                // Simpan file dengan nama asli ke folder 'uploads/imagePKH_KIP' di storage/public
                $imagePKH_KIP = $file->storeAs('uploads/imagePKH_KIP', $fileName, 'public');
            }


            // Handle other file uploads
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                // Dapatkan nama file asli
                $originalName = $file->getClientOriginalName();

                // Tambahkan timestamp untuk menghindari konflik nama file
                $fileName = time() . '_' . $originalName;

                // Simpan file dengan nama asli ke folder 'uploads/image' di storage/public
                $fotoAnak = $file->storeAs('uploads/image', $fileName, 'public');
            }

            if ($request->hasFile('imageKK')) {
                $file = $request->file('imageKK');

                // Dapatkan nama file asli
                $originalName = $file->getClientOriginalName();

                // Tambahkan timestamp untuk menghindari konflik nama file
                $fileName = time() . '_' . $originalName;

                // Simpan file dengan nama asli ke folder 'uploads/imageKK' di storage/public
                $fotoKK = $file->storeAs('uploads/imageKK', $fileName, 'public');
            }

            if ($request->hasFile('imageBirthCert')) {
                $file = $request->file('imageBirthCert');

                // Dapatkan nama file asli
                $originalName = $file->getClientOriginalName();

                // Tambahkan timestamp untuk menghindari konflik nama file
                $fileName = time() . '_' . $originalName;

                // Simpan file dengan nama asli ke folder 'uploads/imageBirthCert' di storage/public
                $fotoAkte = $file->storeAs('uploads/imageBirthCert', $fileName, 'public');
            }

            // Save parent data
            $parents = Parents::create([
                'fatherName' => $request->fatherName,
                'fatherNIK' => $request->fatherNIK,
                'fatherAddress' => $request->fatherAddress,
                'fatherReligion' => $request->fatherReligion,
                'fatherLastEdu' => $request->fatherLastEdu,
                'fatherJob' => $request->fatherJob,
                'fatherSallary' => $request->fatherSallary,
                'fatherPhone' => $request->fatherPhone,

                'motherName' => $request->motherName,
                'motherNIK' => $request->motherNIK,
                'motherAddress' => $request->motherAddress,
                'motherReligion' => $request->motherReligion,
                'motherLastEdu' => $request->motherLastEdu,
                'motherJob' => $request->motherJob,
                'motherSallary' => $request->motherSallary,
                'motherPhone' => $request->motherPhone,
            ]);

            $parents_id = $parents->id;

            // Save student data
            if ($parents) {
                // Parents berhasil disimpan
                $students = Students::create([
                    'users_id' => Auth::id(),
                    'nik' => Auth::user()->nik,
                    'fullName' => $request->fullName,
                    'nickName' => $request->nickName,
                    'gender' => $request->gender,
                    'birthPlace' => $request->birthPlace,
                    'birthDate' => $request->birthDate,
                    'religion' => $request->religion,
                    'childOf' => $request->childOf,
                    'domicileAddress' => $request->domicileAddress,
                    'kkAddress' => $request->kkAddress,
                    'isPKH_KIP' => $request->isPKH_KIP,
                    'image' => $fotoAnak,
                    'imageKK' => $fotoKK,
                    'imageBirthCert' => $fotoAkte,
                    'imagePKH_KIP' => $imagePKH_KIP,
                    'status' => 'INACTIVE',
                    'classType' => $request->classType,
                    'parents_id' => $parents_id // Foreign key dari Parents
                ]);
            }

            return response()->json(['success' => true, 'message' => 'Pendaftaran siswa berhasil disimpan'], 201);
        } catch (\Exception $e) {
            // Tangkap error dan berikan respons yang tepat
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }



    // Method to handle file uploads
    // private function uploadFile($file, $folder)
    // {
    //     $filename = time() . '-' . $file->getClientOriginalName();
    //     $file->move(public_path('uploads/' . $folder), $filename);
    //     return 'uploads/' . $folder . '/' . $filename;
    // }

    // versi4
    // // Start Transaction
    // DB::beginTransaction();
    // try {
    //     // Simpan data orang tua (ParentModel)
    //     $parent = new ParentsPackage();
    //     $parent->fatherName = $request->input('parent.fatherName');
    //     $parent->fatherNIK = $request->input('parent.fatherNIK');
    //     $parent->fatherAddress = $request->input('parent.fatherAddress');
    //     $parent->fatherReligion = $request->input('parent.fatherReligion');
    //     $parent->fatherLastEdu = $request->input('parent.fatherLastEdu');
    //     $parent->fatherJob = $request->input('parent.fatherJob');
    //     $parent->fatherSallary = $request->input('parent.fatherSallary');
    //     $parent->fatherPhone = $request->input('parent.fatherPhone');

    //     $parent->motherName = $request->input('parent.motherName');
    //     $parent->motherNIK = $request->input('parent.motherNIK');
    //     $parent->motherAddress = $request->input('parent.motherAddress');
    //     $parent->motherReligion = $request->input('parent.motherReligion');
    //     $parent->motherLastEdu = $request->input('parent.motherLastEdu');
    //     $parent->motherJob = $request->input('parent.motherJob');
    //     $parent->motherSallary = $request->input('parent.motherSallary');
    //     $parent->motherPhone = $request->input('parent.motherPhone');

    //     $parent->save();

    //     // Simpan data siswa (Student)
    //     $student = new StudentsPackage();
    //     $student->fullName = $request->input('student.fullName');
    //     $student->nickName = $request->input('student.nickName');
    //     $student->gender = $request->input('student.gender');
    //     $student->classType = $request->input('student.classType');
    //     $student->birthPlace = $request->input('student.birthPlace');
    //     $student->birthDate = $request->input('student.birthDate');
    //     $student->religion = $request->input('student.religion');
    //     $student->childOf = $request->input('student.childOf');
    //     $student->domicileAddress = $request->input('student.domicileAddress');
    //     $student->kkAddress = $request->input('student.kkAddress');
    //     $student->isPKH_KIP = $request->input('student.isPKH_KIP', 'Tidak'); // Default to 'Tidak'

    //     // Assign parent_id from saved parent
    //     $student->parents_id = $parent->id;

    //     // Optional: Assign default value for 'status'
    //     $student->status = 'INACTIVE'; // Set default status

    //     // Handle image uploads if available
    //     if ($request->hasFile('student.image')) {
    //         $student->image = $this->uploadFile($request->file('student.image'), 'student_images');
    //     }
    //     if ($request->hasFile('student.imageKK')) {
    //         $student->imageKK = $this->uploadFile($request->file('student.imageKK'), 'student_images');
    //     }
    //     if ($request->hasFile('student.imageBirthCert')) {
    //         $student->imageBirthCert = $this->uploadFile($request->file('student.imageBirthCert'), 'student_images');
    //     }
    //     if ($request->hasFile('student.imagePKH_KIP') && $student->isPKH_KIP === 'Ya') {
    //         $student->imagePKH_KIP = $this->uploadFile($request->file('student.imagePKH_KIP'), 'student_images');
    //     }

    //     $student->save();

    //     // Commit Transaction
    //     DB::commit();

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Data successfully saved!',
    //     ], 201);
    // } catch (\Exception $e) {
    //     // Rollback Transaction in case of error
    //     DB::rollBack();

    //     return response()->json([
    //         'success' => false,
    //         'message' => 'Failed to save data!',
    //         'error' => $e->getMessage(),
    //     ], 500);
    // }

    // // versi3
    // \DB::beginTransaction(); // Mulai transaksi

    // try {
    //     // Simpan data parent terlebih dahulu
    //     $parent = new ParentsPackage();
    //     $parent->fill($request->input('parent')); // Mengisi data parent dari input form
    //     $parent->save(); // Simpan ke database

    //     // Simpan data student dan relasikan dengan parent
    //     $student = new StudentsPackage();
    //     $student->fill($request->input('student')); // Mengisi data student dari input form
    //     $student->parent_id = $parent->id; // Menetapkan foreign key (relasi dengan parent)
    //     $student->status = 'INACTIVE'; // Misalkan otomatis set status 'unactive'
    //     $student->save(); // Simpan ke database

    //     DB::commit(); // Commit transaksi jika semua berhasil
    //     return response()->json(['success' => true]);
    // } catch (\Exception $e) {
    //     DB::rollBack(); // Batalkan transaksi jika ada kesalahan
    //     return response()->json(['error' => $e->getMessage()], 500);
    // }


    // versi2
    // $formData = $request->all();

    // $student = new StudentsPackage(); // Sesuaikan dengan nama model Student
    // $student->fill($formData['student']); // Isi semua data student dari form
    // $student->status = 'INACTIVE'; // Set status secara otomatis menjadi 'unactive'
    // $student->save(); // Simpan data ke dalam database

    // // Simpan data parent
    // $parent = new ParentsPackage(); // Sesuaikan nama model Parent
    // $parent->fill($formData['parent']);
    // $parent->save();

    // return response()->json(['message' => 'Data berhasil disimpan']);


    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mengambil data user yang sedang login dan siswa terkait
        $user = Auth::user();
        $student = $user->student; // Mengambil data siswa yang terhubung dengan user

        return response()->json($student);
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
