<template>
  <ToolbarComponent v-on:drawer="getDrawerFromChild"/>

  <SidebarComponent v-model="drawer"/>

  <v-main>
    <v-container fluid>
      <HeaderComponent />

      <!-- Search field for table -->
      <SearchComponent />
      
      <DataTableComponent />
    </v-container>
  </v-main>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import ToolbarComponent from '../components/Toolbar/ToolbarComp.vue'
import SidebarComponent from '../components/Sidebar/SidebarComp.vue'
import HeaderComponent from '../components/Header/HeaderComp.vue'
import DataTableComponent from '../components/DataTable/DataTableComp.vue'
import SearchComponent from '../components/Search/SearchComp.vue'

export default defineComponent({
  name: 'HomeView',
  components: {
    ToolbarComponent,
    SidebarComponent,
    HeaderComponent,
    DataTableComponent,
    SearchComponent
  },
  data: () => ({
    drawer: true
  }),
  methods: {
    getDrawerFromChild(val: boolean) : void {
        this.drawer = val
    }
  }
});
</script>
