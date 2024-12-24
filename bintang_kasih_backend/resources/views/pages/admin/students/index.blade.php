@extends('layouts.admin') {{-- berfungsi utk halaman web yang sedang dibuat akan mengikuti struktur dan tampilan yang sudah ditentukan,
    Dalam konteks ini, layouts.admin mengacu pada file layout yang berada di dalam folder layouts dengan nama file admin.blade.php --}}

@section('content')
    {{-- apapun yang terdapat dalamm section(id) kontennya akan di tampilkan dalam yield(id) sebelumnya --}}

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
            {{-- <a href="{{ route('students.create') }}" class="btn btn-sm btn-primary shadow sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Siswa
            </a> --}}
        </div>

        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Lengkap</th>
                                <th>Gender</th>
                                <th>Tempat, Tanggal lahir</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->fullName }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->birthPlace}}, {{ $item->birthDate}}</td>
                                    <td>{{ $item->classType }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('students.show', $item->id) }}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('students.edit', $item->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('students.destroy', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
