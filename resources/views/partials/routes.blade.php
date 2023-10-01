
<script>

var routes = {}
function createRoute(name, route) {
    routes[name] = window.location.origin + '/' + route
}

createRoute('POST_LOGIN', 'api/login')

window.routes = routes

</script>
