// var slideIndex = 1;

// showSlides(slideIndex);

// function plusSlide() {
//     showSlides(slideIndex += 1);
// }

// function minusSlide() {
//     showSlides(slideIndex -= 1);
// }

// function currentSlide(n) {
//     showSlides(slideIndex = n);
// }

// function showSlides(n) {
//     var i;
//     var slides = document.getElementsByClassName("item");
//     var dots = document.getElementsByClassName("slider-dots_item");

//     if (n > slides.length) {
//         slideIndex = 1
//     }

//     if (n < 1) {
//         slideIndex = slides.length
//     }

//     for (i = 0; i < slides.length; i++) {
//         slides[i].style.display = "none";
//     }

//     for (i = 0; i < dots.length; i++) {
//         dots[i].className = dots[i].className.replace(" active", "");
//     }

//     slides[slideIndex - 1].style.display = "block";
//     dots[slideIndex - 1].className += " active";
// }

// function timingSlider() {
//     setInterval(plusSlide, 5000);
// }

// timingSlider();

$(document).ready(function () {
    $('.toggle-popup').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#email',

        // When elemened is focused, some mobile browsers in some cases zoom in
        // It looks not nice, so we disable it:
        callbacks: {
            beforeOpen: function () {
                if ($(window).width() < 700) {
                    this.st.focus = false;
                } else {
                    this.st.focus = '#email';
                }
            }
        }
    });
});