<template>
    <v-list-item
        lines="two"
        prepend-avatar="./img/img_avatar.jpg"
        :title=username
        subtitle="Пользователь"
    ></v-list-item>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'SidebarProfileComponent',
    props: {
      username: {
        required: true
      },
    }
});
</script>