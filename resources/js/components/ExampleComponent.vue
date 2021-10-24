<template>
    <div>
        <div class="card">
            <div class="card-body">
                <h2>Editar Datos</h2>
                <div class="alert alert-danger" role="alert" v-if="err_flag">
                    <ul>
                        <li v-for="error in errors" v-bind:key="error.name">
                            {{ error }}
                        </li>
                    </ul>
                </div>
                <form @submit.prevent="enviar" class="mb-3">
                    <div class="form-group">
                        <input type="text" class="form-control"
                        v-model="user.name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"
                        v-model="user.last_name">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control"
                        v-model="user.id_card">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email"
                        v-model="user.direction">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email"
                        v-model="user.state">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email"
                        v-model="user.city">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
                </form>        
            </div>
        </div>
    </div>
</template>

<script>
    const axios = require('axios');
    export default {
        data() {
            return {
                err_flag: false,
                errors: [],
                user: {
                    id: this._id,
                    name: this._name,
                    last_name: this._last_name,
                    id_card: this._id_card,
                    direction: this._direction,
                    state: this._state,
                    city: this._city,
                    /* csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content') */
                },
            }
        },
        // identify props with initial _ in their names
        props: [
            "_id",
            "_name",
            "_last_name",
            "_id_card",
            "_direction",
            "_state",
            "_city",            
        ],        
        methods: {
            enviar() {
                axios.post(`/empleado/`, {
                    id: this.user.id,
                    name: this.user.name,
                    last_name: this.user.last_name,
                    id_card: this.user.id_card,
                    direction: this.user.direction,
                    state: this.user.state,
                    city: this.user.city,
                    _method: "PUT",
                }).then(res => {
                    console.log(res);
                }).catch(err => {
                    console.log(err);
                    this.err_flag = true;
                    this.errors = [];
                    if(err.response.data.hasOwnProperty("errors")) {
                        const errors = err.response.data.errors;
                        console.log(errors);
                        for(let error in errors) {
                            if (errors.hasOwnProperty(error)) {
                                this.errors.push(errors[error][0]);
                            }
                        }
                    } 
                })
                window.location.href = 'http://localhost:8000' +'/empleado'
            }
        }
    }
</script>
