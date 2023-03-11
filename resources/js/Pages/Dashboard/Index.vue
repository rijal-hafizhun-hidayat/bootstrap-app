<template>
    <NavBar />
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            <div class="alert alert-success" role="alert">You are logged in as: {{ user.name }}</div>
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
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

export default {
    components: { NavBar, Footer },
    setup() {

        const user = computed(() => usePage().props.user)
        const isLogin = computed(() => usePage().props.isLogin)
        
        console.log(isLogin)

        return {
            user,
            isLogin
        }
        
    },
}
</script>