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
                            <div>Tambah Zakat</div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama_donatur" class="form-label">Nama Donatur</label>
                                    <input type="text" class="form-control" id="nama_donatur">
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_zakat" class="form-label">Jenis Zakat</label>
                                    <select class="form-select" id="jenis_zakat">
                                        <option selected disabled value="">-- Pilih --</option>
                                        <option value="1">Zakat Fitrah</option>
                                        <option value="2">Zakat Maal</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="satuan" class="form-label">Satuan</label>
                                    <select class="form-select" id="satuan">
                                        <option selected disabled value="">-- Pilih --</option>
                                        <option value="1">Beras</option>
                                        <option value="2">Jagung</option>
                                        <option value="2">Padi</option>
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
    <Footer />
</template>
<script>
import NavBar from '../components/NavBar.vue'
import Footer from '../components/Footer.vue'
export default {
    components: { NavBar, Footer },
    setup() {
        function changeValSatuan(val){
            if(val == 1){

            }
        }

        return {
            changeValSatuan
        }
    },
}
</script>