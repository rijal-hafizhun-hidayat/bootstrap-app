<template>
    <NavBar />
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Tambah Akun</div>
                        <div class="card-body">
                            <form @submit.prevent="form.post('/akun')" class="mt-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" v-model="form.name" :class="{ 'is-invalid': form.errors.name }" class="form-control" id="name" required>
                                    <div v-if="form.errors.name" class="invalid-feedback">{{ form.errors.name }}</div>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" v-model="form.username" :class="{ 'is-invalid': form.errors.username }" class="form-control" id="username" required>
                                    <div v-if="form.errors.username" class="invalid-feedback">{{ form.errors.username }}</div>
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" v-model="form.role" :class="{ 'is-invalid': form.errors.role }" aria-label="Default select example" required>
                                        <option selected value="">Open this select menu</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Bendahara</option>
                                    </select>
                                    <div v-if="form.errors.role" class="invalid-feedback">{{ form.errors.role }}</div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" v-model="form.password" :class="{ 'is-invalid': form.errors.password }" class="form-control" id="password" required>
                                    <div v-if="form.errors.password" class="invalid-feedback">{{ form.errors.password }}</div>
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
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import NavBar from '../components/NavBar.vue'
import Footer from '../components/Footer.vue'
export default {
    components: { NavBar, Footer },
    setup() {
        const form = useForm({
            name: '',
            username: '',
            role: '',
            password: ''
        })

        function submit(){
            form.post('/akun')
            //console.log(props)
        }

        return {
            form,
            submit
        }
    },
}
</script>