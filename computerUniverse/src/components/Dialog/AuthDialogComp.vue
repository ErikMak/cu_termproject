<template>
    <v-card>
        <v-card-title>
            <span class="text-h5"><p class="mt-2 font-weight-bold">Авторизация</p></span>
        </v-card-title>
        <v-card-text>
            <!-- Доделать counter -->
            <v-text-field
                class="mb-2"
                variant="outlined"
                label="Логин"
                counter="10"
                required
                id="login-input"
                v-model="login"
            >
            </v-text-field>
            <!-- Доделать counter -->
            <v-text-field
                variant="outlined"
                label="Пароль"
                counter="10"
                required
                id="pass-input"
                v-model="password"
            >
            </v-text-field>
        </v-card-text>
        <v-card-actions>
            <v-spacer>
                <v-btn
                    color="blue-darken-1"
                    variant="text"
                    @click="auth"
                    id="auth"
                >
                    Войти
                </v-btn>
                <v-btn
                    id="hide-dialog"
                    color="blue-darken-1"
                    variant="text"
                    @click="hideDialog"
                >
                    Закрыть
                </v-btn>
            </v-spacer>
        </v-card-actions>
    </v-card>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import AuthService from "@/services/AuthService";
import {mapActions} from "vuex";

interface State {
  login: string,
  password: string,
  showDialogVal: boolean
}

export default defineComponent({
    name: 'AddToTableDialogComponent',
    emits: ['showDialog'],
    data: (): State => ({
        showDialogVal: true,
        login: '',
        password: ''
    }),
    methods: {
        ...mapActions(["checkLoggedStatus"]),
        emitToParent() : any {
            this.$emit('showDialog', this.showDialogVal)
        },

        hideDialog() : void {
            this.showDialogVal = !this.showDialogVal
            this.emitToParent()
        },
        auth() {
            AuthService.login({
              login: this.login,
              password: this.password
            }).then(() => {
              this.hideDialog()
              this.checkLoggedStatus()
            })
        }
    }
});
</script>