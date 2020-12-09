<template>
	<div>
		<!--<img :src="picture" style="width: 50px;height:50px" class="mt-3">-->
		<h4 class="mt-3">Crear Usuario</h4>
		<form @submit.prevent="saveUser" method="POST" enctype="" class="formCustomer mt-3">
	        <div class="form-group">
	            <label>Nombre:</label>
	            <input type="text" v-model="name" class="form-control" >
	        </div>
	        <div class="form-group">
	            <label>Correo electrónico:</label>
	            <input type="email" v-model="email" class="form-control">
	        </div>
	        <div class="form-group">
	            <label>Contraseña:</label>
	            <input type="password" v-model="password" class="form-control" >
	        </div>
            <button type="submit" class="btn btn-sm btn-success">Guardar</button>
        </form>
	</div>
</template>
<script>
	import EventBus from '../../event-bus';
	export default{
		data(){
			return {
				name: null,
				email: null,
				password: null,
				picture: 'img/profile_image/1604376351.jpg'
			}
		},
		methods:{
			saveUser: function(){
				console.log(this.name)
				axios
					.post('http://localhost:8000/saveUserFromVue', {
						name: this.name,
						email: this.email,
						password: this.password
					})
					.then((res) => {
						console.log(res.data.usuario);
						EventBus.$emit('user-added', res.data.usuario);
					})
					.catch(function(err){
						console.log(err);
					});
			}
		}

	}
</script>