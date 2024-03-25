import SmoothScroll from "./modules/landing-page/scroll.js";
import initAccordion from "./modules/landing-page/accordion.js";

const smoothScroll = new SmoothScroll("[data-scroll='smooth'] a[href^='#']");
smoothScroll.init();

initAccordion();