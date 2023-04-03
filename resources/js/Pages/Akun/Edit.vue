<template>
    <NavBar />
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Akun</div>
                        <div class="card-body">
                            <form @submit.prevent="submit()" class="mt-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" v-model="form.name" class="form-control" id="name">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" v-model="form.username" class="form-control" id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" v-model="form.role" aria-label="Default select example">
                                        <option selected disabled value="">-- Pilih Menu --</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Bendahara</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import { useForm } from '@inertiajs/vue3'
import NavBar from '../components/NavBar.vue'
export default {
    components: { NavBar },
    props: {
        akuns: Object
    },
    setup(props) {
        console.log(props.akuns)
        
        const form = useForm({
            name: props.akuns.name,
            username: props.akuns.username,
            role: props.akuns.role
        })

        function submit(){
            form.put(`/akun/${props.akuns.id}`, {
                preserveScroll: true,
            })
        }

        return {
            form,
            submit
        }
    },
}
</script>