import Vuex from 'vuex'

import {PartsState} from "@/store/interfaces/IParts";
import {CustomersState} from "@/store/interfaces/ICustomers";
import {WarehousesState} from "@/store/interfaces/IWarehouses";
import {OrdersState} from "@/store/interfaces/IOrders";
import {NomenclatureState} from "@/store/interfaces/INomenclature";

import Parts from '@/store/modules/Parts'
import Customers from "@/store/modules/Customers";
import Warehouses from "@/store/modules/Warehouses";
import Orders from "@/store/modules/Orders";
import Nomenclature from "@/store/modules/Nomenclature";

interface State {
  parts: PartsState,
  customers: CustomersState,
  warehouses: WarehousesState
  orders: OrdersState,
  nomenclature: NomenclatureState
}

export default new Vuex.Store<State>({
  modules: {
    parts: Parts,
    customers: Customers,
    warehouses: Warehouses,
    orders: Orders,
    nomenclature: Nomenclature
  }
})
