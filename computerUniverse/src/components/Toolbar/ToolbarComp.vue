<template>
    <v-app-bar
        color="deep-orange-lighten-4"
        flat
    >
        <!-- Кнопка меню -->
        <v-app-bar-nav-icon id="menu-btn" @click='menuButton()'></v-app-bar-nav-icon>

        <v-spacer></v-spacer>
        <!-- Диалог контейнер -->
        <v-dialog
            v-model="showDialog"
            persistent
            width="400"
        >
            <!-- Диалог кнопка -->
            <template v-slot:activator="{ props }">
                <v-btn 
                    v-show="!getLoggedStatus"
                    icon
                    v-bind="props"
                >
                    <v-icon>mdi-account-key-outline</v-icon>
                </v-btn>
            </template>
            <!-- Диалог окно -->
            <AuthDialogComponent v-on:showDialog="getShowDialogFromChild"/>
        </v-dialog>
    </v-app-bar>
</template>


<script lang="ts">
import { defineComponent } from 'vue';
import AuthDialogComponent from '../Dialog/AuthDialogComp.vue'
import {mapGetters} from "vuex";

export default defineComponent({
    name: 'ToolbarComponent',
    components: {
        AuthDialogComponent
    },
    emits: ['drawer'],
    data: () => ({
        drawerVal: true,
        showDialog: false
    }),
    computed: {
      ...mapGetters(["getLoggedStatus"])
    },
    methods: {
        emitToParent() : any {
            this.$emit('drawer', this.drawerVal)
        },

        menuButton() : void {
            this.drawerVal = !this.drawerVal
            this.emitToParent()
        },
        getShowDialogFromChild(val: boolean) : void {
            this.showDialog = val
        }
    }
});
</script>

<style lang="scss" scoped>
  .dialog-bottom-transition-enter-active,
  .dialog-bottom-transition-leave-active {
    transition: transform 0.2s ease-in-out;
  }
</style>