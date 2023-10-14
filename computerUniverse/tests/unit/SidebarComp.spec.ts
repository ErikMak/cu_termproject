import { expect } from 'chai'
import { mount } from '@vue/test-utils';
import SidebarComponent from '@/components/Sidebar/SidebarComp.vue';

describe('Компонент Sidebar', () => {
  const wrapper = mount(SidebarComponent)

  wrapper.setData({ 
    // Заголовки 
    items: [
      { text: 'Заголовок1', icon: 'mdi-storefront' },
      { text: 'Заголовок2', icon: 'mdi-memory' },
      { text: 'Заголовок3', icon: 'mdi-warehouse' },
    ] 
  });

  it('Отрисовывает меню', () => {
    const items = wrapper.findAll('v-list-item[id="menu-item"]')
    expect(items.length).to.equal(3)
  });

  it('Отрисовывает переданные заголовки', () => {
    const item_1 = wrapper.findAll('v-list-item[id="menu-item"]')[0].attributes()
    expect(item_1.value).to.equal('Заголовок1')

    const item_2 = wrapper.findAll('v-list-item[id="menu-item"]')[1].attributes()
    expect(item_2.value).to.equal('Заголовок2') 

    const item_3 = wrapper.findAll('v-list-item[id="menu-item"]')[2].attributes()
    expect(item_3.value).to.equal('Заголовок3')
  });


  it('Отрисовывает переданные иконки', () => {
    const item_1 = wrapper.findAll('v-list-item[id="menu-item"]')[0].attributes()
    expect(item_1['prepend-icon']).to.equal('mdi-storefront') 

    const item_2 = wrapper.findAll('v-list-item[id="menu-item"]')[1].attributes()
    expect(item_2['prepend-icon']).to.equal('mdi-memory') 

    const item_3 = wrapper.findAll('v-list-item[id="menu-item"]')[2].attributes()
    expect(item_3['prepend-icon']).to.equal('mdi-warehouse') 
  });
});
