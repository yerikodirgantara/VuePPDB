@extends('layouts.admin') {{-- berfungsi utk halaman web yang sedang dibuat akan mengikuti struktur dan tampilan yang sudah ditentukan,
    Dalam konteks ini, layouts.admin mengacu pada file layout yang berada di dalam folder layouts dengan nama file admin.blade.php --}}

@section('content')
    {{-- apapun yang terdapat dalamm section(id) kontennya akan di tampilkan dalam yield(id) sebelumnya --}}
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Guru</h1>
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
                <form action="{{ route('teachers.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="fullName">Nama Lengkap</label>
                        <input type="text" class="form-control" name="fullName" placeholder="Nama Lengkap"
                            value="{{ old('fullName') }}"> {{-- fungsi old berfungsi ketika user mungkin salah input data dan ternyata input error maka data tidak akan hilang --}}
                    </div>

                    <div class="form-group">
                        <label for="shortName">Nama Pendek</label>
                        <input type="text" class="form-control" name="shortName" placeholder="Nama Pendek"
                            value="{{ old('shortName') }}">
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="" disabled selected>Pilih Gender</option>
                            <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="birthPlace">Tempat Lahir</label>
                        <input type="text" class="form-control" name="birthPlace" placeholder="Tempat Lahir"
                            value="{{ old('birthPlace') }}">
                    </div>

                    <div class="form-group">
                        <label for="birthDate">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="birthDate" placeholder="Tanggal Lahir"
                            value="{{ old('birthDate') }}">
                    </div>

                    <div class="form-group">
                        <label for="phone">No Telepon</label>
                        <input type="text" class="form-control" name="phone" placeholder="No Telepon"
                            value="{{ old('phone') }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea name="address" rows="10" class="d-block w-100 form-control">{{ old('address') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="lastEdu">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" name="lastEdu" placeholder="Pendidikan Terakhir"
                            value="{{ old('lastEdu') }}">
                    </div>

                    <div class="form-group">
                        <label for="classType">Type Kelas</label>
                        <input type="text" class="form-control" name="classType" placeholder="Type Kelas"
                            value="{{ old('classType') }}">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Save
                    </button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
