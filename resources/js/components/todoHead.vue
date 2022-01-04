<template>
    <header class="bg-info" style="margin-bottom: 50px !important;">
        <div class="container-fluid">
            <h1>Calendar</h1>
        </div>
    </header>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    header {
        padding: 20px 0 20px 0;
        color: aliceblue;
    }

    header h1{
        font-size: 20px;
    }
</style>
