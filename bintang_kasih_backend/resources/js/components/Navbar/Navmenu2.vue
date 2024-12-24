<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/Home2">
                <img
                    src="../../../../public/frontend/images/logo.jpg"
                    alt="TK Bintang Kasih"
                    class="d-inline-block align-top"
                />
            </a>
            <button
                class="navbar-toggler collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <div class="navbar-toggler-icon">
                    <div class="bar bar1"></div>
                    <div class="bar bar2"></div>
                    <div class="bar bar3"></div>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/Home2">Beranda</a>
                    </li>
                    <!-- Menu dengan nama pengguna yang login -->
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="userDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            Hi, {{ user.nickName }}
                        </a>
                        <ul
                            class="dropdown-menu"
                            aria-labelledby="userDropdown"
                        >
                            <li>
                                <a class="dropdown-item" href="/">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "Navmenu2",
    data() {
        return {
            user: {
                nickName: "",
            },
            isLoggedIn: false,
        };
    },
    created() {
        // Mengecek localStorage ketika komponen dibuat
        this.checkLoginStatus();
    },
    mounted() {
        // Scroll ke atas atau halaman selamat datang saat di-refresh
        this.checkLoginStatus();
        window.scrollTo(0, 0);
        window.addEventListener("logout", this.handleLogout);
    },
    methods: {
        loginUser() {
            // Method login
            // Setelah login berhasil, simpan ke localStorage dan set isLoggedIn
            this.isLoggedIn = true;
            localStorage.setItem("user", JSON.stringify(this.user));
            this.$router.push("/Home2"); // Arahkan user ke halaman tertentu
        },

        checkLoginStatus() {
            const user = JSON.parse(localStorage.getItem("user"));
            if (user) {
                this.isLoggedIn = !!user; // Update isLoggedIn berdasarkan ada tidaknya user
                this.user = user || {}; // Set user jika ada
                console.log(
                    "Data di localStorage:",
                    localStorage.getItem("user")
                ); // Cek isi localStorage

                console.log(user.nik); // "123456"
                console.log(user.nickName); // "Nama Pengguna"
                console.log(user.roles); // "Roles"
            } else {
                this.isLoggedIn = false;
            }
        },

        logout() {
            // Perform logout logic, like clearing user session and redirecting to the login page
            // Hapus data dari localStorage
            localStorage.removeItem("user");
            localStorage.removeItem("token");
            this.isLoggedIn = false;
            this.user = {};
            console.log("User logged out"); // Debugging
            this.$router.push("/");
        },

        handleLogout() {
            this.isLoggedIn = false; // Update status login
            this.user = {}; // Reset user
            console.log("User logged out from admin panel."); // Debugging
        },

        beforeRouteEnter(to, from, next) {
            const user = JSON.parse(localStorage.getItem("user"));
            next((vm) => {
                vm.isLoggedIn = !!user; // Set isLoggedIn berdasarkan ada tidaknya user
                vm.user = user || {}; // Set user jika ada
            });
        },
    },
};
</script>

<style scoped>
/* Fixed Navbar styling */
.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    box-shadow: 0 4px 6px -1px rgba(127, 134, 212, 0.7); /* Bayangan di bawah navbar */
}

.navbar-brand img {
    width: 40px;
}

.navbar-nav .nav-link {
    color: #000;
    font-weight: bold;
    font-size: 16px;
    position: relative;
    padding-bottom: 5px;
    overflow: hidden;
}

.navbar-nav .nav-link::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 3px;
    bottom: 0;
    left: -100%;
    background-color: #7f86d4;
    transition: all 0.4s ease;
}

.navbar-nav .nav-link:hover::before {
    left: 0;
}

.navbar-nav .nav-link:hover {
    color: #a41e1d;
}

body {
    padding-top: 80px;
}

/* Dropdown item hover effect */
.dropdown-item {
    color: #000;
    font-weight: bold;
    font-size: 16px;
    position: relative;
    padding-bottom: 5px;
    overflow: hidden;
}

.dropdown-item::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 3px;
    bottom: 0;
    left: -100%;
    background-color: #7f86d4;
    transition: all 0.4s ease;
}

.dropdown-item:hover::before {
    left: 0;
}

.dropdown-item:hover {
    color: #a41e1d;
}

/* Custom Hamburger Menu Icon */
.navbar-toggler {
    position: relative;
    background: transparent;
    border: none;
    outline: none;
}

.navbar-toggler-icon {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 30px;
    height: 20px;
    background: transparent;
    cursor: pointer;
}

.bar {
    display: block;
    width: 30px;
    height: 3px;
    background-color: #333;
    transition: all 0.3s ease;
}

.navbar-toggler.collapsed .bar1 {
    transform: rotate(0deg) translate(0, 0);
}

.navbar-toggler.collapsed .bar2 {
    opacity: 1;
}

.navbar-toggler.collapsed .bar3 {
    transform: rotate(0deg) translate(0, 0);
}

.navbar-toggler:not(.collapsed) .bar1 {
    transform: rotate(45deg) translate(6px, 6px);
}

.navbar-toggler:not(.collapsed) .bar2 {
    opacity: 0;
}

.navbar-toggler:not(.collapsed) .bar3 {
    transform: rotate(-45deg) translate(6px, -6px);
}
</style>
