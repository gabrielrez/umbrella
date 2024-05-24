class Modal {
  constructor(containerModal, openModalBtn) {
    this.containerModal = containerModal;
    this.openModalBtn = openModalBtn;
    this.openModal = this.openModal.bind(this);
    this.closeModal = this.closeModal.bind(this);
  }

  openModal(event) {
    event.preventDefault();
    this.containerModal.classList.add("active");
  }

  closeModal(event) {
    if (event.target === this.containerModal) {
      this.containerModal.classList.remove("active");
    }
  }

  init() {
    if (this.containerModal && this.openModalBtn) {
      this.openModalBtn.forEach(btn => {
        btn.addEventListener("click", this.openModal);
      });
      this.containerModal.addEventListener("click", this.closeModal);
    }
  }
}

const containerModal = document.querySelector(".modal-container");
const openModalBtn = document.querySelectorAll(".create-btn");
const modal = new Modal(containerModal, openModalBtn);
modal.init();
