<template>
  <v-card>
    <v-toolbar dark color="grey-lighten-1">
      <v-btn icon dark @click="hideDialog" id="hide-edit-dialog">
        <v-icon>mdi-close</v-icon>
      </v-btn>
      <v-toolbar-title>Изменить запись</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items>
        <v-btn
            variant="text"
            @click="saveData"
            id="save-data"
        >Сохранить</v-btn>
      </v-toolbar-items>
    </v-toolbar>
    <v-card-text>
      <v-container fluid>
        <v-row>
          <v-col>
            <v-text-field
                label="Название"
                class="mb-2"
                variant="solo-filled"
                hint="Максимальная длина - 30 символов"
                flat
                clearable
                v-model="name"
                :error-messages="msg.name"
            >
            </v-text-field>

            <v-text-field
                label="Производитель"
                class="mb-2"
                variant="solo-filled"
                hint="Максимальная длина - 20 символов"
                flat
                clearable
                v-model="manufacturer"
                :error-messages="msg.manufacturer"
            >
            </v-text-field>
            <v-text-field
                label="Цена"
                variant="solo-filled"
                flat
                clearable
                v-model="price"
                :error-messages="msg.price"
            >
            </v-text-field>
            <v-text-field
                label="Гарантия"
                variant="solo-filled"
                hint="Максимальная длина - 18 символов"
                flat
                clearable
                v-model="warranty"
                :error-messages="msg.warranty"
            >
            </v-text-field>
            <v-text-field
                label="Device ID"
                variant="solo-filled"
                flat
                clearable
                v-model="device_id"
                :error-messages="msg.device_id"
            >
            </v-text-field>
            <v-text-field
                label="Категория"
                variant="solo-filled"
                flat
                hint="Максимальная длина - 20 символов"
                clearable
                v-model="category"
                :error-messages="msg.category"
            >
            </v-text-field>
          </v-col>
        </v-row>
      </v-container>
    </v-card-text>
  </v-card>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import Api from '@/common/parts'

interface State {
  showDialogVal: boolean,
  name: string,
  manufacturer: string,
  price: string,
  warranty: string,
  device_id: string,
  category: string,
  msg: any
}

export default defineComponent({
  name: 'EditPartDialogComponent',
  emits: ['showDialog'],
  props: {
    item: {
      required: true,
      type: Object
    }
  },
  data: (): State => ({
    showDialogVal: true,
    name: '',
    manufacturer: '',
    price: '',
    warranty: '',
    device_id: '',
    category: '',
    msg: {
      name: '',
      manufacturer: '',
      price: '',
      warranty: '',
      device_id: '',
      category: '',
    }
  }),
  methods: {
    emitToParent() : any {
      this.$emit('showDialog', this.showDialogVal)
    },

    hideDialog() : void {
      this.showDialogVal = !this.showDialogVal
      this.emitToParent()
    },

    checkName() : boolean {
      let valid = false

      if(this.name != "" && this.name.length < 30) {
        valid = true
        this.msg["name"] = ''
      } else {
        this.msg["name"] = 'Некорректное название!'
      }

      return valid
    },

    checkManufacturer() : boolean {
      let valid = false

      if(this.manufacturer != "" && this.manufacturer.length < 20) {
        valid = true
        this.msg["manufacturer"] = ''
      } else {
        this.msg["manufacturer"] = 'Некорректный производитель!'
      }

      return valid
    },

    checkPrice() : boolean {
      let valid = false

      if(this.price != "" && /^[0-9]+$/.test(this.price)) {
        valid = true
        this.msg["price"] = ''
      } else {
        this.msg["price"] = 'Некорректная цена!'
      }

      return valid
    },

    checkWarranty() : boolean {
      let valid = false

      if(this.warranty != "" && this.warranty.length < 18) {
        valid = true
        this.msg["warranty"] = ''
      } else {
        this.msg["warranty"] = 'Некорректное значение гарантии!'
      }

      return valid
    },

    checkDeviceID() : boolean {
      let valid = false

      if(this.device_id != "" && /^[0-9]+$/.test(this.device_id)) {
        valid = true
        this.msg["device_id"] = ''
      } else {
        this.msg["device_id"] = 'Некорректный Device ID!'
      }

      return valid
    },

    checkCategory() : boolean {
      let valid = false

      if(this.category != "" && this.category.length < 20) {
        valid = true
        this.msg["category"] = ''
      } else {
        this.msg["category"] = 'Некорректная категория!'
      }

      return valid
    },


    saveData() {
      let isNameValid = this.checkName(),
          isManufacturerValid = this.checkManufacturer(),
          isPriceValid = this.checkPrice(),
          isWarrantyValid = this.checkWarranty(),
          isDeviceIDValid = this.checkDeviceID(),
          isCategoryValid = this.checkCategory()

      let isFormValid = isNameValid &&
          isManufacturerValid &&
          isPriceValid &&
          isWarrantyValid &&
          isDeviceIDValid &&
          isCategoryValid

      if(isFormValid) {
        let obj : any = this.item


        Api.updatePart(obj.model_number, {
          name: this.name,
          manufacturer: this.manufacturer,
          price: this.price,
          warranty: this.warranty,
          device_id: this.device_id,
          category: this.category
        }, (res: Response) => {
          // TODO
          console.log(res)
        }, (err: any) => {
          alert(err)
        })
      }
    },
  }
});
</script>