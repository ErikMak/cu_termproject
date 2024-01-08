<template>
    <div class="px-4">
      <v-data-table
        :headers="headers"
        :items="items"
        class="elevation-1"
        :data-headers="headers.length"
        :data-items="items.length"
      >

        <template v-slot:item.actions="{ item }">
          <!-- Диалог контейнер 1 -->
          <v-dialog
              v-model="showEditDialog"
              fullscreen
              scrim="false"
              transition="dialog-bottom-transition"
          >
            <!-- Диалог кнопка 1 -->
            <template v-slot:activator="{ props }">
              <v-btn
                  icon="mdi-pencil"
                  class="me-2"
                  size="x-small"
                  variant="plain"
                  v-bind="props"
              ></v-btn>
            </template>

            <!-- Диалог окно -->
            <EditPartDialogComponent v-on:showDialog="getShowEditDialogFromChild" :item=item />

          </v-dialog>

          <!-- Диалог контейнер 2 -->
          <v-dialog width="400"
              v-model="showDeleteDialog"
          >
            <!-- Диалог кнопка 2 -->
            <template v-slot:activator="{ props }">
              <v-btn
                  icon="mdi-delete"
                  size="x-small"
                  variant="plain"
                  v-bind="props"
              ></v-btn>
            </template>

            <!-- Диалог окно -->
            <DeletePartDialogComponent v-on:showDialog="getShowDeleteDialogFromChild" :item=item />

          </v-dialog>
        </template>
      </v-data-table>
    </div>
  </template>
  
<script lang="ts">
import { defineComponent } from 'vue';
import EditPartDialogComponent from "@/components/Dialog/EditPartDialogComp.vue";
import DeletePartDialogComponent from "@/components/Dialog/DeletePartDialogComp.vue";
interface State {
  showEditDialog: boolean,
  showDeleteDialog: boolean
}


export default defineComponent({
  name: 'DataTableComponent',
  props: {
    headers: {
      required: true
    },
    items: {
      required: true
    }
  },
  components: {
    EditPartDialogComponent,
    DeletePartDialogComponent
  },
  data: (): State => ({
    showEditDialog: false,
    showDeleteDialog: false
  }),
  methods: {
    getShowEditDialogFromChild(val: boolean) : void {
      this.showEditDialog = val
    },
    getShowDeleteDialogFromChild(val: boolean) : void {
      this.showDeleteDialog = val
    },
    deleteLine() {
      console.log('Удаление записи')
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