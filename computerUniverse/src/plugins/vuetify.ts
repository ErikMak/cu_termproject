// STYLES
// FontAwesome
import '@fortawesome/fontawesome-free/css/all.css'

import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'
import {
  VDataTable,
  VDataTableServer,
  VDataTableVirtual,
} from "vuetify/labs/VDataTable";

// VUETIFY
import { createVuetify } from 'vuetify'

export default createVuetify({
  components: {
    VDataTable,
    VDataTableServer,
    VDataTableVirtual,
  },
})
