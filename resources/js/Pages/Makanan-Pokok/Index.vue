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
                            <div>Makanan Pokok</div>
                            <input type="search" v-model="searchQuery" class="search-form" placeholder="Cari .....">
                            <Link href="/makanan-pokok/create" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i></Link>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(makananPokok, index) in makananPokoks" :key="makananPokok.id">
                                        <th scope="row">{{ index+1 }}</th>
                                        <td>{{ makananPokok.nama }}</td>
                                        <td>Rp.{{ makananPokok.harga }}</td>
                                        <td>
                                            <Link as="button" @click="destroy(makananPokok.id)" class="btn btn-danger me-2"><i class="fa-solid fa-trash"></i></Link>
                                            <Link href="#" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
import { Link, router } from '@inertiajs/vue3'
export default {
    components: { NavBar, Footer, Link },
    props: {
        makananPokoks: Object
    },
    setup(props) {
        function destroy(id){
            router.delete(`/makanan-pokok/${id}`)
        }

        return {
            destroy
        }
    },
}
</script>