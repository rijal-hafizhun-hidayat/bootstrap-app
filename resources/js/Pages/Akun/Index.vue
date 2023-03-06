<template>
    <NavBar />
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>Akun</div>
                            <Link href="/akun/create" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i></Link>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(akun, index) in akuns" :key="akun.id">
                                        <th scope="row">{{ index+1 }}</th>
                                        <td>{{ akun.name }}</td>
                                        <td>{{ akun.username }}</td>
                                        <td>{{ akun.role }}</td>
                                        <td>
                                            <Link href="#" class="btn btn-danger me-2"><i class="fa-solid fa-trash"></i></Link>
                                            <Link href="/akun/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></Link>
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
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

export default {
    components: { NavBar, Footer, Link },
    props: {
        akuns: Object
    },
    setup(props) {
        const user = computed(() => usePage().props.user)
        const isLogin = computed(() => usePage().props.isLogin)
        
        //console.log(props.akuns)

        return {
            user,
            isLogin
        }
    },
}
</script>