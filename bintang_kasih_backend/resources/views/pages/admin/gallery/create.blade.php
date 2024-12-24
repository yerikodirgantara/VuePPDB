@extends('layouts.admin') 

@section('content')
   

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Gallery</h1>
        </div>

        @if ($errors->any()) {{--jika ada permasalahan atau error maka akan munculin div error di bawah --}}
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
                <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="teachers_id">Foto Guru</label>
                        <select name="teachers_id" required class="form-control">
                            <option value="">Pilih Guru</option>
                            @foreach ($teachers as $teacher )
                                <option value="{{ $teacher->id }}">
                                    {{ $teacher->fullName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" placeholder="Image" class="form-control">
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
