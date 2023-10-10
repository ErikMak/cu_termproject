<template>
    <v-app-bar
        color="deep-orange-lighten-4"
        flat
    >
        <v-app-bar-nav-icon></v-app-bar-nav-icon>

        <v-spacer></v-spacer>
        <v-btn icon>
            <v-icon>mdi-account-key-outline</v-icon>
        </v-btn>
    </v-app-bar>
</template>


<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'ToolbarComponent',
});
</script>