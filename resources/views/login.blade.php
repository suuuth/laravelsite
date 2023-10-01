
@extends('layouts.main')

@section('content')
    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Login</h2>
    <form id="Login" @submit.prevent="submit($e)">
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

    <script type="module">
        import { createApp } from 'vue';

        let loginForm = createApp({
            data() {
                return {
                    email: '',
                    password: ''
                }
            },
            mounted() {
                console.log('ligman')
            },
            methods: {
                submit (event) {
                    console.log(event)
                    axios.post(routes.POST_LOGIN, this.data).then(response => {
                        console.log(response)
                    }).catch(error => {
                        console.error(error)
                    })
                }
            }
        })

        console.log(loginForm, 'balls');

        loginForm.mount('#Login')
    </script>
@endsection
