import Api from '@/common/parts'
import {PartsState} from "@/store/modules/IParts";
import Parts from '@/types/IPartsData'
import Response from '@/types/IResponse'

export default {
    state: (): PartsState => ({
        parts: []
    }),
    mutations: {
        updateParts(state: PartsState, parts: Parts[]) : void {
            state.parts = parts
        }
    },
    actions: {
        uploadPartsFromWarehouse(ctx: any, sample: Object) : void {
            Api.getPartsFromWarehouse(sample, (res: Response) : void => {
                ctx.commit('updateParts', res["data"])
            })
        }
    },
    getters: {
        getParts(state: PartsState) : Parts[] {
            return state.parts
        }
    }
}