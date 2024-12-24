<template>
    <div>
        <Navmenu />

        <!-- Hero Section with Carousel -->
        <section
            class="hero-section text-white text-center d-flex justify-content-center align-items-center"
        >
            <div
                id="heroCarousel"
                class="carousel slide"
                data-bs-ride="carousel"
                data-bs-interval="3000"
            >
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img
                            src="../../../../public/frontend/images/gambar_5.jpg"
                            class="d-block w-100 shadow-lg"
                            alt="First slide"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../../../public/frontend/images/gambar_6.jpg"
                            class="d-block w-100 shadow-lg"
                            alt="Second slide"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../../../public/frontend/images/gambar_7.jpg"
                            class="d-block w-100 shadow-lg"
                            alt="Third slide"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../../../public/frontend/images/gambar_2.jpg"
                            class="d-block w-100 shadow-lg"
                            alt="Fourth slide"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../../../public/frontend/images/gambar_1.jpg"
                            class="d-block w-100 shadow-lg"
                            alt="Fifth slide"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../../../public/frontend/images/gambar_9.jpg"
                            class="d-block w-100 shadow-lg"
                            alt="Sixth slide"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../../../public/frontend/images/gambar_11.jpg"
                            class="d-block w-100 shadow-lg"
                            alt="Sixth slide"
                        />
                    </div>
                </div>
                <button
                    class="carousel-control-prev"
                    type="button"
                    data-bs-target="#heroCarousel"
                    data-bs-slide="prev"
                >
                    <span
                        class="carousel-control-prev-icon"
                        aria-hidden="true"
                    ></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button
                    class="carousel-control-next"
                    type="button"
                    data-bs-target="#heroCarousel"
                    data-bs-slide="next"
                >
                    <span
                        class="carousel-control-next-icon"
                        aria-hidden="true"
                    ></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Hero Text Content -->
            <div class="content">
                <h1 class="hero-title">
                    Selamat Datang di <br />
                    <span class="typewriter-effect"
                        >{{ displayedText }}<span class="cursor">|</span></span
                    >
                    Bintang Kasih
                </h1>
                <p class="hero-subtitle">
                    Membentuk generasi yang cerdas dan berbudi pekerti
                </p>
                <button @click="showSejarahAlert" class="btn btn-purple mt-3">
                    Sejarah Lengkap
                </button>
            </div>
        </section>
        <!-- Keunggulan Section with Enhanced Styling -->
        <section id="keunggulan" class="py-5 bg-light" style="padding-top: 80px; padding-bottom: 80px;">
    <div class="container my-5">
        <h2 class="text-center mb-5 fw-bold" data-aos="fade-up">
            ✨ Tentang KB & TK Bintang Kasih ✨
        </h2>
        <div class="row g-4">
            <div class="col-md-3" data-aos="fade-right" data-aos-delay="100">
                <div class="card text-center shadow border-0 h-100">
                    <div class="card-body">
                        <i class="bi bi-book fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title fw-semibold">
                            Mendidik Siswa sesuai dengan Ajaran Kristiani
                        </h5>
                        <p class="card-text text-muted">
                            KB & TK Bintang Kasih berada dekat gereja, mengajarkan nilai Kristiani melalui kegiatan rohani seperti Paskah dan Natal.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="card text-center shadow border-0 h-100">
                    <div class="card-body">
                        <i class="bi bi-person-arms-up fa-3x mb-3 text-success"></i>
                        <h5 class="card-title fw-semibold">
                            Mendidik Siswa Bergotong Royong & Toleransi
                        </h5>
                        <p class="card-text text-muted">
                            Menanamkan nilai gotong royong dan toleransi kepada siswa melalui aktivitas dan interaksi harian.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-left" data-aos-delay="300">
                <div class="card text-center shadow border-0 h-100">
                    <div class="card-body">
                        <i class="bi bi-mortarboard fa-3x mb-3 text-warning"></i>
                        <h5 class="card-title fw-semibold">
                            Siap menjadi Lulusan yang Unggul
                        </h5>
                        <p class="card-text text-muted">
                            Menghasilkan lulusan cerdas, berbudi pekerti luhur, dan siap menghadapi tantangan dunia.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-left" data-aos-delay="400">
                <div class="card text-center shadow border-0 h-100">
                    <div class="card-body">
                        <i class="bi bi-award fa-3x mb-3 text-danger"></i>
                        <h5 class="card-title fw-semibold">
                            Sekolah dengan Akreditasi B
                        </h5>
                        <p class="card-text text-muted">
                            Komitmen memberikan pendidikan berkualitas sesuai standar nasional dengan akreditasi B.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- Visi Misi Section Fullscreen -->
