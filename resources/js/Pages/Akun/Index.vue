<template>
    <Head title="Akun" />
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
                            <div>Akun</div>
                            <input type="search" v-model="searchQuery" class="search-form" placeholder="Cari Akun .....">
                            <Link href="/akun/create" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i></Link>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(akun, index) in searchedAkuns" :key="akun.id">
                                        <th scope="row">{{ index+1 }}</th>
                                        <td>{{ akun.name }}</td>
                                        <td>{{ akun.username }}</td>
                                        <td>
                                            <Link @click="destroy(akun.id)" as="button" class="btn btn-danger me-2"><i class="fa-solid fa-trash"></i></Link>
                                            <Link :href="`/akun/${akun.id}`" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></Link>
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
import Pagination from '../components/Pagination.vue'
import { Link, router, usePage, Head } from '@inertiajs/vue3'
import { computed, ref } from 'vue'

export default {
    components: { NavBar, Footer, Link, Head },
    props: {
        akuns: Object
    },
    setup(props) {
        
        const user = computed(() => usePage().props.user)
        const isLogin = computed(() => usePage().props.isLogin)

        const searchQuery = ref("")
        
        const searchedAkuns = computed(() => {
            return props.akuns.filter((akun) => {
                return (
                akun.name
                    .toLowerCase()
                    .indexOf(searchQuery.value.toLowerCase()) != -1
                );
            });
        });

        function destroy(id){
            router.delete(`/akun/${id}`)
        }

        return {
            user,
            isLogin,
            searchQuery,
            searchedAkuns,
            destroy
        }
    },
}
</script>