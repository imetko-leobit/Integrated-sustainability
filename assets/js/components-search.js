/******/ (() => { // webpackBootstrap
/*!******************************************!*\
  !*** ./src/scripts/components/search.js ***!
  \******************************************/
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; var r = _regenerator(), e = r.m(_regeneratorRuntime), t = (Object.getPrototypeOf ? Object.getPrototypeOf(e) : e.__proto__).constructor; function n(r) { var e = "function" == typeof r && r.constructor; return !!e && (e === t || "GeneratorFunction" === (e.displayName || e.name)); } var o = { "throw": 1, "return": 2, "break": 3, "continue": 3 }; function a(r) { var e, t; return function (n) { e || (e = { stop: function stop() { return t(n.a, 2); }, "catch": function _catch() { return n.v; }, abrupt: function abrupt(r, e) { return t(n.a, o[r], e); }, delegateYield: function delegateYield(r, o, a) { return e.resultName = o, t(n.d, _regeneratorValues(r), a); }, finish: function finish(r) { return t(n.f, r); } }, t = function t(r, _t, o) { n.p = e.prev, n.n = e.next; try { return r(_t, o); } finally { e.next = n.n; } }), e.resultName && (e[e.resultName] = n.v, e.resultName = void 0), e.sent = n.v, e.next = n.n; try { return r.call(this, e); } finally { n.p = e.prev, n.n = e.next; } }; } return (_regeneratorRuntime = function _regeneratorRuntime() { return { wrap: function wrap(e, t, n, o) { return r.w(a(e), t, n, o && o.reverse()); }, isGeneratorFunction: n, mark: r.m, awrap: function awrap(r, e) { return new _OverloadYield(r, e); }, AsyncIterator: _regeneratorAsyncIterator, async: function async(r, e, t, o, u) { return (n(e) ? _regeneratorAsyncGen : _regeneratorAsync)(a(r), e, t, o, u); }, keys: _regeneratorKeys, values: _regeneratorValues }; })(); }
function _regeneratorValues(e) { if (null != e) { var t = e["function" == typeof Symbol && Symbol.iterator || "@@iterator"], r = 0; if (t) return t.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) return { next: function next() { return e && r >= e.length && (e = void 0), { value: e && e[r++], done: !e }; } }; } throw new TypeError(_typeof(e) + " is not iterable"); }
function _regeneratorKeys(e) { var n = Object(e), r = []; for (var t in n) r.unshift(t); return function e() { for (; r.length;) if ((t = r.pop()) in n) return e.value = t, e.done = !1, e; return e.done = !0, e; }; }
function _regeneratorAsync(n, e, r, t, o) { var a = _regeneratorAsyncGen(n, e, r, t, o); return a.next().then(function (n) { return n.done ? n.value : a.next(); }); }
function _regeneratorAsyncGen(r, e, t, o, n) { return new _regeneratorAsyncIterator(_regenerator().w(r, e, t, o), n || Promise); }
function _regeneratorAsyncIterator(t, e) { function n(r, o, i, f) { try { var c = t[r](o), u = c.value; return u instanceof _OverloadYield ? e.resolve(u.v).then(function (t) { n("next", t, i, f); }, function (t) { n("throw", t, i, f); }) : e.resolve(u).then(function (t) { c.value = t, i(c); }, function (t) { return n("throw", t, i, f); }); } catch (t) { f(t); } } var r; this.next || (_regeneratorDefine2(_regeneratorAsyncIterator.prototype), _regeneratorDefine2(_regeneratorAsyncIterator.prototype, "function" == typeof Symbol && Symbol.asyncIterator || "@asyncIterator", function () { return this; })), _regeneratorDefine2(this, "_invoke", function (t, o, i) { function f() { return new e(function (e, r) { n(t, i, e, r); }); } return r = r ? r.then(f, f) : f(); }, !0); }
function _regenerator() { /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/babel/babel/blob/main/packages/babel-helpers/LICENSE */ var e, t, r = "function" == typeof Symbol ? Symbol : {}, n = r.iterator || "@@iterator", o = r.toStringTag || "@@toStringTag"; function i(r, n, o, i) { var c = n && n.prototype instanceof Generator ? n : Generator, u = Object.create(c.prototype); return _regeneratorDefine2(u, "_invoke", function (r, n, o) { var i, c, u, f = 0, p = o || [], y = !1, G = { p: 0, n: 0, v: e, a: d, f: d.bind(e, 4), d: function d(t, r) { return i = t, c = 0, u = e, G.n = r, a; } }; function d(r, n) { for (c = r, u = n, t = 0; !y && f && !o && t < p.length; t++) { var o, i = p[t], d = G.p, l = i[2]; r > 3 ? (o = l === n) && (u = i[(c = i[4]) ? 5 : (c = 3, 3)], i[4] = i[5] = e) : i[0] <= d && ((o = r < 2 && d < i[1]) ? (c = 0, G.v = n, G.n = i[1]) : d < l && (o = r < 3 || i[0] > n || n > l) && (i[4] = r, i[5] = n, G.n = l, c = 0)); } if (o || r > 1) return a; throw y = !0, n; } return function (o, p, l) { if (f > 1) throw TypeError("Generator is already running"); for (y && 1 === p && d(p, l), c = p, u = l; (t = c < 2 ? e : u) || !y;) { i || (c ? c < 3 ? (c > 1 && (G.n = -1), d(c, u)) : G.n = u : G.v = u); try { if (f = 2, i) { if (c || (o = "next"), t = i[o]) { if (!(t = t.call(i, u))) throw TypeError("iterator result is not an object"); if (!t.done) return t; u = t.value, c < 2 && (c = 0); } else 1 === c && (t = i["return"]) && t.call(i), c < 2 && (u = TypeError("The iterator does not provide a '" + o + "' method"), c = 1); i = e; } else if ((t = (y = G.n < 0) ? u : r.call(n, G)) !== a) break; } catch (t) { i = e, c = 1, u = t; } finally { f = 1; } } return { value: t, done: y }; }; }(r, o, i), !0), u; } var a = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} t = Object.getPrototypeOf; var c = [][n] ? t(t([][n]())) : (_regeneratorDefine2(t = {}, n, function () { return this; }), t), u = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(c); function f(e) { return Object.setPrototypeOf ? Object.setPrototypeOf(e, GeneratorFunctionPrototype) : (e.__proto__ = GeneratorFunctionPrototype, _regeneratorDefine2(e, o, "GeneratorFunction")), e.prototype = Object.create(u), e; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, _regeneratorDefine2(u, "constructor", GeneratorFunctionPrototype), _regeneratorDefine2(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = "GeneratorFunction", _regeneratorDefine2(GeneratorFunctionPrototype, o, "GeneratorFunction"), _regeneratorDefine2(u), _regeneratorDefine2(u, o, "Generator"), _regeneratorDefine2(u, n, function () { return this; }), _regeneratorDefine2(u, "toString", function () { return "[object Generator]"; }), (_regenerator = function _regenerator() { return { w: i, m: f }; })(); }
function _regeneratorDefine2(e, r, n, t) { var i = Object.defineProperty; try { i({}, "", {}); } catch (e) { i = 0; } _regeneratorDefine2 = function _regeneratorDefine(e, r, n, t) { function o(r, n) { _regeneratorDefine2(e, r, function (e) { return this._invoke(r, n, e); }); } r ? i ? i(e, r, { value: n, enumerable: !t, configurable: !t, writable: !t }) : e[r] = n : (o("next", 0), o("throw", 1), o("return", 2)); }, _regeneratorDefine2(e, r, n, t); }
function _OverloadYield(e, d) { this.v = e, this.k = d; }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
function _toConsumableArray(r) { return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _iterableToArray(r) { if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r); }
function _arrayWithoutHoles(r) { if (Array.isArray(r)) return _arrayLikeToArray(r); }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
/** @module search */

var CLASS_ACTIVE = 'is-active';
var DROPDOWN_CLASS = 'search-dropdown';
var MIN_QUERY_LEN = 3;
var DEBOUNCE_MS = 350;

/** Display labels for each searchable post type. */
var POST_TYPE_LABELS = {
  services: 'services',
  applications: 'applications',
  industries: 'industries',
  equipment: 'equipment',
  projects: 'projects',
  insight: 'insights'
};

/**
 * Returns a debounced version of fn that delays execution by `wait` ms.
 * @param {Function} fn
 * @param {number}   wait
 * @returns {Function}
 */
function debounce(fn, wait) {
  var timer;
  return function () {
    var _this = this;
    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }
    clearTimeout(timer);
    timer = setTimeout(function () {
      return fn.apply(_this, args);
    }, wait);
  };
}

