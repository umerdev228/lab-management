<template>
  <div class="login-box">
    <div class="login-logo">
      <a href="/public"><b>Management </b> System</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to as Admin</p>

        <form v-on:submit.prevent="login()" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" v-model="credential.email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" v-model="credential.password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
  <!-- /.login-box -->
</template>

<script>
import {mapActions} from "vuex";
import store from "@/store";
import router from "@/router";

export default {
  name: "LoginComponent",
  data() {
    return {
      credential: {
        email: '',
        password: '',
      }
    }
  },
  created() {
  },
  mounted() {
  },
  methods: {
    ...mapActions({
      signIn:'auth/login'
    }),
    async login() {
      let self = this
      let formData = new FormData();
      formData.append('email', this.credential.email)
      formData.append('password', this.credential.password)
      await axios.get('/sanctum/csrf-cookie')
      await axios.post('/api/v1/admin/login', formData).then((response) => {
        store.commit('auth/SET_USER', response.data)
        store.commit('auth/SET_AUTHENTICATED', true)
        router.push({name: 'dashboard'})
        console.log(response.data)
      })
    }
  }
}
</script>

<style scoped>
.login-box {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
}
</style>
