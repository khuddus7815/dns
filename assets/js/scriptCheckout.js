const accordionItem1 = document.getElementById("accordionItem1");
const headerStep1 = document.getElementById("header-step1");
const infoStep1 = document.getElementById("info-step1");
const viewAddress = document.getElementById("view-address");
const addAddressCards = document.getElementById("add-address-cards");

const changeButton = document.getElementById("btn-hide");
const changeButton1 = document.getElementById("btn-hide1");
const viewProductsDiv = document.getElementById("view-products");
const orderCardsDiv = document.querySelector(".order-cards");

const changeButton2 = document.getElementById("btn-hide2");

let check_step1 = true;
let check_step2 = false;
let check_step3 = false;
let check_step4 = false;

const editAddress = document.getElementById("edit-address");

function toggleAccordion1() {
  // Safely check if elements exist before accessing
  if (changeButton1) changeButton1.style.display = "none";
  if (changeButton2) changeButton2.style.display = "none";
  if (viewAddress) viewAddress.classList.add("d-none");
  if (accordionItem1) accordionItem1.classList.toggle("show");
  if (headerStep1) {
    headerStep1.classList.add("theme-color");
    const firstH6 = headerStep1.querySelector("h6");
    if (firstH6) {
      firstH6.classList.add("text-secondary_head");
    }
  }
  if (infoStep1) infoStep1.classList.add("d-none");
  if (changeButton) changeButton.style.display = "none";
}
function toggleAccordion2() {
  // Safely check if elements exist before accessing
  if (accordionItem1) accordionItem1.classList.toggle("show");
  if (viewAddress) {
    viewAddress.classList.remove('d-none');
    viewAddress.classList.add('d-block');
    if (viewAddress.classList.contains("show")) {
      if (addAddressCards) addAddressCards.style.display = "block";
    } else {
      if (addAddressCards) addAddressCards.style.display = "none";
    }
  }
  if (changeButton1) changeButton1.style.display = "none";
}

// function toggleEditAddress() {
  
//   editAddress.classList.toggle.apply("show");
// }

function toggleAccordion3(event) {
  const addAnotherAddress = document.getElementById("add-another-address");
  if (addAnotherAddress) {
    addAnotherAddress.classList.toggle("show");
    const button = $(event.target);
    if (addAnotherAddress.classList.contains("show")) {
      button.text("Remove");
    } else {
      button.text("+ Add Address");
    }
  }
}
function toggleViewProducts() {
  if (viewProductsDiv) {
    if (
      viewProductsDiv.style.display === "none" ||
      viewProductsDiv.style.display === ""
    ) {
      viewProductsDiv.style.display = "block";
    } else {
      viewProductsDiv.style.display = "none";
    }
  }

  if (orderCardsDiv) {
    if (
      orderCardsDiv.style.display === "none" ||
      orderCardsDiv.style.display === ""
    ) {
      orderCardsDiv.style.display = "block";
    } else {
      orderCardsDiv.style.display = "none";
    }
  }
  
  if (changeButton2) changeButton2.style.display = "none";
}


function step_active(step)
{
  if (step == 2) {
    toggleAccordion2();
  }
  if (step === 1) {
    toggleAccordion1(); 
  }
}

$(document).ready(function(){
  let step = 1;
  if (check_step1) {
    step_active(step);
  }
})



