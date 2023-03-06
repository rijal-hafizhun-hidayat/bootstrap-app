<template>
    <main class="py-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="card">
                        <div class="card-body">
                            <div class="fw-bold">Update Password</div>
                            <form class="mt-3">
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">Password Baru</label>
                                    <input type="text" class="form-control" id="newPassword">
                                </div>
                                <div class="mb-3">
                                    <label for="konfPassword" class="form-label">Koonfirmasi Password</label>
                                    <input type="text" class="form-control" id="konfPassword">
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
export default {
    setup() {
        
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