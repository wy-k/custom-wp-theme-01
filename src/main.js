const menuIcon = document.getElementById("menu-icon");
const slideoutMenu = document.getElementById("slideout-menu");
const searchIcon = document.getElementById("search-icon");
const searchBox = document.getElementById("searchbox");


// Toggles Drop-down Search Bar
searchIcon.addEventListener('click', function (){
    if(searchBox.style.top == '72px') {
        searchBox.style.top = '24px';
        searchBox.style.pointerEvents = 'none';
    } else {
        searchBox.style.top = '72px';
        searchBox.style.pointerEvents = 'auto';
    }
});


// Toggles Drop-down Menu @media(max-width: 900px)
menuIcon.addEventListener('click', function () {
    if(slideoutMenu.style.opacity == '1') {
        slideoutMenu.style.opacity = '0';
        slideoutMenu.style.pointerEvents = 'none';
    } else {
        slideoutMenu.style.opacity = '1';
        slideoutMenu.style.pointerEvents = 'auto';
    }
});


//jQuery

$(document).ready(function(){ 
    
    //Highlights current page in Header Navigation
    $(".top-nav-links a").each(function() {
        if ((window.location.pathname.indexOf($(this).attr('href'))) > -1) {
            $(this).addClass('active');
        }
    });

});


