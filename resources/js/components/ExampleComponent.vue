<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <input type="text" v-model="label">
                    <button @click="addItem()">Add Item</button>
                    <div class="card-body">
                        I'm an example component sample.
                    </div>
                    <div v-for="(sample) in todoList" :key="sample.id">
                        {{sample.todos}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data: function() {
            return {
                todoList: [],
                label: ""
            }
        },

        methods: {
            loadTodos: function () {
                axios.get('/api/todos').then((response) => {
                    this.todoList = response.data;
                }).catch(function (error){
                    console.log(error)
                })
            },
            addItem: function (){
                axios.post('api/addtodo', {
                    label: this.label
                }).then(response => {
                    if (response.status == 201){
                        this.label = "";
                        console.log('saved');
                    }
                }).catch(error => {
                    console.log(error);
                })
            }
        },

        mounted() {
            this.loadTodos();
            console.log('Component mounted.')
        }

    }
</script>
