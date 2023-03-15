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
                            <div>Edit Makanan Pokok</div>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="submit()">
                                <div class="mb-3">
                                    <label for="makanan-pokok" class="form-label">Nama Makanan Pokok</label>
                                    <input type="text" class="form-control" v-model="makananPokok.nama" id="makanan-pokok">
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga / 2,5 Kg</label>
                                    <input type="text" v-on:keypress="NumbersOnly" class="form-control" v-model="makananPokok.harga" id="harga">
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
        makananPokok: Object
    },
    setup(props) {
        const makananPokok = useForm({
            nama: props.makananPokok.nama,
            harga: props.makananPokok.harga
        })

        function NumbersOnly(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                evt.preventDefault();
            } else {
                //makananPokok.harga = makananPokok.harga.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                return true;
            }
        }

        function submit(){
            makananPokok.put(`/makanan-pokok/${props.makananPokok.id}`, {
                preserveScroll: true,
            })
        }

        return {
            submit,
            NumbersOnly,
            makananPokok
        }
    },
}
</script>