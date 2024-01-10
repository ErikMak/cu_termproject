<template>
  <v-container fluid>
    <div class="d-flex flex-row justify-space-between align-center px-4">
      <HeaderComponent title="Номенклатура"/>
    </div>

  </v-container>

  <div class="px-4">
    <v-data-table
        :headers="headers"
        :items="getNomenclature"
        class="elevation-1"
        :data-headers="headers.length"
        :data-items="getNomenclature.length"
        density="compact"
        items-per-page="-1"
    >
    </v-data-table>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import HeaderComponent from "@/components/Header/HeaderComp.vue";
import {mapActions, mapGetters} from "vuex";

interface State {
  headers: any,
  items: any
}
export default defineComponent({
  name: 'NomenclatureView',
  components: {
    HeaderComponent,
  },
  data: (): State => ({
    headers: [
      { title: 'Название', key: 'name',
        value: (item : any) => {
          return item.part[0].name;
        },
      },
      { title: 'Производитель', key: 'manufacturer',
        value: (item : any) => {
          return item.part[0].manufacturer;
        },
      },
      { title: 'Цена', key: 'price',
        value: (item : any) => {
          return item.part[0].price;
        },
      },
      {
        title: 'Наличие',
        key: 'is_exist',
        value: (item : any) => {
          return item.is_exist ? `В наличии` : `Отсутствует`;
        },
      },
      { title: 'Склад', key: 'warehouse',
        value: (item : any) => {
          return item.warehouse[0].address;
        },
      },
    ],
    items: []
  }),
  methods: {
    ...mapActions(["uploadNomenclature"])
  },
  computed: {
    ...mapGetters(["getNomenclature"])
  },
  created() {
    this.uploadNomenclature()
  }

});
</script>