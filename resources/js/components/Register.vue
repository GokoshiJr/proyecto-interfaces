<template>
  <div>
    <div class="hold-transition register-page">
      <div class="register-box">
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <h1><b>Registro</b></h1>
          </div>
          <div class="card-body">
            <form @submit.prevent="createUser">
              <section v-if="step==0">
                <!-- name -->
                <div class="mb-3 input-group">
                  <input id="name" v-model="form.name" type="text" name="name" class="form-control" placeholder="Nombre">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                  <HasError :form="form" field="name" />
                </div>
                <!-- last_name -->
                <div class="mb-3 input-group">
                  <input id="last_name" v-model="form.last_name" type="text" name="last_name" class="form-control" placeholder="Apellido">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                  <HasError :form="form" field="last_name" />
                </div>
                <!-- id_card -->
                <div class="mb-3 input-group">
                  <input id="id_card" v-model="form.id_card" type="number" name="id_card" class="form-control" placeholder="Cedula">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                  <HasError :form="form" field="id_card" />
                </div>
              </section>
              <section v-if="step==1">
                <!-- birth_date -->
                <div class="mb-3 input-group">
                  <input id="birth_date" v-model="form.birth_date" type="date" name="birth_date" class="form-control" placeholder="Fecha de Nacimiento">
                  <HasError :form="form" field="birth_date" />
                </div>    
                <!-- direction -->
                <div class="mb-3 form-group">
                  <textarea id="direction" v-model="form.direction" type="text" name="direction" class="form-control" placeholder="Direccion" rows="2"></textarea>
                  <HasError :form="form" field="direction" />
                </div>
                <!-- state -->
                <div class="mb-3 form-group">
                  <select id="state" v-model="form.state" type="text" name="state" class="form-control" placeholder="Estado">
                    <option value="">Seleccione un Estado</option>
                    <option value="Carabobo">Carabobo</option>
                    <option value="Aragua">Aragua</option>
                  </select>
                  <HasError :form="form" field="state" />
                </div>
                <!-- city -->
                <div class="mb-3 form-group">
                  <input id="city" v-model="form.city" type="text" name="city" class="form-control" placeholder="Ciudad">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                  <HasError :form="form" field="city" />
                </div>
              </section>
              <section v-if="step==2">
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
                <div class="mb-3 form-group">
                  <input id="photo" v-model="form.photo" type="text" name="photo" class="form-control" placeholder="photo">
                  <HasError :form="form" field="photo" />
                </div>
              </section>
              <!-- buttons -->
              <div class="row">
                <div class="btn-group col-8">
                  <div v-if="step > 0">
                    <button class="btn btn-success m-1" type="button" @click="regresar">Regresar</button>
                  </div>
                  <div v-if="step < 2">
                    <button class="btn btn-primary m-1" type="button" @click="siguiente">Siguiente</button>
                  </div>
                  <div v-if="step == 2"> 
                    <button class="btn btn-primary m-1" type="submit">Enviar</button>
                  </div>
                </div>
              </div>
            </form>
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
        step: 0
      }
    },
    methods:{
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
      async createUser() {
        const res = await this.form.post('api/user');
        console.log(res);
        // this.$router.push({ name: '/profile'})
      }
    },
    components:{}
  }
</script>