<section
    id="visi-misi"
    class="py-5"
    style="
        background: linear-gradient(to right, #f7f8fc, #e2e6f0);
        scroll-margin-top: 80px; /* Jarak aman saat di-scroll dari navmenu */
    "
>
    <div class="container my-5">
        <h2
            class="text-center mb-4 text-primary"
            data-aos="fade-up"
            style="font-family: 'Poppins', sans-serif; font-weight: bold"
        >
            ✨ Visi dan Misi ✨
        </h2>
        <div class="row d-flex align-items-stretch">
            <!-- Visi Card -->
            <div class="col-md-6 mb-4" data-aos="fade-right">
                <div
                    class="card text-center h-100 shadow-lg border-0 rounded-lg"
                    style="transition: transform 0.3s ease, box-shadow 0.3s ease"
                >
                    <div
                        class="card-body d-flex flex-column justify-content-between"
                    >
                        <i
                            class="fa fa-compass fa-3x text-primary mb-3"
                            style="transition: transform 0.3s ease"
                        ></i>
                        <h5
                            class="card-title"
                            style="font-size: 1.6rem; color: #333"
                        >
                            Visi
                        </h5>
                        <p
                            class="card-text text-justify mt-auto"
                            style="font-size: 1.1rem; color: #555"
                        >
                            Mewujudkan generasi yang takut akan Tuhan, menjadi
                            terang dan berkat bagi sesama dengan dasar Kasih.
                            Dengan bimbingan yang penuh kasih, KB dan TK Bintang
                            Kasih mencetak generasi yang tidak hanya cerdas,
                            tetapi juga memiliki hati yang takut akan Tuhan,
                            siap menjadi cahaya di dunia dan berkat bagi
                            sesama. Generasi yang dibentuk sesuai dengan
                            nilai-nilai ilahi dan kasih yang tulus akan membawa
                            perubahan positif, menebar kebaikan di sekitarnya,
                            serta memberi makna dalam setiap tindakan yang
                            dilakukan. Di dalam setiap aspek kehidupan, kami
                            berusaha menanamkan nilai-nilai kasih sayang,
                            kepedulian, dan integritas. Bahwa generasi yang
                            tumbuh dengan rasa tanggung jawab dan kecintaan
                            terhadap Tuhan dan sesama akan menjadi pemimpin masa
                            depan yang mampu menciptakan dunia yang lebih baik.
                            Dengan metode pendidikan yang menyeluruh, KB dan TK
                            Bintang Kasih mempersiapkan anak-anak untuk menjadi
                            pribadi yang mandiri, berkarakter kuat, dan mampu
                            menghadapi tantangan di berbagai aspek kehidupan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Misi Card -->
            <div class="col-md-6 mb-4" data-aos="fade-left">
                <div
                    class="card text-center h-100 shadow-lg border-0 rounded-lg"
                    style="transition: transform 0.3s ease, box-shadow 0.3s ease"
                >
                    <div class="card-body">
                        <i
                            class="fa fa-flag fa-3x text-warning mb-3"
                            style="transition: transform 0.3s ease"
                        ></i>
                        <h5
                            class="card-title"
                            style="font-size: 1.6rem; color: #333"
                        >
                            Misi
                        </h5>
                        <ol
                            class="misi-list text-left"
                            style="font-size: 1.1rem; color: #555; padding-left: 1.5rem"
                        >
                            <li>
                                Menolong anak didik memiliki kehidupan rohani
                                yang bertumbuh, mengenal Tuhan sejak dini dan
                                mengenal identitas diri secara benar. Memiliki
                                karakter yang berkualitas.
                            </li>
                            <li>
                                Menghargai keistimewaan setiap anak didik,
                                menggali potensi, menyediakan wadah dan
                                kesempatan untuk mengembangkannya sesuai talenta
                                yang sudah dikaruniakan.
                            </li>
                            <li>
                                Menanamkan kasih kepada Tuhan sebagai dasar dari
                                segala sesuatu, dan mewujudkannya dengan
                                mengasihi sesama. Peduli dan memperhatikan
                                lingkungan hidup dan makhluk lain sekitarnya.
                                Memberi dorongan dan keberanian pada anak didik
                                bertindak kasih secara nyata.
                            </li>
                            <li>
                                Memperlengkapi anak didik dengan pengetahuan dan
                                keterampilan yang dapat diterapkan dan memberi
                                manfaat bagi sesama, menyiapkan pondasi untuk
                                masa depan dengan mengembangkan kreativitas dan
                                kemauan untuk menjadi inventor dan inspirator
                                yang mandiri dan bertanggung jawab.
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- Lokasi Sekolah Section -->
        <section id="lokasi-sekolah" class="my-5 section-box">
            <br />
            <div class="container">
                <h2 class="text-center mb-4" data-aos="fade-up">
                    ✨ Lokasi Sekolah & Kontak Kami ✨
                </h2>
                <div class="row justify-content-center">
                    <div
                        class="col-md-12"
                        data-aos="fade-up"
                        data-aos-delay="100"
                    >
                        <!-- Card Besar -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Card Lokasi Sekolah (Kiri) -->
                                    <div
                                        class="col-md-6 mb-4"
                                        data-aos="fade-right"
                                        data-aos-delay="200"
                                    >
                                        <div class="card">
                                            <div class="card-body">
                                                <h4
                                                    class="text-center card-title mb-4"
                                                >
                                                    <i
                                                        class="fas fa-map-marker-alt me-2"
                                                    ></i>
                                                    Lokasi Sekolah
                                                </h4>
                                                <p>
                                                    Kami berlokasi di Jl. Dolog
                                                    Lor Raya No.7, Tlogosari
                                                    Wetan, Kec. Pedurungan, Kota
                                                    Semarang, Jawa Tengah
                                                </p>
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.1450567943875!2d110.46970877475769!3d-6.992190593008854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708d6b65eb5721%3A0x9ee1b4d92c836e63!2sTK%20Bintang%20Kasih!5e0!3m2!1sid!2sid!4v1725731173060!5m2!1sid!2sid"
                                                    width="100%"
                                                    height="300"
                                                    style="border: 0"
                                                    allowfullscreen=""
                                                    loading="lazy"
                                                    referrerpolicy="no-referrer-when-downgrade"
                                                ></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Kontak Kami (Kanan) -->
                                    <div
                                        class="col-md-6 mb-4"
                                        data-aos="fade-left"
                                        data-aos-delay="200"
                                    >
                                        <div class="card">
                                            <div class="card-body">
                                                <h4
                                                    class="text-center card-title mb-4"
                                                    style="color: #ff5733"
                                                >
                                                    <i
                                                        class="fas fa-phone-alt me-2"
                                                        style="color: #ff5733"
                                                    ></i>
                                                    Kontak Kami:
                                                </h4>
                                                <p>
                                                    Jika ada pertanyaan, silakan
                                                    hubungi kami melalui
                                                    informasi di bawah ini:
                                                </p>
                                                <ul class="list-unstyled">
                                                    <li class="mb-2">
                                                        <i
                                                            class="fas fa-map-marker-alt me-2"
                                                            style="
                                                                color: #ff5733;
                                                            "
                                                        ></i>
                                                        <strong>Alamat:</strong>
                                                        Jl. Dolog Lor Raya No.7,
                                                        Semarang
                                                    </li>
                                                    <li class="mb-2">
                                                        <i
                                                            class="fas fa-phone-alt me-2"
                                                            style="
                                                                color: #28a745;
                                                            "
                                                        ></i>
                                                        <strong
                                                            >Telepon:</strong
                                                        >
                                                        <a
                                                            href=https://wa.me/6282225386373
                                                            >+62 822 2538
                                                            6373</a
                                                        >
                                                    </li>
                                                    <li class="mb-2">
                                                        <i
                                                            class="fas fa-envelope me-2"
                                                            style="
                                                                color: #007bff;
                                                            "
                                                        ></i>
                                                        <strong>Email:</strong>
                                                        <a
                                                            href="mailto:tkbintangkasih.tlogomulyo@gmail.com"
                                                            >tkbintangkasih.tlogomulyo@gmail.com</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <i
                                                            class="fas fa-clock me-2"
                                                            style="
                                                                color: #f39c12;
                                                            "
                                                        ></i>
                                                        <strong
                                                            >Jam
                                                            Operasional:</strong
                                                        >
                                                        Senin - Jumat, 08.00 -
                                                        12.00 WIB
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Teachers Grid Section -->
<section
    id="bagan-organisasi"
    class="teachers-grid"
    style="scroll-margin-top: 120px"
    data-aos="fade-up"
>
    <!-- Header -->
    <h2
        data-aos="fade-up"
        data-aos-delay="100"
    >
        ✨ Daftar Guru KB dan TK Bintang Kasih ✨
    </h2>

    <!-- Swiper Grid -->
    <section id="app" class="px-3 px-md-5">
        <swiper
            :slides-per-view="1"
            :breakpoints="{
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }"
            :space-between="30"
            :loop="true"
            pagination
            :navigation="false"
            class="mySwiper"
            @slideChange="handleSlideChange"
        >
            <swiper-slide
                v-for="(teacher, index) in organization"
                :key="teacher.id"
                class="text-center"
            >
                <!-- Teacher Card -->
                <div class="card shadow-sm border-0 rounded-lg h-100 hover-effect">
                    <div class="card-body d-flex flex-column align-items-center">
                        <!-- Teacher Photo -->
                        <img
                            :src="teacher.galleries.length > 0
                                ? '/storage/' + teacher.galleries[0].image
                                : 'default-image-path.jpg'"
                            alt="Teacher Photo"
                            class="rounded-circle mb-3 border"
                            style="width: 120px; height: 120px; object-fit: cover;"
                        />

                        <!-- Teacher Name -->
                        <h5 class="card-title mb-2">
                            {{ teacher.fullName }}
                        </h5>

                        <!-- Teacher Class Type -->
                        <p class="card-text text-muted">
                            {{ teacher.classType }}
                        </p>
                    </div>
                </div>
            </swiper-slide>
        </swiper>
    </section>
