import { expect } from 'chai'
import { mount } from '@vue/test-utils';
import ToolbarComponent from '@/components/Toolbar/ToolbarComp.vue';

describe('Компонент Toolbar', () => {
    const wrapper = mount(ToolbarComponent)


    it('Отрисовывает кнопку сокрытия меню', () => {
        expect(wrapper.find('v-app-bar-nav-icon[id="menu-btn"]').exists()).to.be.true
    })

    it('Вызывает событие при клике', () => {
        const btn = wrapper.find('v-app-bar-nav-icon[id="menu-btn"]')
        
        btn.trigger('click')

        expect(wrapper.emitted().hasOwnProperty("drawer")).to.be.true

        btn.trigger('click')

        expect(wrapper.emitted().drawer.length).to.equal(2)
    })

    it('При клике меняется drawer', () => {
        const btn = wrapper.find('v-app-bar-nav-icon[id="menu-btn"]')

        expect(wrapper.vm.drawerVal).to.equal(true)
        
        btn.trigger('click')

        expect(wrapper.vm.drawerVal).to.equal(false)
    })
})