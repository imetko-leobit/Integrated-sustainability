import initAccordion from "./modules/Accordion";
import initPopup from "./modules/popup";
import "./components/header_controller";
// import './components/menu_controller';
import "./components/search";
import "./components/breadcrumb_observer";
import "./components/cta_form";
import "./components/sticky_nav_observer";

document.addEventListener("DOMContentLoaded", () => {
  initAccordion();
  initPopup();
});
