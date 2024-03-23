const accordionList = document.querySelectorAll(".accordion");
accordionList[0].classList.add("active");
accordionList[0].querySelector("dt").classList.add("active");

function activeAccordion(){
  this.classList.toggle("active");
  this.querySelector("dt").classList.toggle("active");
}

accordionList.forEach((item)=>{
  item.addEventListener("click", activeAccordion);
})