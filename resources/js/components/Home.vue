<template>
	<div>
		<header class="bg-dark py-5 mt-3">
			<div class="container px-5">
				<div class="row gx-5 justify-content-center">
					<div class="col-lg-6">
						<div class="text-center my-5">
							<h1 class="display-5 fw-bolder text-white mb-2">Present your business in a whole new way</h1>
							<p class="lead text-white-50 mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit!</p>
						</div>
					</div>
				</div>
			</div>
		</header>
		<section class="py-5 border-bottom" id="features">
			<div class="container px-5 my-5">
				<div class="row gx-5">
					<div class="col-lg-4 mb-5 mb-lg-0">
							<div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
							<h2 class="h4 fw-bolder">Featured title</h2>
							<p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
							<a class="text-decoration-none" href="#!">
								Call to action
								<i class="bi bi-arrow-right"></i>
							</a>
					</div>
					<div class="col-lg-4 mb-5 mb-lg-0">
						<div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
						<h2 class="h4 fw-bolder">Featured title</h2>
						<p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
						<a class="text-decoration-none" href="#!">
							Call to action
							<i class="bi bi-arrow-right"></i>
						</a>
					</div>
					<div class="col-lg-4">
						<div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
						<h2 class="h4 fw-bolder">Featured title</h2>
						<p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
						<a class="text-decoration-none" href="#!">
							Call to action
							<i class="bi bi-arrow-right"></i>
						</a>
					</div>
				</div>
			</div>
			
		</section>
		<section>
			<div class="card-columns mt-4 mb-4">
				<div v-for="user in users" :key="user.id" class="card">
					<router-link :to='"dev/"+user.id'>
						<img :src="getImg(user.photo)" class="card-img-top" alt="photo" width="100px" height="200px">
					</router-link>
					<div class="card-body">
						<h5 class="card-title">{{ user.name | upText}} {{ user.last_name | upText}}</h5>
						<p class="card-text">{{ user.email }}</p>
					</div>
				</div>
			</div>
		</section>
	</div>
</template>

<script>
export default { 
  data() {
    return {
      users: {}
    }
  },
  methods: {
		getUrl(id) {
			return "dev/" + id;
		},
    getImg(img) {
      return "img/users/" + img;
    },
    loadUsers() {
      axios.get('/gallery').then(({data}) => this.users = data);
			// console.log(this.users);
    },
  },
  created() {
    this.loadUsers();
    // registro de evento
    Fire.$on('AfterCreate', () => {
      this.loadUsers();
    })
    /* setInterval(() => this.loadUsers(), 3000); */
  },
}
</script>