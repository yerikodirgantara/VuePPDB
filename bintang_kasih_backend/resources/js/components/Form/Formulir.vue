<template>
    <div class="form-container">
        <form @submit.prevent="handleSubmit" enctype="multipart/form-data">
            <h2>Formulir Pendaftaran Siswa Baru KB dan TK Bintang Kasih</h2>
            <p>Silahkan Isi Form Sesuai Ketentuan Sebagai Berikut:</p>

            <!-- Card for Data Anak -->
            <div class="card">
                <h3><span class="highlight">Data</span> Anak</h3>
                <div class="form-group-horizontal">
                    <label for="classType">Pendaftaran Untuk:</label>
                    <select
                        id="classType"
                        v-model="formData.classType"
                        required
                    >
                        <option value="">Pilih Pendaftaran</option>
                        <option value="KB">Kelompok Bermain (KB)</option>
                        <option value="TK A">Taman Kanak-Kanak A (TK A)</option>
                    </select>
                </div>
                <div class="form-group-horizontal">
                    <label for="nik">NIK (tidak bisa diedit):</label>
                    <input
                        type="text"
                        id="nik"
                        v-model="formData.user.nik"
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="fullName">Nama Lengkap:</label>
                    <input
                        type="text"
                        id="fullName"
                        v-model="formData.fullName"
                        placeholder="Cth: Naomi Utami Pratiwi"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="nickName">Nama Panggilan:</label>
                    <input
                        type="text"
                        id="nickName"
                        v-model="formData.user.nickName"
                        placeholder="Cth: Naomi"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="gender">Jenis Kelamin:</label>
                    <select id="gender" v-model="formData.gender" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group-horizontal">
                    <label for="birthPlace">Tempat Lahir:</label>
                    <input
                        type="text"
                        id="birthPlace"
                        v-model="formData.birthPlace"
                        placeholder="Cth: Semarang"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="birthDate">Tanggal Lahir:</label>
                    <input
                        type="date"
                        id="birthDate"
                        v-model="formData.birthDate"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="religion">Agama:</label>
                    <select id="religion" v-model="formData.religion" required>
                        <option value="">Pilih Salah Satu</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="form-group-horizontal">
                    <label for="childOf">Anak ke:</label>
                    <input
                        type="number"
                        id="childOf"
                        v-model="formData.childOf"
                        placeholder="Cth: 1"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="domicileAddress">Alamat Domisili:</label>
                    <input
                        type="text"
                        id="domicileAddress"
                        v-model="formData.domicileAddress"
                        placeholder="Cth: Jl. Gusti Putri 2 No. 10 Semarang"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="kkAddress">Alamat KK:</label>
                    <input
                        type="text"
                        id="kkAddress"
                        v-model="formData.kkAddress"
                        placeholder="Cth: Jl. Gusti Putri 2 No. 10 Semarang"
                        required
                    />
                </div>
            </div>

            <!-- Card for Data Ayah -->
            <div class="card">
                <h3><span class="highlight">Data</span> Ayah</h3>
                <div class="form-group-horizontal">
                    <label for="fatherName">Nama Ayah:</label>
                    <input
                        type="text"
                        id="fatherName"
                        v-model="formData.fatherName"
                        placeholder="Cth: Yohanes Budi Prakoso"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="fatherNIK">NIK:</label>
                    <input
                        type="text"
                        id="fatherNIK"
                        v-model="formData.fatherNIK"
                        placeholder="Cth: 357081712170001"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="fatherAddress">Alamat:</label>
                    <input
                        type="text"
                        id="fatherAddress"
                        v-model="formData.fatherAddress"
                        placeholder="Cth: Jl. Gusti Putri 2 No. 10 Semarang"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="fatherReligion">Agama:</label>
                    <select
                        id="fatherReligion"
                        v-model="formData.fatherReligion"
                        required
                    >
                        <option value="">Pilih Salah Satu</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="form-group-horizontal">
                    <label for="fatherLastEdu">Pendidikan Terakhir:</label>
                    <input
                        type="text"
                        id="fatherLastEdu"
                        v-model="formData.fatherLastEdu"
                        placeholder="Cth: D4/S1"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="fatherJob">Pekerjaan:</label>
                    <input
                        type="text"
                        id="fatherJob"
                        v-model="formData.fatherJob"
                        placeholder="Cth: Pegawai Negeri"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="fatherSallary">Gaji Ayah:</label>
                    <select
                        id="fatherSallary"
                        v-model="formData.fatherSallary"
                        required
                    >
                        <option value="">Pilih Rentang Gaji</option>
                        <option value="500 K - 999 K">500.000 - 999.999</option>
                        <option value="1 jt - 1,999 jt">
                            1.000.000 - 1.999.999
                        </option>
                        <option value="2 jt - 4.999 jt">
                            2.000.000 - 4.999.999
                        </option>
                        <option value="5 jt - 20 jt">5.000.000 - 20 jt</option>
                        <option value="Diatas 20 jt">Diatas 20 jt</option>
                    </select>
                </div>
                <div class="form-group-horizontal">
                    <label for="fatherPhone">No. Telepon/WA:</label>
                    <input
                        type="text"
                        id="fatherPhone"
                        v-model="formData.fatherPhone"
                        placeholder="Cth: 081234567890"
                        required
                    />
                </div>
            </div>

            <!-- Card for Data Ibu -->
            <div class="card">
                <h3><span class="highlight">Data</span> Ibu</h3>
                <div class="form-group-horizontal">
                    <label for="motherName">Nama Ibu:</label>
                    <input
                        type="text"
                        id="motherName"
                        v-model="formData.motherName"
                        placeholder="Cth: Maria Suryaningsih"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="motherNIK">NIK:</label>
                    <input
                        type="text"
                        id="motherNIK"
                        v-model="formData.motherNIK"
                        placeholder="Cth: 357081712170002"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="motherAddress">Alamat:</label>
                    <input
                        type="text"
                        id="motherAddress"
                        v-model="formData.motherAddress"
                        placeholder="Cth: Jl. Gusti Putri 2 No. 10 Semarang"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="motherReligion">Agama:</label>
                    <select
                        id="motherReligion"
                        v-model="formData.motherReligion"
                        required
                    >
                        <option value="">Pilih Salah Satu</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="form-group-horizontal">
                    <label for="motherLastEdu">Pendidikan Terakhir:</label>
                    <input
                        type="text"
                        id="motherLastEdu"
                        v-model="formData.motherLastEdu"
                        placeholder="Cth: D4/S1"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="motherJob">Pekerjaan:</label>
                    <input
                        type="text"
                        id="motherJob"
                        v-model="formData.motherJob"
                        placeholder="Cth: Pegawai Swasta"
                        required
                    />
                </div>
                <div class="form-group-horizontal">
                    <label for="motherSallary">Gaji Ibu:</label>
                    <select
                        id="motherSallary"
                        v-model="formData.motherSallary"
                        required
                    >
                        <option value="">Pilih Rentang Gaji</option>
                        <option value="500 K - 999 K">500.000 - 999.999</option>
                        <option value="1 jt - 1,999 jt">
                            1.000.000 - 1.999.999
                        </option>
                        <option value="2 jt - 4.999 jt">
                            2.000.000 - 4.999.999
                        </option>
                        <option value="5 jt - 20 jt">5.000.000 - 20 jt</option>
                        <option value="Diatas 20 jt">Diatas 20 jt</option>
                    </select>
                </div>
                <div class="form-group-horizontal">
                    <label for="motherPhone">No. Telepon/WA:</label>
                    <input
                        type="text"
                        id="motherPhone"
                        v-model="formData.motherPhone"
                        placeholder="Cth: 081234567891"
                        required
                    />
                </div>
            </div>

            <!-- Card for Upload Dokumen -->
            <div class="card">
                <h3><span class="highlight">Upload</span> Dokumen</h3>
                <div class="form-group-horizontal">
                    <label for="image">Upload Foto Anak:</label>
                    <input
                        type="file"
                        id="image"
                        accept="image/*"
                        @change="handleFileChange('image', $event)"
                    />
                    <p v-if="fileErrors.image" class="error">
                        {{ fileErrors.image }}
                    </p>
                </div>
                <div class="form-group-horizontal">
                    <label for="imageKK">Upload Foto Kartu Keluarga:</label>
                    <input
                        type="file"
                        id="imageKK"
                        accept="image/*"
                        @change="handleFileChange('imageKK', $event)"
                    />
                    <p v-if="fileErrors.imageKK" class="error">
                        {{ fileErrors.imageKK }}
                    </p>
                </div>
                <div class="form-group-horizontal">
                    <label for="imageBirthCert">Upload Foto Akte:</label>
                    <input
                        type="file"
                        id="imageBirthCert"
                        accept="image/*"
                        @change="handleFileChange('imageBirthCert', $event)"
                    />
                    <p v-if="fileErrors.imageBirthCert" class="error">
                        {{ fileErrors.imageBirthCert }}
                    </p>
                </div>
            </div>
            <div class="card">
                <h3><span class="highlight">Penerima</span> PKH</h3>
                <div class="form-group-horizontal">
                    <label for="isPKH_KIP">Apakah Penerima PKH?</label>
                    <select id="isPKH_KIP" v-model="formData.isPKH_KIP">
                        <option value="">Pilih Status</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </div>
                <!-- Upload Bukti PKH only visible if "YA" is selected -->
                <div
                    v-if="formData.isPKH_KIP === 'Ya'"
                    class="form-group-horizontal"
                >
                    <label for="imagePKH_KIP">Upload Bukti PKH:</label>
                    <input
                        type="file"
                        id="imagePKH_KIP"
                        accept="image/*"
                        @change="handleFileChange('imagePKH_KIP', $event)"
                    />

                    <p v-if="fileErrors.imagePKH_KIP" class="error">
                        {{ fileErrors.imagePKH_KIP }}
                    </p>
                </div>
            </div>

            <div class="form-actions">
                <button type="button" @click="goBack" class="btn-back-reset">
                    Kembali
                </button>
                <button type="reset" @click="resetForm" class="btn-back-reset">
                    Reset
                </button>
                <button type="submit" class="btn-submit">Kumpulkan</button>
            </div>
        </form>
    </div>
