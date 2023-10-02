<template>
    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Login</h2>
    <form @submit.prevent="submit( $event )"
          class="mt-6 flex grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8"
    >
        <div>
            <label class="text-gray-900 dark:text-white" for="data.email">E-mail</label>
            <input name="email" type="email" v-model="data.email">
        </div>
        <div>
            <label class="text-gray-900 dark:text-white" for="password">Password</label>
            <input name="password" type="password" v-model="data.password">
        </div>
        <div>
            <button class="bg-gray text-gray-900 dark:text-white" type="submit">Submit</button>
        </div>
    </form>
</template>

<script>

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
