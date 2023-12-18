<template>
  <ToolbarComponent v-on:drawer="getDrawerFromChild"/>

  <SidebarComponent v-model="drawer"/>

  <v-main>
      <router-view />
  </v-main>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import ToolbarComponent from '../components/Toolbar/ToolbarComp.vue'
import SidebarComponent from '../components/Sidebar/SidebarComp.vue'

interface State {
  drawer: boolean,
}

export default defineComponent({
  name: 'HomeView',
  components: {
    ToolbarComponent,
    SidebarComponent,
  },
  data: (): State => ({
    drawer: true,
  }),
  methods: {
    getDrawerFromChild(val: boolean) : void {
        this.drawer = val
    }
  }
});
</script>
