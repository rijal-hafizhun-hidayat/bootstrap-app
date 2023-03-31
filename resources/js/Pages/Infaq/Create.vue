<template>
    <NavBar />
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Tambah Akun</div>
                        <div class="card-body">
                            <form @submit.prevent="submit()" class="mt-3">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Donatur</label>
                                    <input type="text" v-model="form.nama" class="form-control" id="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_hp" class="form-label">Nomor Hp</label>
                                    <input type="text" v-model="form.nomor_hp" v-on:keypress="numOnly()" class="form-control" id="nomor_hp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="rekening" class="form-label">rekening</label>
                                    <select class="form-select" v-model="form.rekening" aria-label="Default select example" required>
                                        <option disabled selected value="">-- pilih --</option>
                                        <option value="Rekening">Rekening</option>
                                        <option value="Cash">Cash</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" v-model="form.jumlah" v-on:keypress="numOnly()" class="form-control" id="jumlah" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <Footer />
</template>
<script>
import NavBar from '../components/NavBar.vue'
import Footer from '../components/Footer.vue'
import { useForm } from '@inertiajs/vue3';
export default {
    components: { NavBar, Footer },
    setup(){
        const form = useForm({
            nama: '',
            nomor_hp: '',
            rekening: '',
            jumlah: ''
        })

        function submit(){
            form.post('/infaq')
        }

        function numOnly(evt){
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                evt.preventDefault();
            } else {
                return true;
            }
        }

        return {
            form,
            submit,
            numOnly
        }
    }
}
</script>