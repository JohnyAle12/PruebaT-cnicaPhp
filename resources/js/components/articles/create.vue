<template>
    <div class="row mt-2">
        <div class="col-6">
            <form v-on:submit.prevent="newArticle()">
                <div class="card">
                    <div class="card-header">Crear articulos</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" v-model="name" required>
                        </div>
                        <div class="form-group">
                            <label>Descripción:</label>
                            <input type="text" class="form-control" v-model="description" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-6">
            <!-- con index accedemos al indice de cada articulo al momento en que este se itera-->
            <article-component
                v-for="(article, index) in articles"
                :key="article.id"
                :article="article"
                @update="updateArticle(index, article)"
                @delete="deleteArticle(index, article)"
                >
            </article-component>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                name : '',
                description : '',
                articles : []
            }
        },
        mounted() {
            axios.get('/articulos')
                .then((response) => {
                    this.articles = response.data;
                });
        },
        methods:{
            newArticle(){
                const params = {
                    'name' : this.name,
                    'description' : this.description,
                };

                axios.post('/articulos', params)
                    .then((response) => {
                        const addArticle = response.data;
                        this.articles.push(addArticle);
                    });

                this.name = '';
                this.description = '';
                this.$alertName('Johny');
            },
            deleteArticle(index, article){
                axios.delete(`/articulos/${article.id}`)
                    .then(() => {
                        // con splice llamamos a articles y desde la posicion index se elimina un elemento
                        // revisar documentacion de slice y de indexOf
                        //this.articles.splice(this.articles.indexOf(article.id), 1);
                        this.articles.splice(index, 1);
                    });
            },
            updateArticle(index, article){
                const params = {
                    'description' : article.description,
                };

                axios.put(`/articulos/${article.id}`, params)
                    .then((response) => {
                        this.articles[index] = response.data;
                    });

            }
        }
    }
</script>
