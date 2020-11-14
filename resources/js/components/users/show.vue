<template>
	<div>
		<spinner v-show="loading"></spinner>
		<ul class="list-group mt-3" style="width: 70%">
	        <li v-for="usuario in usuarios" class="list-group-item">
	            <div class="row">
	                <div class="col">
	                	ID: {{ usuario.id }} <br>
	                	Nombre usuario: {{ usuario.name }}
	                </div>
	                <div class="col">
	                    <a href="" class="btn btn-sm btn-success">Editar</a>
	                    <a @click="deleteUser" class="btn btn-sm btn-danger">Eliminar</a>
	                </div>
	            </div>
	        </li>
	    </ul>
	    <create-user-component></create-user-component>
    </div>
</template>
<script>
	import EventBus from '../../event-bus';
	export default{
		data(){
			return {
				usuarios: [],
				loading: true,
			}
		},
		props: ['userId'],
		created(){
			EventBus.$on('user-added', data => {
				this.usuarios.push(data);
			});
		},
		mounted(){
			console.log('Montado');
			axios
				.get('http://localhost:8000/home')
				.then((res) => {
					this.usuarios = res.data
					this.loading = false
				})
		},
		methods:{
			deleteUser: function (){
				console.log('eliminando usuario ...'+this.userId );
				//this.usuarios.splice(usuarios.indexOf(this.userId), 1);
			}
		}
	}
</script>