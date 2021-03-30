import HamburgerMenu from './components/TheBurgerMenuComponent.js';
import BackToTopBtn from './components/TheBackToTopBtnComponent.js';
import SectionsContainer from './components/SectionsContainer.js';
import OverviewComponent from './components/OverviewComponent.js';
import JumpToContainer from './components/JumpToContainer';


(() => {
    const vm = new Vue({

        components: {
            'sections-container': SectionsContainer,
            'overview-component': OverviewComponent,
            'jump-to-container': JumpToContainer
        }
    }).$mount('#app');
})();


HamburgerMenu();
BackToTopBtn();