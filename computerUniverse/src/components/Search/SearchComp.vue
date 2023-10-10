<template>
    <div class="px-4 pt-3 pb-5">
    <v-text-field
        density="compact"
        variant="solo"
        label="Поиск товара по ID"
        append-inner-icon="mdi-magnify"
        single-line
        hide-details
        flat
        bg-color="grey-lighten-4"
    ></v-text-field>
    </div>
  </template>
  
<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'SearchComponent',
});
</script>