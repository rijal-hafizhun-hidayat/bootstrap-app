<template>
    <Head title="Profile" />
    <NavBar />
    <ChangeUsername />
    <ChangePassword />
    <Footer />
    
</template>

<script>
import { Head } from '@inertiajs/vue3'
import ChangeUsername from './components/ChangeUsername.vue'
import ChangePassword from './components/ChangePassword.vue'
import NavBar from '../components/NavBar.vue'
import Footer from '../components/Footer.vue'

export default {
    components: { NavBar, Footer, ChangeUsername, Head, ChangePassword },
    props: {
        profile: Object,
    },
    setup(props) {
       console.log(props.profile)
    },
}
</script>
