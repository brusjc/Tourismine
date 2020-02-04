<template>
    <div class="card">
        <div class="card-header">
            En qué estás pensando ahora
        </div>

        <form action="">
            <div class="form-group">
                <label for="pensamiento">ahora estoy pensando en:</label>
                <input type="text" class="form-control" name="pensamiento">
            </div>
            <button type="submit" class="btn btn-primary">Enviar pensamiento</button>
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
