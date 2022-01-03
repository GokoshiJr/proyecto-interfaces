<template>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Usuarios</h3>
            
            <!-- Button trigger modal -->
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Cedula</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Foto</th>
                  <th>Correo</th>
                  <th>Estatus</th>
                  <th>Acceso/Eliminar</th>
                </tr>
              </thead>
              <tbody>
                
                <tr v-for="user in users.data" :key="user.id">
                  
                  <td> {{ user.id }} </td>
                  <td> {{ user.name | upText}} {{ user.last_name | upText}} </td>
                  <td> {{ user.id_card }} </td>
                  <td> {{ user.birth_date | myDate}} </td>
                  <td> 
                    <img :src="getImg(user.photo)" alt="photo" width="100px" height="100px">
                  </td>
                  <td> {{ user.email }} </td>
                  <td> {{ user.access | myAccess}} </td>
                  <td>
                    <a href="#"  @click="accessUser(user.id)">
                      <i class="fa fa-edit blue"></i>
                    </a>
                    /
                    <a href="#" @click="deleteUser(user.id)">
                      <i class="fa fa-trash red"></i>
                    </a>
                  </td>
                  
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <pagination :data="users" 
            @pagination-change-page="getResults"></pagination>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    
  </div>
</template>

<script>
export default { 
  data() {
    return {
      users: {}
    }
  },
  methods: {
    getImg(img) {
      return "img/users/" + img;
    },
    accessUser(id) {
      this.$Progress.start();
      axios.patch('/user/'+id)
      .then((res)=>{
        this.$Progress.finish();
        Fire.$emit('AfterCreate');
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: '¡Acceso modificado con exito!',
          showConfirmButton: false,
          timer: 2000
        });
        console.log(res);
      })
      .catch((err) => {
        this.$Progress.fail();
        console.log(err);
      })
      
    },
    getResults(page = 1) {
			axios.get('/user?page=' + page)
      .then(response => {
        this.users = response.data;
      });
		},
    deleteUser(id) {
      Swal.fire({
        title: '¿Estas seguuro?',
        text: "¡Esta accion no podra ser revertida!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Si, eliminar usuario!'
      }).then((result) => {
        if (result.isConfirmed) {
          // send request to server
          this.$Progress.start()
          this.form.delete('/user/' + id)
          .then(() => {
            Swal.fire(
              '¡Eliminado!',
              'Usuario eliminado con exito.',
              'success'
            )
            Fire.$emit('AfterCreate');
          }).catch(() => {
            Swal.fire(
              '¡Error!',
              'Algo salio mal :(',
              'warning'
            )
          });
          this.$Progress.finish()
        }
      })
      axios.get('/user').then(({data}) => (this.users = data));
    },
    loadUsers() {
      axios.get('/user').then(({data}) => (this.users = data));
    },
  },
  created() {
    this.loadUsers();

    // registro de evento
    Fire.$on('AfterCreate', () => {
      this.loadUsers();
    })
    /* setInterval(() => this.loadUsers(), 3000); */
  },
}
</script>