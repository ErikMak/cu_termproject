import Api from '@/common/orders'
import {OrdersState} from "@/store/interfaces/IOrders";
import Orders from "@/types/IOrdersData";
import Response from '@/types/IResponse'

export default {
    state: (): OrdersState => ({
        orders: []
    }),
    mutations: {
        updateOrders(state: OrdersState, orders: Orders[]) : void {
            state.orders = orders
        }
    },
    actions: {
        uploadAllOrders(ctx: any) : void {
            Api.getAllOrders((res: Response) : void => {
                ctx.commit('updateOrders', res["data"])
            })
        }
    },
    getters: {
        getOrders(state: OrdersState) : Orders[] {
            return state.orders
        }
    }
}