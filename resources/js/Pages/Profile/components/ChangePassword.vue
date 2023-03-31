<template>
    <main class="py-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="card">
                        <div class="card-body">
                            <div class="fw-bold">Update Password</div>
                            <form class="mt-3" @submit.prevent="savePass()">
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">Password Baru</label>
                                    <input type="text" v-model="form.newPass" class="form-control" id="newPassword" required>
                                </div>
                                <div class="mb-3">
                                    <label for="konfPassword" class="form-label">Koonfirmasi Password</label>
                                    <input type="text" v-model="form.konfPass" class="form-control" id="konfPassword" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import { reactive, onMounted, ref } from 'vue'
import Swal from 'sweetalert2'
import axios from 'axios';
export default {
    setup() {
        const oldPass = ref('')
        const validation = ref([])
        const form = reactive({
            newPass: '',
            konfPass: ''
        });

        onMounted(() => {
            getPass()
        })

        function savePass(){
            axios.put('http://127.0.0.1:8000/updatePassword', {
                newPass: form.newPass,
                konfPass: form.konfPass,
                oldPass: oldPass.value
            })
            .then((res) => {
                console.log(res)
                return Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Berhasil Update Password'
                })
            })
            .catch((err) => {
                form.konfPass = ''
                return Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: err.response.data.message
                })
            })
        }

        function getPass(){
            axios.get('http://127.0.0.1:8000/getPassword')
            .then((res) => {
                oldPass.value = res.data.data.password
            })
            .catch((err) => {
                console.log(err)
            })
        }

        return {
            oldPass,
            form,
            validation,
            savePass,
            getPass
        }
    },
}
</script>

<style scoped>
@media (min-width: 992px){
    .py-1 .container .row .col-sm-11 .card .card-body  form{
        width: 50%;
    }
}
   
</style>