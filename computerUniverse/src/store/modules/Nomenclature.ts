import Api from '@/common/nomenclature'
import {NomenclatureState} from "@/store/interfaces/INomenclature";
import Nomenclature from "@/types/INomenclatureData";
import Response from '@/types/IResponse'

export default {
    state: (): NomenclatureState => ({
        nomenclature: []
    }),
    mutations: {
        updateNomenclature(state: NomenclatureState, nomenclature: Nomenclature[]) : void {
            state.nomenclature = nomenclature
        }
    },
    actions: {
        uploadNomenclature(ctx: any) : void {
            Api.getNomenclature((res: Response) : void => {
                ctx.commit('updateNomenclature', res["data"])
            })
        }
    },
    getters: {
        getNomenclature(state: NomenclatureState) : Nomenclature[] {
            return state.nomenclature
        }
    }
}