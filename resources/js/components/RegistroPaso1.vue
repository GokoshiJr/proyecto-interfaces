<template>
  <div>
    <div v-for=" error,index of errors" :key="index" class="alert alert-danger">
      {{error}}
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="container">
          <div class="card">
            <div class="card-header">Prueba</div>
              <div class="card-body">          
                <section v-if="step==1">
                  <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right"></label>
                    <div class="col-md-6">
                      <input 
                      id="name" 
                      type="text" 
                      class="form-control" 
                      name="name" 
                      required autocomplete="name" placeholder = "name" autofocus v-model="form.nombre">

                        <span class="invalid-feedback" role="alert">
                          <strong></strong>
                        </span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="last_name" class="col-md-4 col-form-label text-md-right"></label>
                    <div class="col-md-6">
                      <input id="last_name" 
                      type="text" 
                      class="form-control "
                       name="last_name"
                      required checked = "true"  autocomplete="name" placeholder = "lastName" autofocus v-model="form.apellido">

                        <span class="invalid-feedback" role="alert">
                          <strong></strong>
                        </span>

                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="id_card" class="col-md-4 col-form-label text-md-right"></label>
                    <div class="col-md-6">
                      <input id="id_card" 
                      type="number" 
                      class="form-control" 
                      name="id_card" placeholder = "id_card" required autocomplete="id_card" v-model="form.cedula">

                        <span class="invalid-feedback" role="alert">
                          <strong></strong>
                        </span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="birth_date" class="col-md-4 col-form-label text-md-right"></label>
                    <div class="col-md-6">
                      <input id="birth_date" v-model ="form.fecha" type="date" class="form-control" name="birth_date" required placeholder = "birthDate" autocomplete="birth_date">

                        <span class="invalid-feedback" role="alert">
                          <strong></strong>
                        </span>

                    </div>
                  </div>
                  <div class="form-group row mb-1">
                    <div class="col-md-6 offset-md-4 text-center">                
                      <button class="btn btn-success">Upload Image</button>
                    </div>
                  </div>
                </section>
                <section v-if ='step == 2'>
                  
                  <div class="form-group row">
                    <label for="direction" class="col-md-4 col-form-label text-md-right"></label>
                    <div class="col-md-6">
                      <input id="direction" v-model= "form.address" type="text" class="form-control " name="direction" required placeholder = "address" autocomplete="direction">
                        <span class="invalid-feedback" role="alert">
                          <strong></strong>
                        </span>

                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="state" class="col-md-4 col-form-label text-md-right"></label>
                    <div class="col-md-6">
                      <input id="state" v-model= "form.estado" type="text" class="form-control " name="state" required placeholder = "state" autocomplete="state">

                        <span class="invalid-feedback" role="alert">
                          <strong></strong>
                        </span>

                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label text-md-right"></label>
                    <div class="col-md-6">
                      <input id="city" v-model= "form.ciudad" type="text" class="form-control " name="city" placeholder="city" required autocomplete="city">

                        <span class="invalid-feedback" role="alert">
                          <strong></strong>
                        </span>

                    </div>
                  </div>
                </section>
                <section v-if ='step == 3'>
                  <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right"></label>
                      <div class="col-md-6">
                        <input id="email" v-model= "form.email" type="email" class="form-control " name="email" placeholder = "email" required autocomplete="email">

                          <span class="invalid-feedback" role="alert">
                            <strong></strong>
                          </span>

                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="password" class="col-md-4 col-form-label text-md-right"></label>
                      <div class="col-md-6">
                        <input id="password" v-model= "form.password" type="password" class="form-control" name="password" required placeholder = "password" autocomplete="new-password">

                          <span class="invalid-feedback" role="alert">
                            <strong></strong>
                          </span>

                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right"></label>
                    <div class="col-md-6">
                      <input id="password-confirm" v-model= "form.confirm_password" type="password" class="form-control" name="password_confirmation" placeholder="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>

                  
                </section>
                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4 text-right">                
                    <button class="btn btn-success" v-if= 'step > 1' @click="regresar()">Regresar</button>
                      <button class="btn btn-primary" @click="siguiente()">
                        <div v-if='step < 3'>Siguiente</div>
                        <div v-else> Enviar</div>
                      </button>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
Vue.use(VueFormWizard)
export default {
  data(){
    return{
      form:{
        nombre: "",
        apellido: "",
        cedula: "",
        fecha:"",
        imagen: "",
        address: "",
        estado: "",
        ciudad: "",
        email: "",
        password: "",
        confirm_password: ""
      },
      step: 1,
      errors: []
    }
  },
  methods:{
    regresar(){
      this.errors = []
      this.step--
    },
    siguiente(){
      
        if(this.step == 1){
          if(this.form.nombre.length >0 && this.form.apellido.length >0 && this.form.cedula.length >0 && this.form.fecha.length>0){
            this.errors = []
            this.step++
          }else{
            if(!this.errors.find(error => error == "Campos Obligatorios")){
              this.errors.push("Campos Obligatorios")
            }
          }
        }else if(this.step == 2){
          if(this.form.address.length > 0 && this.form.estado.length >0 && this.form.ciudad.length>0){
            this.errors = []
            this.step++
            
          }else{
            if(!this.errors.find(error => error == "Campos Obligatorios")){
              this.errors.push("Campos Obligatorios")
            }
          }
        }else if(this.step ==3){
          if(this.form.email.length > 0 && this.form.password.length > 0 && this.form.confirm_password.length > 0){
            this.errors = []
            if(this.form.password != this.form.confirm_password){
              if(!this.errors.find(error => error == "Las contrasenas no coinciden")){
                this.errors.push("Las contrasenas no coinciden")
              }
            }else{
                        //se envia aqui la info
            }
          }else{
            if(!this.errors.find(error => error == "Campos Obligatorios")){
              this.errors.push("Campos Obligatorios")
            }
          }
        }  
      }
     
  },
  components:{}
}
</script>

<style>

</style>