</section>


        <!-- Infinite Logo Carousel Section -->
        <section
            id="logo-carousel"
            class="container my-5 section-box"
            data-aos="fade-up"
        >
            <h2
                class="text-center mb-4"
                data-aos="fade-up"
                data-aos-delay="100"
            >
            ✨ Kemitraan Kami ✨
            </h2>
            <div class="logos">
                <div
                    class="logos-slide"
                    ref="logosSlide"
                    data-aos="fade-up"
                    data-aos-delay="200"
                >
                    <img
                        src="../../../../public/frontend/images/logo_pendidikan.png"
                        alt="Logo 1"
                        class="img-fluid"
                        oncontextmenu="return false;"
                        data-aos="zoom-in"
                        data-aos-delay="300"
                    />
                    <img
                        src="../../../../public/frontend/images/logo_disdik.png"
                        alt="Logo 2"
                        class="img-fluid"
                        oncontextmenu="return false;"
                        data-aos="zoom-in"
                        data-aos-delay="400"
                    />
                    <img
                        src="../../../../public/frontend/images/Lambang_Kota_Semarang.png"
                        alt="Logo 3"
                        class="img-fluid"
                        oncontextmenu="return false;"
                        data-aos="zoom-in"
                        data-aos-delay="500"
                    />
                    <img
                        src="../../../../public/frontend/images/kanisius.png"
                        alt="Logo 4"
                        class="img-fluid"
                        oncontextmenu="return false;"
                        data-aos="zoom-in"
                        data-aos-delay="600"
                    />
                    <img
                        src="../../../../public/frontend/images/images.jpeg"
                        alt="Logo 5"
                        class="img-fluid"
                        oncontextmenu="return false;"
                        data-aos="zoom-in"
                        data-aos-delay="700"
                    />
                    <img
                        src="../../../../public/frontend/images/logo_sdpetra.png"
                        alt="Logo 6"
                        class="img-fluid"
                        oncontextmenu="return false;"
                        data-aos="zoom-in"
                        data-aos-delay="800"
                    />
                </div>
            </div>
        </section>

        <Footer />
        <button
            v-if="showButton"
            :class="['btn', 'btn-top', { 'fade-out': fade }]"
            @click="scrollToTop"
        >
            <i class="fas fa-arrow-up"></i>
            <!-- Ikon Panah ke Atas -->
        </button>

        <a
            href="https://wa.me/6282225386373"
            class="whatsapp-float"
            target="_blank"
        >
            <i class="bi bi-whatsapp"></i>
        </a>
    </div>
