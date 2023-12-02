<template>
  <ToolbarComponent v-on:drawer="getDrawerFromChild"/>

  <SidebarComponent v-model="drawer"/>

  <v-main>
    <v-container fluid>
      <HeaderComponent />

      <!-- Search field for table -->
      <SearchComponent />
      
      <DataTableComponent :headers=headers :items=getParts />
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
import {mapActions, mapGetters} from "vuex";

import Parts from '@/types/IPartsData'

interface State {
  drawer: boolean,
  headers: any,
}

export default defineComponent({
  name: 'HomeView',
  components: {
    ToolbarComponent,
    SidebarComponent,
    HeaderComponent,
    DataTableComponent,
    SearchComponent
  },
  data: (): State => ({
    drawer: true,
    headers: [
      {
        title: 'Артикул',
        align: 'start',
        sortable: false,
        key: 'model_number',
      },
      { title: 'Производитель', key: 'manufacturer' },
      { title: 'Название', key: 'name' },
      { title: 'Цена', key: 'price' },
      {
        title: 'Наличие',
        key: 'is_exist',
        value: (item : any) => {
          return item.is_exist ? `В наличии` : `Отсутствует`;
        },
      },
      { title: 'Категория', key: 'category'},
    ],
  }),
  methods: {
    ...mapActions(["uploadPartsFromWarehouse"]),
    getDrawerFromChild(val: boolean) : void {
        this.drawer = val
    }
  },
  computed: {
    ...mapGetters(["getParts"])
  },
  created() {
    const warehouse : number = 1

    this.uploadPartsFromWarehouse({warehouse: warehouse})
  }
});
</script>
