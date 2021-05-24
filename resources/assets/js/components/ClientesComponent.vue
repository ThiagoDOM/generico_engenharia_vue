<template>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <button class="btn btn-primary" @click="newModal()">
        Cadastrar Cliente
      </button>
      <div class="panel panel-default">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Razão Social</th>
              <th scope="col">Nome Fantasia</th>
              <th scope="col">CNPJ</th>
              <th scope="col">Email</th>
              <th scope="col">Telefone</th>
            </tr>
          </thead>
          <tbody>
            <cliente-component
              v-for="(cliente, index) in clientes"
              :key="cliente.id"
              :cliente="cliente"
              @update="editModal(index)"
              @delete="deleteCliente(index)"
              @form="modalEdit(index)"
            >
            </cliente-component>
          </tbody>
        </table>

        <!--MODAL-->
        <div
          class="modal fade"
          id="addNew"
          tabindex="-1"
          role="dialog"
          aria-labelledby="addNew"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <span class="modal-title" v-show="!editmode">
                  Adicionar Novo Cliente
                </span>
                <span class="modal-title" v-show="editmode"
                  >Editar Cliente</span
                >
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" v-on:submit.prevent="newCliente()">
                <div class="form-group modal-body">
                  <label for="razao_social">Razão Social</label>
                  <input
                    type="text"
                    name="razao_social"
                    id="razao_social"
                    placeholder="Razao Social"
                    class="form-control"
                    v-model="form.razao_social"
                    required
                  />

                  <label for="nm_fantasia">Nome Fantasia</label>
                  <input
                    type="text"
                    name="nm_fantasia"
                    id="nm_fantasia"
                    placeholder="Nome Fantasia"
                    class="form-control"
                    v-model="form.nm_fantasia"
                    required
                  />

                  <label for="cnpj">CNPJ</label>
                  <input
                    type="text"
                    name="cnpj"
                    id="cnpj"
                    placeholder="CNPJ"
                    maxlength="14"
                    class="form-control"
                    v-model="form.cnpj"
                    required
                  />

                  <label for="endereco">Endereço</label>
                  <textarea
                    name="endereco"
                    id="endereco"
                    cols="30"
                    rows="2"
                    placeholder="Endereço"
                    class="form-control"
                    v-model="form.endereco"
                    required
                  ></textarea>

                  <label for="email">Email</label>
                  <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="E-mail"
                    class="form-control"
                    v-model="form.email"
                    required
                  />

                  <label for="telefone">Telefone</label>
                  <input
                    type="text"
                    name="telefone"
                    id="telefone"
                    placeholder="Telefone"
                    maxlength="14"
                    class="form-control"
                    v-model="form.telefone"
                    required
                  />

                  <label for="nm_responsavel">Nome Responsável</label>
                  <input
                    type="text"
                    name="nm_responsavel"
                    id="nm_responsavel"
                    placeholder="Nome Responsável"
                    class="form-control"
                    v-model="form.nm_responsavel"
                    required
                  />

                  <label for="cpf">CPF</label>
                  <input
                    type="text"
                    name="cpf"
                    id="cpf"
                    placeholder="CPF"
                    maxlength="11"
                    class="form-control"
                    v-model="form.cpf"
                    required
                  />

                  <label for="celular">Celular</label>
                  <input
                    type="text"
                    name="celular"
                    id="celular"
                    placeholder="Celular"
                    maxlength="14"
                    class="form-control"
                    v-model="form.celular"
                    required
                  />
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal"
                  >
                    Fechar
                  </button>
                  <button
                    v-show="editmode"
                    class="btn btn-success"
                    v-on:click.prevent="onClickUpdate()"
                  >
                    Atualizar
                  </button>
                  <button
                    v-show="!editmode"
                    type="submit"
                    class="btn btn-primary"
                  >
                    Adicionar
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!---->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      editmode: false,
      clientes: [],
      form: {
        razao_social: "",
        nm_fantasia: "",
        cnpj: "",
        endereco: "",
        email: "",
        telefone: "",
        nm_responsavel: "",
        cpf: "",
        celular: "",
      },
    };
  },

  mounted() {
    axios.get("/clientes").then((response) => {
      this.clientes = response.data;
    });
  },

  methods: {
    addCliente(cliente) {
      this.clientes.push(cliente);
    },
    updateCliente(index, cliente) {
      this.clientes[index] = cliente;
    },
    deleteCliente(index) {
      this.clientes.splice(index, 1);
    },
    newModal() {
      this.editmode = false;
      (this.form = {
        razao_social: "",
        nm_fantasia: "",
        cnpj: "",
        endereco: "",
        email: "",
        telefone: "",
        nm_responsavel: "",
        cpf: "",
        celular: "",
      }),
        $("#addNew").modal("show");
    },

    modalEdit(index) {
      const data = this.clientes[index];
      this.form = data;
      this.editmode = true;
      $("#addNew").modal("show");
    },
    onClickUpdate() {
      const params = this.form;
      axios.put(`/clientes/${this.form.id}`, params).then((response) => {
        this.editMode = false;
        this.form = {
          razao_social: "",
          nm_fantasia: "",
          cnpj: "",
          endereco: "",
          email: "",
          telefone: "",
          nm_responsavel: "",
          cpf: "",
          celular: "",
        };
        $("#addNew").modal("hide");
      });
    },

    newCliente() {
      const params = this.form;
      this.form = {
        razao_social: "",
        nm_fantasia: "",
        cnpj: "",
        endereco: "",
        email: "",
        telefone: "",
        nm_responsavel: "",
        cpf: "",
        celular: "",
      };

      axios.post("/clientes", params).then((response) => {
        const cliente = response.data;
        this.addCliente(cliente);
        $("#addNew").modal("hide");
      });
    },
  },
};
</script>
