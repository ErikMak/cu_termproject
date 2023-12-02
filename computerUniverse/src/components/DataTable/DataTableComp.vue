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
          <v-btn 
            icon="mdi-pencil" 
            class="me-2" 
            size="x-small" 
            variant="plain"
            @click="editLine"
          ></v-btn>
          <v-btn 
            icon="mdi-delete" 
            size="x-small" 
            variant="plain"
            @click="deleteLine"
          ></v-btn>
        </template>
      </v-data-table>
    </div>
  </template>
  
<script lang="ts">
  export default {
    name: 'DataTableComponent',
    props: {
      headers: {
        required: true
      },
      items: {
        required: true
      }
    },
    methods: {
      editLine() {
        console.log('Редактирование записи')
      },
      deleteLine() {
        console.log('Удаление записи')
      }
    }
  }
</script>