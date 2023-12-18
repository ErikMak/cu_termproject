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
                label="ID Менеджера"
                class="mb-2"
                variant="solo-filled"
                flat
                clearable
            >
            </v-text-field>
            <!-- Добавить валидацию -->
            <v-text-field
                label="Адрес"
                variant="solo-filled"
                flat
                hint="Максимальная длина - 30 символов"
                clearable
            >
            </v-text-field>
            <v-text-field
                label="Телефон"
                variant="solo-filled"
                flat
                hint="Максимальная длина - 12 символов"
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
  name: 'AddCustomerDialogComponent',
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