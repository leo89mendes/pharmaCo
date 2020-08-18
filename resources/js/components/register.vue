<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">

                    <form @submit.prevent="submit">

                        <div class="alert alert-success" v-show="success">Register successfully.</div>

                        <!-- Name Filed -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" v-model="fields.name" />
                            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                        </div>
                        <!-- End Name Filed -->

                        <!-- Username Filed -->
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" v-model="fields.username" />
                            <div v-if="errors && errors.username" class="text-danger">{{ errors.username[0] }}</div>
                        </div>
                        <!-- End Name Filed -->

                        <!-- Email Filed -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" v-model="fields.email" />
                            <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                        </div>
                        <!-- End Email Filed -->

                        <!-- Confirm Email Filed -->
                        <div class="form-group">
                            <label for="email-confirm">Confirm Email</label>
                            <input type="text" class="form-control" name="email_confirmation" id="email-confirm" v-model="fields.email_confirmation" />
                            <div v-if="errors && errors.email_confirmation" class="text-danger">{{ errors.email_confirmation[0] }}</div>
                        </div>
                        <!-- End Confirm Email Filed -->

                        <!-- Confirm Password Filed -->
                        <div class="form-group">
                            <label for="password">Pasword</label>
                            <input type="password" class="form-control" name="password" id="password" v-model="fields.password" />
                            <div v-if="errors && errors.password" class="text-danger">{{ errors.password[0] }}</div>
                        </div>
                        <!-- End Confirm Email Filed --> 

                        <!-- Confirm Password Filed -->
                        <div class="form-group">
                            <label for="password-confirm">Confirm Pasword</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" v-model="fields.password_confirmation" />
                            <div v-if="errors && errors.password_confirmation" class="text-danger">{{ errors.password_confirmation[0] }}</div>
                        </div>
                        <!-- End Confirm Email Filed -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
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
  data() {
    return {
      fields: {},
      errors: {},
      success: false,
      loaded: true,
    }
  },
  methods: {
    submit() {
      if (this.loaded) {
        this.loaded = false;
        this.success = false;
        this.errors = {}; 
        axios.post("/register", this.fields).then(response => {
          this.fields = {}; //Clear input fields.
          this.loaded = true;
          this.success = true;
          window.location.href='/home';
        }).catch(error => {
          this.loaded = true;
          if (error.response.status === 422) {
              console.log(error.response.data.errors)
            this.errors = error.response.data.errors || {};
          }
        });
      }
    },
  },
}
</script>