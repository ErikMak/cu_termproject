import Api from '@/common/customers'
import {CustomersState} from "@/store/interfaces/ICustomers";
import Customers from '@/types/ICustomersData'
import Response from '@/types/IResponse'

export default {
    state: (): CustomersState => ({
        customers: []
    }),
    mutations: {
        updateCustomers(state: CustomersState, customers: Customers[]) : void {
            state.customers = customers
        }
    },
    actions: {
        uploadAllCustomers(ctx: any) : void {
            Api.getAllCustomers((res: Response) : void => {
                ctx.commit('updateCustomers', res["data"])
            })
        }
    },
    getters: {
        getCustomers(state: CustomersState) : Customers[] {
            return state.customers
        }
    }
}