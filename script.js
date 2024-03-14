const optionsBtn = document.querySelectorAll(".option-box");
const mainImg = document.querySelector(".main-img");

function handleOption(event){
  event.preventDefault();
  const dataImg = this.getAttribute("data-img");
    optionsBtn.forEach((item)=>{
      item.classList.remove("active");
    })
    this.classList.add("active");
    mainImg.src = dataImg;
}

optionsBtn.forEach((item)=>{
  item.addEventListener("click", handleOption);
})