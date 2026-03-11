/******/ (() => { // webpackBootstrap
/*!******************************************!*\
  !*** ./src/scripts/section/block_cta.js ***!
  \******************************************/
var ctaFormContainers = [];
var getRoutingValue = function getRoutingValue() {
  var cookieName = "Meeting_Routing_Key=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var cookieParts = decodedCookie.split(';');
  for (var i = 0; i < cookieParts.length; i++) {
    var cookie = cookieParts[i].trim();
    if (cookie.indexOf(cookieName) === 0) {
      return cookie.substring(cookieName.length, cookie.length);
    }
  }
  return '';
};
var applyRoutingKeyToIframe = function applyRoutingKeyToIframe(formContainer, routingValue) {
  if (!formContainer || !routingValue) {
    return;
  }
  var iframe = formContainer.querySelector('iframe');
  if (!iframe) {
    return;
  }
  var separator = iframe.src.includes('?') ? '&' : '?';
  iframe.src = iframe.src + separator + "Meeting_Routing_Key=" + encodeURIComponent(routingValue);
};
document.addEventListener('DOMContentLoaded', function () {
  var ctaBlocks = document.querySelectorAll('.block-cta');
  ctaBlocks.forEach(function (block) {
    var formContainer = block.querySelector('.block-cta__form');
    if (!formContainer) return;
    ctaFormContainers.push(formContainer);
    var showButton = block.querySelector('.js-show-form');
    var closeButton = block.querySelector('.js-close-form');
    if (showButton) {
      showButton.addEventListener('click', function (e) {
        e.preventDefault();
        block.classList.add('is-form-visible');
      });
    }
    if (closeButton) {
      closeButton.addEventListener('click', function (e) {
        e.preventDefault();
        block.classList.remove('is-form-visible');
      });
    }
  });
});
window.addEventListener('load', function () {
  var routingValue = getRoutingValue();
  if (!routingValue) {
    return;
  }
  ctaFormContainers.forEach(function (formContainer) {
    applyRoutingKeyToIframe(formContainer, routingValue);
  });
});
/******/ })()
;