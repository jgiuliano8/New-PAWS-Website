"use strict";

// This script handles the pet adoption forms
// Basically listens to the events on specific
// elements and displays or hides related form
// questions depending on the need.

// Get the elements to listen to
const housingElement = document.getElementById("housing");
const rentYesElement = document.querySelector("own-rent");
const childrenYesElement = document.getElementById("children-yes");
const allergiesYesElement = document.getElementById("allergies-yes");
const fullyFencedYesElement = document.getElementById("fully-fenced-yes");
const fullyFencedNoElement = document.getElementById("fully-fenced-no");

// Get the elements to respectively manipulate
const otherHousingElement = document.getElementById("other-housing");
const landlordElement = document.getElementsByClassName(
  "input-group--landlord"
);
const childrenElement = document.getElementsByClassName(
  "input-group--children"
);
const allergiesElement = document.getElementsByClassName(
  "input-group--allergies"
);
const yardElement = document.getElementsByClassName("input-group--yard");
const fenceElement = document.getElementsByClassName("input-group--fence");
const restraintElement = document.getElementsByClassName(
  "input-group--restraint"
);

//Get the elements to extract information from
const petType = document.getElementById("pet-type-hidden");
