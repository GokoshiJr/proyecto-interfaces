<template>
  <div>
      <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Prueba</div>
        <div class="card-body">          

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
              <input 
              id="name" 
              type="text" 
              class="form-control" 
              name="name" 
              required autocomplete="name" placeholder = "name" autofocus v-model="nombre">
            
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
              required autocomplete="name" placeholder = "lastName" autofocus v-model="apellido">
        
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
              name="id_card" placeholder = "id_card" required autocomplete="id_card" v-model="cedula">

                <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span>
            </div>
          </div>
    
          <div class="form-group row mb-1">
            <div class="col-md-6 offset-md-4">                
              <button class="btn btn-success">Upload Image</button>
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">                
              <button class="btn btn-success" @click="imprimir()">Imprimir</button>
              <button class="btn btn-primary"> Siguiente</button>
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
export default {
  data(){
    return{
      nombre: "",
      apellido: "",
      cedula: 0,
      imagen: ""
    }
  },
  methods:{
    imprimir(){
      console.log(this.nombre,this.apellido)
    }
  }

}
</script>

<style>

</style>