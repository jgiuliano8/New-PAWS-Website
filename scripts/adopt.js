"use strict";

// This script handles the pet adoption forms
// Basically listens to the events on specific
// elements and displays or hides related form
// questions depending on the need.

// Get the elements to listen to
const housingElement = document.getElementById("housing");
const ownRentElement = document.querySelector(".input-group--own-rent");

const childrenElement = document.querySelector(".input-group--children");
const allergiesElement = document.querySelector(".input-group--allergies");
const fullyFencedElement = document.querySelector(".input-group--fully-fenced");
const fullyFencedNoElement = document.getElementById("fully-fenced-no");

// Get the elements to respectively manipulate
const otherHousingElement = document.querySelector(
  ".input-group--other-housing"
);
const landlordElement = document.querySelector(".input-group--landlord");
const childrenYesElement = document.querySelector(".input-group--children-yes");
const allergiesYesElement = document.querySelector(
  ".input-group--allergies-yes"
);
const yardElement = document.querySelector(".input-group--yard");
const fenceElement = document.querySelector(".input-group--fence");
const restraintElement = document.querySelector(".input-group--restraint");

//Get the elements to extract information from
const petType = document.getElementById("pet-type-hidden").value;

housingElement.onchange = peekABooHousing;

ownRentElement.addEventListener("click", function (event) {
  if (event.target.value === "rent") {
    landlordElement.classList.remove("hidden-display");
  } else {
    if (!landlordElement.classList.contains("hidden-display")) {
      landlordElement.classList.add("hidden-display");
    }
  }
});

childrenElement.addEventListener("click", function (event) {
  if (event.target.value === "yes") {
    childrenYesElement.classList.remove("hidden-display");
  } else {
    if (!childrenYesElement.classList.contains("hidden-display")) {
      childrenYesElement.classList.add("hidden-display");
    }
  }
});

allergiesElement.addEventListener("click", function (event) {
  if (event.target.value === "yes") {
    allergiesYesElement.classList.remove("hidden-display");
  } else {
    if (!allergiesYesElement.classList.contains("hidden-display")) {
      allergiesYesElement.classList.add("hidden-display");
    }
  }
});

fullyFencedElement.addEventListener("click", function (event) {
  if (event.target.value === "yes") {
    fenceElement.classList.remove("hidden-display");
    if (!restraintElement.classList.contains("hidden-display")) {
      restraintElement.classList.add("hidden-display");
    }
  } else {
    if (!fenceElement.classList.contains("hidden-display")) {
      fenceElement.classList.add("hidden-display");
    }
    restraintElement.classList.remove("hidden-display");
  }
});

function peekABooHousing(event) {
  if (housingElement.value !== "Dormitory" && petType === "dog") {
    yardElement.classList.remove("hidden-display");
  } else {
    if (!yardElement.classList.contains("hidden-display")) {
      yardElement.classList.add("hidden-display");
    }
  }

  if (housingElement.value === "Other") {
    console.log(otherHousingElement, otherHousingElement.classList);
    otherHousingElement.classList.remove("hidden-display");
  } else {
    if (!otherHousingElement.classList.contains("hidden-display")) {
      otherHousingElement.classList.add("hidden-display");
    }
  }

  // if (housingElement.value === "Dormitory" && petType === "dog") {
  //   restraintElement.classList.remove("hidden-display");
  // } else {
  //   if (!restraintElement.classList.contains("hidden-display")) {
  //     restraintElement.classList.add("hidden-display");
  //     w;
  //   }
  // }
}

function peekABooLandlord(event) {
  console.log(event.target.value, "hello");
  if (ownRentElement.value === "rent") {
    landlordElement.classList.remove("hidden-display");
  } else {
    if (!landlordElement.classList.contains("hidden-display")) {
      landlordElement.classList.add("hidden-display");
    }
  }
}
