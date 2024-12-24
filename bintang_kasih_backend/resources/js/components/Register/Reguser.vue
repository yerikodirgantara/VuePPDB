<template>
    <div class="page-container">
        <div class="register-container">
            <h1 class="register-title">Register</h1>
            <form @submit.prevent="registerUser">
                <!-- NIK -->
                <div class="form-group" :class="{ 'has-error': nikError }">
                    <label for="nik">NIK Siswa:</label>
                    <input
                        type="text"
                        id="nik"
                        v-model="user.nik"
                        @blur="validateNik"
                        @input="clearError('nikError')"
                        required
                        class="input-field"
                    />
                    <p v-if="nikError" class="error">{{ nikError }}</p>
                </div>

                <!-- Nickname -->
                <div class="form-group" :class="{ 'has-error': nickNameError }">
                    <label for="nickName">Nama Panggilan Siswa:</label>
                    <input
                        type="text"
                        id="nickName"
                        v-model="user.nickName"
                        @blur="validateNickName"
                        @input="clearError('nickNameError')"
                        required
                        class="input-field"
                    />
                    <p v-if="nickNameError" class="error">
                        {{ nickNameError }}
                    </p>
                </div>

                <!-- Password -->
                <div class="form-group" :class="{ 'has-error': passwordError }">
                    <label for="password">Kata Sandi:</label>
                    <div class="password-wrapper">
                        <input
                            :type="showPassword ? 'text' : 'password'"
                            id="password"
                            v-model="user.password"
                            @blur="validatePassword"
                            @input="clearError('passwordError')"
                            required
                            class="input-field"
                        />
                        <button
                            type="button"
                            @click="togglePasswordVisibility"
                            class="toggle-password"
                        >
                            <i
                                :class="
                                    showPassword
                                        ? 'fas fa-eye-slash'
                                        : 'fas fa-eye'
                                "
                            ></i>
                        </button>
                    </div>
                    <p v-if="passwordError" class="error">
                        {{ passwordError }}
                    </p>
                </div>

                <!-- Confirm Password -->
                <div
                    class="form-group"
                    :class="{ 'has-error': cPasswordError }"
                >
                    <label for="cPassword">Konfirmasi Kata Sandi:</label>
                    <div class="password-wrapper">
                        <input
                            :type="showcPassword ? 'text' : 'password'"
                            id="cPassword"
                            v-model="user.cPassword"
                            @blur="validatecPassword"
                            @input="clearError('cPasswordError')"
                            required
                            class="input-field"
                        />
                        <button
                            type="button"
                            @click="togglecPasswordVisibility"
                            class="toggle-password"
                        >
                            <i
                                :class="
                                    showcPassword
                                        ? 'fas fa-eye-slash'
                                        : 'fas fa-eye'
                                "
                            ></i>
                        </button>
                    </div>
                    <p v-if="cPasswordError" class="error">
                        {{ cPasswordError }}
                    </p>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="register-button">Register</button>

                <!-- Error and Success Messages -->
                <p v-if="errorMessage" class="error message">
                    {{ errorMessage }}
                </p>
                <p v-if="successMessage" class="success message">
                    {{ successMessage }}
                </p>

                <!-- Link to Login -->
                <div class="login-link-container">
                    <span>Sudah mendaftar? Silahkan Login </span>
                    <router-link to="/Loguser" class="login-link">
                        disini</router-link
                    >
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

// Konfigurasi Axios untuk mengirim CSRF token
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
axios.defaults.headers.common["X-CSRF-TOKEN"] = document.head.querySelector(
    'meta[name="csrf-token"]'
).content;

