<template>
    <div class="px-4 pt-3 pb-5">
    <v-text-field
        v-model="value"
        @keyup="emitToParent"
        density="compact"
        variant="solo"
        :label="label"
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
    props: {
      label: {
        type: String,
        required: true
      },
    },
    data: () => ({
      value: ''
    }),
    emits: ['part_name'],
    methods: {
        emitToParent() : any {
          this.$emit('part_name', this.value)
        },
    }
});
</script>