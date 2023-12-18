import Ajax from './ajax'
import {ApiParts, ApiPartsFromWarehouse} from "@/const";

export default {
    getAllParts(data: any, success: any) {
        Ajax.get(ApiParts, data, success, () => false)
    },

    getPartsFromWarehouse(data: any, success: any) {
        Ajax.get(ApiPartsFromWarehouse, data, success, () => false)
    },

}