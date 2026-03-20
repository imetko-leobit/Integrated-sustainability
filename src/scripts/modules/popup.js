/** @module popup */

const CLASS_OPEN = 'is-open';
const ATTR_POPUP = 'data-popup';

/**
 * Open a popup by its element ID.
 * @param {string} id  The id attribute of the [data-popup] element.
 */
function openPopup(id) {
  const popup = document.getElementById(id);
  if (!popup || !popup.hasAttribute(ATTR_POPUP)) return;

  popup.classList.add(CLASS_OPEN);
  popup.setAttribute('aria-hidden', 'false');
  document.documentElement.classList.add('popup-open');

  // Move focus to the close button for keyboard / screen-reader users.
  popup.querySelector('[data-popup-close]')?.focus();
}

/**
 * Close a popup.
 * @param {string|HTMLElement} idOrEl  Either the popup id string or any element
 *                                      that is a descendant of (or is) [data-popup].
 */
function closePopup(idOrEl) {
  const popup =
    typeof idOrEl === 'string'
      ? document.getElementById(idOrEl)
      : idOrEl.closest('[data-popup]');

  if (!popup) return;

  popup.classList.remove(CLASS_OPEN);
  popup.setAttribute('aria-hidden', 'true');

  // Remove body scroll-lock only when no other popup is still open.
  if (!document.querySelector(`[data-popup].${CLASS_OPEN}`)) {
    document.documentElement.classList.remove('popup-open');
  }
}

/**
 * Initialise popup functionality across the whole document.
 *
 * Uses event delegation so popups added dynamically also work.
 *
 * Trigger elements:
 *   <button data-popup-open="popup-id">Open</button>
 *
 * Close elements (already placed inside popup.php):
 *   <button data-popup-close>Close</button>   (close button)
 *   <div    data-popup-close>…</div>          (overlay)
 *
 * Global JS API:
 *   window.MATPopup.open('popup-id')
 *   window.MATPopup.close('popup-id')
 */
export default function initPopup() {
  // Delegated click: open triggers + close triggers.
  document.addEventListener('click', (e) => {
    const openTrigger = e.target.closest('[data-popup-open]');
    if (openTrigger) {
      e.preventDefault();
      openPopup(openTrigger.dataset.popupOpen);
      return;
    }

    // Support anchor links whose href points to a [data-popup] element, e.g.:
    //   <a href="#show_popup">Open</a>
    const anchor = e.target.closest('a[href^="#"]');
    if (anchor) {
      const id = anchor.getAttribute('href').slice(1);
      const target = id ? document.getElementById(id) : null;
      if (target?.hasAttribute(ATTR_POPUP)) {
        e.preventDefault();
        openPopup(id);
        return;
      }
    }

    const closeTrigger = e.target.closest('[data-popup-close]');
    if (closeTrigger) {
      e.preventDefault();
      closePopup(closeTrigger);
    }
  });

  // ESC key closes all currently open popups.
  document.addEventListener('keydown', (e) => {
    if (e.key !== 'Escape') return;

    document.querySelectorAll(`[data-popup].${CLASS_OPEN}`).forEach((popup) => {
      closePopup(popup);
    });
  });

  // Expose a global API for external scripts / inline onclick handlers.
  window.MATPopup = { open: openPopup, close: closePopup };
}
