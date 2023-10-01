<template>
    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Login</h2>
    <form id="Login" @submit.prevent="submit( $e )">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input name="email" type="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password">
        </div>
        <div class="form-group">
            <button type="submit">Submit</button>
        </div>
    </form>
</template>

<script>
import '@/bootstrap.js'

export default  {
    name: 'Login',

    data() {
        return {
            email: '',
            password: ''
        }
    },

    methods: {
        submit () {
            axios.post(routes.POST_LOGIN, this.data).then(response => {
                console.log(response)
            }).catch(error => {
                console.error(error)
            })
        }
    }
}
</script>
