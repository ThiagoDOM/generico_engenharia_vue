<template>
  <tr>
    <th scope="row">{{ cliente.id }}</th>
    <td>{{ cliente.razao_social }}</td>
    <td>{{ cliente.nm_fantasia }}</td>
    <td>{{ cliente.cnpj }}</td>
    <td>{{ cliente.email }}</td>
    <td>{{ cliente.telefone }}</td>
    <td>
      
      <button class="btn btn-default" v-on:click="onClickEdit(cliente)">
        Editar
      </button>

      <button class="btn btn-danger" v-on:click="onClickDelete()">
        Eliminar
      </button>
    </td>
  </tr>
</template>

<script>
export default {
  props: ["cliente"],
  data() {
    return {};
  },
  mounted() {
    console.log("Clientes montados.");
  },
  methods: {
    onClickDelete() {
      axios.delete(`/clientes/${this.cliente.id}`).then(() => {
        this.$emit("delete");
      });
    },
    onClickEdit(cliente) {
      this.$emit("form", cliente);
    },
    
  },
};
</script>
