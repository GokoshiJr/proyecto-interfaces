<template>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Programas</h3>
            <div class="card-tools">
              <button class="btn btn-success" @click="newModal" data-bs-toggle="modal" data-bs-target="#addNew"> 
                Crear un Programa 
                <i class="fas fa-user-plus fa-fw"></i>
              </button>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Tipo</th>
                  <th>Foto 1</th>
                  <th>Foto 2</th>
                  <th>Foto 3</th>
                  <th>Lenguaje</th>
                  <th>Librerias</th>
                  <th>Plugins</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>                
                <tr v-for="program in programs.data" :key="program.id">                  
                  <td> {{ program.id }} </td>
                  <td> {{ program.name | upText}} </td>
                  <td> {{ program.type }} </td>
                  <td>
                    <img :src="getPhoto(program.photo_1)" alt="photo 1" width="100px" height="100px">
                  </td>
                  <td> 
                    <img :src="getPhoto(program.photo_2)" alt="photo 2" width="100px" height="100px"> 
                    </td>
                  <td> 
                    <img :src="getPhoto(program.photo_3)" alt="photo 3" width="100px" height="100px"> 
                  </td>
                  <td> {{ program.language }} </td>
                  <td> {{ program.library }} </td>
                  <td> {{ program.plugin }} </td>
                  <td>
                    <a href="#" @click="editModal(program)">
                      <i class="fa fa-edit blue"></i>
                    </a>
                    /
                    <a href="#" @click="deleteProgram(program.id)">
                      <i class="fa fa-trash red"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <pagination :data="programs" 
            @pagination-change-page="getResults"></pagination>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="addNew" role="dialog" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Crear Programa</h5>
            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Actualizar Programa</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? updateProgram() : createProgram()">
            <div class="modal-body">
              <!-- Name -->
              <div class="mb-3 form-group">
                <label for="photo2">Nombre</label>
                <input id="name" v-model="form.name" type="text" name="name" class="form-control" placeholder="">
                <HasError :form="form" field="name" />
              </div>
              <!-- Type -->
              <div class="mb-3 form-group">
                <label for="photo2">Tipo</label>
                <input id="type" v-model="form.type" type="text" name="type" class="form-control" placeholder="">
                <HasError :form="form" field="type" />
              </div>
              <!-- photo_1 -->
              <div class="mb-3 form-group">
                <label for="photo1">Foto 1</label>
                <input id="photo_1" @change="updatePhoto" type="file" name="photo_1" class="form-control" >
                <HasError :form="form" field="photo_1" />
              </div>              
              <!-- photo_2 -->
              <div class="mb-3 form-group">
                <label for="photo2">Foto 2</label>
                <input id="photo_2" @change="updatePhoto" type="file" name="photo_2" class="form-control" >
                <HasError :form="form" field="photo_2" />
              </div>
              <!-- photo_3 -->
              <div class="mb-3 form-group">
                <label for="photo3">Foto 3</label>
                <input id="photo_3" @change="updatePhoto" type="file" name="photo_3" class="form-control" >
                <HasError :form="form" field="photo_3" />
              </div>              
              <!-- language -->
              <div class="mb-3 form-group">
                <label for="photo2">Lenguaje</label>
                <input id="language" v-model="form.language" type="text" name="language" class="form-control" placeholder="">
                <HasError :form="form" field="language" />
              </div>              
              <!-- library -->
              <div class="mb-3 form-group">
                <label for="photo2">Librería</label>
                <input id="library" v-model="form.library" type="text" name="library" class="form-control" placeholder="">
                <HasError :form="form" field="library" />
              </div>
              <!-- plugin -->
              <div class="mb-3 form-group">
                <label for="photo2">Plugin</label>
                <input id="plugin" v-model="form.plugin" type="text" name="plugin" class="form-control" placeholder="">
                <HasError :form="form" field="plugin" />
              </div>
              <input type="hidden" name="user_id" v-model="form.user_id">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Salir</button>
              <button v-show="editmode" type="submit" class="btn btn-primary">Actualizar</button>
              <button v-show="!editmode" type="submit" class="btn btn-primary">Crear</button>
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
        program_id: 0,
        editmode: false,
        programs: {},
        form: new Form({
          name:'',
          type:'',
          photo_1:'',
          photo_2:'',
          photo_3:'',
          language:'',
          library:'',
          plugin:'',
          user_id:0,
        })
      }
    },
    methods: {
      getPhoto(img) {
        return "img/programs/" + img;
      },
      updatePhoto(e) {
        let file = e.target.files[0];
        let reader = new FileReader();
        if (file['size'] < 20000000) {
          reader.onloadend = (file) => {
            /* console.log('Result', reader.result); */
            if (e.path[0].id == 'photo_1') {
              this.form.photo_1 = reader.result;
              console.log('foto 1');
            }
            if (e.path[0].id == 'photo_2') {
              this.form.photo_2 = reader.result;
              console.log('foto 2');
            }
            if (e.path[0].id == 'photo_3') {
              this.form.photo_3 = reader.result;
              console.log('foto 3');
            }
          }
          reader.readAsDataURL(file)
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You are uploading a large file.'
          })
        }
      },    
      updateProgram(id) {
        this.$Progress.start();
        this.form.put('programa/' + this.program_id) // peticion al servidor
        .then(() => {
          $('#addNew').modal('hide');
          Swal.fire( 
            '¡Actualizado!',
            'Informacion ha sido actualizada.',
            'success'
          )
          this.$Progress.finish();
          Fire.$emit('AfterCreate');
        })
        .catch(() => {
          this.$Progress.fail()
        });        
      },
      editModal(program) {
        this.program_id = program.id;
        this.editmode = true;
        this.form.reset();
        $('#addNew').modal('show');
        this.form.fill(program);
      },
      newModal() {
        this.editmode = false;
        this.form.reset();
        $('#addNew').modal('show');
      },
      getResults(page = 1) {
        axios.get('/programa?page=' + page) // peticion al servidor
        .then(({data}) => {
          this.programs = data.programas;
        })
        .catch((err) => {
          console.log(err);
        });
      },
      deleteProgram(id) {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            this.$Progress.start()
            this.form.delete('/programa/' + id) // peticion al servidor
            .then(() => {
              Swal.fire( 
                'Deleted!',
                'Your file has been deleted.',
                'success'
              );
              Fire.$emit('AfterCreate');
            }).catch(() => {
              Swal.fire(
                'Failed!',
                'There was something wronge.',
                'warning'
              );
            });
            this.$Progress.finish()
          }
        })
        this.loadPrograms();
      },
      loadPrograms() {
        axios.get('/programa') // peticion al servidor
        .then(({data}) => {
          this.programs = data.programas;
          this.form.update({ user_id: data.user_id });
        });
      },
      createProgram() {
        this.$Progress.start();  
        this.form.post('/programa') // peticion al servidor
        .then(() => {
          Fire.$emit('AfterCreate'); // ejecuta el evento AfterCreate
          $('#addNew').modal('hide'); // esconde el modal
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'User created in successfully!',
            showConfirmButton: false,
            timer: 2000
          });
          this.$Progress.finish();
          this.form.reset();
        })
        .catch(() => {
          this.$Progress.fail();
          Swal.fire(
            '¡Error!',
            'Ocurrió un error al registrar la app.',
            'warning'
          );
        });
      }
    },
    created() {
      this.loadPrograms();    
      // registro de evento
      Fire.$on('AfterCreate', () => {
        this.loadPrograms();
      });
    },
  }
</script>