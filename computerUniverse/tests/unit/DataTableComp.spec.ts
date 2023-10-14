import { expect } from 'chai'
import { mount } from '@vue/test-utils';
import DataTableComponent from '@/components/DataTable/DataTableComp.vue';

describe('Компонент DataTable', () => {
    const wrapper = mount(DataTableComponent)

    // Заполнение таблицы
    wrapper.setData({
        // Заголовки таблицы
        headers: [
            {
                title: 'Заголовок1',
                align: 'start',
                sortable: false,
                key: 'name',
            },
            { title: 'Заголовок2', key: 'calories' },
            { title: 'Заголовок3', key: 'fat' },
        ],
        // Значения таблицы
        items: [
            {
              name: 'Элемент1',
              calories: 300,
              fat: 1.0,
            },
            {
              name: 'Элемент2',
              calories: 200,
              fat: 2.0,
            },
            {
              name: 'Элемент3',
              calories: 100,
              fat: 10.0,
            },
            {
                name: 'Элемент4',
                calories: 100,
                fat: 10.0,
            },
        ]
    })


    it('Отрисовывает таблицу', () => {
        expect(wrapper.find('v-data-table').exists()).to.be.true


        const dt = wrapper.find('v-data-table').attributes()
        const headers = dt["data-headers"]
        const items = dt["data-items"]


        expect(headers).to.equal('3')
        expect(items).to.equal('4')
    });
})