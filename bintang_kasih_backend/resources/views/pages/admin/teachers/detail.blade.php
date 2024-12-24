@extends('layouts.admin') {{-- berfungsi utk halaman web yang sedang dibuat akan mengikuti struktur dan tampilan yang sudah ditentukan,
    Dalam konteks ini, layouts.admin mengacu pada file layout yang berada di dalam folder layouts dengan nama file admin.blade.php --}}

@section('content')
    {{-- apapun yang terdapat dalamm section(id) kontennya akan di tampilkan dalam yield(id) sebelumnya --}}

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Guru {{ $item->fullName }}</h1>
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
                        <th>Nama Lengkap</th>
                        <td>{{ $item->fullName }}</td>
                    </tr>
                    <tr>
                        <th>Nama Panggilan</th>
                        <td>{{ $item->shortName }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{ $item->gender }}</td>
                    </tr>
                    <tr>
                        <th>TTL</th>
                        <td>{{ $item->birthPlace }}, {{ $item->birthDate }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $item->phone }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $item->address }}</td>
                    </tr>
                    <tr>
                        <th>Pendidikan Terakhir</th>
                        <td>{{ $item->lastEdu }}</td>
                    </tr>
                    <tr>
                        <th>Type Kelas</th>
                        <td>{{ $item->classType }}</td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
