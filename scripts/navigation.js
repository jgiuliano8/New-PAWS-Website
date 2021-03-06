"use strict";

function openMainMenu() {
  const nav = document.querySelector(".navigation");
  const mainElement = document.querySelector("main");
  const ftrElement = document.querySelector("footer");
  nav.classList.add("nav-open");
  mainElement.style.display = "none";
  ftrElement.style.display = "none";
  // Hamburger element z-index is set to 0 so it fades when
  // other menus open.
  hamburgerElement.style.zIndex = "0";
  console.log("Trying to open menu...");
}

function closeMainMenu() {
  const nav = document.querySelector(".navigation");
  const mainElement = document.querySelector("main");
  const vlntrElement = document.querySelector(".volunteer");
  const ftrElement = document.querySelector("footer");
  const iFrameElement = document.querySelector(".volunteer__form");
  nav.classList.remove("nav-open");

  if (!iFrameElement) {
    mainElement.style.display = "grid";
  } else {
    mainElement.style.display = "block";
  }
  ftrElement.style.display = "grid";
}

// Media query
let deviceIsSmall = window.matchMedia("(max-width: 675px)");
const hamburgerElement = document.querySelector(".hamburger");
// On click of the hamburger, open the nav/main-menu top
// level list items
hamburgerElement.addEventListener("click", openMainMenu);

// On pressing the enter key when hamburger has
// focus, open the main - menu
hamburgerElement.addEventListener("keydown", (e) => {
  // e.preventDefault();
  if (e.code === "Enter") {
    console.log("key pressed ", e.code, typeof e.code);
    openMainMenu();
  }
});

// On click of the "x", close the nav/main-menu top
// level list items
document.querySelector(".close-nav").addEventListener("click", closeMainMenu);

// On pressing Enter key when 'x' has focuse, close
// the main menu
document.querySelector(".close-nav").addEventListener("keydown", (e) => {
  if (e.code === "Enter") closeMainMenu();
});

// clearNav clears out the .nav-open class on the HTML element
// when the browswer goes back to desktop mode
function clearNav(mql) {
  // If the media query list does NOT match, i.e. device
  // is NOT small, then remove nav-open class which
  // closes the navigation
  if (!mql.matches) {
    const navigation = document.querySelector(".navigation");
    navigation.classList.remove("nav-open");
  }
}

// Function opens the respective sub-menu that is passed in
// as an argument
function openMenu(subMenu) {
  const newSubMenu = subMenu.replace(".", "");
  const subMenuElement = document.querySelector(subMenu);
  subMenuElement.classList.add("nav-open");

  // Adds a click event listener to the left arrow in
  // the mobile sub-menus, which calls the closeMenu function,
  // on click.
  document
    .querySelector(`.close-${newSubMenu}`)
    .addEventListener("click", function () {
      closeMenu(subMenu);
    });
  // Adds an Event listener for 'Enter' key,
  // Closes the sub-menu if Enter key is pressed
  document
    .querySelector(`.close-${newSubMenu}`)
    .addEventListener("keydown", (e) => {
      if (e.code === "Enter") closeMenu(subMenu);
    });
}

// Function closes the sub-menu that is passed in as an argument
// by removing the nav-open class.
function closeMenu(subMenu) {
  const subMenuElement = document.querySelector(subMenu);
  subMenuElement.classList.remove("nav-open");
}

// This function helps fix the issue that occurred when the
// browser is resized from above 675px to below 675px. The mobile
// main-menu would appear momentarily and then fade out because
// of the transitioning of main-menu visibility from visible,
// while the browser was larger than 675px, to hidden when the
// browser initially resized below 675px.
//
// Specifically, this function changes the display: none on
// the main-menu back to display: flex, after the 750ms timer.

function removeInvisibility() {
  const navElement = document.querySelector(".navigation");
  navElement.style.display = "flex";
}

// This function *mostly* adds and removes the event listeners
// that are in place for the mobile functionality of the
// navigation. It also makes the main-menu style display: none.
// (See comments in the function itself for where this is done.)
function toggleListeners(mql) {
  // These elements are the main menu list items.
  const announcementMenu = document.querySelector(".js-announcements");
  const educationMenu = document.querySelector(".js-education");
  const servicesMenu = document.querySelector(".js-services");
  const supportMenu = document.querySelector(".js-support");

  // If media query is true, ie browser is smaller than 675px
  if (mql.matches) {
    // The next 4 event listeners list for a click on the
    // main menu list items. If it's triggered, the respective
    // sub-menu is opened with the openMenu function.
    // capture: true was added because it helped the child
    // element event listeners execute. I probably don't
    // understand it as well as I should but it solved the
    // issue.
    announcementMenu.addEventListener(
      "click",
      function () {
        openMenu(".sub-menu-1");
      },
      { capture: true }
    );
    educationMenu.addEventListener(
      "click",
      function () {
        openMenu(".sub-menu-2");
      },
      { capture: true }
    );
    servicesMenu.addEventListener(
      "click",
      function () {
        openMenu(".sub-menu-3");
      },
      { capture: true }
    );
    supportMenu.addEventListener(
      "click",
      function () {
        openMenu(".sub-menu-4");
      },
      { capture: true }
    );

    // Make navigation invisible momentarily.
    // Transitioning visibility made the navigation
    // visible and then fade to hidden, when resizing
    // browser from larger to smaller widths
    const navElement = document.querySelector(".navigation");
    navElement.style.display = "none";
    setTimeout(removeInvisibility, 750);
  } else {
    // Else browser is larger than 675px

    // The next four lines are kind of a 'reset' on the respective
    // elements. Basically it removes all event listeners on
    // each element. Found this technique in Stack Overflow.
    announcementMenu.outerHTML = announcementMenu.outerHTML;
    educationMenu.outerHTML = educationMenu.outerHTML;
    servicesMenu.outerHTML = servicesMenu.outerHTML;
    supportMenu.outerHTML = supportMenu.outerHTML;

    // Close any sub-menus that are still open once the browser
    // goes back to being larger than 675px
    closeMenu(".sub-menu-1");
    closeMenu(".sub-menu-2");
    closeMenu(".sub-menu-3");
    closeMenu(".sub-menu-4");

    // Resets hamburger z-index back to 3
    hamburgerElement.style.zIndex = "3";
  }
}

// Call listener functions at run time
clearNav(deviceIsSmall);
toggleListeners(deviceIsSmall);

// Attach listener functions on state changes
deviceIsSmall.addEventListener("change", clearNav);
deviceIsSmall.addEventListener("change", toggleListeners);
