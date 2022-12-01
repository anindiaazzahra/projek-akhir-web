function navbarScroll(){
    const bgNavbarIcon = document.querySelector("nav");
    const logo = document.querySelector(".logo");
    const navItem = document.querySelectorAll(".nav-item a");
    const btnNavItem = document.querySelector("p a");


    let scrollValue = window.scrollY;
    console.log(scrollValue);
    if(scrollValue < 100) {
        bgNavbarIcon.classList.remove("nav-scroll");
        logo.classList.remove("logo-scroll");
        for (const item of navItem) {
            item.classList.remove("nav-item-scroll");
        }
        btnNavItem.classList.remove("nav-btn-scroll");
    } else {
        bgNavbarIcon.classList.add("nav-scroll");
        logo.classList.add("logo-scroll");
        for (const item of navItem) {
            item.classList.add("nav-item-scroll");
        }
        btnNavItem.classList.add("nav-btn-scroll");
    }
}

window.addEventListener('scroll', navbarScroll)