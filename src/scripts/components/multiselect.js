function MultiSelect({ container, label, options }) {
  if (!container) return;
  this.container = container;
  this.labelText = label;
  this.options = options;

  this._render();
  this._attachEvents();
  this._syncInitialSelection();
}

MultiSelect.prototype._render = function () {
  var self = this;
  this.originalSelect = this.container.querySelector("select");
  this.showSelectAll =
    this.container.getAttribute("data-select-all") === "true";

  // Build parent-child map
  var topLevel = this.options.filter(function (o) {
    return !o.parentId;
  });
  var childrenMap = {};
  this.options.forEach(function (o) {
    if (o.parentId) {
      if (!childrenMap[o.parentId]) childrenMap[o.parentId] = [];
      childrenMap[o.parentId].push(o);
    }
  });

  var dropdownHtml = `
    <div class="dropdown">
      <div class="dropdown-inner">
  `;

  if (this.showSelectAll) {
    dropdownHtml +=
      '<div class="dropdown-item" data-checkbox="selectAll">' +
      '<div class="checkbox-wrapper">' +
      '<input type="checkbox" id="selectAll"/>' +
      '<span class="checkmark"></span>' +
      "</div>" +
      "<label>Select All</label>" +
      "</div>";
  }

  if (topLevel.length === 0) {
    this.options.forEach(function (opt) {
      dropdownHtml +=
        '<div class="dropdown-item" data-checkbox="' +
        opt.id +
        '">' +
        '<div class="checkbox-wrapper">' +
        '<input type="checkbox" class="option-checkbox" id="' +
        opt.id +
        '" />' +
        '<span class="checkmark"></span>' +
        "</div>" +
        "<label>" +
        opt.name +
        "</label>" +
        "</div>";
    });
  }

  topLevel.forEach(function (opt) {
    var children =
      opt.termId && childrenMap[opt.termId] ? childrenMap[opt.termId] : [];

    if (children.length > 0) {
      // Parent with children: render as expandable group
      dropdownHtml +=
        '<div class="dropdown-group" data-group="' +
        opt.termId +
        '">' +
        '<div class="dropdown-item dropdown-group__parent" data-checkbox="' +
        opt.id +
        '">' +
        '<div class="checkbox-wrapper">' +
        '<input type="checkbox" class="option-checkbox" id="' +
        opt.id +
        '" />' +
        '<span class="checkmark"></span>' +
        "</div>" +
        "<label>" +
        opt.name +
        "</label>" +
        '<span class="dropdown-group__arrow">&#8250;</span>' +
        "</div>" +
        '<div class="dropdown-group__sub">';

      children.forEach(function (child) {
        dropdownHtml +=
          '<div class="dropdown-item" data-checkbox="' +
          child.id +
          '">' +
          '<div class="checkbox-wrapper">' +
          '<input type="checkbox" class="option-checkbox" id="' +
          child.id +
          '" />' +
          '<span class="checkmark"></span>' +
          "</div>" +
          "<label>" +
          child.name +
          "</label>" +
          "</div>";
      });

      dropdownHtml += "</div></div>";
    } else {
      // Top-level term with no children
      dropdownHtml +=
        '<div class="dropdown-item" data-checkbox="' +
        opt.id +
        '">' +
        '<div class="checkbox-wrapper">' +
        '<input type="checkbox" class="option-checkbox" id="' +
        opt.id +
        '" />' +
        '<span class="checkmark"></span>' +
        "</div>" +
        "<label>" +
        opt.name +
        "</label>" +
        "</div>";
    }
  });

  dropdownHtml += `
      </div>
    </div>
  `;

  var uiHtml =
    '<div class="select-label">' +
    "<span>" +
    this.labelText +
    "</span>" +
    '<span style="display:flex; align-items:center;">' +
    '<span class="count" style="display:none">0</span>' +
    '<span class="arrow">&#9013;</span>' +
    "</span>" +
    "</div>" +
    dropdownHtml;

  const uiContainer = document.createElement("div");
  uiContainer.className = "multiselect-ui";
  uiContainer.innerHTML = uiHtml;
  this.container.appendChild(uiContainer);

  this.labelEl = this.container.querySelector(".select-label");
  this.countEl = this.labelEl.querySelector(".count");
  this.dropdownEl = this.container.querySelector(".dropdown");
  this.selectAllEl = this.container.querySelector("#selectAll");
  this.optionEls = Array.from(
    this.container.querySelectorAll(".option-checkbox"),
  );
  this.itemsEl = Array.from(this.container.querySelectorAll(".dropdown-item"));
};

MultiSelect.prototype._syncInitialSelection = function () {
  var self = this;

  this.optionEls.forEach(function (cb) {
    var targetOption = self.originalSelect.querySelector(
      'option[value="' + cb.id + '"]',
    );
    cb.checked = !!targetOption?.selected;
  });

  if (this.selectAllEl) {
    this.selectAllEl.checked =
      this.optionEls.length > 0 && this.optionEls.every((c) => c.checked);
  }

  this.optionEls.forEach(function (cb) {
    self._updateParentState(cb);
  });

  this._updateCount();
};

