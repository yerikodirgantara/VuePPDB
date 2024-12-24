@extends('layouts.admin') {{-- berfungsi utk halaman web yang sedang dibuat akan mengikuti struktur dan tampilan yang sudah ditentukan,
    Dalam konteks ini, layouts.admin mengacu pada file layout yang berada di dalam folder layouts dengan nama file admin.blade.php --}}

@section('content')
    {{-- apapun yang terdapat dalamm section(id) kontennya akan di tampilkan dalam yield(id) sebelumnya --}}

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Siswa {{ $item->fullName }}</h1>
        </div>

        @if ($errors->any())
            {{-- jika ada permasalahan atau error maka akan munculin div error di bawah --}}
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('students.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    {{-- Data Siswa  --}}
                    <div class="col-md-12">
                        <h4 class="card-title">Data Siswa</h4>
                    </div>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="classType">classType</label>
                                <select class="form-control" name="classType" id="classType">
                                    <option value="KB" {{ $item->classType == 'KB' ? 'selected' : '' }}>
                                        KB (Kelompok Bermain)
                                    </option>
                                    <option value="TK A" {{ $item->classType == 'TK A' ? 'selected' : '' }}>
                                        TK A (Taman Kanan-kanak A)
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fullName">Nama Lengkap</label>
                                <input type="text" class="form-control" name="fullName"
                                    placeholder="Nama Lengkap Siswa" value="{{ $item->fullName }}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nickName">Nama Panggilan</label>
                                <input type="text" class="form-control" name="nickName"
                                    placeholder="Nama Panggilan" value="{{ $item->nickName }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="Laki-laki" {{ $item->gender == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>
                                    <option value="Perempuan" {{ $item->gender == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="birthPlace">Tempat Lahir</label>
                                <input type="text" class="form-control" name="birthPlace"
                                    placeholder="Tempat Lahir" value="{{ $item->birthPlace }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="birthDate">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="birthDate"
                                    placeholder="Tanggal Lahir" value="{{ $item->birthDate }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="religion">Agama</label>
                                <select class="form-control" name="religion" id="religion">
                                    <option value="Islam" {{ $item->religion == 'Islam' ? 'selected' : '' }}>
                                        Islam
                                    </option>
                                    <option value="Kristen" {{ $item->religion == 'Kristen' ? 'selected' : '' }}>
                                        Kristen
                                    </option>
                                    <option value="Katolik" {{ $item->religion == 'Katolik' ? 'selected' : '' }}>
                                        Katolik
                                    </option>
                                    <option value="Hindu" {{ $item->religion == 'Hindu' ? 'selected' : '' }}>
                                        Hindu
                                    </option>
                                    <option value="Budha" {{ $item->religion == 'Budha' ? 'selected' : '' }}>
                                        Budha
                                    </option>
                                    <option value="Konghucu" {{ $item->religion == 'Konghucu' ? 'selected' : '' }}>
                                        Konghucu
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="childOf">Anak ke</label>
                                <input type="text" class="form-control" name="childOf"
                                    placeholder="Anak ke berapa" value="{{ $item->childOf }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="isPKH_KIP">Penerima PKH/KIP</label>
                                <select class="form-control" name="isPKH_KIP" id="isPKH_KIP">
                                    <option value="Ya" {{ $item->isPKH_KIP == 'Ya' ? 'selected' : '' }}>
                                        Ya
                                    </option>
                                    <option value="Tidak" {{ $item->isPKH_KIP == 'Tidak' ? 'selected' : '' }}>
                                        Tidak
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="domicileAddress">Alamat Domisili</label>
                                <textarea class="form-control" name="domicileAddress" placeholder="Alamat Domisili" rows="3">{{ $item->domicileAddress }}
                                </textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kkAddress">Alamat KK</label>
                                <textarea class="form-control" rows="3" name="kkAddress" placeholder="Alamat KK">{{ $item->kkAddress }}
                                </textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Data Ayah --}}
                    <hr>
                    <div class="col-md-12">
                        <h4 class="card-title mt-4">Data Ayah</h4>
                    </div>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fatherName">Nama</label>
                                <input type="text" class="form-control" name="fatherName"
                                    placeholder="Nama Ayah" value="{{ $item->parent->fatherName }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fatherNIK">NIK</label>
                                <input type="text" class="form-control" name="fatherNIK"
                                    placeholder="NIK Ayah" value="{{ $item->parent->fatherNIK }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fatherReligion">Agama</label>
                                <select class="form-control" name="fatherReligion" id="fatherReligion">
                                    <option value="Islam"
                                        {{ $item->parent->fatherReligion == 'Islam' ? 'selected' : '' }}>
                                        Islam
                                    </option>
                                    <option value="Kristen"
                                        {{ $item->parent->fatherReligion == 'Kristen' ? 'selected' : '' }}>
                                        Kristen
                                    </option>
                                    <option value="Katolik"
                                        {{ $item->parent->fatherReligion == 'Katolik' ? 'selected' : '' }}>
                                        Katolik
                                    </option>
                                    <option value="Hindu"
                                        {{ $item->parent->fatherReligion == 'Hindu' ? 'selected' : '' }}>
                                        Hindu
                                    </option>
                                    <option value="Budha"
                                        {{ $item->parent->fatherReligion == 'Budha' ? 'selected' : '' }}>
                                        Budha
                                    </option>
                                    <option value="Konghucu"
                                        {{ $item->parent->fatherReligion == 'Konghucu' ? 'selected' : '' }}>
                                        Konghucu
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fatherLastEdu">Pendidikan Terakhir</label>
                                <input type="text" class="form-control" name="fatherLastEdu"
                                    placeholder="Pendidikan Terakhir Ayah" value="{{ $item->parent->fatherLastEdu }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fatherJob">Pekerjaan</label>
                                <input type="text" class="form-control" name="fatherJob"
                                    placeholder="Pekerjaan Ayah" value="{{ $item->parent->fatherJob }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fatherSallary">Gaji</label>
                                <select class="form-control" name="fatherSallary" id="fatherSallary">
                                    <option value="500 K - 999 K"
                                        {{ $item->parent->fatherSallary == '500 K - 999 K' ? 'selected' : '' }}>
                                        500.000 - 999.999
                                    </option>
                                    <option value="1 jt - 1,999 jt"
                                        {{ $item->parent->fatherSallary == '1 jt - 1,999 jt' ? 'selected' : '' }}>
                                        1.000.000 - 1.999.999
                                    </option>
                                    <option value="2 jt - 4.999 jt"
                                        {{ $item->parent->fatherSallary == '2 jt - 4.999 jt' ? 'selected' : '' }}>
                                        2.000.000 - 4.999.999
                                    </option>
                                    <option value="5 jt - 20 jt"
                                        {{ $item->parent->fatherSallary == '5 jt - 20 jt' ? 'selected' : '' }}>
                                        5.000.000 - 20 jt
                                    </option>
                                    <option value="Diatas 20 jt"
                                        {{ $item->parent->fatherSallary == 'Diatas 20 jt' ? 'selected' : '' }}>
                                        Diatas 20 jt
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fatherPhone">No Telepon</label>
                                <input type="text" class="form-control" name="fatherPhone"
                                    placeholder="No Telepon Ayah" value="{{ $item->parent->fatherPhone }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fatherAddress">Alamat</label>
                                <textarea rows="3" class="form-control" name="fatherAddress"
                                    placeholder="Alamat Ayah">{{ $item->parent->fatherAddress }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Data Ibu --}}
                    <hr>
                    <div class="col-md-12">
                        <h4 class="card-title mt-4">Data Ibu</h4>
                    </div>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="motherName">Nama</label>
                                <input type="text" class="form-control" name="motherName"
                                    placeholder="Nama Ibu" value="{{ $item->parent->motherName }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="motherNIK">NIK</label>
                                <input type="text" class="form-control" name="motherNIK"
                                    placeholder="NIK Ibu" value="{{ $item->parent->motherNIK }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="motherReligion">Agama</label>
                                <select class="form-control" name="motherReligion" id="motherReligion">
                                    <option value="Islam"
                                        {{ $item->parent->motherReligion == 'Islam' ? 'selected' : '' }}>
                                        Islam
                                    </option>
                                    <option value="Kristen"
                                        {{ $item->parent->motherReligion == 'Kristen' ? 'selected' : '' }}>
                                        Kristen
                                    </option>
                                    <option value="Katolik"
                                        {{ $item->parent->motherReligion == 'Katolik' ? 'selected' : '' }}>
                                        Katolik
                                    </option>
                                    <option value="Hindu"
                                        {{ $item->parent->motherReligion == 'Hindu' ? 'selected' : '' }}>
                                        Hindu
                                    </option>
                                    <option value="Budha"
                                        {{ $item->parent->motherReligion == 'Budha' ? 'selected' : '' }}>
                                        Budha
                                    </option>
                                    <option value="Konghucu"
                                        {{ $item->parent->motherReligion == 'Konghucu' ? 'selected' : '' }}>
                                        Konghucu
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="motherLastEdu">Pendidikan Terakhir</label>
                                <input type="text" class="form-control" name="motherLastEdu"
                                    placeholder="Pendidikan Terakhir Ibu" value="{{ $item->parent->motherLastEdu }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="motherJob">Pekerjaan</label>
                                <input type="text" class="form-control" name="motherJob"
                                    placeholder="Pekerjaan Ibu" value="{{ $item->parent->motherJob }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="motherSallary">Gaji</label>
                                <select class="form-control" name="motherSallary" id="motherSallary">
                                    <option value="500 K - 999 K"
                                        {{ $item->parent->motherSallary == '500 K - 999 K' ? 'selected' : '' }}>
                                        500.000 - 999.999
                                    </option>
                                    <option value="1 jt - 1,999 jt"
                                        {{ $item->parent->motherSallary == '1 jt - 1,999 jt' ? 'selected' : '' }}>
                                        1.000.000 - 1.999.999
                                    </option>
                                    <option value="2 jt - 4.999 jt"
                                        {{ $item->parent->motherSallary == '2 jt - 4.999 jt' ? 'selected' : '' }}>
                                        2.000.000 - 4.999.999
                                    </option>
                                    <option value="5 jt - 20 jt"
                                        {{ $item->parent->motherSallary == '5 jt - 20 jt' ? 'selected' : '' }}>
                                        5.000.000 - 20 jt
                                    </option>
                                    <option value="Diatas 20 jt"
                                        {{ $item->parent->motherSallary == 'Diatas 20 jt' ? 'selected' : '' }}>
                                        Diatas 20 jt
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="motherPhone">No Telepon</label>
                                <input type="text" class="form-control" name="motherPhone"
                                    placeholder="No Telepon Ibu" value="{{ $item->parent->motherPhone }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="motherAddress">Alamat</label>
                                <textarea rows="3" class="form-control" name="motherAddress"
                                    placeholder="Alamat Ibu">{{ $item->parent->motherAddress }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Data Dokumen --}}
                    <hr>
                    <div class="col-md-12">
                        <h4 class="card-title mt-4">Data Dokumen</h4>
                    </div>
                    <hr>

                    <div class="row mt-3">
                        {{-- Foto Siswa --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="image">Foto Siswa</label>
                                <div class="image-preview mb-2">
                                    <img id="imagePreview" src="{{ asset('storage/' . $item->image) }}" alt="Foto Siswa"
                                        class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                                <input type="file" class="form-control" name="image" id="image"
                                    onchange="previewImage(event, 'imagePreview')" placeholder="Foto Siswa">
                            </div>
                        </div>

                        {{-- Foto KK --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="imageKK">Foto KK</label>
                                <div class="image-preview mb-2">
                                    <img id="imageKKPreview" src="{{ asset('storage/' . $item->imageKK) }}"
                                        alt="Foto KK" class="img-thumbnail"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                                <input type="file" class="form-control" name="imageKK" id="imageKK"
                                    onchange="previewImage(event, 'imageKKPreview')" placeholder="Foto KK">
                            </div>
                        </div>

                        {{-- Foto Akte Kelahiran --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="imageBirthCert">Foto Akte Kelahiran</label>
                                <div class="image-preview mb-2">
                                    <img id="imageBirthCertPreview" src="{{ asset('storage/' . $item->imageBirthCert) }}"
                                        alt="Foto Akte Kelahiran" class="img-thumbnail"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                                <input type="file" class="form-control" name="imageBirthCert"
                                    id="imageBirthCert" onchange="previewImage(event, 'imageBirthCertPreview')"
                                    placeholder="Foto Akte Kelahiran">
                            </div>
                        </div>

                        {{-- Foto PKH/KIP --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="imagePKH_KIP">Foto PKH/KIP</label>
                                <div class="image-preview mb-2">
                                    <img id="imagePKH_KIPPreview" src="{{ asset('storage/' . $item->imagePKH_KIP) }}"
                                        alt="Foto PKH/KIP" class="img-thumbnail"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                                <input type="file" class="form-control" name="imagePKH_KIP"
                                    id="imagePKH_KIP" onchange="previewImage(event, 'imagePKH_KIPPreview')"
                                    placeholder="Foto PKH/KIP">
                            </div>
                        </div>
                    </div>

                    {{-- Status Siswa  --}}
                    <hr>
                    <div class="col-md-12">
                        <h4 class="card-title mt-4">Status Siswa</h4>
                    </div>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">Status Siswa</label>
                                <select name="status" required class="form-control">
                                    <option value="{{ $item->status }}">
                                        Jangan Ubah ({{ $item->status }})
                                    </option>
                                    <option value="ACTIVE">ACTIVE</option>
                                    <option value="INACTIVE">INACTIVE</option>
                                    <option value="OUT">OUT</option>
                                    <option value="TRANSFERRED">TRANSFERRED</option>
                                    <option value="GRADUATED">GRADUATED</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Edit
                    </button>
                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <script>
        function previewImage(event, previewId) {
            const output = document.getElementById(previewId);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src); // Bebaskan memory
            }
        }
    </script>
@endsection
