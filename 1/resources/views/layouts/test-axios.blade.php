<!DOCTYPE html>
<html>
<head>
	<title>Test Axios</title>
</head>
<body>
<div id="app">
@{{ test }}
<div>
	@{{ products.title }}
</div>
<div @click="toggle">
	Переключить
</div>
</div>
@show('content')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
	app = new Vue({
		el: '#app',
		data(){
			return{
				test: 'test vue',
				products: ''
			}
		},
		methods: {
			toggle(){
				console.log('toggle');
				axios.get('api/getNewTitle')
				.then(response => (this.products = response.data));
			}
		},
		mounted(){
			axios.get('api/test')
			.then(response => (this.products = response.data));
		}
	})
</script>
</body>
</html>