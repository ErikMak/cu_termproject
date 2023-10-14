import { expect } from 'chai'
import { mount } from '@vue/test-utils';
import AddToTableDialogComponent from '@/components/Dialog/AddToTableDialogComp.vue';

describe('Компонент AddToTableDialog', () => {
    const wrapper = mount(AddToTableDialogComponent)

    it('Отрисовывает элементы диалога добавления записи', () => {
        // Кнопка закрыть
        expect(wrapper.find('v-btn[id="hide-add-dialog"]').exists()).to.be.true
        // Кнопка сохранить
        expect(wrapper.find('v-btn[id="save-data"]').exists()).to.be.true


        // Кнопка войти
        const numOfTextFields = 2;
        expect(wrapper.findAll('v-text-field').length).to.equal(numOfTextFields)
    })

    it('Вызывает событие при клике', () => {
        const btn = wrapper.find('v-btn[id="hide-add-dialog"]')

        btn.trigger('click')

        expect(wrapper.emitted().hasOwnProperty("showDialog")).to.be.true

        btn.trigger('click')

        expect(wrapper.emitted().showDialog.length).to.equal(2)
    })

    
    it('При клике меняется showDialog', () => {
        const btn = wrapper.find('v-btn[id="hide-add-dialog"]')

        expect(wrapper.vm.showDialogVal).to.equal(true)
        
        btn.trigger('click')

        expect(wrapper.vm.showDialogVal).to.equal(false)
    })
})