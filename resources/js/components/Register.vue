<template>
    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Register</h2>
    <form @submit.prevent="submit( $e )">
        <div>
            <label class="text-gray-900 dark:text-white" for="email">E-mail</label>
            <input name="email" type="email" v-model="email">
        </div>
        <div>
            <label class="text-gray-900 dark:text-white" for="password">Password</label>
            <input name="password" type="password" v-model="password">
        </div>
        <div>
            <button class="text-gray-900 dark:text-white" type="submit">Submit</button>
        </div>
    </form>
</template>

<script>

export default  {
    name: 'Register',

    data() {
        return {
            email: '',
            password: ''
        }
    },

    methods: {
        submit (event) {
            console.log(event)

            axios.post(routes.POST_REGISTER, this.data).then(response => {
                console.log(response)
            }).catch(error => {
                console.error(error)
            })
        }
    }
}
</script>
