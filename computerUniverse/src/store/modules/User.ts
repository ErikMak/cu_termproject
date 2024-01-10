import {UserState} from "@/store/interfaces/IUsers";
import UserService from '@/services/UserService'

export default {
    state: (): UserState => ({
        login: '',
        loggedIn: false
    }),
    mutations: {
        updateLoggedStatus(state: UserState, loggedIn: boolean) : void {
            state.loggedIn = loggedIn
        },
        updateLogin(state: UserState, login: string) : void {
            state.login = login
        }
    },
    actions: {
        checkLoggedStatus(ctx: any) {
            UserService.loginStatus().then(
                response => {
                    if(response.data.status == true) {
                        ctx.commit('updateLoggedStatus', true)
                        ctx.commit('updateLogin', response.data.data.login)
                    } else {
                        ctx.commit('updateLoggedStatus', false)
                    }
                }
            )
        }
    },
    getters: {
        getUserLogin(state: UserState) : string {
            return state.login
        },
        getLoggedStatus(state: UserState) : boolean {
            return state.loggedIn
        }
    }
}