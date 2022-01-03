<template>
  <div>
    <div class="hold-transition register-page">
      <div class="register-box">
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <h1><b>Iniciar Sesión</b></h1>
          </div>
          <div class="card-body">
            <form @submit.prevent="loginUser">
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
                  <input id="password_confirmation" v-model="form.password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Clave">
                  <HasError :form="form" field="password_confirmation" />
                </div>
              <!-- buttons -->
              <div class="row">
                <div class="btn-group col-8">
                </div>
                <div class="btn-group col-4">
                  <button class="btn btn-primary m-1" type="submit">Enviar</button>
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
          email:'',
          password:'',
          password_confirmation:''
        }),
      }
    },
    methods: {
      async loginUser() {
        if (this.form.password === this.form.password_confirmation) {
          this.$Progress.start();
          const res = await this.form.post('/login');
          console.log(res);
          this.$Progress.finish();
          if (res.status === 204) {
            window.location.href = "/profile"
          }
        } else {
          this.form.errors.set('password_confirmation', 'Las claves no coinciden')
        }
        
        // this.$router.push({ name: '/profile'})
      }
    },
    components:{}
  }
</script>
