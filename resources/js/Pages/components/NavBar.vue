<template>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">ZIS-APP</a>
            <button v-if="user.name" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div v-if="user.name" class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Zakat
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Dana</a></li>
                            <li><a class="dropdown-item" href="#">Print</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <Link href="/akun" class="nav-link">Akun</Link>
                    </li>
                </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
                <div id="user" class="d-flex dropdown">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ user.name }}</a>
                            <ul class="dropdown-menu">
                                <!-- <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Log Out</a></li> -->
                                <li><Link class="dropdown-item" href="/profile">Profile</Link></li>
                                <li>
                                    <Link class="dropdown-item" href="/logout" method="post" as="button">Logout</Link>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>
<script>
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

export default {
    components: { Link },
    setup() {
        const user = computed(() => usePage().props.user)
        return {
            user
        }    
    },
}
</script>

<style scoped>
@media (min-width: 992px) {
    nav .container{
        width: 1200px;
    }
}
</style>