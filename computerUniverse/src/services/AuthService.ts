import axios from '@/plugins/axios'
import {ApiLogin} from "@/const";

class AuthService {
    login(data: any) {
        return axios.post(ApiLogin, {
            login: data.login,
            password: data.password
        }).then(response => {
            if(response.data.status == false) {
                alert(response.data.error)
            }
            if(response.headers.authorization) {
                localStorage.setItem('user', JSON.stringify(response.headers.authorization));
            }
        }).catch(error => {
            throw error
        })
    }

    logout() {
        localStorage.removeItem('user');
    }
}

export default new AuthService()