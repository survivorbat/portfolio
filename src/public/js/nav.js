const nav = document.querySelector("#nav--element");
const navToggle = document.querySelector(".nav--toggle");
const contentContainer = document.querySelector(".content--container");
const pageHeader = document.querySelector(".header--title");

let active = false;

// TODO: Clean this up
navToggle.addEventListener("click", () => {
  active = !active;

  if (active) {
    nav.classList.add("nav--element-active");
    contentContainer.classList.add("transparent");
    pageHeader.classList.add("transparent");
  } else {
    nav.classList.remove("nav--element-active");
    contentContainer.classList.remove("transparent");
    pageHeader.classList.remove("transparent");
  }
});
