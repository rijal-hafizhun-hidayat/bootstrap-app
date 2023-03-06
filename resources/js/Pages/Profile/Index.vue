<template>
    <Head title="Profile" />
    <NavBar />
    <ChangeUsername />
    <ChangePassword />
    <FooterProfile />
    
</template>

<script>
import { Head } from '@inertiajs/vue3'
import ChangeUsername from './components/ChangeUsername.vue'
import ChangePassword from './components/ChangePassword.vue'
import NavBar from '../components/NavBar.vue'
import FooterProfile from './components/FooterProfile.vue'
import { ref, computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

export default {
    components: { NavBar, FooterProfile, ChangeUsername, Head, ChangePassword },
    setup() {
       
    },
}
</script>