/**
 * Build HTML markup for one search result row.
 * @param {{ title: string, url: string, thumbnail: string, breadcrumbs: string }} item
 * @returns {string}
 */
function buildResultItem(item) {
  var thumb = item.thumbnail ? "<div class=\"search-result__thumb\">".concat(item.thumbnail, "</div>") : "<div class=\"search-result__thumb search-result__thumb--empty\"></div>";
  return "<a href=\"".concat(item.url, "\" class=\"search-result\">\n    ").concat(thumb, "\n    <div class=\"search-result__body\">\n      ").concat(item.breadcrumbs, "\n      <span class=\"search-result__title\">").concat(item.title, "</span>\n    </div>\n  </a>");
}

/**
 * Render or replace the search dropdown inside the given container.
 * @param {HTMLElement} container         .search-container element
 * @param {Object}      results           Grouped results: { post_type: [items] }
 * @param {string}      noResultsMessage
 */
function renderDropdown(container, results, noResultsMessage) {
  var _container$dataset$al;
  removeDropdown(container);
  var postTypes = Object.keys(results);
  var hasResults = postTypes.length > 0;
  var label = (_container$dataset$al = container.dataset.allTabLabel) !== null && _container$dataset$al !== void 0 ? _container$dataset$al : 'All';

  // Tabs: always include "All", then only post types with results.
  var tabsHtml = ["<button class=\"search-dropdown__tab is-active\" data-tab=\"all\" type=\"button\">".concat(label, "</button>")].concat(_toConsumableArray(postTypes.map(function (pt) {
    var _POST_TYPE_LABELS$pt;
    var label = (_POST_TYPE_LABELS$pt = POST_TYPE_LABELS[pt]) !== null && _POST_TYPE_LABELS$pt !== void 0 ? _POST_TYPE_LABELS$pt : pt;
    return "<button class=\"search-dropdown__tab\" data-tab=\"".concat(pt, "\" type=\"button\">").concat(label, "</button>");
  }))).join('');

  // Panels.
  var panelsHtml = '';
  if (hasResults) {
    var allItems = postTypes.flatMap(function (pt) {
      return results[pt];
    });
    var buildPanel = function buildPanel(items, tabKey, isActive) {
      return "<div class=\"search-dropdown__panel".concat(isActive ? ' is-active' : '', "\" data-panel=\"").concat(tabKey, "\">\n        <div class=\"search-dropdown__list\">").concat(items.map(buildResultItem).join(''), "</div>\n      </div>");
    };
    panelsHtml += buildPanel(allItems, 'all', true);
    postTypes.forEach(function (pt) {
      panelsHtml += buildPanel(results[pt], pt, false);
    });
  } else {
    panelsHtml = "<div class=\"search-dropdown__panel is-active\" data-panel=\"all\">\n      <p class=\"search-dropdown__no-results\">".concat(noResultsMessage, "</p>\n    </div>");
  }
  var dropdown = document.createElement('div');
  dropdown.className = DROPDOWN_CLASS;
  dropdown.setAttribute('role', 'listbox');
  dropdown.innerHTML = "<div class=\"search-dropdown__tabs\" role=\"tablist\">".concat(tabsHtml, "</div>") + "<div class=\"search-dropdown__content\">".concat(panelsHtml, "</div>");
  container.appendChild(dropdown);

  // Tab switching.
  dropdown.querySelectorAll('.search-dropdown__tab').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var _dropdown$querySelect;
      dropdown.querySelectorAll('.search-dropdown__tab').forEach(function (b) {
        return b.classList.remove('is-active');
      });
      dropdown.querySelectorAll('.search-dropdown__panel').forEach(function (p) {
        return p.classList.remove('is-active');
      });
      btn.classList.add('is-active');
      (_dropdown$querySelect = dropdown.querySelector("[data-panel=\"".concat(btn.dataset.tab, "\"]"))) === null || _dropdown$querySelect === void 0 || _dropdown$querySelect.classList.add('is-active');
    });
  });
}

