@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Guru</h1>
            <a href="{{ route('teachers.create') }}" class="btn btn-sm btn-primary shadow sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Guru
            </a>
        </div>

        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Lengkap</th>
                                <th>Nama Pendek</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Type Kelas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->fullName }}</td>
                                    <td>{{ $item->shortName }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->classType }}</td>
                                    <td>
                                        <a href="{{ route('teachers.show', $item->id) }}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('teachers.edit', $item->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('teachers.destroy', $item->id) }}" method="POST"
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
