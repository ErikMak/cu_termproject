<template>
    <div class="px-4">
      <v-data-table
        :headers="headers"
        :items="desserts"
        class="elevation-1"
      >

        <template v-slot:item.actions="{ item }">
          <v-icon size="small" class="me-2">
            mdi-pencil
          </v-icon>
          <v-icon size="small">
            mdi-delete
          </v-icon>
        </template>
      </v-data-table>
    </div>
  </template>
  
<script lang="ts">
  export default {
    data: () => ({
      headers: [
        {
          title: 'Dessert (100g serving)',
          align: 'start',
          sortable: false,
          key: 'name',
        },
        { title: 'Calories', key: 'calories' },
        { title: 'Fat (g)', key: 'fat' },
        { title: 'Carbs (g)', key: 'carbs' },
        { title: 'Protein (g)', key: 'protein' },
        { title: 'Iron (%)', key: 'iron' },
        { title: 'Действия', key: 'actions', sortable: false },
      ],
      desserts: [
        {
          name: 'Frozen Yogurt',
          calories: 159,
          fat: 6.0,
          carbs: 24,
          protein: 4.0,
          iron: '1%',
          glutenfree: true,
        },
        {
          name: 'Ice cream sandwich',
          calories: 237,
          fat: 9.0,
          carbs: 37,
          protein: 4.3,
          iron: '1%',
          glutenfree: false,
        },
        {
          name: 'Eclair',
          calories: 262,
          fat: 16.0,
          carbs: 23,
          protein: 6.0,
          iron: '7%',
          glutenfree: false,
        },
        {
          name: 'Jelly bean',
          calories: 375,
          fat: 0.0,
          carbs: 94,
          protein: 0.0,
          iron: '0%',
          glutenfree: true,
        },
        {
          name: 'Lollipop',
          calories: 392,
          fat: 0.2,
          carbs: 98,
          protein: 0,
          iron: '2%',
          glutenfree: true,
        },
        {
          name: 'KitKat',
          calories: 518,
          fat: 26.0,
          carbs: 65,
          protein: 7,
          iron: '6%',
          glutenfree: false,
        },
      ],
    }),
  }
</script>