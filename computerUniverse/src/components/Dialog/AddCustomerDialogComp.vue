<template>
  <v-card>
    <v-form @submit.prevent="saveData">
    <v-toolbar dark color="grey-lighten-1">
      <v-btn icon dark @click="hideDialog" id="hide-add-dialog">
        <v-icon>mdi-close</v-icon>
      </v-btn>
      <v-toolbar-title>Добавить запись</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items>
        <v-btn
            type="submit"
            variant="text"
            id="save-data"
        >Сохранить</v-btn>
      </v-toolbar-items>
    </v-toolbar>
    <v-card-text>
      <v-container fluid>
        <v-row>
          <v-col>
            <v-text-field
                label="ID Менеджера"
                class="mb-2"
                variant="solo-filled"
                flat
                clearable
                v-model="manager_id"
                :error-messages="msg.manager_id"
            >
            </v-text-field>
            <v-text-field
                label="Адрес"
                variant="solo-filled"
                flat
                hint="Максимальная длина - 30 символов"
                clearable
                v-model="address"
                :error-messages="msg.address"
            >
            </v-text-field>
            <v-text-field
                label="Телефон"
                variant="solo-filled"
                flat
                hint="Максимальная длина - 20 символов"
                clearable
                v-model="phone"
                :error-messages="msg.phone"
            >
            </v-text-field>
          </v-col>
        </v-row>
      </v-container>
    </v-card-text>
    </v-form>
  </v-card>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import Api from '@/common/customers'

interface State {
  showDialogVal: boolean,
  manager_id: string,
  msg: any,
  address: string,
  phone: string,
}

export default defineComponent({
  name: 'AddCustomerDialogComponent',
  emits: ['showDialog'],
  data: (): State => ({
    showDialogVal: true,
    manager_id: '',
    msg: {
      manager_id: '',
      address: '',
      phone: ''
    },
    address: '',
    phone: '',
  }),
  methods: {
    emitToParent() : any {
      this.$emit('showDialog', this.showDialogVal)
    },
    hideDialog() : void {
      this.showDialogVal = !this.showDialogVal
      this.emitToParent()
    },
    checkManagerID() : boolean {
      let valid = false

      if(this.manager_id != "" && /^[0-9]+$/.test(this.manager_id)) {
        valid = true
        this.msg["manager_id"] = ''
      } else {
        this.msg["manager_id"] = 'Некорректный ID менеджера!'
      }

      return valid
    },
    checkAddress() : boolean {
      let valid = false

      if(this.address != "" && this.address.length < 30) {
        valid = true
        this.msg["address"] = ''
      } else {
        this.msg["address"] = 'Некорректный адрес!'
      }

      return valid
    },
    checkPhone() : boolean {
      let valid = false

      if(this.phone != "" && this.phone.length < 20) {
        valid = true
        this.msg["phone"] = ''
      } else {
        this.msg["phone"] = 'Некорректный телефон!'
      }

      return valid
    },
    saveData() {
      let isPhoneValid = this.checkPhone(),
          isManagerIDValid = this.checkManagerID(),
          isAddressValid = this.checkAddress()

      let isFormValid = isPhoneValid &&
          isManagerIDValid &&
          isAddressValid

      if(isFormValid) {
        Api.addCustomer({
          customer: this.manager_id,
          address: this.address,
          phone: this.phone
        }, (res: Response) => {
          this.hideDialog()
        }, (err: any) => {
          alert(err.error)
        })
      }
    },
  }
});
</script>