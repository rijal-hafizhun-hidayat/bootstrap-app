<template>
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="card">
                        <div class="card-body">
                            <div class="fw-bold">Update Username</div>
                            <form class="mt-3">
                                <div class="mb-3">
                                    <label for="oldUsername" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="oldUsername">
                                </div>
                                <div class="mb-3">
                                    <label for="newUsername" class="form-label">Username Baru</label>
                                    <input type="text" class="form-control" id="newUsername">
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
    .py-5 .container .row .col-sm-11 .card .card-body  form{
        width: 50%;
    }
}
    
</style>