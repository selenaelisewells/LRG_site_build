export default () => {

    const scrollToTopBtn = document.getElementById("scrollToTopBtn");
    const rootElement = document.documentElement;
    //add the click event to the button
    function scrollToTop() {
        //scroll to top logic
        rootElement.scrollTo({
            top: 0,
            behavior: "smooth"
        })
    }

    scrollToTopBtn.addEventListener("click", scrollToTop)
}