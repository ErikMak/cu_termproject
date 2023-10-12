<template>
    <v-card>
        <v-card-title>
            <span class="text-h5"><p class="mt-2 font-weight-bold">Авторизация</p></span>
        </v-card-title>
        <v-card-text>
            <v-container>
                Lorem ipsum dolor
            </v-container>
        </v-card-text>
        <v-card-actions>
            <v-spacer>
                <v-btn
                    color="blue-darken-1"
                    variant="text"
                    @click="hideDialog"
                >
                    Закрыть
                </v-btn>
                <v-btn
                    color="blue-darken-1"
                    variant="text"
                    @click="auth"
                >
                    Войти
                </v-btn>
            </v-spacer>
        </v-card-actions>
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
        auth() {
            console.log('Авторизация')
        }
    }
});
</script>