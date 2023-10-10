<template>
    <div class="d-flex flex-row justify-space-between align-center px-4">
        <div class="d-flex flex-row align-center">
            <v-sheet class="text-h5 my-3 font-weight-bold">
                Заголовок
            </v-sheet>
        </div>


    <v-btn 
        variant="tonal" 
        color="deep-orange-darken-3"
    >
        Добавить
    </v-btn>
    </div>
</template>
  
<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'HeaderComponent',
});
</script>