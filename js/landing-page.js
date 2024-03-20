const faqQuestions = document.querySelectorAll(".faq-container div dt");

function handleFaqQuestions(){
    faqQuestions.forEach((question)=>{
      question.classList.remove("active");
      question.nextElementSibling.classList.remove("active");
    })
    this.classList.add("active");
    this.nextElementSibling.classList.add("active");
}

faqQuestions.forEach((item)=>{
    item.addEventListener("click", handleFaqQuestions);
});