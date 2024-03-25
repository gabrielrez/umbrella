export default function initScroll(){
  const links = document.querySelectorAll("[data-scroll='smooth'] a[href^='#']");

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