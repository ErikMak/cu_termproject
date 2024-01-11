<template>
  <v-container fluid>
    <div class="d-flex flex-row justify-space-between align-center px-4">
      <HeaderComponent title="Комплектующие"/>

      <!-- Диалог контейнер -->
      <v-dialog
          v-model="showDialog"
          fullscreen
          scrim="false"
          transition="dialog-bottom-transition"
      >
        <!-- Диалог кнопка -->
        <template v-slot:activator="{ props }">
          <v-btn
              variant="tonal"
              color="deep-orange-darken-3"
              v-bind="props"
              v-show="getLoggedStatus"
          >
            Добавить
          </v-btn>
        </template>
        <!-- Диалог окно -->
        <AddPartDialogComp v-on:showDialog="getShowDialogFromChild"/>
      </v-dialog>
    </div>
    <!-- Поисковая строка -->
    <SearchComponent label="Поиск по названию" v-on:part_name="getValueFromChild"/>

    <!-- Таблица -->
    <DataTableComponent :headers=headers :items=getParts />
  </v-container>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import SearchComponent from "@/components/Search/SearchComp.vue";
import HeaderComponent from "@/components/Header/HeaderComp.vue";
import AddPartDialogComp from "@/components/Dialog/AddPartDialogComp.vue";
import DataTableComponent from "@/components/DataTable/DataTableComp.vue";
import {mapActions, mapGetters} from "vuex";


interface State {
  headers: any,
  showDialog: boolean,
  part_name: string,
}
export default defineComponent({
  name: 'CustomersView',
  components: {
    HeaderComponent,
    DataTableComponent,
    SearchComponent,
    AddPartDialogComp
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
      { title: 'Действия', key: 'actions', sortable: false },
    ],
    showDialog: false,
    part_name: ''
  }),
  methods: {
    ...mapActions(["uploadAllParts", "uploadPartByName", "checkLoggedStatus"]),
    getShowDialogFromChild(val: boolean) : void {
      this.showDialog = val
    },
    getValueFromChild(val: string) : void {
      this.part_name = val
    }
  },
  computed: {
    ...mapGetters(["getParts", "getLoggedStatus"])
  },
  created() {
    this.uploadAllParts()
    this.checkLoggedStatus()
  },
  watch: {
    part_name() {
      const part_name = this.part_name
      this.uploadPartByName({name: part_name})
    }
  }
});
</script>

<style lang="scss" scoped>
.dialog-bottom-transition-enter-active,
.dialog-bottom-transition-leave-active {
  transition: transform 0.2s ease-in-out;
}
</style>