</template>

<script>
import Swal from "sweetalert2";

export default {
    data() {
        return {
            formData: {
                user: {
                    nik: "", // NIK user yang login
                    nickName: "", // nickName user yang login
                },
                nik: "", // Pastikan ini kosong dulu, diisi saat fetch user data
                classType: "",
                fullName: "",
                nickName: "",
                gender: "",
                birthPlace: "",
                birthDate: "",
                religion: "",
                childOf: "",
                domicileAddress: "",
                kkAddress: "",
                isPKH_KIP: "",
                image: "",
                imageKK: "",
                imageBirthCert: "",
                imagePKH_KIP: null,

                fatherName: "",
                fatherNIK: "",
                fatherAddress: "",
                fatherReligion: "",
                fatherLastEdu: "",
                fatherJob: "",
                fatherSallary: "",
                fatherPhone: "",

                motherName: "",
                motherNIK: "",
                motherAddress: "",
                motherReligion: "",
                motherLastEdu: "",
                motherJob: "",
                motherSallary: "",
                motherPhone: "",
            },
            fileErrors: {
                image: "",
                imageKK: "",
                imageBirthCert: "",
                imagePKH_KIP: "",
            },
            formErrors: {},
        };
    },
    created() {
        // Scroll ke atas saat form pertama kali dibuka
        window.scrollTo({ top: 0, behavior: "smooth" });
    },
    mounted() {
        this.getUserData();
        setTimeout(() => {
            this.scrollToTop();
        }, 100);
    },
    methods: {
        // Fetch user data (NIK) from API
        async getUserData() {
            const token = localStorage.getItem("token");
            if (token) {
                axios.defaults.headers.common[
                    "Authorization"
                ] = `Bearer ${token}`;
            }
            try {
                const response = await axios.get(
                    "http://127.0.0.1:8000/api/user"
                );
                this.formData.user.nik = response.data.user.nik; // Isi NIK ke dalam formData
                this.formData.user.nickName = response.data.user.nickName; // Isi NIK ke dalam formData
                this.formData.nik = response.data.user.nik; // Assign NIK ke formData.nik untuk pengiriman
                this.formData.nickName = response.data.user.nickName; // Assign NIK ke formData.nik untuk pengiriman

                // Simpan data user di localStorage
                localStorage.setItem("user", JSON.stringify(response.data.user));
            } catch (error) {
                console.error("Error fetching user data:", error);
            }
        },

        handleFileChange(fieldName, event) {
            const file = event.target.files[0];
            if (file) {
                const validImageTypes = [
                    "image/jpeg",
                    "image/png",
                    "image/jpg",
                ];
                if (validImageTypes.includes(file.type)) {
                    this.formData[fieldName] = file; // Assign the file to the correct form field
                    this.fileErrors[fieldName] = ""; // Clear any file validation error
                } else {
                    this.fileErrors[fieldName] =
                        "Invalid file type. Only JPEG, PNG, and JPG are allowed.";
                    this.formData[fieldName] = null;
                }
            }
        },

        async handleSubmit() {
            // Reset errors
            this.formErrors = {};
            this.fileErrors = {
                image: "",
                imageKK: "",
                imageBirthCert: "",
                imagePKH_KIP: "",
            };

            // Validate imagePKH_KIP if necessary
            if (
                this.formData.isPKH_KIP === "Ya" &&
                !this.formData.imagePKH_KIP
            ) {
                this.fileErrors.imagePKH_KIP =
                    "Bukti PKH harus diupload jika terdaftar sebagai penerima PKH";
                return;
            }

            const formData = new FormData();

            // Append each field from formData to FormData
            for (const key in this.formData) {
                if (Object.prototype.hasOwnProperty.call(this.formData, key)) {
                    // Check if the current key value is a file instance
                    if (this.formData[key] instanceof File) {
                        formData.append(key, this.formData[key]); // Append file
                    } else {
                        formData.append(key, this.formData[key]); // Append regular field
                    }
                }
            }

            // Send data to backend
            try {
                const response = await axios.post(
                    "http://127.0.0.1:8000/api/students",
                    formData,
                    {
                        headers: {
                            "Content-Type": "multipart/form-data", // Important for file uploads
                        },
                    }
                );

                if (response.data.success) {
                    this.$swal(
                        "Berhasil",
                        "Data berhasil disimpan!",
                        "success"
                    );
                    this.$router.push("/Pembayaran");
                } else {
                    this.$swal(
                        "Gagal",
                        "Terjadi kesalahan saat menyimpan data!",
                        "error"
                    );
                }
            } catch (error) {
                console.error("Error submitting form:", error);
                this.$swal(
                    "Error",
                    "Terjadi kesalahan saat menghubungi server.",
                    "error"
                );
            }
        },

        resetForm() {
            // Reset formData and fileErrors in one loop
            Object.keys(this.formData).forEach((key) => {
                this.formData[key] =
                    typeof this.formData[key] === "object" &&
                    this.formData[key] instanceof File
                        ? null
                        : "";
            });
            Object.keys(this.fileErrors).forEach((key) => {
                this.fileErrors[key] = "";
            });
            this.scrollToTop();
        },

        goBack() {
            this.$router.go(-1); // Kembali ke halaman sebelumnya
        },

        scrollToTop() {
            window.scrollTo({ top: 0, behavior: "smooth" });
        },
    },
};
</script>

<style scoped>
@import "./style.css";

.error-message {
    color: red;
    font-size: 0.875em;
}

/* Menambahkan jarak pada judul */
h2 {
    margin-top: 20px; /* Jarak atas */
    text-align: center;
}

h3 {
    margin-top: 15px; /* Jarak atas */
}

h4 {
    margin-top: 10px; /* Jarak atas */
}
</style>