export default {
    data() {
        return {
            user: {
                nik: "",
                nickName: "",
                password: "",
                cPassword: "",
            },
            nikError: "",
            nickNameError: "",
            passwordError: "",
            cPasswordError: "",
            errorMessage: "",
            successMessage: "",
            showPassword: false,
            showcPassword: false,
        };
    },
    methods: {
        clearError(field) {
            this[field] = "";
        },

        validateNik() {
            const nikPattern = /^[0-9]{16}$/; // Regex untuk memvalidasi hanya angka dengan panjang 16 karakter

            if (!nikPattern.test(this.user.nik)) {
                this.nikError = "NIK harus berisi 16 karakter angka.";
                Swal.fire("Error", this.nikError, "error");
            }
        },

        validateNickName() {
            if (this.user.nickName.length < 1) {
                // Adjusted nickName length to 1 characters
                this.nickNameError = "Nama Panggilan harus diisi";
                Swal.fire("Error", this.nickNameError, "error");
            }
        },

        validatePassword() {
            if (this.user.password.length < 8) {
                // Adjusted password length to 8 characters
                this.passwordError = "Kata sandi harus minimal 8 karakter.";
                Swal.fire("Error", this.passwordError, "error");
            }
        },

        validatecPassword() {
            if (this.user.password !== this.user.cPassword) {
                this.cPasswordError = "Kata sandi tidak cocok.";
                Swal.fire("Error", this.cPasswordError, "error");
            }
        },

        async registerUser() {
            this.validateNik();
            this.validateNickName();
            this.validatePassword();
            this.validatecPassword();

            if (
                this.nikError ||
                this.nickNameError ||
                this.passwordError ||
                this.cPasswordError
            ) {
                return;
            }

            try {
                // Mengambil CSRF cookie
                await axios.get("http://localhost:8000/sanctum/csrf-cookie");

                // Mengirim permintaan pendaftaran
                const response = await axios.post(
                    "http://127.0.0.1:8000/api/register",
                    this.user
                );

                this.successMessage = "Registration successful! Please log in.";
                this.errorMessage = "";
                Swal.fire("Success", "Registration successful!", "success");

                // Reset form setelah pendaftaran berhasil
                this.user = {
                    nik: "",
                    nickName: "",
                    password: "",
                    cPassword: "",
                };
            } catch (error) {
                if (error.response && error.response.data) {
                    this.errorMessage =
                        error.response.data.message ||
                        "Registration failed. Please try again.";
                } else {
                    this.errorMessage =
                        "Registration failed. Please try again.";
                }
                this.successMessage = "";
                Swal.fire("Error", this.errorMessage, "error");
            }
        },

        togglePasswordVisibility() {
            this.showPassword = !this.showPassword;
        },

        togglecPasswordVisibility() {
            this.showcPassword = !this.showcPassword;
        },
    },
};
</script>

<style scoped>
.page-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f0f0f0; /* Same background as login */
}

.register-container {
    max-width: 400px;
    width: 100%;
    padding: 40px;
    background-color: #ffffff; /* Same background color as login-container */
    border-radius: 8px;
    box-shadow: 0 10px 25px #7f86d4e1;
    transition: transform 0.3s ease-in-out;
}

.register-container:hover {
    transform: translateY(-5px);
}

.register-title {
    text-align: center;
    color: #333;
    margin-bottom: 30px;
    font-size: 28px;
    color: #007bff; /* Match the login title color */
}

.form-group {
    margin-bottom: 20px;
}

.input-field {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.input-field:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
}

.has-error .input-field {
    border-color: #dc3545;
}

.has-error .input-field:focus {
    box-shadow: 0 0 0 2px rgba(220, 53, 69, 0.25);
}

.password-wrapper {
    display: flex;
    align-items: center;
    position: relative;
}

.toggle-password {
    position: absolute;
    right: 10px;
    border: none;
    background: transparent;
    cursor: pointer;
    color: #007bff;
    font-size: 18px;
}

.register-button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.register-button:hover {
    background-color: #0056b3;
}

.message {
    text-align: center;
    margin-top: 15px;
    font-size: 14px;
    padding: 10px;
    border-radius: 4px;
    animation: fadeIn 0.5s ease-in-out;
}

.error {
    color: #dc3545;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
}

.success {
    color: #28a745;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
}

.login-link-container {
    text-align: center;
    margin-top: 20px;
}

.login-link {
    color: #007bff;
    text-decoration: none;
}

.login-link:hover {
    text-decoration: underline;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 480px) {
    .register-container {
        padding: 20px;
    }

    .register-title {
        font-size: 24px;
    }

    .input-field,
    .register-button {
        font-size: 14px;
    }
}
</style>
