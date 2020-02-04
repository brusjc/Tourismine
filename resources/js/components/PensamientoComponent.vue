<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            Publicado en 2/12/2019
        </div>
        <div class="panel-body">
            <h3>PensamientoComponent</h3>
            <p>Este es el pensamiento publicado.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <div class="panel-footer">
            <button class="btn btn-default">Editar pensamiento</button>
            <button class="btn btn-danger">Eliminar pensamiento</button>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
