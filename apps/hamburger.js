//revealNav();

const hamburger = document.querySelector(".hamburger");
const nav = document.querySelector("nav");
const navLinks = document.querySelector(".nav-links");
const searchIcon = document.querySelector(".searcher-icon");
const searchWrapper = document.querySelector(".searchbar-wrapper");
const searchField = document.querySelector(".search-input-form");
let hamburgerActivated, searchActivated;

hamburger.addEventListener("click", function () {
  hamburgerActivated = true;
  hamburger.classList.toggle("is-active");
  navLinks.classList.toggle("is-active");
  nav.classList.toggle("is-active");
  searchWrapper.classList.remove("search-active");
  searchField.classList.remove("search-active");
});

searchIcon.addEventListener("click", function () {
  searchActivated = true;

  searchWrapper.classList.toggle("search-active");
  searchField.classList.toggle("search-active");
  hamburger.classList.remove("is-active");
  navLinks.classList.remove("is-active");
  nav.classList.remove("is-active");
});

document.querySelectorAll(".grid-photos").forEach((item) => {
  item.addEventListener("click", (event) => {
    event.target.classList.toggle("expander");
  });
});
