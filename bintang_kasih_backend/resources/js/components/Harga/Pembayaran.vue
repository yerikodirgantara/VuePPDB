<template>
    <div>
        <!-- Form Pembayaran -->
        <form
            method="POST"
            @submit.prevent="handleSubmit"
            enctype="multipart/form-data"
        >
            <div class="payment-section form-container">
                <h2>Form Pembayaran</h2>

                <!-- Pilihan kartu anggota -->
                <div class="form-group">
                    <label for="isChurch_Member"
                        >Apakah Anda memiliki kartu anggota gereja?</label
                    >
                    <select
                        v-model="formData.isChurch_Member"
                        @change="updatePrice"
                    >
                        <option value="">Pilih Opsi</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </div>

                <!-- Jika memiliki kartu anggota, unggah file -->
                <div
                    v-if="formData.isChurch_Member === 'Ya'"
                    class="form-group"
                >
                    <label for="imageChurchMember"
                        >Unggah Kartu Anggota Gereja</label
                    >
                    <input
                        type="file"
                        id="imageChurchMember"
                        accept="image/*"
                        @change="handleFileChange('imageChurchMember', $event)"
                    />
                    <label class="custom-file-label" for="imageChurchMember"
                        >Choose File</label
                    >
                    <p v-if="fileErrors.imageChurchMember" class="error">
                        {{ fileErrors.imageChurchMember }}
                    </p>
                </div>

                <!-- Gelombang pembayaran -->
                <div class="form-group">
                    <label>Gelombang Pendaftaran</label>
                    <select v-model="formData.regisWave" disabled>
                        <option>{{ formData.regisWave }}</option>
                    </select>
                </div>

                <!-- Pilihan TK atau KB -->
                <div class="form-group">
                    <label for="classType">Pilih Program</label>
                    <select v-model="formData.classType" @change="updatePrice">
                        <option value="">Pilih Program</option>
                        <option value="KB">KB (Kelompok Bermain)</option>
                        <option value="TK A">TK A (Taman Kanak-kanak A)</option>
                    </select>
                </div>

                <!-- Pilihan pembayaran SPI -->
                <div class="form-group">
                    <label for="paymentMethod">Pembayaran SPI</label>
                    <select
                        v-model="formData.paymentMethod"
                        @change="updatePrice"
                    >
                        <option value="">Pilih Pembayaran</option>
                        <option value="Full">Pembayaran Penuh (100%)</option>
                        <option value="Partial">Pembayaran 30%</option>
                    </select>
                </div>

                <!-- Tampilkan No Rekening setelah program dipilih -->
                <div v-if="formData.classType !== ''" class="bank-details">
                    <h6>Rekening Pembayaran</h6>
                    <div class="bank-info">
                        <p class="bank-name">Bank Mandiri</p>
                        <p class="account-number">
                            <strong>No. Rekening:</strong> 1230 0098 7072 8
                            <button
                                type="button"
                                @click="copyAccountNumber"
                                class="copy-button"
                            >
                                Copy
                            </button>
                        </p>
                        <p
                            v-if="formData.copySuccess"
                            class="alert alert-success"
                        >
                            No.rekening telah disalin!
                        </p>
                        <p class="account-name">
                            <strong>a/n:</strong> JEANNY SHARA
                        </p>
                    </div>
                </div>

                <!-- Rincian Biaya -->
                <div class="price-section">
                    <h3><strong>Rincian Biaya</strong></h3>
                    <hr />

                    <div
                        v-if="
                            !formData.isChurch_Member &&
                            !formData.classType &&
                            !formData.paymentMethod
                        "
                        class="no-transaction"
                    >
                        <i class="fas fa-info-circle"></i>
                        <p>
                            <strong
                                >Tidak ada rincian biaya yang tersedia</strong
                            >
                        </p>
                        <small
                            >Silahkan mengisi formulir terlebih dahulu untuk
                            melihat rincian biaya</small
                        >
                    </div>

                    <div v-else>
                        <div
                            class="price-item"
                            v-if="formData.paymentSPI !== null"
                        >
                            <span class="label">Harga SPI:</span>
                            <span class="price"
                                >Rp
                                {{
                                    formData.paymentSPI.toLocaleString("id-ID")
                                }}</span
                            >
                        </div>

                        <div
                            v-if="formData.isChurch_Member === 'Ya'"
                            class="price-item"
                        >
                            <span class="label">Diskon Kartu Anggota:</span>
                            <span class="price">
                                Rp
                                {{
                                    formData.discountAmount.toLocaleString(
                                        "id-ID"
                                    )
                                }}</span
                            >
                        </div>

                        <div
                            v-if="formData.isChurch_Member === 'Ya'"
                            class="price-item"
                        >
                            <span class="label">Harga Setelah Diskon:</span>
                            <span class="price"
                                >Rp
                                {{
                                    formData.discountedPrice.toLocaleString(
                                        "id-ID"
                                    )
                                }}</span
                            >
                        </div>

                        <!-- Rincian Pembayaran 30% jika opsi Partial dipilih -->
                        <div
                            v-if="formData.paymentMethod === 'Partial'"
                            class="price-item"
                        >
                            <span class="label">Pembayaran SPI 30%:</span>
                            <span class="price"
                                >Rp
                                {{
                                    (
                                        formData.discountedPrice * 0.3
                                    ).toLocaleString("id-ID")
                                }}</span
                            >
                        </div>

                        <div class="price-item">
                            <span class="label">SPP bulan Juli:</span>
                            <span class="price"
                                >Rp
                                {{
                                    formData.paymentSPP.toLocaleString("id-ID")
                                }}</span
                            >
                        </div>

                        <hr />

                        <div class="price-item total">
                            <span class="label"><strong>Total :</strong></span>
                            <span class="price"
                                ><strong
                                    >Rp
                                    {{
                                        formData.paymentTotal.toLocaleString(
                                            "id-ID"
                                        )
                                    }}</strong
                                ></span
                            >
                        </div>
                    </div>
                </div>

                <!-- Unggah bukti pembayaran -->
                <div class="form-group">
                    <label for="imagePayment"
                        >Unggah Bukti Transfer Rekening Bank</label
                    >
                    <input
                        type="file"
                        id="imagePayment"
                        accept="image/*"
                        @change="handleFileChange('imagePayment', $event)"
                    />
                    <label class="custom-file-label" for="imagePayment"
                        >Choose File</label
                    >
                    <p v-if="fileErrors.imagePayment" class="error">
                        {{ fileErrors.imagePayment }}
                    </p>
                </div>

                <!-- Tombol submit dan reset -->
                <button
                    type="submit"
                    :disabled="isSubmitDisabled"
                    class="btn-submit"
                >
                    Lanjutkan Pembayaran
                </button>
                <button type="reset" @click="resetForm" class="reset-button">
                    Reset
                </button>
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
                },
                student: {
                    students_id: "",
                },
                isChurch_Member: "",
                currentWave: "",
                regisWave: "",
                paymentSPI: null,
                discountAmount: 0,
                discountedPrice: null,
                paymentSPP: null,
                paymentTotal: null,
                classType: "",
                paymentMethod: "",
                imageChurchMember: null,
                imagePayment: "",
                isProofUploaded: false,
                paymentStatus: "PENDING",
                copySuccess: false, // new property for tracking copy success
            },
            fileErrors: {
                imagePayment: "",
                imageChurchMember: "",
            },

            formErrors: {},
        };
    },
    created() {
        this.setWaveBasedOnDate();
        this.updatePrice();
    },
    mounted() {
        this.getUserData();
        this.getStudentData();
    },

    computed: {
        isSubmitDisabled() {
            return (
                !this.formData.isProofUploaded ||
                this.formData.fileErrors ||
                !this.formData.isChurch_Member ||
                !this.formData.classType ||
                !this.formData.paymentMethod ||
                (!this.formData.imagePayment &&
                    this.formData.isProofUploaded) ||
                (this.formData.isChurch_Member === "Ya" &&
                    !this.formData.imageChurchMember)
            );
        },
    },
    methods: {
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
            } catch (error) {
                console.error("Error fetching user data:", error);
            }
        },

        async getStudentData() {
            const token = localStorage.getItem("token");
            if (token) {
                axios.defaults.headers.common[
                    "Authorization"
                ] = `Bearer ${token}`;
            }
            try {
                const response = await axios.get(
                    "http://127.0.0.1:8000/api/get_student"
                );
                this.formData.student.students_id = response.data.students_id; // Menyimpan student_id
            } catch (error) {
                console.error("Error fetching user data:", error);
            }
        },
        setWaveBasedOnDate() {
            const currentMonth = new Date().getMonth();
            if (currentMonth === 11 || currentMonth === 0) {
                // Desember - Januari
                this.formData.currentWave = "wave1";
                this.formData.regisWave = "Gelombang 1 (Desember - Januari)";
                this.formData.paymentSPI = 1000000;
            } else if (currentMonth >= 1 && currentMonth <= 2) {
                // Februari - Maret
                this.formData.currentWave = "wave2";
                this.formData.regisWave = "Gelombang 2 (Februari - Maret)";
                this.formData.paymentSPI = 1100000;
            } else if (currentMonth >= 3 && currentMonth <= 6) {
                // April - Juli
                this.formData.currentWave = "wave3";
                this.formData.regisWave = "Gelombang 3 (April - Juli)";
                this.formData.paymentSPI = 1200000;
            } else {
                // Default to Gelombang 1 for other months (Agustus - November)
                this.formData.currentWave = "wave1";
                this.formData.regisWave = "Gelombang 1 (Desember - Januari)";
                this.formData.paymentSPI = 1000000;
            }
            this.updatePrice();
        },
        updatePrice() {
            let basePrice;

            if (this.formData.isChurch_Member === "Ya") {
                basePrice = 750000;
                this.formData.discountAmount =
                    this.formData.paymentSPI - basePrice;
            } else {
                basePrice = this.formData.paymentSPI;
                this.formData.discountAmount = 0;
            }

            this.formData.paymentSPP =
                this.formData.classType === "KB"
                    ? 100000
                    : this.formData.classType === "TK A"
                    ? 115000
                    : 0;

            if (this.formData.paymentMethod === "Partial") {
                this.formData.partialPayment = basePrice * 0.3;
                this.formData.paymentTotal =
                    this.formData.partialPayment + this.formData.paymentSPP;
            } else {
                this.formData.paymentTotal =
                    basePrice + this.formData.paymentSPP;
            }

            this.formData.discountedPrice = basePrice;
        },

        resetForm() {
            // Reset all form fields within formData
            this.formData.isChurch_Member = "";
            this.formData.classType = "";
            this.formData.paymentMethod = "";
            this.formData.imageChurchMember = null;
            this.formData.imagePayment = null;
            this.formData.paymentSPI = null;
            this.formData.discountAmount = 0;
            this.formData.discountedPrice = null;
            this.formData.paymentSPP = null;
            this.formData.paymentTotal = null;
            this.formData.isProofUploaded = false;
            this.formData.paymentStatus = "PENDING";
            this.formData.copySuccess = false;

            // Reset file errors if any
            this.fileErrors = {
                imagePayment: "",
                imageChurchMember: "",
            };

            // Re-run wave setting and update price calculations
            this.setWaveBasedOnDate();
            this.updatePrice();
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

                    // Update isProofUploaded if the uploaded file is imagePayment
                    if (fieldName === "imagePayment") {
                        this.formData.isProofUploaded = true; // Set isProofUploaded to true
                    }
                } else {
                    this.fileErrors[fieldName] =
                        "Invalid file type. Only JPEG, PNG, and JPG are allowed.";
                    this.formData[fieldName] = null;
                    if (fieldName === "imagePayment") {
                        this.formData.isProofUploaded = false; // Reset isProofUploaded if file is invalid
                    }
                }
            }
        },
        copyAccountNumber() {
            const accountNumber = "1230 0098 7072 8"; // The account number
            navigator.clipboard
                .writeText(accountNumber)
                .then(() => {
                    this.formData.copySuccess = true;
                    setTimeout(() => {
                        this.formData.copySuccess = false; // Hide alert after 3 seconds
                    }, 5000);
                })
                .catch((err) => {
                    console.error("Failed to copy: ", err);
                });
        },
        async handleSubmit() {
            this.formErrors = {};
            this.fileErrors = {
                imagePayment: "",
                imageChurchMember: "",
            };

            // Validate imageChurchMember if necessary
            if (
                this.formData.isChurch_Member === "Ya" &&
                !this.formData.imageChurchMember
            ) {
                this.fileErrors.imageChurchMember =
                    "Kartu anggota gereja harus diupload";
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

            // Kirim data ke API
            try {
                const response = await axios.post(
                    "http://127.0.0.1:8000/api/payments",
                    formData,
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "multipart/form-data", // Important for file uploads
                        },
                    }
                );

                if (response.data.success) {
                    this.$swal(
                        "Pembayaran Berhasil",
                        "Terima kasih telah melakukan pembayaran",
                        "success"
                    );
                    // his.showInvoice = true;
                    this.paymentStatus = "PENDING";
                    this.$router.push("/Home2");
                } else {
                    this.$swal(
                        "Gagal",
                        "Terjadi kesalahan saat menyimpan data!",
                        "error"
                    );
                }
            } catch (error) {
                console.error("Pembayaran gagal: ", error);
                this.$swal(
                    "Error",
                    "Terjadi kesalahan saat menghubungi server.",
                    "error"
                );
            }
        },
    },
};
</script>

<style scoped>
@import "./style.css";
</style>
