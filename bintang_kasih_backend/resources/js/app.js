import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import "bootstrap/dist/css/bootstrap.min.css"; // Import Bootstrap CSS
import "bootstrap-icons/font/bootstrap-icons.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js"; // Import Bootstrap JavaScript
import "sweetalert2/dist/sweetalert2.min.css";
import "./bootstrap";
import VueSweetalert2 from "vue-sweetalert2";
import axios from "axios";

axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
axios.defaults.headers.common["X-CSRF-TOKEN"] = document.head.querySelector(
    'meta[name="csrf-token"]'
).content;

const link = document.createElement("link");
link.href =
    "https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Baloo+2:wght@400;700&display=swap";
link.rel = "stylesheet";
document.head.appendChild(link);

const app = createApp(App);
app.use(VueSweetalert2);
app.use(router);
app.mount("#app");
