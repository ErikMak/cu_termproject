import { expect } from 'chai'
import { mount } from '@vue/test-utils';
import AuthDialogComponent from '@/components/Dialog/AuthDialogComp.vue';

describe('Компонент AuthDialog', () => {
    const wrapper = mount(AuthDialogComponent)

    it('Отрисовывает элементы окошка авторизации', () => {
        // Поле логина
        expect(wrapper.find('v-text-field[id="login-input"]').exists()).to.be.true
        // Поле пароля
        expect(wrapper.find('v-text-field[id="pass-input"]').exists()).to.be.true


        // Кнопка войти
        expect(wrapper.find('v-btn[id="auth"]').exists()).to.be.true
        // Кнопка закрыть
        expect(wrapper.find('v-btn[id="hide-dialog"]').exists()).to.be.true
    })

    it('Вызывает событие при клике', () => {
        const btn = wrapper.find('v-btn[id="hide-dialog"]')

        btn.trigger('click')

        expect(wrapper.emitted().hasOwnProperty("showDialog")).to.be.true

        btn.trigger('click')

        expect(wrapper.emitted().showDialog.length).to.equal(2)
    })

    it('При клике меняется showDialog', () => {
        const btn = wrapper.find('v-btn[id="hide-dialog"]')

        expect(wrapper.vm.showDialogVal).to.equal(true)
        
        btn.trigger('click')

        expect(wrapper.vm.showDialogVal).to.equal(false)
    })

})