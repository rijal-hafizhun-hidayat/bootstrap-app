<template>
    <NavBar />
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="$page.props.flash.message" class="alert alert-danger" role="alert">
                    {{ $page.props.flash.message }}
                </div>

                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form @submit.prevent="login()">
                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>
                                <div class="col-md-6">
                                    <input id="username" v-model="form.username" type="text" class="form-control" required>
                                    <div v-if="form.errors.username" class="mt-2 alert alert-danger">{{ form.errors.username }}</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                <div class="col-md-6">
                                    <input id="password" v-model="form.password" type="password" class="form-control" required>
                                    <div v-if="form.errors.password" class="mt-2 alert alert-danger">{{ form.errors.password }}</div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Footer />
</template>
<script>
import NavBar from '../components/NavBar.vue'
import Footer from '../components/Footer.vue'
import { useForm } from '@inertiajs/vue3'
export default {
    components: { NavBar, Footer },
    props: {
        errors: Object
    },
    setup() {
        const form = useForm({
            username: '',
            password: ''
        })

        function login(){
            form.post('/login');
        }

        return {
            form,
            login
        }
    },
}
</script>