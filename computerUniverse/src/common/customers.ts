import Ajax  from "@/common/ajax";
import {ApiCustomers} from '@/const'

export default {
    getAllCustomers(success: any) {
        Ajax.get(ApiCustomers, {}, success, () => false)
    },

    addCustomer(data: any, success: any, failure: any) {
        Ajax.post(ApiCustomers, data, success, failure)
    }
}