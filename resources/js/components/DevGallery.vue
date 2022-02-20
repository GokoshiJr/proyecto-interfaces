<template>
  <div>
    <section class="content">
      <div class="container-fluid mt-3">
        <div class="row">
          <div class="col-md-3">
            <!-- User picture -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                    :src="getImgUser(this.user.photo)"
                    alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ this.user.name }} {{ this.user.last_name }}</h3>
                <p class="text-muted text-center">Software Engineer</p>
              </div> <!-- /.card-body -->
            </div> <!-- /.card -->
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title mt-2">Acerca de mí</h3>
              </div> <!-- /.card-header -->
              <div class="card-body">
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
              </div>
            </div> <!-- /.card -->
          </div> <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Actividad</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div> <!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div v-for="program in programs" :key="program.id">
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" :src="getImgUser(user.photo)" alt="user image">
                          <span class="username">
                            <a href="#">{{ program.name }} </a>
                          </span>
                          <span class="description">{{ program.type }} - {{ program.created_at | myAgo }}</span>
                        </div> <!-- /.user-block -->
                        
                        <p>
                          <ul>
                            <li>{{ program.language }}</li>
                            <li>{{ program.library }}</li>
                            <li>{{ program.plugin }}</li>
                          </ul>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>

                        <div class="row mb-3">
                          <div class="col-sm-4">
                            <img class="img-fluid mb-3" :src="getImg(program.photo_1)" alt="Photo" width="250px" height="250px">
                          </div>
                          
                          <div class="col-sm-4">
                            <img class="img-fluid mb-3" :src="getImg(program.photo_2)" alt="Photo" width="250px" height="250px">
                          </div>

                          <div class="col-sm-4">
                            <img class="img-fluid mb-3" :src="getImg(program.photo_3)" alt="Photo" width="250px" height="250px">
                          </div>
                        </div>
                      </div> <!-- /.post -->
                      <hr>
                    </div> <!-- vue loop -->
                  </div> <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img :src="getImgUser(this.user.photo)" alt="...">
                            <img :src="getImgUser(this.user.photo)" alt="...">
                            <img :src="getImgUser(this.user.photo)" alt="...">
                            <img :src="getImgUser(this.user.photo)" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div> <!-- /.card -->
            
          </div> <!-- /.col -->
        </div> <!-- /.row -->
      </div> <!-- /.container-fluid -->
    </section>
  </div>
</template>

<script>
export default { 
  data() {
    return {
      user: {},
      programs: {}
    }
  },
  methods: {
    loadPrograms() {
      axios.get('/dev_program/' + this.$route.params.id) // peticion al servidor
        .then(({data}) => {
          console.log(data);
          this.programs = data;
        });
    },
    getImg(img) {
      return "../img/programs/" + img;
    },
    getImgUser(img) {
      return "../img/users/" + img;
    },
    loadUsers() {
      axios.put('/dev/'+ this.$route.params.id).then(({data}) => (this.user = data));
      // axios.get('/dev/'+this.$route.params.id).then((data) => console.log(data));
    },
  },
  created() {
    this.loadUsers();
    this.loadPrograms();
    // registro de evento
    Fire.$on('AfterCreate', () => {
      this.loadUsers();
    })
  },
}
</script>