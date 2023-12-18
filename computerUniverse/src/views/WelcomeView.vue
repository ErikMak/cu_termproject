<template>
  <v-container fluid>
    <div class="d-flex flex-row justify-space-between align-center px-4">
      <HeaderComponent/>
    </div>
    <div class="px-4">
      <p>Курсовой проект - <b>ComputerUniverse</b></p><br>
      <p>CRUD SPA приложение для работы с базой данных PostgeSQL, разработанное с помощью Vue 3 и Laravel. База данных
        хранит и обрабатывает информацию для сети компьютерных магазинов.</p><br>
      <p>Автор - <a href="https://github.com/ErikMak">Страница на Github</a></p>
    </div>
  </v-container>
</template>


<script lang="ts">
import { defineComponent } from 'vue';
import HeaderComponent from "@/components/Header/HeaderComp.vue";

export default defineComponent({
  name: 'WelcomeView',
  components: {
    HeaderComponent,
  }
});
</script>
