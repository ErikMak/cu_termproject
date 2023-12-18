<template>
        <div class="d-flex flex-row align-center">
            <v-sheet class="text-h5 my-3 font-weight-bold" v-if="title">
                {{ title }}
            </v-sheet>
            <v-sheet class="text-h5 my-3 font-weight-bold" v-else>
              Главная
            </v-sheet>
        </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'HeaderComponent',
    props: {
      title: {
        type: String,
        required: false
      }
    },
});
</script>