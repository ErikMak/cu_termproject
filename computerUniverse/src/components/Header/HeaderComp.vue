<template>
    <div class="d-flex flex-row justify-space-between align-center px-4">
        <div class="d-flex flex-row align-center">
            <v-sheet class="text-h5 my-3 font-weight-bold">
                Заголовок
            </v-sheet>
        </div>


    <v-dialog 
        v-model="showDialog"
        fullscreen
        scrim="false"
        transition="dialog-bottom-transition"
    >
        <!-- Dialog button -->
        <template v-slot:activator="{ props }">
            <v-btn
                variant="tonal" 
                color="deep-orange-darken-3"
                v-bind="props"
            >
                Добавить
            </v-btn>
        </template>
        <!-- Dialog window -->
        <AddToTableDialogComponent v-on:showDialog="getShowDialogFromChild"/>
    </v-dialog>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import AddToTableDialogComponent from '../Dialog/AddToTableDialogComp.vue'

export default defineComponent({
    name: 'HeaderComponent',
    components: {
        AddToTableDialogComponent
    },
    data: () => ({
        showDialog: false
    }),
    methods: {
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