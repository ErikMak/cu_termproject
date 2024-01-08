<template>
  <v-card title="Удалить запись">
    <v-card-text>
      Действительно хотите безвозвратно удалить запись?
    </v-card-text>

    <v-card-actions>
      <v-spacer></v-spacer>
      <v-btn
          text="Удалить"
          id="delete-btn-dialog"
          @click="deleteData"
      ></v-btn>
      <v-btn
          text="Закрыть"
          id="hide-delete-dialog"
          @click="hideDialog"
      ></v-btn>
    </v-card-actions>
  </v-card>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import Api from '@/common/parts'

export default defineComponent({
  name: 'DeletePartDialogComponent',
  emits: ['showDialog'],
  props: {
    item: {
      required: true,
      type: Object
    }
  },
  data: () => ({
    showDialogVal: true
  }),
  methods: {
    emitToParent() : any {
      this.$emit('showDialog', this.showDialogVal)
    },

    hideDialog() : void {
      this.showDialogVal = !this.showDialogVal
      this.emitToParent()
    },
    deleteData() {
      let obj : any = this.item

      Api.deletePart(obj.model_number, (res: Response) => {

        //           ТУТ ОСТАНОВИЛСЯ

        console.log(res)
      }, (err: any) => {
        alert(err)
      })
    },
  }
});
</script>