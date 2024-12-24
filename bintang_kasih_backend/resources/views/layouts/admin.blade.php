<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bintang Kasih Admin</title>

    @include('includes.admin.style')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('includes.admin.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('includes.admin.navbar')

                @yield('content') {{-- yield berfungsi untuk menyediakan suatu space kosong yang dimana akan diisi kontennya
                    (menampilkan konten yang sudah ditentukan) sesuai dengan parameter dari id --}}

            </div>
            <!-- End of Main Content -->

            @include('includes.admin.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <form id="logoutForm" method="POST">
                        @csrf
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('includes.admin.script')

    <script>
        document.getElementById('logoutForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman form secara default

            // Kirim permintaan AJAX untuk logout
            fetch('/api/logout', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({}),
                })
                .then(response => {
                    if (response.ok) {
                        // Jika logout berhasil, beri tahu frontend
                        localStorage.removeItem("user"); // Menghapus data user dari localStorage
                        localStorage.removeItem("token"); // Menghapus token dari localStorage

                        // Emit event ke window untuk memberitahu Vue.js
                        window.dispatchEvent(new Event('logout')); // Emit event logout
                        window.location.href = '/'; // Redirect sesuai kebutuhan
                    } else {
                        alert('Logout failed. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while logging out.');
                });
        });
    </script>
</body>

</html>
