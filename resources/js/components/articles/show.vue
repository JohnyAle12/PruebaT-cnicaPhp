<template>
    <div class="mt-2">
        <div class="card">
            <div class="card-header">{{ article.name }}</div>
            <div class="card-body">

                <input v-if="editMode" v-model="article.description" class="form-control">
                <p v-else>{{ article.description }}</p>

                <div class="mt-2">
                    <button v-if="editMode" class="btn btn-sm btn-success" @click="updateArticle">Guardar cambios</button>

                    <button v-if="!editMode" class="btn btn-sm btn-success" @click="editArticle">Editar</button>
                    <button v-if="!editMode" class="btn btn-sm btn-danger" @click="deleteArticle">Eliminar</button>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props : ['article'],
        data(){
            return {
                editMode : false
            }
        },
        methods: {
            deleteArticle(){
                this.$emit('delete')
            },
            editArticle(){
                this.editMode = true;
                this.$emit('edit');
            },
            updateArticle(article){
                this.editMode = false;
                this.$emit('update', article);
            }
        }
    }
</script>
