function initAccordion(){
  const accordionList = document.querySelectorAll(".js-accordion .accordion");
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

function initScroll(){
  const links = document.querySelectorAll(".header-menu a[href^='#']");

  function scrollToSection(event){
    event.preventDefault();
    const href = this.getAttribute("href");
    const section = document.querySelector(href);
    section.scrollIntoView({
      behavior: "smooth",
      block: "start",
    })
  }
  
  links.forEach((link)=>{
    link.addEventListener("click", scrollToSection);
  })
}

initAccordion();
initScroll();