<template>
    <div class="wrapper">
        <todo-head />
        <edit-form />
    </div>
</template>

<script>
    import todoHead from "./todoHead"
    import editForm from "./editForm"

    export default {
        components: {
            todoHead,
            editForm
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
