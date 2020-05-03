
const mobileMenu = document.getElementById('mobile-menu');
const mainNav = document.getElementById('main-nav');
const closeMenu = document.getElementById('close-menu');
const syBody = document.getElementById('sy-body');
const sySearch = document.getElementById('sy-search');
const searchBlock = document.getElementById('search-block');
const searchClose = document.getElementById('search-close');

if(mobileMenu) {
    mobileMenu.addEventListener('click', function () {
        mainNav.classList.toggle('active');
        syBody.classList.add('overflow-hidden');
    });
}

if(closeMenu) {
    closeMenu.addEventListener('click', function () {
        mainNav.classList.remove('active');
        syBody.classList.remove('overflow-hidden');
    });
}

if(searchClose) {
    searchClose.addEventListener('click', function () {
        searchBlock.classList.toggle('active');
        syBody.classList.remove('overflow-hidden');
    });
}

if(sySearch) {
    sySearch.addEventListener('click', function () {
        searchBlock.classList.toggle('active');
        syBody.classList.add('overflow-hidden');
    });
}