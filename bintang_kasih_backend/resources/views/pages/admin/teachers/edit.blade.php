@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Guru {{ $item->fullName }}</h1>
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
                <form action="{{ route('teachers.update', $item->id) }}" method="POST">
                    @method('PUT') {{-- Kalau ubah data pakainya PUT --}}
                    @csrf
                    <div class="form-group">
                        <label for="fullName">Nama Lengkap</label>
                        <input type="text" class="form-control" name="fullName" placeholder="Nama Lengkap"
                            value="{{ $item->fullName }}">
                    </div>

                    <div class="form-group">
                        <label for="shortName">Nama Pendek</label>
                        <input type="text" class="form-control" name="shortName" placeholder="Nama Pendek"
                            value="{{ $item->shortName }}">
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="Laki-laki" {{ $item->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="Perempuan" {{ $item->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="birthPlace">Tempat Lahir</label>
                        <input type="text" class="form-control" name="birthPlace" placeholder="Tempat Lahir"
                            value="{{ $item->birthPlace }}">
                    </div>

                    <div class="form-group">
                        <label for="birthDate">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="birthDate" placeholder="Tanggal Lahir"
                            value="{{ $item->birthDate }}">
                    </div>

                    <div class="form-group">
                        <label for="phone">No Telepon</label>
                        <input type="text" class="form-control" name="phone" placeholder="No Telepon"
                            value="{{ $item->phone }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea name="address" rows="10" class="d-block w-100 form-control">{{ $item->address }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="lastEdu">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" name="lastEdu" placeholder="Pendidikan Terakhir"
                            value="{{ $item->lastEdu }}">
                    </div>

                    <div class="form-group">
                        <label for="classType">Type Kelas</label>
                        <input type="text" class="form-control" name="classType" placeholder="Type Kelas"
                            value="{{ $item->classType }}">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Edit
                    </button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
