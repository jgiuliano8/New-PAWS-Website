"use strict";

// This script handles the pet adoption forms
// Basically listens to the events on specific
// elements and displays or hides related form
// questions depending on the need. Their required
// attribute needs to be toggled also because
// inputs with display none and are required throw
// a form error.

// Get the elements to listen to
const housingElement = document.getElementById("housing");
const ownRentElement = document.querySelector(".input-group--own-rent");

const childrenElement = document.querySelector(".input-group--children");
const allergiesElement = document.querySelector(".input-group--allergies");
const fullyFencedElement = document.querySelector(".input-group--fully-fenced");
// const fullyFencedNoElement = document.getElementById("fully-fenced-no");

// Get the elements to respectively manipulate
const otherHousingElement = document.querySelector(
  ".input-group--other-housing"
);
const otherHousingTextAreaElement = document.getElementById("other-housing");
const landlordElement = document.querySelector(".input-group--landlord");
const childrenYesElement = document.querySelector(".input-group--children-yes");
const allergiesYesElement = document.querySelector(
  ".input-group--allergies-yes"
);
const yardElement = document.querySelector(".input-group--yard");
const fenceElement = document.querySelector(".input-group--fence");
const fullyFencedYesElement = document.getElementById("fully-fenced-yes");
const fullyFencedNoElement = document.getElementById("fully-fenced-no");
const restraintElement = document.querySelector(".input-group--restraint");

//Get the elements to extract information from
const petType = document.getElementById("pet-type-hidden").value;

// Using 'onchange' event for housing because it's a drop-down menu
housingElement.onchange = peekABooHousing;

ownRentElement.addEventListener("click", function (event) {
  const allowedYesElement = document.getElementById("allowed-yes");
  const allowedNoElement = document.getElementById("allowed-no");
  const landlordNameElement = document.getElementById("landlord-name");
  const landlordPhoneElement = document.getElementById("landlord-phone");

  // If applicant rents, display question if pets allowed and make
  // the answer required
  if (event.target.value === "rent") {
    landlordElement.classList.remove("hidden-display");
    allowedYesElement.setAttribute("required", "required");
    allowedNoElement.setAttribute("required", "required");
    landlordNameElement.setAttribute("required", "required");
    landlordPhoneElement.setAttribute("required", "required");
  } else {
    // Hide question if pets allowed and remove required attribute
    if (!landlordElement.classList.contains("hidden-display")) {
      landlordElement.classList.add("hidden-display");
      allowedYesElement.removeAttribute("required");
      allowedNoElement.removeAttribute("required");
      landlordNameElement.removeAttribute("required");
      landlordPhoneElement.removeAttribute("required");
    }
  }
});

childrenElement.addEventListener("click", function (event) {
  const numberChildrenElement = document.getElementById("number-children");
  const ageChildrenElement = document.getElementById("age-children");

  if (event.target.value === "yes") {
    childrenYesElement.classList.remove("hidden-display");
    numberChildrenElement.setAttribute("required", "required");
    ageChildrenElement.setAttribute("required", "required");
  } else {
    if (!childrenYesElement.classList.contains("hidden-display")) {
      childrenYesElement.classList.add("hidden-display");
      numberChildrenElement.removeAttribute("required");
      ageChildrenElement.removeAttribute("required");
    }
  }
});

allergiesElement.addEventListener("click", function (event) {
  const typeAllergiesElement = document.getElementById("type-allergies");

  if (event.target.value === "yes") {
    allergiesYesElement.classList.remove("hidden-display");
    typeAllergiesElement.setAttribute("required", "required");
  } else {
    if (!allergiesYesElement.classList.contains("hidden-display")) {
      allergiesYesElement.classList.add("hidden-display");
      typeAllergiesElement.removeAttribute("required");
    }
  }
});

fullyFencedElement.addEventListener("click", function (event) {
  const fenceTypeElement = document.getElementById("fence");
  const outsideRestraintElement = document.getElementById("outside-restraint");

  if (event.target.value === "yes") {
    fenceElement.classList.remove("hidden-display");
    fenceTypeElement.setAttribute("required", "required");
    if (!restraintElement.classList.contains("hidden-display")) {
      restraintElement.classList.add("hidden-display");
      outsideRestraintElement.removeAttribute("required");
    }
  } else {
    if (!fenceElement.classList.contains("hidden-display")) {
      fenceElement.classList.add("hidden-display");
      fenceTypeElement.removeAttribute("required");
    }
    restraintElement.classList.remove("hidden-display");
    outsideRestraintElement.setAttribute("required", "required");
  }
});

function peekABooHousing(event) {
  const yardSizeElement = document.getElementById("yard-size");

  if (housingElement.value !== "Dormitory" && petType === "dog") {
    yardElement.classList.remove("hidden-display");
    yardSizeElement.setAttribute("required", "required");
    fullyFencedYesElement.setAttribute("required", "required");
    fullyFencedNoElement.setAttribute("required", "required");
  } else {
    if (!yardElement.classList.contains("hidden-display")) {
      yardElement.classList.add("hidden-display");
      yardSizeElement.removeAttribute("required");
      fullyFencedYesElement.removeAttribute("required");
      fullyFencedNoElement.removeAttribute("required");
    }
  }

  if (housingElement.value === "Other") {
    console.log(otherHousingElement, otherHousingElement.classList);
    otherHousingElement.classList.remove("hidden-display");
    otherHousingTextAreaElement.setAttribute("required", "required");
  } else {
    if (!otherHousingElement.classList.contains("hidden-display")) {
      otherHousingElement.classList.add("hidden-display");
      otherHousingTextAreaElement.removeAttribute("required");
    }
  }
}
