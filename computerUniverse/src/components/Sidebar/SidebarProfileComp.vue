<template>
    <v-list-item
        lines="two"
        prepend-avatar="./img/img_avatar.jpg"
        title="Joe Doe"
        subtitle="Администратор"
    ></v-list-item>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'SidebarProfileComponent',
});
</script>