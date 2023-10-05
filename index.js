document.addEventListener('DOMContentLoaded', function() {
    var hamburger = document.querySelector('.hamburger');
    var menu = document.querySelector('.menu');

    hamburger.addEventListener('touchstart', function() {
    
        menu.classList.toggle('menu--open');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var header = document.querySelector('.header');
    var hero = document.querySelector('.hero');
    var content = document.querySelector('.content');

    window.addEventListener('scroll', function () {
        var heroBottom = hero.offsetTop + hero.offsetHeight;
        if (window.pageYOffset >= heroBottom) {
            header.classList.add('header-dark');
        } else {
            header.classList.remove('header-dark');
        }
    });
});
