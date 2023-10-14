<template>
    <v-app-bar
        color="deep-orange-lighten-4"
        flat
    >
        <v-app-bar-nav-icon id="menu-btn" @click='menuButton()'></v-app-bar-nav-icon>

        <v-spacer></v-spacer>
        <v-dialog
            v-model="showDialog"
            persistent
            width="400"
        >
            <!-- Dialog button -->
            <template v-slot:activator="{ props }">
                <v-btn 
                    icon
                    v-bind="props"
                >
                    <v-icon>mdi-account-key-outline</v-icon>
                </v-btn>
            </template>
            <!-- Dialog window -->
            <AuthDialogComponent v-on:showDialog="getShowDialogFromChild"/>
        </v-dialog>
    </v-app-bar>
</template>


<script lang="ts">
import { defineComponent } from 'vue';
import AuthDialogComponent from '../Dialog/AuthDialogComp.vue'

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