MultiSelect.prototype._attachEvents = function () {
  var self = this;

  // Toggle dropdown
  this.labelEl.addEventListener("click", function () {
    self.labelEl.classList.toggle("open");
    self.dropdownEl.classList.toggle("open");
  });

  // Toggle checkbox by clicking on item
  this.itemsEl.forEach(function (item) {
    item.addEventListener("click", function (e) {
      if (e.target.tagName !== "INPUT") {
        var cb = item.querySelector('input[type="checkbox"]');
        cb.checked = !cb.checked;
        cb.dispatchEvent(new Event("change"));
      }
    });
  });

  // Option change handler
  this.optionEls.forEach(function (cb) {
    cb.addEventListener("change", function () {
      // Update original select
      if (self.originalSelect) {
        var targetOption = self.originalSelect.querySelector(
          'option[value="' + cb.id + '"]',
        );
        if (targetOption) {
          targetOption.selected = cb.checked;
          self.originalSelect.dispatchEvent(
            new Event("change", { bubbles: true }),
          );
        }
      }

      // Update Select All
      if (self.selectAllEl) {
        self.selectAllEl.checked = self.optionEls.every((c) => c.checked);
      }

      self._updateCount();

      // Update parent group state if child changed
      self._updateParentState(cb);
    });
  });

  // Select All handler
  if (this.selectAllEl) {
    this.selectAllEl.addEventListener("change", function () {
      var isChecked = self.selectAllEl.checked;
      self.optionEls.forEach(function (c) {
        if (c.checked !== isChecked) {
          c.checked = isChecked;
          c.dispatchEvent(new Event("change"));
        }
      });
    });
  }

  // Sub-menu toggle on arrow click (for touch/mobile)
  var groupEls = Array.from(this.container.querySelectorAll(".dropdown-group"));
  groupEls.forEach(function (group) {
    var arrow = group.querySelector(".dropdown-group__arrow");
    var parentCheckbox = group.querySelector(
      ".dropdown-group__parent input[type='checkbox']",
    );

    if (arrow) {
      arrow.addEventListener("click", function (e) {
        e.stopPropagation();
        group.classList.toggle("is-open");
      });
    }

    // Parent checkbox controls all children
    if (parentCheckbox) {
      parentCheckbox.addEventListener("change", function () {
        var childCheckboxes = Array.from(
          group.querySelectorAll(".dropdown-group__sub .option-checkbox"),
        );
        childCheckboxes.forEach((c) => {
          c.checked = parentCheckbox.checked;
          c.dispatchEvent(new Event("change"));
        });
      });
    }
  });

  // Close dropdown on outside click
  document.addEventListener("click", function (e) {
    if (!self.container.contains(e.target)) {
      self.dropdownEl.classList.remove("open");
    }
  });
};

MultiSelect.prototype._updateCount = function () {
  var selectedCount = this.optionEls.filter((c) => c.checked).length;
  if (selectedCount > 0) {
    this.countEl.textContent = selectedCount;
    this.countEl.style.display = "inline";
    this.labelEl.classList.add("has-selection");
  } else {
    this.countEl.style.display = "none";
    this.labelEl.classList.remove("has-selection");
  }
};

// New method: update parent checkbox state
MultiSelect.prototype._updateParentState = function (changedCheckbox) {
  var group = changedCheckbox.closest(".dropdown-group");
  if (!group) return;

  var parentCheckbox = group.querySelector(
    ".dropdown-group__parent input[type='checkbox']",
  );
  var childCheckboxes = Array.from(
    group.querySelectorAll(".dropdown-group__sub .option-checkbox"),
  );

  if (!parentCheckbox || childCheckboxes.length === 0) return;

  var checkedCount = childCheckboxes.filter((c) => c.checked).length;

  if (checkedCount === 0) {
    parentCheckbox.checked = false;
    parentCheckbox.indeterminate = false;
  } else if (checkedCount === childCheckboxes.length) {
    parentCheckbox.checked = true;
    parentCheckbox.indeterminate = false;
  } else {
    parentCheckbox.checked = false;
    parentCheckbox.indeterminate = true; // intermediate state
  }
};

// Initialisation
const customMultiselects = document.querySelectorAll(".js-custom-multiselect");

customMultiselects.forEach(function (container) {
  const select = container.querySelector("select");
  if (!select) return;

  const label = container.getAttribute("data-label") || "Select";
  const options = [];

  select.querySelectorAll("option").forEach(function (opt) {
    options.push({
      id: opt.value,
      name: opt.textContent.trim(),
      termId: opt.dataset.termId,
      parentId: opt.dataset.parentId || null,
    });
  });

  select.style.display = "none";

  new MultiSelect({
    container: container,
    label: label,
    options: options,
  });
});
