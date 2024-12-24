@extends('layouts.admin') {{-- berfungsi utk halaman web yang sedang dibuat akan mengikuti struktur dan tampilan yang sudah ditentukan,
    Dalam konteks ini, layouts.admin mengacu pada file layout yang berada di dalam folder layouts dengan nama file admin.blade.php --}}

@section('content')
    {{-- apapun yang terdapat dalamm section(id) kontennya akan di tampilkan dalam yield(id) sebelumnya --}}

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Siswa {{ $item->fullName }}</h1>
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
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $item->id }}</td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td>{{ $item->nik }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $item->fullName }}</td>
                    </tr>
                    <tr>
                        <th>Nama Panggilan</th>
                        <td>{{ $item->nickName }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{ $item->gender }}</td>
                    </tr>
                    <tr>
                        <th>Tempat, Tanggal Lahir</th>
                        <td>{{ $item->birthPlace }}, {{ $item->birthDate }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{ $item->religion }}</td>
                    </tr>
                    <tr>
                        <th>Anak ke</th>
                        <td>{{ $item->childOf }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Domisili</th>
                        <td>{{ $item->domicileAddress }}</td>
                    </tr>
                    <tr>
                        <th>Alamat KK</th>
                        <td>{{ $item->kkAddress }}</td>
                    </tr>
                    <tr>
                        <th>Penerima PKH/KIP</th>
                        <td>{{ $item->isPKH_KIP }}</td>
                    </tr>
                    <tr>
                        <th>Foto Siswa</th>
                        <td>
                            @if ($item->image)
                                <a href="{{ asset('storage/' . $item->image) }}" download>Download Foto</a><br>
                                <img src="{{ asset('storage/' . $item->image) }}" alt="Foto Siswa" width="350">
                            @else
                                Foto siswa tidak tersedia
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Foto KK</th>
                        <td>
                            @if ($item->imageKK)
                                <a href="{{ asset('storage/' . $item->imageKK) }}" download>Download Foto KK</a><br>
                                <img src="{{ asset('storage/' . $item->imageKK) }}" alt="Foto KK" width="350">
                            @else
                                Foto KK tidak tersedia
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Foto Akta Kelahiran</th>
                        <td>
                            @if ($item->imageBirthCert)
                                <a href="{{ asset('storage/' . $item->imageBirthCert) }}" download>Download Foto Akta
                                    Kelahiran</a><br>
                                <img src="{{ asset('storage/' . $item->imageBirthCert) }}" alt="Foto Akta Kelahiran"
                                    width="350">
                            @else
                                Foto Akta Kelahiran tidak tersedia
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Foto PKH/KIP</th>
                        <td>
                            @if ($item->imagePKH_KIP)
                                <a href="{{ asset('storage/' . $item->imagePKH_KIP) }}" download>Download Foto
                                    PKH/KIP</a><br>
                                <img src="{{ asset('storage/' . $item->imagePKH_KIP) }}" alt="Foto PKH/KIP" width="350">
                            @else
                                Foto PKH/KIP tidak tersedia
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>{{ $item->classType }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $item->status }}</td>
                    </tr>
                </table>

                <h5>Data Ayah</h5>


                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Pekerjaan</th>
                        <th>Gaji</th>
                        <th>No Telepon</th>
                    </tr>
                    <tr>
                        <td>{{ $item->parent->fatherName }}</td>
                        <td>{{ $item->parent->fatherNIK }}</td>
                        <td>{{ $item->parent->fatherAddress }}</td>
                        <td>{{ $item->parent->fatherReligion }}</td>
                        <td>{{ $item->parent->fatherLastEdu }}</td>
                        <td>{{ $item->parent->fatherJob }}</td>
                        <td>{{ $item->parent->fatherSallary }}</td>
                        <td>{{ $item->parent->fatherPhone }}</td>
                    </tr>
                </table>

                <h5>Data Ibu</h5>

                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Pekerjaan</th>
                        <th>Gaji</th>
                        <th>No Telepon</th>
                    </tr>
                    <tr>
                        <td>{{ $item->parent->motherName }}</td>
                        <td>{{ $item->parent->motherNIK }}</td>
                        <td>{{ $item->parent->motherAddress }}</td>
                        <td>{{ $item->parent->motherReligion }}</td>
                        <td>{{ $item->parent->motherLastEdu }}</td>
                        <td>{{ $item->parent->motherJob }}</td>
                        <td>{{ $item->parent->motherSallary }}</td>
                        <td>{{ $item->parent->motherPhone }}</td>
                    </tr>
                </table>

                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
