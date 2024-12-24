@extends('layouts.admin') {{-- berfungsi utk halaman web yang sedang dibuat akan mengikuti struktur dan tampilan yang sudah ditentukan,
    Dalam konteks ini, layouts.admin mengacu pada file layout yang berada di dalam folder layouts dengan nama file admin.blade.php --}}

@section('content')
    {{-- apapun yang terdapat dalamm section(id) kontennya akan di tampilkan dalam yield(id) sebelumnya --}}

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Transaksi {{ $item->student_payment->fullName }}</h1>
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
                        <th>Nama Lengkap Siswa</th>
                        <td>{{ $item->student_payment->fullName }}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>{{ $item->classType }}</td>
                    </tr>
                    <tr>
                        <th>Anggota Gereja</th>
                        <td>{{ $item->isChurch_Member }}</td>
                    </tr>
                    <tr>
                        <th>Gelombang Pendaftaran</th>
                        <td>{{ $item->regisWave }}</td>
                    </tr>
                    <tr>
                        <th>Total SPI</th>
                        <td>Rp {{ number_format($item->paymentSPI, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Total SPP</th>
                        <td>Rp {{ number_format($item->paymentSPP, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Total Pembayaran</th>
                        <td>Rp {{ number_format($item->paymentTotal, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Metode Pembayaran</th>
                        <td>{{ $item->paymentMethod }}</td>
                    </tr>
                    <tr>
                        <th>Bukti Anggota Gereja</th>
                        <td>
                            @if ($item->imageChurchMember)
                                <a href="{{ asset('storage/' . $item->imageChurchMember) }}" download>Download Foto
                                    Bukti Anggota Gereja</a><br>
                                <img src="{{ asset('storage/' . $item->imageChurchMember) }}" alt="Foto Anggota Gereja" width="350">
                            @else
                                Bukti Anggota Gereja tidak tersedia
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Bukti Pembayaran</th>
                        <td>
                            @if ($item->imagePayment)
                                <a href="{{ asset('storage/' . $item->imagePayment) }}" download>Download Foto
                                    Bukti Pembayaran</a><br>
                                <img src="{{ asset('storage/' . $item->imagePayment) }}" alt="Foto Bukti Pembayaran" width="350">
                            @else
                                Foto Bukti Pembayaran tidak tersedia
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Status Pembayaran</th>
                        <td>{{ $item->paymentStatus }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