</template>

<script>
import axios from "axios"; // Pastikan axios diinstal melalui npm atau yarn
import Swal from "sweetalert2";
import Footer from "../Footer/Footer.vue";
import Navmenu from "../Navbar/Navmenu.vue";
import { Swiper, SwiperSlide } from "swiper/vue"; // Import Swiper dan SwiperSlide
import "swiper/swiper-bundle.css"; // Import CSS Swiper

export default {
    components: {
        Navmenu,
        Footer,
        Swiper, // Daftarkan komponen Swiper
        SwiperSlide, // Daftarkan komponen SwiperSlide
    },
    data() {
        return {
            organization: [], // Empty array initially
            texts: ["KB", "TK A"],
            currentTextIndex: 0,
            displayedText: "",
            charIndex: 0,
            typingInterval: 150, // kecepatan mengetik dalam milidetik
            eraseInterval: 100, // kecepatan menghapus dalam milidetik
            pauseDuration: 1500, // durasi jeda antara teks dalam milidetik
            typingTimeoutId: null,
            eraseTimeoutId: null,
            pauseTimeoutId: null,
            isErasing: false,
            showButton: false, // Kontrol untuk menampilkan tombol scroll to top
            fade: false, // Properti fade untuk animasi menghilang

            // Properti untuk fitur klik dan drag
            isDragging: false,
            startX: 0,
            scrollLeft: 0,
            scrollPosition: 0, // Posisi scroll yang sedang digunakan
            requestId: null, // ID untuk requestAnimationFrame
        };
    },
    mounted() {
        // Fetch data from API when the component is mounted
        axios
            .get("http://127.0.0.1:8000/api/teachers")
            .then((response) => {
                this.organization = response.data; // Set the organization data
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });

        this.startTypewriterEffect(); // Mulai efek mengetik

        // Handle cloning for infinite scrolling
        const logosSlide = document.querySelector(".logos-slide");
        if (logosSlide) {
            const copy = logosSlide.cloneNode(true);
            document.querySelector(".logos").appendChild(copy);
        }

        // Prevent right-click on images
        document.addEventListener("contextmenu", function (event) {
            if (event.target.tagName === "IMG") {
                event.preventDefault();
            }
        });

        // Tambahkan event listener untuk scroll halaman
        window.addEventListener("scroll", this.handleScroll);

        // Inisialisasi klik dan drag pada elemen scrollable grid
        const scrollableGrid = document.getElementById("scrollable-grid");
        if (scrollableGrid) {
            scrollableGrid.addEventListener("mousedown", this.startDrag);
            scrollableGrid.addEventListener("mousemove", this.dragging);
            scrollableGrid.addEventListener("mouseup", this.stopDrag);
            scrollableGrid.addEventListener("mouseleave", this.stopDrag);
        }
    },
    beforeDestroy() {
        // Hapus event listener saat komponen dihancurkan
        window.removeEventListener("scroll", this.handleScroll);
        this.stopTypewriterEffect();

        // Hapus event listener dari elemen scrollable grid
        const scrollableGrid = document.getElementById("scrollable-grid");
        if (scrollableGrid) {
            scrollableGrid.removeEventListener("mousedown", this.startDrag);
            scrollableGrid.removeEventListener("mousemove", this.dragging);
            scrollableGrid.removeEventListener("mouseup", this.stopDrag);
            scrollableGrid.removeEventListener("mouseleave", this.stopDrag);
        }
    },
    methods: {
        // Logika untuk efek mengetik (tidak diubah)
        startTypewriterEffect() {
            this.typeText(this.texts[this.currentTextIndex]);
        },
        typeText(text) {
            if (this.charIndex < text.length) {
                this.displayedText += text.charAt(this.charIndex);
                this.charIndex++;
                this.typingTimeoutId = setTimeout(() => {
                    this.typeText(text);
                }, this.typingInterval);
            } else {
                this.isErasing = true;
                this.typingTimeoutId = null;
                this.charIndex = text.length;
                this.pauseTimeoutId = setTimeout(() => {
                    this.eraseText();
                }, this.pauseDuration);
            }
        },
        eraseText() {
            if (this.charIndex > 0) {
                this.displayedText = this.displayedText.slice(0, -1);
                this.charIndex--;
                this.eraseTimeoutId = setTimeout(() => {
                    this.eraseText();
                }, this.eraseInterval);
            } else {
                this.isErasing = false;
                this.currentTextIndex =
                    (this.currentTextIndex + 1) % this.texts.length;
                this.displayedText = "";
                this.startTypewriterEffect();
            }
        },
        stopTypewriterEffect() {
            clearTimeout(this.typingTimeoutId);
            clearTimeout(this.eraseTimeoutId);
            clearTimeout(this.pauseTimeoutId);
        },

        // Logika untuk scroll ke atas
        handleScroll() {
            // Tampilkan tombol jika scrollY lebih dari 100px
            this.showButton = window.scrollY > 100;
        },
        scrollToTop() {
            // Mengaktifkan animasi fade-out
            this.fade = true;

            // Menggunakan timeout agar tombol menghilang setelah animasi selesai
            setTimeout(() => {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth", // Scroll dengan animasi halus
                });
                this.showButton = false; // Sembunyikan tombol setelah scroll ke atas
                this.fade = false; // Reset status fade-out
            }, 500); // Menunggu 500ms sampai animasi fade-out selesai
        },

        // Logika untuk fitur klik dan drag dengan animasi lebih halus
        startDrag(event) {
            this.isDragging = true;
            this.startX = event.pageX - event.target.offsetLeft; // Posisi awal klik
            this.scrollLeft = event.target.scrollLeft; // Posisi scroll awal
            event.target.style.cursor = "grabbing"; // Ubah cursor

            // Nonaktifkan seleksi teks
            document.body.style.userSelect = "none";
        },
        dragging(event) {
            if (!this.isDragging) return; // Hentikan jika tidak sedang drag
            event.preventDefault();

            // Menghitung pergerakan geser berdasarkan jarak mouse
            const x = event.pageX - event.target.offsetLeft; // Posisi X saat ini
            const walk = (x - this.startX) * 1; // Laju pergerakan scroll (lebih halus dengan multiplier)
            this.scrollGrid(event.target, walk); // Perbarui posisi grid dengan pergerakan yang lebih halus
        },
        stopDrag(event) {
            this.isDragging = false;
            event.target.style.cursor = "grab"; // Reset cursor

            // Aktifkan kembali seleksi teks
            document.body.style.userSelect = "auto";
        },

        // Update posisi scroll grid dengan animasi halus
        scrollGrid(element, walk) {
            // Menggunakan requestAnimationFrame untuk animasi yang lebih halus
            if (this.requestId) cancelAnimationFrame(this.requestId);
            this.requestId = requestAnimationFrame(() => {
                element.scrollLeft = this.scrollLeft - walk;
            });
        },

        // Tampilkan alert untuk sejarah
        showSejarahAlert() {
            Swal.fire({
                title: "Sejarah Lengkap TK Bintang Kasih",
                text: "Sekolah Bintang Kasih terletak di jalan Dolog Lor Raya No.7 Kelurahan Tlogosari Wetan, Kecamatan Pedurungan, Kota Semarang. Lingkungan sekolah berada di daerah perumahan dengan berdekatan jalan raya yang menjadi akses jalan alternatif yang menghubungkan daerah Woltermonginsidi dengan arah Tlogosari sehingga arus lalu lintas cukup ramai.",
                icon: "info",
                confirmButtonText: "Tutup",
            });
        },

        // Fungsi untuk menangani perubahan slide pada Swiper
        handleSlideChange(swiper) {
            console.log("Slide telah berubah!");
            console.log("Slide aktif saat ini:", swiper.activeIndex); // Indeks slide aktif saat ini
        },
    },
};
</script>

