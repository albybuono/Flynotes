document.addEventListener('DOMContentLoaded', function() {
    var hamburger = document.querySelector('.hamburger');
    var menu = document.querySelector('.menu');

    hamburger.addEventListener('touchstart', function() {
    
        menu.classList.toggle('menu--open');
    });
});






