export default class Accordion{
  constructor(list){
    this.accordionList = document.querySelectorAll(list);
    this.activeClass = "active";
  }
  
  handleAccordion(item){
    if (item) {
      item.classList.toggle(this.activeClass);
      const dtElement = item.querySelector("dt");
      if (dtElement) {
        dtElement.classList.toggle(this.activeClass);
      }
    }
  }
  

  addAccordionEvent(){
    this.accordionList.forEach((item)=>{
      item.addEventListener("click", ()=> this.handleAccordion(item));
    })
  }

  init(){
    if(this.accordionList.length){
      this.addAccordionEvent();
      this.handleAccordion(this.accordionList[0]);
      this.handleAccordion(this.accordionList[0].querySelector("dt").classList.add(this.activeClass));
    }
  }
}