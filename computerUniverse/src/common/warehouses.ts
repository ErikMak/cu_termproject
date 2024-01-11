import Ajax from "@/common/ajax";
import {ApiWarehouses} from "@/const";

export default {
    getAllWarehouses(success: any) {
        Ajax.get(ApiWarehouses, {}, success, () => false)
    }
}