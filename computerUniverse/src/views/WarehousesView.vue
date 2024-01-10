<template>
  <v-container fluid>
    <div class="d-flex flex-row justify-space-between align-center px-4">
      <HeaderComponent title="Склады"/>
    </div>

    <DataTableComponent :headers=headers :items=getWarehouses />
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
        title: 'ID',
        align: 'start',
        sortable: false,
        key: 'id',
      },
      { title: 'Адрес', key: 'address' },
      { title: 'ФИ Директора', key: 'fullname',
        value: (item : any) => {
          return item.director[0]['fullname'];
        },},
    ],
  }),
  methods: {
    ...mapActions(["uploadAllWarehouses"])
  },
  computed: {
    ...mapGetters(["getWarehouses"])
  },
  created() {
    this.uploadAllWarehouses()
  }
});
</script>