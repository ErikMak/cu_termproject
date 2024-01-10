import Api from '@/common/parts'
import {PartsState} from "@/store/interfaces/IParts";
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
        uploadPartByName(ctx: any, sample: Object) : void {
            Api.getPartByName(sample, (res: Response) : void => {
                ctx.commit('updateParts', res["data"])
            })
        },
        uploadAllParts(ctx: any) : void {
            Api.getAllParts((res: Response) : void => {
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