<style scoped>
/* Hero Section Styling */
.hero-section {
    position: relative;
    height: 60vh;
    overflow: hidden;
    margin-top: 80px; /* Agar tidak nabrak dengan navbar */
}

/* Gambar carousel */
.carousel-item img {
    width: 100%;
    height: 100vh;
    object-fit: contain;
    opacity: 0.8; /* Transparansi gambar, sesuaikan nilai ini (0.1 - 1) */
    box-shadow: 0 4px 8px #7f86d4;
}
h2,
h5 {
    color: #7f86d4; /* Warna ungu */
}
/* Untuk konten teks di tengah */
.content {
    z-index: 1;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    width: 90%;
    max-width: 600px;
}

/* Teks judul dengan shadow dan background semi-transparan */
.hero-title {
    font-size: 3.5rem;
    font-weight: bold;
    background-color: rgba(
        0,
        0,
        0,
        0.014
    ); /* Latar belakang hitam transparan */
    color: white; /* Teks warna putih agar jelas */
    padding: 10px;
    border-radius: 5px;
    display: inline-block;
    text-shadow: 0 4px 8px #7f86d4; /* Shadow ungu teks */
}

/* Subjudul dengan shadow dan background semi-transparan */
.hero-subtitle {
    font-size: 1.2rem;
    background-color: rgba(
        0,
        0,
        0,
        0.014
    ); /* Latar belakang hitam transparan */
    color: white;
    padding: 10px;
    border-radius: 5px;
    display: inline-block;
    margin-top: 10px;
    text-shadow: 0 4px 8px #7f86d4; /* Shadow ungu teks */
}
/* Typewriter Effect Styling */
.typewriter-effect {
    display: inline-block;
    position: relative;
    font-family: monospace;
    font-size: 3.8rem;
    white-space: nowrap;
}
.cursor {
    display: inline-block;
    position: absolute;
    right: -0.3em;
    bottom: 0;
    font-size: 3.5rem;
    color: #7c82c0;
    animation: blink-caret 0.75s step-end infinite;
}
@keyframes blink-caret {
    from,
    to {
        opacity: 0;
    }
    50% {
        opacity: 1;
    }
}
.btn {
    padding: 0.5rem 1rem;
    font-size: 1rem;
}

