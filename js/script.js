import SmoothScroll from "./modules/landing-page/scroll.js";
import Accordion from "./modules/landing-page/accordion.js";

const smoothScroll = new SmoothScroll("[data-scroll='smooth'] a[href^='#']");
smoothScroll.init();

const accordion = new Accordion("[data-accordion='accordion'] .accordion");
accordion.init();