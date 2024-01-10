import Api from '@/common/warehouses'
import {WarehousesState} from "@/store/interfaces/IWarehouses";
import Warehouses from "@/types/IWarehousesData";
import Response from '@/types/IResponse'

export default {
    state: (): WarehousesState => ({
        warehouses: []
    }),
    mutations: {
        updateWarehouses(state: WarehousesState, warehouses: Warehouses[]) : void {
            state.warehouses = warehouses
        }
    },
    actions: {
        uploadAllWarehouses(ctx: any) : void {
            Api.getAllWarehouses((res: Response) : void => {
                ctx.commit('updateWarehouses', res["data"])
            })
        }

    },
    getters: {
        getWarehouses(state: WarehousesState) : Warehouses[] {
            return state.warehouses
        }
    }
}