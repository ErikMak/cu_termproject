import Ajax from '@/common/ajax'
import {ApiOrders} from "@/const";

export default {
    getAllOrders(success: any) {
        Ajax.get(ApiOrders, {}, success, () => false)
    }
}