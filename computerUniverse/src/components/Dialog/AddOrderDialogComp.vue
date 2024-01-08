<template>
  <v-card>
    <v-toolbar dark color="grey-lighten-1">
      <v-btn icon dark @click="hideDialog" id="hide-add-dialog">
        <v-icon>mdi-close</v-icon>
      </v-btn>
      <v-toolbar-title>Добавить запись</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items>
        <v-btn
            variant="text"
            @click="saveData"
            id="save-data"
        >Сохранить</v-btn>
      </v-toolbar-items>
    </v-toolbar>
    <v-card-text>
      <v-container fluid>
        <v-row>
          <v-col>
            <!-- Добавить валидацию -->
            <v-text-field
                label="Дата заказа"
                class="mb-2"
                variant="solo-filled"
                hint="Дата в формате ГГГГ-ММ-ДД"
                flat
                clearable
            >
            </v-text-field>
            <!-- Добавить валидацию -->
            <v-text-field
                label="ID Оператора"
                class="mb-2"
                variant="solo-filled"
                flat
                clearable
            >
            </v-text-field>
            <!-- Добавить валидацию -->
            <v-text-field
                label="Статус заказа"
                class="mb-2"
                variant="solo-filled"
                hint="Оплачено, доставлено, в пути или собирается"
                flat
                clearable
            >
            </v-text-field>
            <!-- Добавить валидацию -->
            <v-text-field
                label="Срок доставки заказа"
                class="mb-2"
                variant="solo-filled"
                hint="Число в днях"
                flat
                clearable
            >
            </v-text-field>
          </v-col>
        </v-row>
      </v-container>
    </v-card-text>
  </v-card>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'AddOrderDialogComponent',
  emits: ['showDialog'],
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
    saveData() {
      console.log('Сохранение данных')
    },
  }
});
</script>