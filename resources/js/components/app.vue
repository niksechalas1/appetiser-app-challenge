<template>
    <div class="wrapper">
        <todo-head />
        <todos />
    </div>
</template>

<script>
    import todoHead from "./todoHead"
    import todos from "./todos"

    export default {
        components: {
            todoHead,
            todos
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
