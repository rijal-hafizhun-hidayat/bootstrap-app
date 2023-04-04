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
                            <div>Data Zakat</div>
                            <input type="search" v-model="searchQuery" class="search-form" placeholder="Cari Nama Donatur .....">
                            <!-- <Link href="#" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i></Link> -->
                            <button class="btn btn-primary btn-sm" @click="create()"><i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Donatur</th>
                                        <th scope="col">Tanggal Zakat</th>
                                        <th scope="col">Jenis Zakat</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(zakat, index) in searchedZakats" :key="zakat.id">
                                        <th scope="row">{{ index+1 }}</th>
                                        <td>{{ zakat.nama_donatur }}</td>
                                        <td>{{ zakat.created_at }}</td>
                                        <td>{{ zakat.jenis_zakat }}</td>
                                        <td>{{ zakat.nama }}</td>
                                        <td>{{ zakat.jumlah }}</td>
                                        <td>
                                            <Link as="button" @click="destroy(zakat.id)" class="btn btn-danger me-2"><i class="fa-solid fa-trash"></i></Link>
                                            <Link :href="`/zakat/${zakat.id}`" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></Link>
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
import { ref, computed } from 'vue'
import { Link, router } from '@inertiajs/vue3'
export default {
    components: { NavBar, Footer, Link },
    props: {
        zakats: Object
    },
    setup(props) {
        const searchQuery = ref('')

        const searchedZakats = computed(() => {
            return props.zakats.filter((zakat) => {
                return (
                    zakat.nama_donatur
                        .toLowerCase()
                        .indexOf(searchQuery.value.toLowerCase()) != -1 
                );
            });
        });

        function destroy(id){
            router.delete(`/zakat/${id}`)
        }

        function create(){
            router.visit('/zakat/add', {
                method: 'get',
            })
        }

        return {
            searchedZakats,
            searchQuery,
            destroy,
            create
        }
    },
}
</script>