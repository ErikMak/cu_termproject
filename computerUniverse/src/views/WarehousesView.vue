<template>
  <v-container fluid>
    <div class="d-flex flex-row justify-space-between align-center px-4">
      <HeaderComponent title="Склады"/>
    </div>

    <DataTableComponent :headers=headers :items=getParts />
  </v-container>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import SearchComponent from "@/components/Search/SearchComp.vue";
import HeaderComponent from "@/components/Header/HeaderComp.vue";
import DataTableComponent from "@/components/DataTable/DataTableComp.vue";
import {mapActions, mapGetters} from "vuex";

import Parts from '@/types/IPartsData'
interface State {
  headers: any
}
export default defineComponent({
  name: 'CustomersView',
  components: {
    HeaderComponent,
    DataTableComponent,
    SearchComponent
  },
  data: (): State => ({
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
    ...mapActions(["uploadPartsFromWarehouse"])
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