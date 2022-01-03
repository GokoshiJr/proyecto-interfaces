<template>
  <div>
    <div class="hold-transition register-page">
      <div class="register-box">
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <h1><b>Register Program</b></h1>
          </div>
          <div class="card-body">
            <form @submit.prevent="createProgram">
                <!-- Email -->
                <div class="mb-3 form-group">
                  <input id="name" v-model="form.name" type="text" name="name" class="form-control" placeholder="Name">
                  <HasError :form="form" field="name" />
                </div>
                <!-- Clave -->
                <div class="mb-3 form-group">
                  <input id="type" v-model="form.type" type="text" name="type" class="form-control" placeholder="Type">
                  <HasError :form="form" field="type" />
                </div>
                <!-- Clave -->
                <div class="mb-3 form-group">
                  <input id="language" v-model="form.language" type="text" name="language" class="form-control" placeholder="language">
                  <HasError :form="form" field="language" />
                </div>
                <div class="mb-3 form-group">
                  <input id="library" v-model="form.library" type="text" name="library" class="form-control" placeholder="library">
                  <HasError :form="form" field="library" />
                </div>
                <div class="mb-3 form-group">
                  <input id="plugin" v-model="form.plugin" type="text" name="plugin" class="form-control" placeholder="plugin">
                  <HasError :form="form" field="plugin" />
                </div>

                <div class="mb-3 form-group">
                  <label for="photo1">Photo 1</label>
                  <input id="photo_1" @change="updatePhoto" type="file" name="photo_1" class="form-control" >
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
          name:'',
          type:'',
          photo_1:'',
          photo_2:'test',
          photo_3:'test',
          language:'',
          library:'',
          plugin:'',
          user_id:1
        }),
      }
    },
    methods: {
      createProgram() {
          this.$Progress.start()
          this.form.post('/programa')
          .then((res)=>{
            console.log(res);
            if (res.status === 200) {
              window.location.href = "/"
            }
            this.$Progress.finish()
          })
          .catch(() => {

          })
          
        
      },
      updatePhoto(e) {
        let file = e.target.files[0];
        console.log(file);
        var reader = new FileReader();
        
        if (file['size'] < 20000000) {
          reader.onloadend = (file) => {
            /* console.log('Result', reader.result); */
            this.form.photo_1 = reader.result;
          }
          reader.readAsDataURL(file)
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You are uploading a large file.'
          })
        }

        
      }

    },
    components:{}
  }
</script>
