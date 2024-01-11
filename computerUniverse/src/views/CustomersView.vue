<template>
  <v-container fluid>


    <div class="d-flex flex-row justify-space-between align-center px-4">
      <HeaderComponent title="Заказчики"/>

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
        <AddCustomerDialogComp v-on:showDialog="getShowDialogFromChild"/>
      </v-dialog>
    </div>

    <DataTableComponent :headers=headers :items=getCustomers />
  </v-container>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import SearchComponent from "@/components/Search/SearchComp.vue";
import HeaderComponent from "@/components/Header/HeaderComp.vue";
import DataTableComponent from "@/components/DataTable/DataTableComp.vue";
import AddCustomerDialogComp from "@/components/Dialog/AddCustomerDialogComp.vue";
import {mapActions, mapGetters} from "vuex";

interface State {
  headers: any,
  showDialog: boolean
}
export default defineComponent({
  name: 'CustomersView',
  components: {
    HeaderComponent,
    DataTableComponent,
    SearchComponent,
    AddCustomerDialogComp,
  },
  data: (): State => ({
    headers: [
      {
        title: 'ID',
        align: 'start',
        sortable: false,
        key: 'customer_id',
      },
      { title: 'Адрес', key: 'address' },
      { title: 'Имя заказчика', key: 'managers.lastname' },
      { title: 'Телефон', key: 'managers.phone' },
      {
        title: 'Количество заказов',
        key: 'orders',
        value: (item : any) => {
          return item.orders.length;
        },
      },
    ],
    showDialog: false
  }),
  methods: {
    ...mapActions(["uploadAllCustomers"]),
    getShowDialogFromChild(val: boolean) : void {
      this.showDialog = val
    }
  },
  computed: {
    ...mapGetters(["getCustomers"])
  },
  created() {
    this.uploadAllCustomers()
  }
});
</script>

<style lang="scss" scoped>
.dialog-bottom-transition-enter-active,
.dialog-bottom-transition-leave-active {
  transition: transform 0.2s ease-in-out;
}
</style>