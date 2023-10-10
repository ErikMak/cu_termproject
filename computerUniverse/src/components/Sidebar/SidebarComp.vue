<template>
      <v-navigation-drawer
        permanent
        color="grey-lighten-4"
        theme="light"
        border="0"
      >
        <!-- Sidebar Profile -->
        <SidebarProfileComponent />

        <v-divider></v-divider>

        <!-- Sidebar Navigation -->
        <v-list nav>
          <v-list-item 
            v-for="(item, i) in items"
            :key="i"
            :value="item"
            :prepend-icon="item.icon"
            color="deep-orange-darken-3"
            density="compact"
            class="px-4"
          >
          <v-list-item-title v-text="item.text"></v-list-item-title>
          </v-list-item>
        </v-list>

        <template v-slot:append>
          <div class="pa-4">
            <v-btn variant="tonal" block>
              Выйти
            </v-btn>
          </div>
        </template>
      </v-navigation-drawer>
</template>


<script lang="ts">
import { defineComponent } from 'vue';
import SidebarProfileComponent from './SidebarProfileComp.vue'

export default defineComponent({
  name: 'SidebarComponent',
  components: {
    SidebarProfileComponent,
  },
  data: () => ({
    items: [
        { text: 'Магазины', icon: 'mdi-storefront' },
        { text: 'Комплектующие', icon: 'mdi-memory' },
        { text: 'Товары на складе', icon: 'mdi-warehouse' },
        { text: 'Прогр. обеспечение', icon: 'mdi-download' },
        { text: 'Заказы', icon: 'mdi-package-variant-closed' },
      ],
  })
});
</script>

<style lang="scss" scoped>
</style>