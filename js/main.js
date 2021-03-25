import HamburgerMenu from './components/TheBurgerMenuComponent.js';
import BackToTopBtn from './components/TheBackToTopBtnComponent.js';
import SectionsContainer from './components/SectionsContainer.js';


(() => {
    const vm = new Vue({

        components: {
            'sections-container': SectionsContainer
        }
    }).$mount('#app');
})();


HamburgerMenu();
BackToTopBtn();