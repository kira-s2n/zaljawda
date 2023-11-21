import translation from "./translation.js";
const languageselector = document.querySelector("select");

languageselector.addEventListener("change",(event) =>{
setLanguage(event.target.value);
localStorage.setItem("lang",event.target.value);



});

document.addEventListener("DOMContentLoaded",() =>{
setLanguage(localStorage.getItem("lang"));



});

const setLanguage=(language) => {
   const elements = document.querySelectorAll("[data-i18n]");
   elements.forEach((element) => {

const translationkey = element.getAttribute("data-i18n");
element.textContent = translation[language][translationkey];



   });
document.dir = language === "ar" ? "rtl" : "ltr" ;


};


