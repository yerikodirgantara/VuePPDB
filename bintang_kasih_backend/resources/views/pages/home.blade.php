<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- AOS CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="../../../../public/frontend/images/image.jpg" />
    <title>Pendaftaran Peserta Didik Baru KB & TK Bintang Kasih</title>
    <title>Bintang Kasih</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        {{-- <Navmenu />
        @yield('content')
        <Footer />
        <a href="https://wa.me/6282225386373" class="whatsapp-float" target="_blank">
            <i class="bi bi-whatsapp"></i>
        </a> --}}
    </div>
</body>

</html>

<!-- AOS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>
    AOS.init();
    window.isLoggedIn = @json($isLoggedIn);
</script>
