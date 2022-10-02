<template>
  <HeaderComponent></HeaderComponent>
  <SideBarComponent></SideBarComponent>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <router-view></router-view>
  </div>
    <FooterComponent></FooterComponent>
</template>

<script>
import HeaderComponent from "./includes/HeaderComponent.vue";
import FooterComponent from "./includes/FooterComponent.vue";
import SideBarComponent from "@/components/admin/includes/SideBarComponent.vue";
export default {
  name: "App",
  components: {HeaderComponent, FooterComponent, SideBarComponent},
  data() {
    return {

    }
  },
  created() {
    console.log('component rendered')
  },
  mounted() {
  },
  methods: {
  }
}
</script>

<style scoped>

</style>
