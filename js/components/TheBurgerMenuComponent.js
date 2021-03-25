export default () => {

    const mainNav = document.querySelector('.mainNav');
    const navBarToggle = document.getElementById('js-navbar-toggle');

    navBarToggle.addEventListener('click', function() {

        console.log('she works');

        mainNav.classList.toggle('selected');
    });
}