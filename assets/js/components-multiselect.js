/******/ (() => { // webpackBootstrap
/*!***********************************************!*\
  !*** ./src/scripts/components/multiselect.js ***!
  \***********************************************/
function MultiSelect(_ref) {
  var container = _ref.container,
    label = _ref.label,
    options = _ref.options;
  if (!container) return;
  this.container = container;
  this.labelText = label;
  this.options = options;
  this._render();
  this._attachEvents();
}
MultiSelect.prototype._render = function () {
  var self = this;
  this.originalSelect = this.container.querySelector('select');
  this.showSelectAll = this.container.getAttribute('data-select-all') === 'true';
  var dropdownHtml = '<div class="dropdown">';
  if (this.showSelectAll) {
    dropdownHtml += '<div class="dropdown-item" data-checkbox="selectAll">' + '<div class="checkbox-wrapper">' + '<input type="checkbox" id="selectAll"/>' + '<span class="checkmark"></span>' + '</div>' + '<label>Select All</label>' + '</div>';
  }
  this.options.forEach(function (opt) {
    dropdownHtml += '<div class="dropdown-item" data-checkbox="' + opt.id + '">' + '<div class="checkbox-wrapper">' + '<input type="checkbox" class="option-checkbox" id="' + opt.id + '" />' + '<span class="checkmark"></span>' + '</div>' + '<label>' + opt.name + '</label>' + '</div>';
  });
  dropdownHtml += '</div>';
  var uiHtml = '<div class="select-label">' + '<span>' + this.labelText + '</span>' + '<span style="display:flex; align-items:center;">' + '<span class="count" style="display:none">0</span>' + '<span class="arrow">&#9013;</span>' + '</span>' + '</div>' + dropdownHtml;
  var uiContainer = document.createElement('div');
  uiContainer.className = 'multiselect-ui';
  uiContainer.innerHTML = uiHtml;
  this.container.appendChild(uiContainer);
  this.labelEl = this.container.querySelector('.select-label');
  this.countEl = this.labelEl.querySelector('.count');
  this.dropdownEl = this.container.querySelector('.dropdown');
  this.selectAllEl = this.container.querySelector('#selectAll');
  this.optionEls = Array.from(this.container.querySelectorAll('.option-checkbox'));
  this.itemsEl = Array.from(this.container.querySelectorAll('.dropdown-item'));
};
MultiSelect.prototype._attachEvents = function () {
  var self = this;
  this.labelEl.addEventListener('click', function () {
    self.labelEl.classList.toggle('open');
    self.dropdownEl.classList.toggle('open');
  });
  this.itemsEl.forEach(function (item) {
    item.addEventListener('click', function (e) {
      if (e.target.tagName !== 'INPUT') {
        var cb = item.querySelector('input[type="checkbox"]');
        cb.checked = !cb.checked;
        cb.dispatchEvent(new Event('change'));
      }
    });
  });
  this.optionEls.forEach(function (cb) {
    cb.addEventListener('change', function () {
      if (self.originalSelect) {
        var targetOption = self.originalSelect.querySelector('option[value="' + cb.id + '"]');
        if (targetOption) {
          targetOption.selected = cb.checked;
          self.originalSelect.dispatchEvent(new Event('change', {
            bubbles: true
          }));
        }
      }
      if (self.selectAllEl) {
        self.selectAllEl.checked = self.optionEls.every(function (c) {
          return c.checked;
        });
      }
      self._updateCount();
    });
  });
  if (this.selectAllEl) {
    this.selectAllEl.addEventListener('change', function () {
      var isChecked = self.selectAllEl.checked;
      self.optionEls.forEach(function (c) {
        if (c.checked !== isChecked) {
          c.checked = isChecked;
          c.dispatchEvent(new Event('change'));
        }
      });
    });
  }
  document.addEventListener('click', function (e) {
    if (!self.container.contains(e.target)) {
      self.dropdownEl.classList.remove('open');
    }
  });
};
MultiSelect.prototype._updateCount = function () {
  var selectedCount = this.optionEls.filter(function (c) {
    return c.checked;
  }).length;
  if (selectedCount > 0) {
    this.countEl.textContent = selectedCount;
    this.countEl.style.display = 'inline';
    this.labelEl.classList.add('has-selection');
  } else {
    this.countEl.style.display = 'none';
    this.labelEl.classList.remove('has-selection');
  }
};

// Initialisation
var customMultiselects = document.querySelectorAll('.js-custom-multiselect');
customMultiselects.forEach(function (container) {
  var select = container.querySelector('select');
  if (!select) return;
  Array.from(select.options).forEach(function (opt) {
    return opt.selected = false;
  });
  var label = container.getAttribute('data-label') || 'Select';
  var options = [];
  select.querySelectorAll('option').forEach(function (opt) {
    options.push({
      id: opt.value,
      name: opt.textContent
    });
  });
  select.style.display = 'none';
  new MultiSelect({
    container: container,
    label: label,
    options: options
  });
});
/******/ })()
;