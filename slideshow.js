"use strict";

const dotCntnr = document.querySelector(".dots");
const dots = document.querySelectorAll(".dots__dot");
const slides = document.querySelectorAll(".slideshow__img");
const slideshowElem = document.querySelector(".slideshow");

let currSlide = 1;
const maxSlides = slides.length;

function setCurrDot() {
  dots.forEach(function (dot) {
    if (dot.classList.contains("dots__dot--current"))
      dot.classList.remove("dots__dot--current");
  });
  dots.forEach(function (dot) {
    if (dot.dataset.dotNumber == currSlide)
      dot.classList.add("dots__dot--current");
  });
}

function nextSlide(fromClick) {
  if (!fromClick) {
    slideshowElem.classList.remove(`slideshow--${currSlide}`);
    currSlide++;
    if (currSlide > maxSlides) currSlide = 1;
  }

  slides.forEach(function (slide) {
    if (slide.classList.contains("slideshow__img--current"))
      slide.classList.remove("slideshow__img--current");
  });

  slides.forEach(function (slide) {
    if (slide.classList.contains(`slideshow__img--${currSlide}`))
      slide.classList.add("slideshow__img--current");
  });

  slideshowElem.classList.add(`slideshow--${currSlide}`);

  setCurrDot();
}

dotCntnr.addEventListener("click", function (e) {
  if (e.target === dotCntnr) return;
  slideshowElem.classList.remove(`slideshow--${currSlide}`);
  currSlide = e.target.dataset.dotNumber;
  nextSlide(true);
});

setInterval(nextSlide, 4500, false);
