<template>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Laboratory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <router-link :to="{name: 'dashboard'}"><a href="#">Dashboard</a></router-link>
              <li class="breadcrumb-item active">Create Laboratories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Laboratory Registration</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form @submit.prevent="submitForm()" action="" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Laboratory Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter Lab name" name="name" v-model="lab.name">
                </div>
                <div class="form-group">
                  <label for="registration">Registration #</label>
                  <input type="text" class="form-control" id="registration" placeholder="Enter Lab registration" name="registration" v-model="lab.registration">
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea type="text" class="form-control" id="address" placeholder="Enter Lab address" name="address" v-model="lab.address"></textarea>
                </div>
                <div class="form-group">
                  <label for="admin_name">Administrator Name</label>
                  <input type="text" class="form-control" id="admin_name" placeholder="Enter Lab Admin name" name="admin_name" v-model="lab.admin_name">
                </div>
                <div class="form-group">
                  <label for="contact">Contact No.</label>
                  <input type="text" class="form-control" id="contact" placeholder="Enter Lab contact" name="contact" v-model="lab.contact">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Logo</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="logo" ref="logo" name="logo" v-on:change="updateLogo()">
                      <label class="custom-file-label" for="logo">Choose logo</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Modules</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="module" ref="module" name="module" v-on:change="updateModule()">
                      <label class="custom-file-label" for="module">Choose module</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <h5>User Information</h5>
                <div class="form-group">
                  <label for="contact">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter Email " name="email" v-model="lab.email">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">CNIC</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="cnic" ref="cnic" name="cnic" v-on:change="updateCnic()">
                      <label class="custom-file-label" for="cnic">Choose CNIC</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import _ from "lodash";

export default {
  name: "CreateLaboratoryComponent",
  data() {
    return {
      lab: {
        name: '',
        registration: '',
        address: '',
        admin_name: '',
        contact: '',
        logo: '',
        module: '',
        email: '',
        cnic: '',
      },
      logo: '',
      module: '',
      cnic: '',
    }
  },
  mounted() {
  },
  created() {
  },
  methods: {
    updateLogo() {
      this.logo = this.$refs.logo.files[0];
    },
    updateModule() {
      this.module = this.$refs.module.files[0];
    },
    updateCnic() {
      this.cnic = this.$refs.cnic.files[0];
    },
    async submitForm() {
      let self = this
      let formData = new FormData();
      formData.append('logo', self.logo);
      formData.append('module', self.module);
      formData.append('cnic', self.cnic);
      _.each(self.lab, (value, key) => {
        formData.append(key, value)
      })
      await axios.post('/api/v1/admin/lab', formData)
        .then(function (response) {
          console.log(response)
          if (response.data.type === 'success') {
            self.$router.push({name: 'labs'});
          }
        })
    }
  }
}
</script>

<style scoped>

</style>
