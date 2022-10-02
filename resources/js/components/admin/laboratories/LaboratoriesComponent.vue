<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Laboratories </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <router-link :to="{name: 'dashboard'}"><a href="#">Dashboard</a></router-link>
            </li>
            <li class="breadcrumb-item active">Laboratories</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Responsive Hover Table</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 300px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                  <router-link :to="{ name: 'create-lab'}">
                    <a href="javascript:void(0)" class="btn btn-sm btn-success mx-3"><i class="fa fa-plus"></i></a>
                  </router-link>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Registration</th>
                  <th>Contact</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="lab in labs">
                  <td>{{ lab.id }}</td>
                  <td>{{ lab.name }}</td>
                  <td>{{ lab.registration }}</td>
                  <td>{{ lab.contact }}</td>
                  <td>
                    <button class="btn btn-sm btn-secondary mx-2"><i class="fa fa-pen"></i></button>
                    <button v-on:click="removeLaboratory(lab.id)" class="btn btn-sm btn-danger mx-2"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "LaboratoriesComponent",
  data() {
    return {
      labs: [],
    }
  },
  created() {
    this.getLaboratories();
  },
  mounted() {
  },
  methods: {
    getLaboratories() {
      let self = this
      axios
        .get('/api/v1/admin/lab')
        .then(function (response) {
          if (response.data.type === 'success') {
            self.labs = response.data.data
          }
        })
    },
    removeLaboratory(id) {
      let self = this
      axios
        .get('/api/v1/admin/lab/remove/'+id)
        .then(function (response) {
          if (response.data.type === 'success') {
            self.labs = response.data.data
          }
        })
    },
  }
}
</script>

<style scoped>

</style>
