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
              <input id="name" type="text" class="form-control" name="name" required autocomplete="name" placeholder = "name" autofocus>
            
                <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span>
            </div>
          </div>

          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
              <input id="last_name" type="text" class="form-control " name="last_name" required placeholder = "lastname" autocomplete="last_name">
        
                <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span>
              
            </div>
          </div>

          <div class="form-group row">
            <label for="id_card" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
              <input id="id_card" type="number" class="form-control" name="id_card" placeholder = "id_card" required autocomplete="id_card">

                <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span>
            </div>
          </div>

          <div class="form-group row">
            <label for="birth_date" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
              <input id="birth_date" type="date" class="form-control" name="birth_date" required placeholder = "birthDate" autocomplete="birth_date">

                <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span>
              
            </div>
          </div>

          <div class="form-group row">
            <label for="direction" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
              <input id="direction" type="text" class="form-control " name="direction" required placeholder = "address" autocomplete="direction">
                <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span>
            
            </div>
          </div>

          <div class="form-group row">
            <label for="state" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
              <input id="state" type="text" class="form-control " name="state" required placeholder = "state" autocomplete="state">
              
                <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span>
            
            </div>
          </div>

          <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
              <input id="city" type="text" class="form-control " name="city" placeholder="city" required autocomplete="city">
              
                <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span>
              
            </div>
          </div>

          <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right"></label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control " name="email" placeholder = "email" required autocomplete="email">
                
                  <span class="invalid-feedback" role="alert">
                    <strong></strong>
                  </span>
            
              </div>
          </div>

          <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right"></label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required placeholder = "password" autocomplete="new-password">
                
                  <span class="invalid-feedback" role="alert">
                    <strong></strong>
                  </span>
                
              </div>
          </div>

          <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="password_confirmation" required autocomplete="new-password">
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">                
              <a class="btn btn-success" href="">Regresar</a>
              <input class="btn btn-primary" type="submit" id="enviar">
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

}
</script>

<style>

</style>