/* Cards Styling */
.card {
    transition: transform 0.3s ease-in-out;
    border: none;
    box-shadow: 0 4px 8px #7f86d4;
    padding: 10px;
    border-radius: 30px;
    height: 100%;
}

/* Hover effect */
.card:hover {
    transform: translateY(-5px);
}

/* Ikon styling */
.card i {
    color: #7c82c0;
}

/* Card body styling */
.card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: center;
}

/* Justify text */
.text-justify {
    text-align: justify;
}

/* Media Queries untuk Responsive Design */

/* Mobile Devices (max-width: 767px) */
@media (max-width: 767px) {
    .card {
        padding: 15px;
        box-shadow: 0 2px 4px rgba(127, 134, 212, 0.652);
        border-radius: 20px;
    }

    .card-body {
        padding: 10px;
        font-size: 14px;
    }
}

/* Tablet Devices (768px - 991px) */
@media (min-width: 768px) and (max-width: 991px) {
    .card {
        padding: 20px;
        box-shadow: 0 3px 6px rgba(127, 134, 212, 0.6);
        border-radius: 25px;
    }

    .card-body {
        padding: 15px;
        font-size: 16px;
    }
}

/* Desktop Devices (min-width: 992px) */
@media (min-width: 992px) {
    .card {
        padding: 25px;
        box-shadow: 0 4px 8px #7f86d4;
        border-radius: 30px;
    }

    .card-body {
        padding: 20px;
        font-size: 18px;
    }
}

