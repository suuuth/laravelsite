<template>
    <h3>Login</h3>
    <form @submit.prevent="submit">
        <button type="submit">Submit</button>
    </form>
</template>

<script>
export default  {
    name: 'Login',
    data: function () {
        return {}
    },
    methods: {
        submit () {
            console.log('submitted')
        }
    }
}
</script>
