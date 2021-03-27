export default () => {

    const mainNav = document.querySelector('.Toggle');
    const navBarToggles = document.querySelectorAll('[data-toggle]');

    navBarToggles.forEach(navBarToggle => {
        navBarToggle.addEventListener('click', function() {

            console.log('she works');

            mainNav.classList.toggle('selected');
        });
    });

}