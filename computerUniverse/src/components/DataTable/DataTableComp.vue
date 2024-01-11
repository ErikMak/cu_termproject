<template>
    <div class="px-4">
      <v-data-table
        :headers="headers"
        :items="items"
        class="elevation-1"
        :data-headers="headers.length"
        :data-items="items.length"
        density="compact"
      >
        <template v-slot:top>
          <!-- Диалог контейнер 1 -->
          <v-dialog
              v-model="showEditDialog"
              fullscreen
              transition="dialog-bottom-transition"
          >
            <!-- Диалог окно -->
            <EditPartDialogComponent v-on:showDialog="getShowEditDialogFromChild" :item=item_val />

          </v-dialog>
          <!-- Диалог контейнер 2 -->
          <v-dialog width="400"
                    v-model="showDeleteDialog"
          >
            <!-- Диалог окно -->
            <DeletePartDialogComponent v-on:showDialog="getShowDeleteDialogFromChild" :item=item_val />
          </v-dialog>
        </template>
        <template v-slot:item.actions="{ item }">
          <!-- Диалог кнопка 1 -->
          <v-btn
              icon="mdi-pencil"
              class="me-2"
              size="x-small"
              variant="plain"
              @click="editItem(item)"
          ></v-btn>
          <!-- Диалог кнопка 2 -->
          <v-btn
              icon="mdi-delete"
              size="x-small"
              variant="plain"
              @click="deleteItem(item)"
          ></v-btn>
        </template>
      </v-data-table>
    </div>
</template>
  
<script lang="ts">
import { defineComponent } from 'vue';
import EditPartDialogComponent from "@/components/Dialog/EditPartDialogComp.vue";
import DeletePartDialogComponent from "@/components/Dialog/DeletePartDialogComp.vue";
import {mapGetters} from "vuex";
interface State {
  showEditDialog: boolean,
  showDeleteDialog: boolean
  item_val: []
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
    showDeleteDialog: false,
    item_val: []
  }),
  computed: {
      ...mapGetters(["getLoggedStatus"])
  },
  methods: {
    getShowEditDialogFromChild(val: boolean) : void {
      this.showEditDialog = val
    },
    getShowDeleteDialogFromChild(val: boolean) : void {
      this.showDeleteDialog = val
    },
    deleteItem(item: []) {
      if(!this.getLoggedStatus) {
        alert('Нету доступа!')
        return;
      }

      this.item_val = item
      this.showDeleteDialog = true
    },
    editItem(item: []) {
      if(!this.getLoggedStatus) {
        alert('Нету доступа!')
        return;
      }

      this.item_val = item
      this.showEditDialog = true
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