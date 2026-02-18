const ctaFormContainers = [];

const getRoutingValue = function () {
  const cookieName = "Meeting_Routing_Key=";
  const decodedCookie = decodeURIComponent(document.cookie);
  const cookieParts = decodedCookie.split(';');

  for (let i = 0; i < cookieParts.length; i++) {
    const cookie = cookieParts[i].trim();
    if (cookie.indexOf(cookieName) === 0) {
      return cookie.substring(cookieName.length, cookie.length);
    }
  }

  return '';
};

const applyRoutingKeyToIframe = function (formContainer, routingValue) {
  if (!formContainer || !routingValue) {
    return;
  }

  const iframe = formContainer.querySelector('iframe');
  if (!iframe) {
    return;
  }

  const separator = iframe.src.includes('?') ? '&' : '?';
  iframe.src = iframe.src + separator + "Meeting_Routing_Key=" + encodeURIComponent(routingValue);
};

document.addEventListener('DOMContentLoaded', function () {
  const ctaBlocks = document.querySelectorAll('.block-cta');

  ctaBlocks.forEach(function (block) {
    const formContainer = block.querySelector('.block-cta__form');
    if (!formContainer) return;

    ctaFormContainers.push(formContainer);

    const showButton = block.querySelector('.js-show-form');
    const closeButton = block.querySelector('.js-close-form');
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

window.addEventListener('load', function() {
  const routingValue = getRoutingValue();
  if (!routingValue) {
    return;
  }

  ctaFormContainers.forEach(function (formContainer) {
    applyRoutingKeyToIframe(formContainer, routingValue);
  });
});
