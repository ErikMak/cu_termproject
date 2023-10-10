<template>
  <v-app>
    <v-layout ref="app">
      <router-view/>
  </v-layout>
  </v-app>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'App',
})
</script>
