import Vuex from 'vuex'

import {PartsState} from "@/store/modules/IParts";

import Parts from './modules/Parts'


interface State {
  parts: PartsState
}

export default new Vuex.Store<State>({
  modules: {
    parts: Parts
  }
})