/* Misi Section Styling */
.misi-list {
    text-align: justify;
    list-style-type: decimal;
    padding-left: 20px;
}

/* Section Styling */
section {
    padding: 60px 0;
    margin-top: 55px; /* Tambahkan margin top agar tidak nabrak navbar */
}

/* Lokasi and Pendaftaran Sections */
.section-box {
    padding: 60px 0;
    margin-top: 55px; /* Pastikan juga ditambahkan margin pada section ini */
}

.bagan-organisasi img {
    object-fit: cover;
}
.bagan-organisasi .list-group-item {
    transition: background-color 0.3s;
}
.bagan-organisasi .list-group-item:hover {
    background-color: #f8f9fa;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }
    .hero-subtitle {
        font-size: 1rem;
    }
    .typewriter-effect {
        font-size: 2rem;
    }
    .cursor {
        font-size: 2rem;
    }
    .card {
        margin-bottom: 20px;
    }
}

@media (max-width: 576px) {
    .hero-title {
        font-size: 1.5rem;
    }
    .hero-subtitle {
        font-size: 0.9rem;
    }
    .typewriter-effect {
        font-size: 1.5rem;
    }
    .cursor {
        font-size: 1.5rem;
    }
    .btn {
        padding: 0.4rem 0.8rem;
        font-size: 0.9rem;
    }
}

/* Map container for responsiveness */
.map-container {
    position: relative;
    padding-bottom: 75%; /* 4:3 Aspect Ratio */
    height: 0;
    overflow: hidden;
}
.map-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100% !important;
    height: 100% !important;
}

@keyframes pulse-with-longer-pause {
    0%,
    100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
    60% {
        transform: scale(1.1);
    }
    80%,
    100% {
        transform: scale(1);
    }
}

.whatsapp-float {
    position: fixed;
    width: 46px;
    height: 46px;
    bottom: 70px;
    right: 40px;
    background-color: #25d366;
    color: #fff;
    border-radius: 30px;
    text-align: center;
    font-size: 30px;
    box-shadow: 2px 2px 3px #999;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: pulse-with-longer-pause 4s ease-in-out infinite;
}

