<template>
    <section class="todo-form">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9 col-sm-9 col-md=9 col-lg-9">
                    <input class="form-control" type="text" v-model="edittodo" placeholder="Add todo">
                </div>
                <div class="col-3 col-sm-3 col-md=3 col-lg-3">
                    <button class="btn btn-info" @click="updateTodo()"><i class="fa fa-plus"></i> Add</button>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>