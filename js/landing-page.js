class SmoothScroll{
  constructor(links, options){
    this.links = document.querySelectorAll(links);
    if(options === undefined){
      this.options = {behavior: "smooth", block: "start"};
    }else{
      this.options = options;
    }
    this.scrollToSection = this.scrollToSection.bind(this);
  }

  scrollToSection(event){
    event.preventDefault();
    const href = event.currentTarget.getAttribute("href");
    const section = document.querySelector(href);
    section.scrollIntoView(this.options);
  }

  addLinkEvent(){
    this.links.forEach((link)=>{
      link.addEventListener("click", this.scrollToSection);
    })
  }

  init(){
    if(this.links.length){
      this.addLinkEvent();
      return this;
    }
  }
}

class Accordion{
  constructor(list){
    this.accordionList = document.querySelectorAll(list);
    this.activeClass = "active";
  }
  
  toggleAccordion(item){
      item.classList.toggle(this.activeClass);
      item.querySelector("dt").classList.toggle(this.activeClass);
  }

  addAccordionEvent(){
    this.accordionList.forEach((item)=>{
      item.addEventListener("click", ()=> {
        this.toggleAccordion(item)
      });
    })
  }

  init(){
    if(this.accordionList.length){
      this.addAccordionEvent();
      this.toggleAccordion(this.accordionList[0]);
      this.accordionList[0].querySelector("dt").classList.add(this.activeClass);
    }
  }
}

const smoothScroll = new SmoothScroll("[data-scroll='smooth'] a[href^='#']");
smoothScroll.init();
const accordion = new Accordion("[data-accordion='accordion'] .accordion");
accordion.init();