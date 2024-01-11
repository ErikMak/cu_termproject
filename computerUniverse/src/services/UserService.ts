import axios from '@/plugins/axios'
import authHeader from "@/services/authHeader";
import {ApiUser, ApiLogout} from "@/const";
import AuthService from "@/services/AuthService";
import {AxiosResponse} from "axios";

/*
    NOTE!!

    Маршруты API, защищенные на бэке middleware писать сюда
    Здесь добавляется authorization header для прохождения
    проверки токена JWT
 */
class UserService {
    loginStatus() : Promise<AxiosResponse<any, any>> {
        return axios.get(ApiUser, { headers: authHeader() })
    }

    logout() : Promise<void> {
        return axios.get(ApiLogout, { headers: authHeader() }).then(
            AuthService.logout
        )
    }
}

export default new UserService();
