"use strict";

const progressBarElmnt = document.getElementById("form-progress");

let sheet = (function () {
  // Create the <style> tag
  let style = document.createElement("style");

  // WebKit hack
  style.appendChild(document.createTextNode(""));

  // Add the <style> element to the page
  document.head.appendChild(style);

  return style.sheet;
})();

let ruleAfter;
let ruleBefore;

const maxStep = progressBarElmnt.dataset.maxStep;
const currentStep = progressBarElmnt.dataset.currentStep;
const percentWidth = ((currentStep - 1) / (maxStep - 1)) * 100 + "%";

// Position all of the step divs
for (let cntr = 1; cntr <= maxStep; cntr++) {
  let left = ((cntr - 1) / (maxStep - 1)) * 100 + "%";
  let rule = `#step-${cntr} {
    left: ${left};
    transform: translate(-50%, 50%);
  }`;
  sheet.insertRule(rule, 0);
}

// Correctly color the step divs and change the innerHTML to a check
for (let cntr = 1; cntr <= currentStep - 1; cntr++) {
  let stepDiv = document.getElementById(`step-${cntr}`);
  stepDiv.innerHTML = "&#10003;";
  let rule = `#step-${cntr} {
    background-color: rgb(var(--base-color));
    color: #fff;
    font-weight: 700;
  }`;
  sheet.insertRule(rule, 0);
}

ruleBefore = `#form-progress::before {\n
width: ${percentWidth};\n}\n`;

sheet.insertRule(ruleBefore, 0);
