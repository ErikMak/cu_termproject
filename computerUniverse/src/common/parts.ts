import Ajax from './ajax'
import {ApiParts, ApiPartsFind} from "@/const";

export default {
    getAllParts(success: any) {
        Ajax.get(ApiParts, {}, success, () => false)
    },

    getPartByName(data: any, success: any) {
        Ajax.get(ApiPartsFind, data, success, () => false)
    },

    addPart(data: any, success: any, failure: any) {
        Ajax.post(ApiParts, data, success, failure)
    },

    updatePart(id: number, data: any, success: any, failure: any) {
        Ajax.put(ApiParts+'/'+id.toString(), data, success, failure)
    },

    deletePart(id: number, success: any, failure: any) {
        Ajax.delete(ApiParts+'/'+id.toString(), success, failure)
    }

}