<template>
    <div>
        <Navmenu />
        <div class="dashboard">
            <!-- Card profil siswa di sebelah kiri -->
            <div class="profile-card">
                <img v-if="student.image" :src="student.image" alt="Foto Siswa" class="student-photo"/>
                <h2 v-if="student.fullName">{{ student.fullName }}</h2>
                <div class="status">
                    <p v-if="student.status">Status: {{ student.status }}</p>
                    <span :class="['status-indicator', student.status === 'ACTIVE' ? 'active' : 'inactive',]"></span>
                </div>
            </div>

            <!-- Data lengkap siswa yang muncul saat card diklik -->
            <transition name="fade">
                <div
                    v-if="showDetails"
                    class="student-details-box"
                    data-aos="fade-left"
                >
                    <h3>Data Lengkap Siswa</h3>
                    <p><strong>Nama Lengkap:</strong> {{ student.fullName }}</p>
                    <p><strong>NIK:</strong> {{ student.nik }}</p>
                    <p><strong>Kelas:</strong> {{ student.classType }}</p>
                    <p><strong>Nama Ortu:</strong> {{ parent.fatherName }}</p>
                    <p>
                        <strong>Status: </strong>
                        <span
                            :class="[
                                'status-text',
                                student.status === 'ACTIVE'
                                    ? 'active-text'
                                    : 'inactive-text',
                            ]"
                        >
                            {{ student.status }}
                        </span>
                    </p>
                    <p>
                        <strong>Pembayaran: </strong>
                        <span
                            :class="[
                                'status-text',
                                payment.paymentStatus === 'PAID'
                                    ? 'active-text'
                                    : 'inactive-text',
                            ]"
                        >
                            {{ payment.paymentStatus }}
                        </span>
                    </p>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
import Navmenu from "../Navbar/Navmenu2.vue";
import axios from "axios";

export default {
    name: "Dashboard",
    components: {
        Navmenu,
    },
    data() {
        return {
            showDetails: false,
            student: {
                image: "",
                fullName: "",
                nik: "",
                classType: "",
                status: "",
            },
            parent: {
                fatherName: "",
            },
            payment: {
                paymentStatus: "",
            },
        };
    },
    created() {
        this.getStudentData();
    },
    methods: {
        toggleDetails() {
            this.showDetails = !this.showDetails;
            // Refresh AOS animation when state changes
            this.$nextTick(() => {
                AOS.refresh();
            });
        },
        async getStudentData() {
            try {
                const response = await axios.get(
                    "http://127.0.0.1:8000/api/dashboard/${this.studentId}"
                ); // studentId diambil dari data yang login
                this.student = response.data.student;
                this.parent = response.data.parent;
                this.payment = response.data.payment;
            } catch (error) {
                console.error("Error fetching student data:", error);
            }
        },
    },
};
</script>

<style scoped>
.dashboard {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    height: 100vh;
    background-color: #f5f5f5;
    padding: 20px;
    padding-top: 100px;
}

.profile-card {
    background-color: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 300px;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.profile-card:hover {
    transform: scale(1.05);
}

.student-photo {
    border-radius: 50%;
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin-bottom: 15px;
}

h2 {
    margin-bottom: 10px;
    font-size: 24px;
}

.status {
    display: inline-flex;
    align-items: center;
}

.status p {
    margin: 0; /* Hilangkan margin default pada teks */
}

.status-indicator {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: green;
    margin-left: 2px;
}

/* Kotak untuk data lengkap siswa */
.student-details-box {
    background-color: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-left: 20px;
    width: 400px;
    border: 1px solid #ddd;
}

.student-details-box h3 {
    margin-bottom: 15px;
    font-size: 22px;
}

.student-details-box p {
    font-size: 18px;
    color: #666;
    margin-bottom: 10px;
}

/* Status text styling */
.status-text {
    font-weight: bold;
}

.active-text {
    color: green;
}

.inactive-text {
    color: red;
}

/* Transisi CSS */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
    opacity: 0;
}
</style>
