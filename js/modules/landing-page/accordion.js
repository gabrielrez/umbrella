export default class Accordion{
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