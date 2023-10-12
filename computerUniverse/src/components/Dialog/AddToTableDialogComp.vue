<template>
    <v-card>
        <v-toolbar dark color="grey-lighten-1">
            <v-btn icon dark @click="hideDialog">
                <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title>Добавить запись</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn
                    variant="text"
                    @click="saveData"
                >Сохранить</v-btn>
            </v-toolbar-items>
        </v-toolbar>
        <v-card-text>
            Lorem ipsum
        </v-card-text>
    </v-card>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'AddToTableDialogComponent',
    emits: ['showDialog'],
    data: () => ({
        showDialogVal: true
    }),
    methods: {
        emitToParent() : any {
            this.$emit('showDialog', this.showDialogVal)
        },

        hideDialog() : void {
            this.showDialogVal = !this.showDialogVal
            this.emitToParent()
        },
        saveData() {
            console.log('Сохранение данных')
        },
    }
});
</script>