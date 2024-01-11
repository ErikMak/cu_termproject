import Ajax from './ajax'
import {ApiLogin, ApiRegister, ApiJWTRefresh, ApiUser, ApiLogout} from "@/const";

export default {
    login(data: any, success: any, failure: any) {
        Ajax.post(ApiLogin, data, success, failure)
    },

    register(data: any, success: any, failure: any) {
        Ajax.post(ApiRegister, data, success, failure)
    },

    refresh(success: any, failure: any) {
        Ajax.get(ApiJWTRefresh, {}, success, failure)
    },
}