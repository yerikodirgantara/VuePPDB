<template>
    <footer class="py-4">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Contact Info -->
                <div
                    class="col-md-6 mb-4 contact-info text-left"
                    data-aos="fade-right"
                >
                    <h5 class="text-uppercase mb-3 position-relative">
                        Contact Us:
                    </h5>
                    <hr
                        class="section-underline"
                        data-aos="fade-right"
                        data-aos-delay="100"
                    />
                    <p class="mb-3" data-aos="fade-right" data-aos-delay="100">
                        <i class="fas fa-map-marker-alt"></i>
                        <strong>Alamat</strong><br />
                        <span>
                            Jl. Dolog Lor Raya, No.7, Tlogosari Wetan,<br />
                            Kec. Pedurungan, Kota Semarang,<br />
                            Jawa Tengah 50196
                        </span>
                    </p>
                    <p class="mb-3" data-aos="fade-right" data-aos-delay="200">
                        <i class="fas fa-phone-alt"></i>
                        <strong>Telepon</strong><br />
                        <a href="tel:+620248502772" class="text-white">
                            +62 (024) 850 2772 </a
                        ><br />
                        <a
                            href="https://wa.me/6282225386373"
                            class="text-white"
                        >
                            +62 822 2538 6373
                        </a>
                    </p>
                    <p class="mb-3" data-aos="fade-right" data-aos-delay="300">
                        <i class="fas fa-envelope"></i>
                        <strong>Email</strong><br />
                        <a
                            href="mailto:tkbintangkasih.tlogomulyo@gmail.com"
                            class="text-white"
                        >
                            tkbintangkasih.tlogomulyo@gmail.com
                        </a>
                    </p>
                </div>

                <!-- Social Media Links -->
                <div class="col-md-4 mb-4 social-media text-left">
                    <h5 class="text-uppercase mb-3" data-aos="fade-right">
                        Follow Us:
                    </h5>
                    <hr
                        class="section-underline"
                        data-aos="fade-right"
                        data-aos-delay="100"
                    />
                    <div
                        class="social-icons d-flex flex-column align-items-start"
                    >
                        <div
                            class="social-icon-container my-2"
                            data-aos="fade-right"
                            data-aos-delay="200"
                        >
                            <a
                                href="https://wa.me/6282225386373"
                                class="social-icon"
                                target="_blank"
                            >
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <span>WhatsApp</span>
                        </div>
                        <div
                            class="social-icon-container my-2"
                            data-aos="fade-right"
                            data-aos-delay="300"
                        >
                            <a
                                href="https://instagram.com/kbtkbintangkasih.tlogomulyo/"
                                class="social-icon"
                                target="_blank"
                            >
                                <i class="fab fa-instagram"></i>
                            </a>
                            <span>Instagram</span>
                        </div>
                        <div
                            class="social-icon-container my-2"
                            data-aos="fade-right"
                            data-aos-delay="400"
                        >
                            <a
                                href="mailto:tkbintangkasih.tlogomulyo@gmail.com"
                                class="social-icon"
                                target="_blank"
                            >
                                <i class="fas fa-envelope"></i>
                            </a>
                            <span>Email</span>
                        </div>
                    </div>
                </div>
            </div>
            <p class="footer-text mt-3 text-center">
                ©2024 KB & TK Bintang Kasih | All Rights Reserved
            </p>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer",
};
</script>

<style scoped>
footer {
    background: linear-gradient(
        135deg,
        #7f86d4,
        #d4bff9
    ); /* Warna yang diberikan */
    color: #fff;
    box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.15);
    padding: 2rem 0;
}

/* Styling untuk header "Contact Us" dan "Follow Us" */
h5 {
    font-size: 1.25rem;
    font-weight: bold;
    color: #ffffff;
}

/* Garis bawah pada "Contact Us" dan "Follow Us" */
.section-underline {
    border: 1px solid #0062cc; /* Warna biru */
    width: 80px;
    margin-top: -12px;
    margin-bottom: 20px;
}

/* Styling untuk ikon dan teks kontak */
.contact-info p {
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.contact-info i {
    font-size: 1.2rem;
    color: #ffffff; /* Ikon berwarna putih */
    margin-right: 10px;
}

.contact-info a,
.social-media a {
    color: #ffffff;
    text-decoration: none;
}

.contact-info a:hover,
.social-media a:hover {
    color: #ffd700; /* Warna hover untuk link */
}

/* Styling untuk ikon sosial media */
.social-icons {
    font-size: 1rem;
}

/* Container untuk ikon sosial */
.social-icon-container {
    display: flex;
    align-items: center;
}

/* Styling untuk ikon sosial media */
.social-icon {
    width: 40px;
    height: 40px;
    background-color: #ffffff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s ease;
    color: #000; /* Warna ikon hitam */
    text-decoration: none;
    margin-right: 10px; /* Jarak antara ikon dan judul */
}

.social-icon i {
    font-size: 1.2rem;
    color: #000; /* Warna hitam untuk ikon */
}

.social-icon:hover {
    background-color: #a41e1d; /* Warna saat di-hover */
    color: #000; /* Warna ikon tetap hitam saat hover */
}

/* Styling untuk teks hak cipta di bagian bawah */
.footer-text {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.8);
    margin-top: 2rem;
}

@media (max-width: 768px) {
    .contact-info,
    .social-media {
        text-align: left; /* Ubah dari center ke left */
    }

    /* Styling untuk memastikan kolom berada di satu baris */
    .row.justify-content-between {
        flex-direction: column; /* Kolom diatur ke arah vertikal */
    }

    .social-media {
        margin-top: 2rem; /* Beri jarak antara bagian kontak dan social media */
    }

    .social-icons {
        align-items: flex-start; /* Sesuaikan ikon agar rata kiri */
    }

    /* Penataan margin dan padding agar sesuai untuk layar kecil */
    .social-icon-container {
        margin-left: 0; /* Pastikan ikon berada di kiri tanpa tambahan margin */
    }

    /* Sesuaikan ukuran font dan ikon */
    h5 {
        font-size: 1.1rem;
    }

    .contact-info p,
    .footer-text {
        font-size: 0.9rem;
    }

    .social-icon {
        width: 35px;
        height: 35px;
    }
}

@media (max-width: 576px) {
    .contact-info p,
    .footer-text {
        font-size: 0.8rem;
    }

    .social-icon {
        width: 30px;
        height: 30px;
    }

    h5 {
        font-size: 1rem;
    }

    .footer-text {
        margin-top: 1.5rem;
    }
}
</style>