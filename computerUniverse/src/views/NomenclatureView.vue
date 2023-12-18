<template>
  <v-container fluid>
    <div class="d-flex flex-row justify-space-between align-center px-4">
      <HeaderComponent title="Номенклатура"/>
    </div>

  </v-container>

  <div class="px-4">
  <v-table density="compact">
    <thead>
    <tr>
      <th class="text-left">
        Name
      </th>
      <th class="text-left">
        Calories
      </th>
    </tr>
    </thead>
    <tbody>
    <tr
        v-for="item in desserts"
        :key="item.name"
    >
      <td>{{ item.name }}</td>
      <td>{{ item.calories }}</td>
    </tr>
    </tbody>
  </v-table>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import HeaderComponent from "@/components/Header/HeaderComp.vue";

export default defineComponent({
  name: 'NomenclatureView',
  components: {
    HeaderComponent,
  }
});
</script>