<template>
    <NavBar />
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div v-if="$page.props.flash.message" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $page.props.flash.message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>Edit Data Zakat</div>
                        </div>
                        <div class="card-body">
                           <form @submit.prevent="submit">
                                <div class="mb-3">
                                    <label for="nama_donatur" class="form-label">Nama Donatur</label>
                                    <input type="text" v-model="zakat.nama_donatur" class="form-control" id="nama_donatur">
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_zakat" class="form-label">Jenis Zakat</label>
                                    <select v-model="zakat.jenis_zakat" class="form-select" id="jenis_zakat">
                                        <option selected disabled value="">-- Pilih --</option>
                                        <option value="Zakat Fitrah">Zakat Fitrah</option>
                                        <option value="Zakat Maal">Zakat Maal</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="satuan" class="form-label">Satuan</label>
                                    <select v-model="zakat.makanan_pokok_id" class="form-select" id="satuan">
                                        <option selected disabled value="">-- pilih --</option>
                                        <option v-for="makananPokok in makananPokoks" :value="makananPokok.id" :key="makananPokok.id">{{ makananPokok.nama }}</option>
                                    </select>
                                </div>
                                 <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" v-model="zakat.jumlah" class="form-control" v-on:keypress="NumbersOnly" id="jumlah">
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
import { useForm } from '@inertiajs/vue3'
export default {
    components: { NavBar, Footer },
    props: {
        zakat: Object,
        makananPokoks: Object
    },
    setup(props) {
        const zakat = useForm({
            nama_donatur: props.zakat.nama_donatur,
            jenis_zakat: props.zakat.jenis_zakat,
            makanan_pokok_id: props.zakat.makanan_pokok_id,
            jumlah: props.zakat.jumlah,
        })

        function submit(){
            zakat.put(`/zakat/${props.zakat.id}`, {
                preserveScroll: true,
            })
        }

        return {
            zakat,
            submit
        }
    },
}
</script>