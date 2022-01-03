<template>

  <div class="container">
    <section class="py-5 border-bottom">
      <div class="container px-5 my-5 px-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Opiniones de los clientes.</h2>
            <p class="lead mb-0">Nuestros clientes aman trabajar con nosotros.</p>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <!-- Testimonial 1-->
                <div v-for="message in messages.data" :key="message.id" class="card mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                            <div class="ms-4">
                                <p class="mb-1">
                                  {{ message.message}}
                                </p>
                                <div class="small text-muted">- {{message.name}}, {{message.email}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                  <pagination :data="messages" 
                    @pagination-change-page="getMessages">
                  </pagination>
                </div>
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
      messages: {},
    }
  },
  methods: {
    getMessages(page = 1) {
			axios.get('message?page=' + page)
				.then(({data}) => {
					this.messages = data.messages;
				});
		},
    loadMessages() {
      axios.get('/message')
        .then(({data}) => {
          this.messages = data.messages;
        });
    },
  },
  created() {
    this.loadMessages();
  },
}
</script>