/**
 * Remove the dropdown from the given container if present.
 * @param {HTMLElement} container
 */
function removeDropdown(container) {
  var _container$querySelec;
  (_container$querySelec = container.querySelector(".".concat(DROPDOWN_CLASS))) === null || _container$querySelec === void 0 || _container$querySelec.remove();
}
document.addEventListener('DOMContentLoaded', function () {
  var _searchContainer$data;
  var searchContainer = document.getElementById('header-search-container');
  var searchToggle = searchContainer === null || searchContainer === void 0 ? void 0 : searchContainer.querySelector('.search-toggle');
  var searchClose = searchContainer === null || searchContainer === void 0 ? void 0 : searchContainer.querySelector('.search-close');
  var searchInput = document.getElementById('header-search-input');
  if (!searchContainer || !searchInput) {
    return;
  }
  var noResultsMessage = (_searchContainer$data = searchContainer.dataset.noResults) !== null && _searchContainer$data !== void 0 ? _searchContainer$data : 'No posts found';

  // ── Toggle open / close ────────────────────────────────────────────────────

  function toggleSearch(e) {
    e.preventDefault();
    var isActive = searchContainer.classList.toggle(CLASS_ACTIVE);
    searchToggle === null || searchToggle === void 0 || searchToggle.setAttribute('aria-expanded', String(isActive));
    if (isActive) {
      searchInput.focus();
    } else {
      searchInput.value = '';
      removeDropdown(searchContainer);
    }
  }
  searchToggle === null || searchToggle === void 0 || searchToggle.addEventListener('click', toggleSearch);
  searchClose === null || searchClose === void 0 || searchClose.addEventListener('click', toggleSearch);
  document.addEventListener('click', function (e) {
    if (searchContainer.classList.contains(CLASS_ACTIVE) && window.innerWidth > 991 && !searchContainer.contains(e.target)) {
      searchContainer.classList.remove(CLASS_ACTIVE);
      searchToggle === null || searchToggle === void 0 || searchToggle.setAttribute('aria-expanded', 'false');
      searchInput.value = '';
      removeDropdown(searchContainer);
    }
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && searchContainer.classList.contains(CLASS_ACTIVE)) {
      toggleSearch(e);
    }
  });

  // ── AJAX live search ───────────────────────────────────────────────────────

  /** @type {AbortController|null} */
  var currentRequest = null;
  var doSearch = debounce(/*#__PURE__*/function () {
    var _ref = _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee(query) {
      var _currentRequest, _window$app_vars$nonc, _window$app_vars;
      var controller, body, _window$app_vars$ajax, _window$app_vars2, response, data;
      return _regeneratorRuntime().wrap(function _callee$(_context) {
        while (1) switch (_context.prev = _context.next) {
          case 0:
            // Cancel the previous in-flight request.
            (_currentRequest = currentRequest) === null || _currentRequest === void 0 || _currentRequest.abort();
            controller = new AbortController();
            currentRequest = controller;
            body = new URLSearchParams({
              action: 'mat_header_search',
              query: query,
              _nonce: (_window$app_vars$nonc = (_window$app_vars = window.app_vars) === null || _window$app_vars === void 0 ? void 0 : _window$app_vars.nonce) !== null && _window$app_vars$nonc !== void 0 ? _window$app_vars$nonc : ''
            });
            _context.prev = 4;
            _context.next = 7;
            return fetch((_window$app_vars$ajax = (_window$app_vars2 = window.app_vars) === null || _window$app_vars2 === void 0 ? void 0 : _window$app_vars2.ajaxurl) !== null && _window$app_vars$ajax !== void 0 ? _window$app_vars$ajax : '/wp-admin/admin-ajax.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
              },
              body: body.toString(),
              signal: controller.signal
            });
          case 7:
            response = _context.sent;
            currentRequest = null;
            if (response.ok) {
              _context.next = 11;
              break;
            }
            return _context.abrupt("return");
          case 11:
            _context.next = 13;
            return response.json();
          case 13:
            data = _context.sent;
            if (data.success) {
              renderDropdown(searchContainer, data.data.results, noResultsMessage);
            }
            _context.next = 20;
            break;
          case 17:
            _context.prev = 17;
            _context.t0 = _context["catch"](4);
            if (_context.t0.name !== 'AbortError') {
              console.warn('[search] AJAX error:', _context.t0);
            }
          case 20:
          case "end":
            return _context.stop();
        }
      }, _callee, null, [[4, 17]]);
    }));
    return function (_x) {
      return _ref.apply(this, arguments);
    };
  }(), DEBOUNCE_MS);
  searchInput.addEventListener('input', function (e) {
    var query = e.target.value.trim();
    if (query.length < MIN_QUERY_LEN) {
      removeDropdown(searchContainer);
      return;
    }
    doSearch(query);
  });
});
/******/ })()
;