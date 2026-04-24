(() => {
  // src/scripts/modules/Accordion.js
  function initInsightAccordion() {
    const containers = document.querySelectorAll(".js-accordion-container");
    if (!containers.length) return;
    containers.forEach((container) => {
      const items = container.querySelectorAll(".accordion-item");
      const defaultActiveIndex = container.dataset.defaultActiveIndex !== void 0 ? parseInt(container.dataset.defaultActiveIndex, 10) : -1;
      items.forEach((item, index) => {
        const content = item.querySelector(".accordion-item__content");
        content.style.overflow = "hidden";
        content.style.transition = "max-height 0.3s ease";
        const expandBtn = item.querySelector(".accordion-item__expand-btn");
        if (index === defaultActiveIndex || item.classList.contains("is-open")) {
          item.classList.add("is-open");
          content.style.maxHeight = content.scrollHeight + "px";
          if (expandBtn) expandBtn.style.display = "none";
        } else {
          content.style.maxHeight = "0";
        }
      });
      document.fonts.ready.then(() => {
        items.forEach((item) => {
          if (item.classList.contains("is-open")) {
            const content = item.querySelector(".accordion-item__content");
            content.style.maxHeight = content.scrollHeight + "px";
          }
        });
      }).catch(() => {
      });
      container.addEventListener("click", (e) => {
        const trigger = e.target.closest(".js-accordion-trigger");
        if (!trigger) return;
        const item = trigger.closest(".accordion-item");
        const content = item.querySelector(".accordion-item__content");
        const expandBtn = item.querySelector(".accordion-item__expand-btn");
        const isOpen = item.classList.contains("is-open");
        items.forEach((otherItem) => {
          if (otherItem !== item) {
            const otherContent = otherItem.querySelector(
              ".accordion-item__content"
            );
            const otherBtn = otherItem.querySelector(
              ".accordion-item__expand-btn"
            );
            otherContent.style.maxHeight = "0";
            otherItem.classList.remove("is-open");
            if (otherBtn) otherBtn.style.display = "";
          }
        });
        if (isOpen) {
          content.style.maxHeight = "0";
          item.classList.remove("is-open");
          if (expandBtn) expandBtn.style.display = "";
        } else {
          requestAnimationFrame(() => {
            content.style.maxHeight = content.scrollHeight + "px";
            item.classList.add("is-open");
            if (expandBtn) expandBtn.style.display = "none";
          });
        }
      });
    });
  }

  // src/scripts/modules/popup.js
  var CLASS_OPEN = "is-open";
  var ATTR_POPUP = "data-popup";
  function openPopup(id) {
    var _a;
    const popup = document.getElementById(id);
    if (!popup || !popup.hasAttribute(ATTR_POPUP)) return;
    popup.classList.add(CLASS_OPEN);
    popup.setAttribute("aria-hidden", "false");
    document.documentElement.classList.add("popup-open");
    (_a = popup.querySelector("[data-popup-close]")) == null ? void 0 : _a.focus();
  }
  function closePopup(idOrEl) {
    const popup = typeof idOrEl === "string" ? document.getElementById(idOrEl) : idOrEl.closest("[data-popup]");
    if (!popup) return;
    popup.classList.remove(CLASS_OPEN);
    popup.setAttribute("aria-hidden", "true");
    if (!document.querySelector(`[data-popup].${CLASS_OPEN}`)) {
      document.documentElement.classList.remove("popup-open");
    }
  }
  function initPopup() {
    document.addEventListener("click", (e) => {
      const openTrigger = e.target.closest("[data-popup-open]");
      if (openTrigger) {
        e.preventDefault();
        openPopup(openTrigger.dataset.popupOpen);
        return;
      }
      const anchor = e.target.closest('a[href^="#"]');
      if (anchor) {
        const id = anchor.getAttribute("href").slice(1);
        const target = id ? document.getElementById(id) : null;
        if (target == null ? void 0 : target.hasAttribute(ATTR_POPUP)) {
          e.preventDefault();
          openPopup(id);
          return;
        }
      }
      const closeTrigger = e.target.closest("[data-popup-close]");
      if (closeTrigger) {
        e.preventDefault();
        closePopup(closeTrigger);
      }
    });
    document.addEventListener("keydown", (e) => {
      if (e.key !== "Escape") return;
      document.querySelectorAll(`[data-popup].${CLASS_OPEN}`).forEach((popup) => {
        closePopup(popup);
      });
    });
    window.MATPopup = { open: openPopup, close: closePopup };
  }

  // src/scripts/modules/MetadataGroupExpand.js
  function initMetadataGroupExpand() {
    const MOBILE_BREAKPOINT = "(max-width: 991px)";
    const VISIBLE_COUNT = 3;
    function isMobile() {
      return window.matchMedia(MOBILE_BREAKPOINT).matches;
    }
    function setup(group) {
      const linksWrapper = group.querySelector(".metadata-group__links");
      if (!linksWrapper) return;
      const items = Array.from(linksWrapper.children);
      if (items.length <= VISIBLE_COUNT) return;
      items.forEach((item, index) => {
        if (index >= VISIBLE_COUNT) {
          item.classList.add("metadata-group__link--hidden");
        }
      });
      if (!group.querySelector(".metadata-group__expand-btn")) {
        const btn = document.createElement("button");
        btn.type = "button";
        btn.className = "btn metadata-group__expand-btn";
        btn.innerHTML = '<span>Show more</span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><mask id="mask0_metadata_expand" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><rect width="24" height="24" fill="#D9D9D9"/></mask><g mask="url(#mask0_metadata_expand)"><path d="M12.0008 14.9504C11.8674 14.9504 11.7424 14.9296 11.6258 14.8879C11.5091 14.8462 11.4008 14.7754 11.3008 14.6754L6.70078 10.0754C6.51745 9.89206 6.42578 9.65872 6.42578 9.37539C6.42578 9.09206 6.51745 8.85872 6.70078 8.67539C6.88411 8.49206 7.11745 8.40039 7.40078 8.40039C7.68411 8.40039 7.91745 8.49206 8.10078 8.67539L12.0008 12.5754L15.9008 8.67539C16.0841 8.49206 16.3174 8.40039 16.6008 8.40039C16.8841 8.40039 17.1174 8.49206 17.3008 8.67539C17.4841 8.85872 17.5758 9.09206 17.5758 9.37539C17.5758 9.65872 17.4841 9.89206 17.3008 10.0754L12.7008 14.6754C12.6008 14.7754 12.4924 14.8462 12.3758 14.8879C12.2591 14.9296 12.1341 14.9504 12.0008 14.9504Z" fill="#7A7A7A"/></g></svg>';
        btn.addEventListener("click", () => {
          items.forEach((item) => {
            item.classList.remove("metadata-group__link--hidden");
          });
          btn.style.display = "none";
        });
        group.appendChild(btn);
      }
    }
    function applyAll() {
      const groups = document.querySelectorAll(".metadata-group");
      if (isMobile()) {
        groups.forEach((group) => setup(group));
      } else {
        groups.forEach((group) => {
          group.querySelectorAll(".metadata-group__link--hidden").forEach((item) => {
            item.classList.remove("metadata-group__link--hidden");
          });
          const btn = group.querySelector(".metadata-group__expand-btn");
          if (btn) btn.style.display = "none";
        });
      }
    }
    applyAll();
    window.addEventListener("resize", applyAll);
  }

  // src/scripts/components/header_controller.js
  document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector(".header");
    const handleScroll = () => {
      if (window.scrollY > 50) {
        header.classList.add("header--scrolled");
      } else {
        header.classList.remove("header--scrolled");
      }
    };
    window.addEventListener("scroll", handleScroll);
  });

  // src/scripts/components/search.js
  var CLASS_ACTIVE = "is-active";
  var DROPDOWN_CLASS = "search-dropdown";
  var MIN_QUERY_LEN = 3;
  var DEBOUNCE_MS = 350;
  var POST_TYPE_LABELS = {
    services: "services",
    applications: "applications",
    industries: "industries",
    equipment: "equipment",
    projects: "projects",
    insight: "insights"
  };
  function debounce(fn, wait) {
    let timer;
    return function(...args) {
      clearTimeout(timer);
      timer = setTimeout(() => fn.apply(this, args), wait);
    };
  }
  function buildResultItem(item) {
    const thumb = item.thumbnail ? `<div class="search-result__thumb">${item.thumbnail}</div>` : `<div class="search-result__thumb search-result__thumb--empty"></div>`;
    return `<a href="${item.url}" class="search-result">
    ${thumb}
    <div class="search-result__body">
      ${item.breadcrumbs}
      <span class="search-result__title">${item.title}</span>
    </div>
  </a>`;
  }
  function renderDropdown(container, results, noResultsMessage) {
    var _a;
    removeDropdown(container);
    const postTypes = Object.keys(results);
    const hasResults = postTypes.length > 0;
    const label = (_a = container.dataset.allTabLabel) != null ? _a : "All";
    const tabsHtml = [
      `<button class="search-dropdown__tab is-active" data-tab="all" type="button">${label}</button>`,
      ...postTypes.map((pt) => {
        var _a2;
        const label2 = (_a2 = POST_TYPE_LABELS[pt]) != null ? _a2 : pt;
        return `<button class="search-dropdown__tab" data-tab="${pt}" type="button">${label2}</button>`;
      })
    ].join("");
    let panelsHtml = "";
    if (hasResults) {
      const allItems = postTypes.flatMap((pt) => results[pt]);
      const buildPanel = (items, tabKey, isActive) => `<div class="search-dropdown__panel${isActive ? " is-active" : ""}" data-panel="${tabKey}">
        <div class="search-dropdown__list">${items.map(buildResultItem).join("")}</div>
      </div>`;
      panelsHtml += buildPanel(allItems, "all", true);
      postTypes.forEach((pt) => {
        panelsHtml += buildPanel(results[pt], pt, false);
      });
    } else {
      panelsHtml = `<div class="search-dropdown__panel is-active" data-panel="all">
      <p class="search-dropdown__no-results">${noResultsMessage}</p>
    </div>`;
    }
    const dropdown = document.createElement("div");
    dropdown.className = DROPDOWN_CLASS;
    dropdown.setAttribute("role", "listbox");
    dropdown.innerHTML = `<div class="search-dropdown__tabs" role="tablist">${tabsHtml}</div><div class="search-dropdown__content">${panelsHtml}</div>`;
    container.appendChild(dropdown);
    dropdown.querySelectorAll(".search-dropdown__tab").forEach((btn) => {
      btn.addEventListener("click", () => {
        var _a2;
        dropdown.querySelectorAll(".search-dropdown__tab").forEach((b) => b.classList.remove("is-active"));
        dropdown.querySelectorAll(".search-dropdown__panel").forEach((p) => p.classList.remove("is-active"));
        btn.classList.add("is-active");
        (_a2 = dropdown.querySelector(`[data-panel="${btn.dataset.tab}"]`)) == null ? void 0 : _a2.classList.add("is-active");
      });
    });
  }
  function removeDropdown(container) {
    var _a;
    (_a = container.querySelector(`.${DROPDOWN_CLASS}`)) == null ? void 0 : _a.remove();
  }
  document.addEventListener("DOMContentLoaded", () => {
    var _a;
    const searchContainer = document.getElementById("header-search-container");
    const searchToggle = searchContainer == null ? void 0 : searchContainer.querySelector(".search-toggle");
    const searchClose = searchContainer == null ? void 0 : searchContainer.querySelector(".search-close");
    const searchInput = document.getElementById("header-search-input");
    if (!searchContainer || !searchInput) {
      return;
    }
    const noResultsMessage = (_a = searchContainer.dataset.noResults) != null ? _a : "No posts found";
    function toggleSearch(e) {
      e.preventDefault();
      const isActive = searchContainer.classList.toggle(CLASS_ACTIVE);
      searchToggle == null ? void 0 : searchToggle.setAttribute("aria-expanded", String(isActive));
      if (isActive) {
        searchInput.focus();
      } else {
        searchInput.value = "";
        removeDropdown(searchContainer);
      }
    }
    searchToggle == null ? void 0 : searchToggle.addEventListener("click", toggleSearch);
    searchClose == null ? void 0 : searchClose.addEventListener("click", toggleSearch);
    document.addEventListener("click", (e) => {
      if (searchContainer.classList.contains(CLASS_ACTIVE) && window.innerWidth > 991 && !searchContainer.contains(e.target)) {
        searchContainer.classList.remove(CLASS_ACTIVE);
        searchToggle == null ? void 0 : searchToggle.setAttribute("aria-expanded", "false");
        searchInput.value = "";
        removeDropdown(searchContainer);
      }
    });
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && searchContainer.classList.contains(CLASS_ACTIVE)) {
        toggleSearch(e);
      }
    });
    let currentRequest = null;
    const doSearch = debounce(async (query) => {
      var _a2, _b, _c, _d;
      currentRequest == null ? void 0 : currentRequest.abort();
      const controller = new AbortController();
      currentRequest = controller;
      const body = new URLSearchParams({
        action: "mat_header_search",
        query,
        _nonce: (_b = (_a2 = window.app_vars) == null ? void 0 : _a2.nonce) != null ? _b : ""
      });
      try {
        const response = await fetch(
          (_d = (_c = window.app_vars) == null ? void 0 : _c.ajaxurl) != null ? _d : "/wp-admin/admin-ajax.php",
          {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8" },
            body: body.toString(),
            signal: controller.signal
          }
        );
        currentRequest = null;
        if (!response.ok) {
          return;
        }
        const data = await response.json();
        if (data.success) {
          renderDropdown(searchContainer, data.data.results, noResultsMessage);
        }
      } catch (err) {
        if (err.name !== "AbortError") {
          console.warn("[search] AJAX error:", err);
        }
      }
    }, DEBOUNCE_MS);
    searchInput.addEventListener("input", (e) => {
      const query = e.target.value.trim();
      if (query.length < MIN_QUERY_LEN) {
        removeDropdown(searchContainer);
        return;
      }
      doSearch(query);
    });
  });

  // src/scripts/components/breadcrumb_observer.js
  document.addEventListener("DOMContentLoaded", () => {
    const breadcrumbs = document.querySelector(".header-subheader");
    const triggerElement = document.querySelector("h1");
    if (!breadcrumbs || !triggerElement) {
      return;
    }
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          breadcrumbs.classList.remove("breadcrumbs--hidden");
        } else {
          breadcrumbs.classList.add("breadcrumbs--hidden");
        }
      });
    }, {
      // Trigger when any part of the hero section is visible
      threshold: 0,
      // Use viewport as root
      root: null,
      // No margin
      rootMargin: "-300px"
    });
    observer.observe(triggerElement);
  });

  // src/scripts/components/cta_form.js
  var ctaFormContainers = [];
  var getRoutingValue = function() {
    const cookieName = "Meeting_Routing_Key=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieParts = decodedCookie.split(";");
    for (let i = 0; i < cookieParts.length; i++) {
      const cookie = cookieParts[i].trim();
      if (cookie.indexOf(cookieName) === 0) {
        return cookie.substring(cookieName.length, cookie.length);
      }
    }
    return "";
  };
  var applyRoutingKeyToIframe = function(formContainer, routingValue) {
    if (!formContainer || !routingValue) {
      return;
    }
    const iframe = formContainer.querySelector("iframe");
    if (!iframe) {
      return;
    }
    const separator = iframe.src.includes("?") ? "&" : "?";
    iframe.src = iframe.src + separator + "Meeting_Routing_Key=" + encodeURIComponent(routingValue);
  };
  document.addEventListener("DOMContentLoaded", function() {
    const ctaBlocks = document.querySelectorAll(".js-has-cta-form");
    ctaBlocks.forEach(function(block) {
      const formContainer = block.querySelector(".block-cta__form");
      if (!formContainer) return;
      ctaFormContainers.push(formContainer);
      const showButton = block.querySelector(".js-show-form");
      const closeButton = block.querySelector(".js-close-form");
      if (showButton) {
        showButton.addEventListener("click", function(e) {
          e.preventDefault();
          block.classList.add("is-form-visible");
        });
      }
      if (closeButton) {
        closeButton.addEventListener("click", function(e) {
          e.preventDefault();
          block.classList.remove("is-form-visible");
        });
      }
    });
  });
  window.addEventListener("load", function() {
    const routingValue = getRoutingValue();
    if (!routingValue) {
      return;
    }
    ctaFormContainers.forEach(function(formContainer) {
      applyRoutingKeyToIframe(formContainer, routingValue);
    });
  });

  // src/scripts/common.js
  document.addEventListener("DOMContentLoaded", () => {
    initInsightAccordion();
    initPopup();
    initMetadataGroupExpand();
  });
})();
