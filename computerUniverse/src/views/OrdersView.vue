<template>
  <v-container fluid>
    <div class="d-flex flex-row justify-space-between align-center px-4">

      <HeaderComponent title="Заказы"/>

      <v-dialog
          v-model="showDialog"
          fullscreen
          scrim="false"
          transition="dialog-bottom-transition"
      >
        <!-- Dialog button -->
        <template v-slot:activator="{ props }">
          <v-btn
              variant="tonal"
              color="deep-orange-darken-3"
              v-bind="props"
          >
            Добавить
          </v-btn>
        </template>
        <!-- Dialog window -->
        <AddOrderDialogComp v-on:showDialog="getShowDialogFromChild"/>
        </v-dialog>
    </div>

    <DataTableComponent :headers=headers :items=getParts />
  </v-container>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import SearchComponent from "@/components/Search/SearchComp.vue";
import HeaderComponent from "@/components/Header/HeaderComp.vue";
import DataTableComponent from "@/components/DataTable/DataTableComp.vue";
import AddOrderDialogComp from "@/components/Dialog/AddOrderDialogComp.vue";
import {mapActions, mapGetters} from "vuex";

import Parts from '@/types/IPartsData'
interface State {
  headers: any,
  showDialog: boolean
}
export default defineComponent({
  name: 'OrdersView',
  components: {
    HeaderComponent,
    DataTableComponent,
    SearchComponent,
    AddOrderDialogComp
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
    showDialog: false
  }),
  methods: {
    ...mapActions(["uploadPartsFromWarehouse"]),
    getShowDialogFromChild(val: boolean) : void {
      this.showDialog = val
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

<style lang="scss" scoped>
.dialog-bottom-transition-enter-active,
.dialog-bottom-transition-leave-active {
  transition: transform 0.2s ease-in-out;
}
</style>