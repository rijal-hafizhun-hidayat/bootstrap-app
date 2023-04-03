<template>
	<Head title="Selamat Datang"/>
	<div class="container">
		<div class="row">
			<div v-if="$page.props.flash.message" class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>{{ $page.props.flash.message }}</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<p class="text-center">selamat datang di sistem informasi pembayaran zakat, infaq dan shodaqoh</p>
			<Link href="/login" as="button" type="button">Login</Link>
		</div>
	</div>
</template>
<script>
import { Link } from '@inertiajs/vue3'
import { Head } from '@inertiajs/vue3'
export default {
	components: { Link, Head },
	setup() {
		
	},
}
</script>