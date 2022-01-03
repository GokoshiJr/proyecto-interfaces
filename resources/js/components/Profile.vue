<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        
        <div class="card card-primary card-outline mt-3">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                :src="getPhoto(this.user.photo)"
                alt="Foto de perfil">
            </div>

            <h3 class="profile-username text-center">              
              {{ this.user.name }}
              {{ this.user.last_name }}
            </h3>
            <p class="text-muted text-center"> Software Engineer</p>
            <hr>

            <strong><i class="fas fa-id-badge mr-1"></i> Cedula</strong>
            <p class="text-muted">
              {{ this.user.id_card }}
            </p>
            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Direccion</strong>
            <p class="text-muted">{{ this.user.city }}, {{ this.user.state }}</p>
            <hr>

            <strong><i class="fas fa-house-user mr-1"></i> Residencia</strong>
            <p class="text-muted">{{ this.user.direction }}</p>
            <hr>

            <strong><i class="fas fa-birthday-cake mr-1"></i> Fecha de Nacimiento</strong>
            <p class="text-muted">{{ this.user.birth_date }}</p>
            <hr>

            <strong><i class="fas fa-at mr-1"></i>Correo</strong>
            <p class="text-muted">{{ this.user.email }}</p>
            <hr>

            <a href="#" @click="editModal()">
              <i class="fa fa-edit blue">  Editar datos personales</i>
            </a>
          </div>          
        </div>
        <!-- modal del perfil -->
        <div class="modal fade" id="addNew" role="dialog" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">            
            <h5 class="modal-title" id="addNewLabel">Actualizar Datos</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form @submit.prevent="updateUser">
            <div class="modal-body">
              <!-- Name -->
              <div class="mb-3 form-group">
                <label for="name">Nombre</label>
                <input id="name" v-model="form.name" type="text" name="name" class="form-control" placeholder="Nombre">
                <HasError :form="form" field="name" />
              </div>
              <!-- last_name -->
              <div class="mb-3 form-group">
                <label for="last_name">Apellido</label>
                <input id="last_name" v-model="form.last_name" type="text" name="last_name" class="form-control" placeholder="">
                <HasError :form="form" field="last_name" />
              </div>
                       
              <!-- photo -->
              <div class="mb-3 form-group">
                <label for="photo">Foto</label>
                <input id="photo" @change="updatePhoto" type="file" name="photo" class="form-control" >
                <HasError :form="form" field="photo" />
              </div>                            

              <!-- state -->
              <div class="mb-3 form-group">
                <label for="state">Estado</label>
                <select id="state" v-model="form.state" type="text" name="state" class="form-control" placeholder="">
                  
                  <option value="Carabobo">Carabobo</option>
                  <option value="Aragua">Aragua</option>
                  <option value="Tachira">Tachira</option>
                  <option value="Zulia">Zulia</option>
                  <option value="Lara">Lara</option>
                </select>
                <HasError :form="form" field="state" />
              </div>
              <!-- city -->
              <div class="mb-3 form-group">
                  <label for="city">Ciudad</label>
                  <select id="city" v-model="form.city" type="text" name="city" class="form-control">                    
                    <option value="Valencia">Valencia</option>
                    <option value="Maracay">Maracay</option>
                    <option value="San Cristobal">San Cristobal</option>
                    <option value="Maracaibo">Maracaibo</option>
                    <option value="Barquisimeto">Barquisimeto</option>
                  </select>
                  <HasError :form="form" field="city" />
                </div>
                <!-- direction -->         
              <div class="mb-3 form-group">
                  <label for="direction">Direccion</label>
                  <textarea id="direction" v-model="form.direction" type="text" name="direction" class="form-control" placeholder="" rows="2"></textarea>
                  <HasError :form="form" field="direction" />
                </div>
              
              <!-- <input type="hidden" name="user_id" v-model="form.user_id"> -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Salir</button>
              <button type="submit" class="btn btn-primary">Actualizar</button>              
            </div>
          </form>
        </div>
      </div>
    </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      user_id:'',
      user: {},
      form: new Form({
        name:'',
        last_name:'',
        id_card:'',
        birth_date:'',
        photo:'',
        direction:'',
        state:'',
        city:'',
        email:'',
        password:'',
        password_confirmation:''
      }),
    }
  },
  methods: {
    updateUser() {
      this.$Progress.start();
      this.form.patch('updateUser/' + this.user_id) // peticion al servidor
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
    updatePhoto(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      if (file['size'] < 20000000) {
        reader.onloadend = (file) => {
          /* console.log('Result', reader.result); */
          this.form.photo = reader.result;
        }
        reader.readAsDataURL(file)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Estas subiendo un archivo muy pesado.'
        })
      }
    },
    editModal() {
      this.form.reset();
      $('#addNew').modal('show');
      this.form.fill(this.user);
    },
    getPhoto(img) {
      if (img) {
        return 'img/users/' + img;
      } else {
        return 'img/users/default.png';
      }
    },
    getUserId() {
      axios.get('/getUserIdProfile')
      .then((res) => {
        this.user_id = res.data.user_id;
        this.getUser(this.user_id);
      })
      .catch((err) => {
        console.log(err);
      })
    },
    getUser(id) {
      axios.get('/user/' + id)
      .then((res) => {
        console.log(res);
        this.user = res.data;
      })
      .catch((err) => {
        console.log(err);
      })
    }
  },
  created() {
    this.getUserId();
    Fire.$on('AfterCreate', () => {
      this.getUserId();
    });
  },
  mounted() {
    console.log('component mounted');
  },
}
</script>