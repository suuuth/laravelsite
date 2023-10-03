<template>
    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Login</h2>
    <form @submit.prevent="submit( $event )"
          class="mt-6 flex grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8"
    >
        <div>
            <label class="text-gray-900 dark:text-white" for="email">E-mail</label>
            <input name="email" type="email" v-model="formData.email">
        </div>
        <div>
            <label class="text-gray-900 dark:text-white" for="password">Password</label>
            <input name="password" type="password" v-model="formData.password">
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
            formData: {
                email: '',
                password: ''
            }
        }
    },

    methods: {
        submit (event) {
            console.log(event)
            axios.post(routes.POST_LOGIN, this.formData).then(response => {
                console.log(response)
            }).catch(error => {
                console.error(error)
            })
        }
    }
}
</script>
