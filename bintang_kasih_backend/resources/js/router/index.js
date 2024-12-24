import { createRouter, createWebHistory } from "vue-router";
import Home from "../components/Landingpage/Home.vue";
import Navmenu from "../components/Navbar/Navmenu.vue";
import Pembayaran from "../components/Harga/Pembayaran.vue";
import Reguser from "../components/Register/Reguser.vue";
import Loguser from "../components/Login/Loguser.vue";
import Formulir from "../components/Form/Formulir.vue";
import DashboardUser from "../components/DashboardUser/Dashboard.vue";
import Home2 from "../components/Landingpage/Home2.vue";
import Navmenu2 from "../components/Navbar/Navmenu2.vue";

const routes = [
    { path: "/", name: "Landingpage", component: Home }, // Halaman utama ditampilkan sebagai home
    { path: "/Reguser", name: "Reguser", component: Reguser },
    { path: "/Loguser", name: "Loguser", component: Loguser },
    { path: "/Navmenu", name: "Navmenu", component: Navmenu },
    {
        path: "/Formulir",
        name: "Formulir",
        component: Formulir,
        meta: { requiresAuth: true },
    },
    {
        path: "/Pembayaran",
        name: "Pembayaran",
        component: Pembayaran,
        meta: { requiresAuth: true },
    },
    {
        path: "/DashboardUser",
        name: "DashboardUser",
        component: DashboardUser,
        meta: { requiresAuth: true },
    },

    {
        path: "/Home2",
        name: "Home2",
        component: Home2,
        meta: { requiresAuth: true },
    },
    {
        path: "/Navmenu2",
        name: "Navmenu2",
        component: Navmenu2,
        meta: { requiresAuth: true },
    },
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

// Set Timer untuk Logout
let logoutTimer;

function startLogoutTimer() {
    clearTimeout(logoutTimer); // Bersihkan timer lama jika ada
    logoutTimer = setTimeout(() => {
        logoutUser();
    }, 3600000); // Set ke 1 jam (3600000 ms)
}

function logoutUser() {
    localStorage.removeItem("token");
    localStorage.removeItem("user");
    delete axios.defaults.headers.common["Authorization"];
    router.push("/"); // Redirect ke halaman login
}

// Navigation Guard untuk mengecek otentikasi di setiap halaman
router.beforeEach(async (to, from, next) => {
    const token = localStorage.getItem("token");

    // Cek apakah rute butuh otentikasi
    if (to.meta.requiresAuth) {
        if (token) {
            // Set token di header dan periksa validitasnya
            axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
            try {
                await axios.get("http://127.0.0.1:8000/api/check-token");
                startLogoutTimer(); // Mulai timer saat token valid
                next(); // Lanjutkan ke halaman yang dituju
            } catch (error) {
                logoutUser(); // Logout jika token tidak valid atau expired
            }
        } else {
            logoutUser(); // Redirect ke login jika token tidak ada
        }
    } else {
        // Jika halaman tidak membutuhkan otentikasi, langsung lanjut
        next();
    }
});

export default router;
