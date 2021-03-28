export default () => {

    const mainNav = document.querySelector('.Toggle');
    const navBarToggles = document.querySelectorAll('[data-toggle]');
    const documentBody = document.body;

    navBarToggles.forEach(navBarToggle => {
        navBarToggle.addEventListener('click', function() {

            console.log('she works');

            mainNav.classList.toggle('selected');
            documentBody.classList.toggle('navOverlayActive');
        });
    });

}