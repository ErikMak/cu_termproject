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

    <DataTableComponent :headers=headers :items=getOrders />
  </v-container>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import SearchComponent from "@/components/Search/SearchComp.vue";
import HeaderComponent from "@/components/Header/HeaderComp.vue";
import DataTableComponent from "@/components/DataTable/DataTableComp.vue";
import AddOrderDialogComp from "@/components/Dialog/AddOrderDialogComp.vue";
import {mapActions, mapGetters} from "vuex";

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
        title: 'ID',
        align: 'start',
        sortable: false,
        key: 'order_id',
      },
      { title: 'Дата создания', key: 'order_date' },
      { title: 'Статус', key: 'status' },
      { title: 'Срок доставки', key: 'delivery_time' },
      { title: 'ID Заказчика', key: 'customers.customer_id'},
      { title: 'Адрес', key: 'customers.address'},
      { title: 'Действия', key: 'actions', sortable: false },
    ],
    showDialog: false
  }),
  methods: {
    ...mapActions(["uploadAllOrders"]),
    getShowDialogFromChild(val: boolean) : void {
      this.showDialog = val
    }
  },
  computed: {
    ...mapGetters(["getOrders"])
  },
  created() {
    const warehouse : number = 1

    this.uploadAllOrders({warehouse: warehouse})
  }
});
</script>

<style lang="scss" scoped>
.dialog-bottom-transition-enter-active,
.dialog-bottom-transition-leave-active {
  transition: transform 0.2s ease-in-out;
}
</style>