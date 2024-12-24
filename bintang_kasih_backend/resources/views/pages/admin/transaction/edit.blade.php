@extends('layouts.admin') {{-- berfungsi utk halaman web yang sedang dibuat akan mengikuti struktur dan tampilan yang sudah ditentukan,
    Dalam konteks ini, layouts.admin mengacu pada file layout yang berada di dalam folder layouts dengan nama file admin.blade.php --}}

@section('content')
    {{-- apapun yang terdapat dalamm section(id) kontennya akan di tampilkan dalam yield(id) sebelumnya --}}

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Transaksi {{ $item->student_payment->fullName }}</h1>
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
                <form action="{{ route('transaction.update', $item->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="paymentStatus">Status Pembayaran</label>
                        <select name="paymentStatus" required class="form-control">
                            <option value="{{ $item->paymentStatus }}">
                                Jangan Ubah ({{ $item->paymentStatus }})
                            </option>
                            <option value="PENDING">PENDING</option>
                            <option value="PAID">PAID</option>
                            <option value="FAILED">FAILED</option>
                        </select>
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
