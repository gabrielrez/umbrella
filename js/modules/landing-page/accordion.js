export default function initAccordion(){
  const accordionList = document.querySelectorAll("[data-accordion='accordion'] .accordion");
  const activeClass = "active";
  accordionList[0].classList.add(activeClass);
  accordionList[0].querySelector("dt").classList.add(activeClass);
  
  function handleAccordion(){
    this.classList.toggle(activeClass);
    this.querySelector("dt").classList.toggle(activeClass);
  }
  
  accordionList.forEach((accordion)=>{
    accordion.addEventListener("click", handleAccordion);
  })
}