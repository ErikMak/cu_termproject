import Ajax from "@/common/ajax";
import {ApiNomenclature} from "@/const";

export default {
    getNomenclature(success: any) {
        Ajax.get(ApiNomenclature, {}, success, () => false)
    }
}