.whatsapp-float img {
    width: 70%;
    height: 70%;
    border-radius: 50%;
}

.whatsapp-float:hover {
    background-color: #128c7e;
    transform: scale(1.1);
    transition: transform 0.3s ease;
}

.custom-btn {
    background-color: #1a82de;
    border-color: #1a82de;
}
.custom-btn:hover {
    background-color: #1d65a4;
    border-color: #1d65a4;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #f2f2f2;
}

@keyframes slide {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-100%);
    }
}

.logos {
    overflow: hidden;
    padding: 10px 0;
    background: white;
    white-space: nowrap;
    position: relative;
}

.logos:before,
.logos:after {
    position: absolute;
    top: 0;
    width: 250px;
    height: 100%;
    content: "";
    z-index: 2;
}

.logos:before {
    left: 0;
    background: linear-gradient(to left, rgba(255, 255, 255, 0), white);
}

.logos:after {
    right: 0;
    background: linear-gradient(to right, rgba(255, 255, 255, 0), white);
}

.logos:hover .logos-slide {
    animation-play-state: paused;
}

.logos-slide {
    display: inline-block;
    animation: 15s slide infinite linear;
    animation-timing-function: linear;
}

.logos-slide::after {
    content: attr(data-duplicate);
    display: inline-block;
}

.logos-slide img {
    height: 150px;
    margin: 0px 30px;
    transition: transform 0.3s ease, opacity 0.3s ease;
}

/* Logo Hover Effect */
.logos-slide img:hover {
    transform: scale(1.1);
    opacity: 0.9;
}

/* For tablet screens (768px and above) */
@media only screen and (min-width: 768px) and (max-width: 1024px) {
    .logos-slide img {
        height: 60px; /* Reduce logo size for tablets */
        margin: 0px 8px; /* Adjust margin for better spacing */
    }

    .logos-slide {
        animation: 15s slide infinite linear; /* Keep animation smooth */
    }

    .logos:before,
    .logos:after {
        width: 100px; /* Adjust gradient width for smaller screens */
    }
}

/* For mobile screens (below 768px) */
@media only screen and (max-width: 767px) {
    .logos-slide img {
        height: 63px; /* Reduce logo size for mobile devices */
        margin: 0px 8px; /* Smaller margins for narrow screens */
    }

    .logos-slide {
        animation: 15s slide infinite linear; /* Slow down animation for smaller devices */
        animation-timing-function: linear;
    }
    .logos-slide::after {
        content: attr(data-duplicate);
        display: inline-block;
    }

    .logos:before,
    .logos:after {
        width: 100px; /* Narrow the fade gradient */
    }
}

.btn-purple {
    background-color: #7f86d4; /* Warna ungu */
    color: white;
    border: none;
    box-shadow: 0 0 10px 2px black; /* Warna hitam di luar tombol */
}

.btn-purple:hover {
    background-color: #7f86d4; /* Warna hover sedikit lebih gelap */
    box-shadow: 0 0 12px 3px black; /* Tambahkan sedikit bayangan saat hover */
}

.btn-top {
    position: fixed;
    bottom: 130px; /* Jarak di atas tombol WhatsApp */
    right: 40px;
    background-color: #c6b6f4; /* Warna ungu */
    color: white;
    border: none;
    padding: 10px 13px;
    border-radius: 50%; /* Bentuk bulat */
    cursor: pointer;
    box-shadow: 0 0 10px 2px #2929296f; /* Bayangan hitam di luar tombol */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Menambahkan transisi untuk animasi */
    z-index: 1000; /* Z-index tinggi agar berada di atas elemen lain */
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px; /* Ukuran ikon lebih besar */
}

/* Efek saat tombol hover */
.btn-top:hover {
    background-color: #8187d5;
    transform: translateY(-5px); /* Panah sedikit naik saat hover */
}

/* Animasi fade-out untuk menghilangkan tombol saat diklik */
.fade-out {
    opacity: 0; /* Mengurangi opacity */
    transform: translateY(20px); /* Menggeser tombol ke bawah */
    transition: opacity 0.5s ease, transform 0.5s ease; /* Menambahkan transisi untuk opacity dan posisi */
}

.card-body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.rounded-circle {
    display: block;
    margin: 0 auto;
}
</style>
