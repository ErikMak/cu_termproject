import axios from '@/plugins/axios'
import authHeader from "@/services/authHeader";
import {ApiUser, ApiLogout} from "@/const";
import AuthService from "@/services/AuthService";

/*
    NOTE!!

    Маршруты API, защищенные на бэке middleware писать сюда
    Здесь добавляется authorization header для прохождения
    проверки токена JWT
 */
class UserService {
    loginStatus() {
        return axios.get(ApiUser, { headers: authHeader() })
    }

    logout() {
        return axios.get(ApiLogout, { headers: authHeader() }).then(
            AuthService.logout
        )
    }
}

export default new UserService();
