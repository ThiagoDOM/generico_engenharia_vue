<template>
    <div class="panel panel-default">
        <div class="panel-heading">¿En qué estás pensando ahora?</div>

        <div class="panel-body">
            <form action="" v-on:submit.prevent="newcliente()">
                <div class="form-group">
                    <label for="cliente">Ahora estoy pensando en:</label>
                    <input type="text" class="form-control" name="cliente" v-model="description">
                </div>
                <button type="submit" class="btn btn-primary">
                    Enviar Pensamento
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                description: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            newCliente() {
                const params = {
                    description: this.description
                };
                this.description = '';

                axios.post('/clientes', params)
                    .then((response) => {
                        const cliente = response.data;
                        this.$emit('new', cliente);
                    });
            }
        }
    }
</script>
