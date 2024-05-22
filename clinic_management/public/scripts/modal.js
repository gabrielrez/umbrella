class Modal{
  constructor(containerModal, openModalBtn){
    this.containerModal = document.querySelector(containerModal);
    this.openModalBtn = document.querySelector(openModalBtn);
    this.openModal = this.openModal.bind(this);
    this.closeModal = this.closeModal.bind(this);
  }

  openModal(event){
    event.preventDefault();
    this.containerModal.classList.toggle("active");
  }

  closeModal(event){
    if(event.target === this.containerModal){
      this.containerModal.classList.toggle("active");
    }
  }

  init(){
    if(this.containerModal && this.openModalBtn){
      this.openModalBtn.addEventListener("click", this.openModal);
      this.containerModal.addEventListener("click", this.closeModal);
    }
  }
}

const modal = new Modal(".modal-container", ".create-btn");
modal.init();