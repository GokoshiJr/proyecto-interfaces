<template>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Usuarios</h3>
            <div class="card-tools">
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNew"> Crear Usuario 
                <i class="fas fa-user-plus fa-fw"></i>
              </button>
            </div>
            <!-- Button trigger modal -->
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Reason</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="tag tag-success">Approved</span></td>
                  <td>
                    <a href="#">
                      <i class="fa fa-edit blue"></i>
                    </a>
                    /
                    <a href="#">
                      <i class="fa fa-trash red"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addNewLabel">Modal title</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form @submit.prevent="createUser">
            <div class="modal-body">
              <!-- Nombre -->
              <div class="mb-3 form-group">
                <input id="name" v-model="form.name" type="text" name="name" class="form-control" placeholder="Nombre">
                <HasError :form="form" field="name" />
              </div>
              <!-- Apellido -->
              <div class="mb-3 form-group">
                <input id="last_name" v-model="form.last_name" type="text" name="last_name" class="form-control" placeholder="Apellido">
                <HasError :form="form" field="last_name" />
              </div>
              <!-- Cedula -->
              <div class="mb-3 form-group">
                <input id="id_card" v-model="form.id_card" type="number" name="id_card" class="form-control" placeholder="Cedula">
                <HasError :form="form" field="id_card" />
              </div>
              <!-- Fecha de Nacimiento -->
              <div class="mb-3 form-group">
                <input id="birth_date" v-model="form.birth_date" type="date" name="birth_date" class="form-control" placeholder="Fecha de Nacimiento">
                <HasError :form="form" field="birth_date" />
              </div>
              <!-- Foto -->
              <div class="mb-3 form-group">
                <input id="photo" v-model="form.photo" type="text" name="photo" class="form-control" placeholder="Foto">
                <HasError :form="form" field="photo" />
              </div>
              <!-- Direccion -->
              <div class="mb-3 form-group">
                <input id="direction" v-model="form.direction" type="text" name="direction" class="form-control" placeholder="Direccion">
                <HasError :form="form" field="direction" />
              </div>
              <!-- Estado -->
              <div class="mb-3 form-group">
                <select id="state" v-model="form.state" type="text" name="state" class="form-control" placeholder="Estado">
                  <option value="">Seleccione un Estado</option>
                  <option value="Carabobo">Carabobo</option>
                  <option value="Aragua">Aragua</option>

                </select>
                <HasError :form="form" field="state" />
              </div>
              <!-- Ciudad -->
              <div class="mb-3 form-group">
                <input id="city" v-model="form.city" type="text" name="city" class="form-control" placeholder="Ciudad">
                <HasError :form="form" field="city" />
              </div>
              <!-- Email -->
              <div class="mb-3 form-group">
                <input id="email" v-model="form.email" type="email" name="email" class="form-control" placeholder="Correo">
                <HasError :form="form" field="email" />
              </div>
              <!-- Clave -->
              <div class="mb-3 form-group">
                <input id="password" v-model="form.password" type="password" name="password" class="form-control" placeholder="Clave">
                <HasError :form="form" field="password" />
              </div>
              <!-- Clave confirmacion -->
              <div class="mb-3 form-group">
                <input id="password_confirmation" v-model="form.password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Clave">
                <HasError :form="form" field="password_confirmation" />
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Salir</button>
              <button type="submit" class="btn btn-primary">Crear</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: new Form({
        name:'',
        last_name:'',
        id_card:0,
        birth_date:'',
        photo:'',
        direction:'',
        state:'',
        city:'',
        email:'',
        password:'',
        password_confirmation:''
      })
    }
  },
  methods: {
    async createUser() {
      const res = await this.form.post('api/user');
      console.log(res);
    }
  },
  mounted() {
    console.log('component mounted')
  },
}
</script>