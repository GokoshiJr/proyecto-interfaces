<template>
  <div>
    
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <h1><b>Registro</b></h1>
          </div>
          <div class="card-body">
            <form @submit.prevent="createUser">
              <section v-if="step==0">
                <!-- name -->
                <div class="mb-3 form-floating">
                  <label for="name">Nombre</label>
                  <input id="name" v-model="form.name" type="text" name="name" class="form-control" placeholder="">
                  <HasError :form="form" field="name" />
                </div>
                <!-- last_name -->
                <div class="mb-3 form-floating">
                  <label for="last_name">Apellido</label>
                  <input id="last_name" v-model="form.last_name" type="text" name="last_name" class="form-control" placeholder="">
                  <HasError :form="form" field="last_name" />
                </div>
                <!-- id_card -->
                <div class="mb-3 form-floating">
                  <label for="id_card">Cedula</label>
                  <input id="id_card" v-model="form.id_card" type="number" name="id_card" class="form-control" placeholder="">
                  <HasError :form="form" field="id_card" />
                </div>
              </section>
              <section v-if="step==1">
                <!-- birth_date -->
                <div class="mb-3 form-floating">
                  <label for="birth_date">Fecha de Nacimiento</label>
                  <input id="birth_date" v-model="form.birth_date" type="date" name="birth_date" class="form-control" placeholder="Fecha de Nacimiento">
                  <HasError :form="form" field="birth_date" />
                </div>    
                <!-- direction -->
                <div class="mb-3 form-group">
                  <label for="direction">Direccion</label>
                  <textarea id="direction" v-model="form.direction" type="text" name="direction" class="form-control" placeholder="" rows="2"></textarea>
                  <HasError :form="form" field="direction" />
                </div>
                <!-- state -->
                <div class="mb-3 form-group">
                  <label for="state">Estado</label>
                  <select id="state" v-model="form.state" type="text" name="state" class="form-control" placeholder="">
                    <option value="">Seleccione un Estado</option>
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
                    <option value="">Seleccione una ciudad</option>
                    <option value="Valencia">Valencia</option>
                    <option value="Maracay">Maracay</option>
                    <option value="San Cristobal">San Cristobal</option>
                    <option value="Maracaibo">Maracaibo</option>
                    <option value="Barquisimeto">Barquisimeto</option>
                  </select>
                  <HasError :form="form" field="city" />
                </div>
              </section>
              <section v-if="step==2">
                <div class="mb-3 form-group">
                  <label for="photo">Foto(Opcional)</label>
                  <input id="photo" @change="updatePhoto" type="file" name="photo" class="form-control" >
                  <HasError :form="form" field="photo" />
                </div>

                <!-- Email -->
                <div class="mb-3 form-group">
                  <label for="email">Correo</label>
                  <input id="email" v-model="form.email" type="email" name="email" class="form-control" placeholder="">
                  <HasError :form="form" field="email" />
                </div>
                <!-- Clave -->
                <div class="mb-3 form-group">
                  <label for="password">Clave</label>
                  <input id="password" v-model="form.password" type="password" name="password" class="form-control" placeholder="">
                  <HasError :form="form" field="password" />
                </div>
                <!-- Clave confirmacion -->
                <div class="mb-3 form-group">
                  <label for="password_confirmation">Confirmar clave</label>
                  <input id="password_confirmation" v-model="form.password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="">
                  <HasError :form="form" field="password_confirmation" />
                </div>
                
              </section>
              <!-- buttons -->
              <div class="row">
                <div class="btn-group col-8">
                  <div v-if="step < 2">
                    <button class="btn btn-primary m-1" type="button" @click="siguiente">Siguiente</button>
                  </div>
                  <div v-if="step > 0">
                    <button class="btn btn-success m-1" type="button" @click="regresar">Regresar</button>
                  </div>
                </div>
                <div class="btn-group col-4">
                  <div v-if="step == 2"> 
                    <button class="btn btn-primary m-1" type="submit">Enviar</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        <!-- </div>
      </div> -->
    </div>
  </div>
</template>

<script>
  export default {
    data(){
      return{
        form: new Form({
          name:'',
          last_name:'',
          id_card:'',
          birth_date:'',
          photo:'default',
          direction:'',
          state:'',
          city:'',
          email:'',
          password:'',
          password_confirmation:''
        }),
        step: 0
      }
    },
    methods:{
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
            text: 'You are uploading a large file.'
          })
        }
      },
      regresar() {
        this.step--
      },
      siguiente() {      
        if (this.step == 0) {
          // trabajar los errores
          // this.form.errors.set('name', 'Nombre incompleto')
          if (this.form.name.length > 0 && this.form.last_name.length > 0 && this.form.id_card.length > 0) {
            this.step++
          }
        } else if(this.step == 1) {
          if (this.form.direction.length > 0 && this.form.state.length > 0) {
            this.step++
          }
        } else if (this.step == 2) {
          if (this.form.email.length > 0 && this.form.password.length > 0 && this.form.confirm_password.length > 0) {
            this.step++
          }
        }
      },
      createUser() {
        this.$Progress.start();
        this.form.post('/registro')
        .then((res) => {
          console.log(res);
          this.$Progress.finish();
          if (res.status === 201) {
            window.location.href = "/login"
          }
        })
        .catch((err) => {
          this.$Progress.fail();
          Swal.fire(
            '¡Error!',
            'Fallo al registrar.',
            'warning'
          );
          console.log(err);
        })
        
        
        
      }
    },
    components:{}
  }
</script>
