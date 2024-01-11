<template>
      <v-navigation-drawer
        permanent
        color="grey-lighten-4"
        theme="light"
        border="0"
      >
        <!-- Sidebar Profile -->
        <SidebarProfileComponent v-if="getLoggedStatus" :username="getUserLogin"/>

        <v-divider></v-divider>

        <!-- Sidebar Navigation -->
        <v-list nav>
          <v-list-item 
            v-for="(item, i) in items"
            :key="i"
            :value="item.text"
            :prepend-icon="item.icon"
            color="deep-orange-darken-3"
            density="compact"
            class="px-4"
            id="menu-item"
            :to="item.link"
            v-show="showLink(item.protected)"
          >
              <v-list-item-title
                  v-text="item.text"
              >
              </v-list-item-title>
          </v-list-item>
        </v-list>

        <template v-slot:append>
          <div class="pa-4" v-if="getLoggedStatus">
            <v-btn id="quit-btn" variant="tonal" block @click="quit">
              Выйти
            </v-btn>
          </div>
        </template>
      </v-navigation-drawer>
</template>


<script lang="ts">
import { defineComponent } from 'vue';
import SidebarProfileComponent from './SidebarProfileComp.vue'
import UserService from "@/services/UserService";
import {mapActions, mapGetters} from "vuex";

export default defineComponent({
  name: 'SidebarComponent',
  components: {
    SidebarProfileComponent,
  },
  data: () => ({
    items: [
        {
          text: 'Заказчики',
          icon: 'mdi-storefront',
          link: 'customers',
          protected: true
        },
        {
          text: 'Комплектующие',
          icon: 'mdi-memory',
          link: 'parts',
          protected: false
        },
        {
          text: 'Cклады',
          icon: 'mdi-warehouse',
          link: 'warehouses',
          protected: false
        },
        {
          text: 'Заказы',
          icon: 'mdi-package-variant-closed',
          link: 'orders',
          protected: true
        },
        {
          text: 'Номенклатура',
          icon: 'mdi-format-list-checkbox',
          link: 'nomenclature',
          protected: true
        },
      ],
  }),
  methods: {
    ...mapActions(["checkLoggedStatus"]),
    quit() {
      UserService.logout().then(() => {
        this.checkLoggedStatus()
        this.$router.push('/')
      })
    },
    showLink(link_status: boolean) {
      const status = this.getLoggedStatus
      if(status) {
        return true;
      }
      if(!status && !link_status) {
        return true;
      }
    }
  },
  computed: {
    ...mapGetters(["getLoggedStatus", "getUserLogin"])
  },
  created() {
    this.checkLoggedStatus()
  },
});
</script>