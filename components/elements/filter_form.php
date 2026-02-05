<?php
// Default heading level to 2 if not provided
$heading_level = $heading_level ?? 2;
include_once(__DIR__ . '/../helpers/heading.php');
?>

<link href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../assets/css/components-custom_select.css" />
<link rel="stylesheet" href="../assets/css/components-filter_form.css" />

<div class='block-filter-form'>
  <form class="filter-form" data-post-type="projects">
    <div class='form-item'>
      <input type="text" name="search" class="filter-search" placeholder="Search...">
    </div>
    <div id='locationSelect' class='form-item optional' data-label='Locations'>
      <select name="locations[]" class="filter-select regular-select-clearable">
        <option value="" placeholder disabled selected>Locations</option>
        <option value="canada">Canada</option>
        <option value="yukon">Yukon</option>
      </select>
    </div>

    <div id="industrySelect" class='form-item custom-select optional js-custom-multiselect' data-label='Industries'>
      <select name="industries[]" class="filter-select" multiple="">
        <option value="mining-metals">Mining &amp; Metals</option>
        <option value="other">Other</option>
      </select>
    </div>

    <div id="servicesSelect" class='form-item custom-select optional js-custom-multiselect'
      data-label='Project Services'>
      <select name="project_services[]" class="filter-select" multiple="">
        <option value="assessment-and-evaluations">Assessment and Evaluations</option>
        <option value="water-resources">Water Resources</option>
      </select>
    </div>

    <div id="tags" class='form-item custom-select optional js-custom-multiselect' data-label='Tags'>
      <select name="project_tags[]" class="filter-select" multiple="">
        <option value="ammonia-removal">Ammonia Removal</option>
        <option value="breakpoint-chlorination">Breakpoint Chlorination</option>
        <option value="detailed-design">Detailed Design</option>
      </select>
    </div>
    <div class='form-item'>
      <select name="rank" class="filter-sort regular-select">
        <option value="" placeholder disabled selected>Rank By</option>
        <option value="a-z">Name: A → Z</option>
        <option value="z-a">Name: Z → A</option>
        <option value="new">Newest first</option>
        <option value="old">Oldest first</option>
      </select>
    </div>

  </form>

  <div class='filter__action'>
    <button class='btn btn--text filter-button--open'>
      <img src="../assets/img/filter.svg" alt='open all filters' />
      <span> Filter</span>
      <img src="../assets/img/arrowSmall.svg" alt='open all filters arrow' />
    </button>
    <button class='btn btn--text filter-button--close'>
      <span> Close Filter</span>
      <img src="../assets/img/closeSmall.svg" alt='close all filters' />
    </button>
  </div>
  <?php render_heading('41 search results for "water"', $heading_level, 'heading title title--h1'); ?>
</div>

<script type='text/javascript' src="../assets/js/components-multiselect.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {

  const regularSelects = document.querySelectorAll('.regular-select');
  regularSelects.forEach(function(selectElement) {
    new Choices(selectElement, {
      removeItemButton: true,
      placeholder: true,
      maxItemCount: 5,
      itemSelectText: '',
      searchEnabled: false,
    });
  });

  // const multiSelects = document.querySelectorAll('.multi-select');
  // multiSelects.forEach(function(selectElement) {
  //   new Choices(selectElement, {
  //     removeItemButton: true,
  //     placeholder: true,
  //     maxItemCount: 5,
  //     itemSelectText: '',
  //   });
  // });
  const filterSort = document.querySelectorAll('.regular-select-clearable');
  filterSort.forEach(function(selectElement) {
    new Choices(selectElement, {
      removeItemButton: true,
      shouldSort: false,
      placeholder: true,
      placeholderValue: null,
      maxItemCount: 5,
      itemSelectText: '',
      searchEnabled: false,
    });
  });

  // Open/close filter buttons
  const filterForm = document.querySelector('.block-filter-form');
  const btnOpen = document.querySelector('.filter-button--open');
  const btnClose = document.querySelector('.filter-button--close');

  btnOpen.addEventListener('click', function(e) {
    e.preventDefault();
    filterForm.classList.add('is-open');
  });

  btnClose.addEventListener('click', function(e) {
    e.preventDefault();
    filterForm.classList.remove('is-open');
  });

});
</script>
<script>
const filterForm = document.querySelector('.filter-form');

// Get filter data as an object
const getFormData = () => {
  const formData = new FormData(filterForm);
  const data = {};

  formData.forEach((value, key) => {
    if (key.endsWith('[]')) {
      const cleanKey = key.replace('[]', '');
      if (!data[cleanKey]) {
        data[cleanKey] = formData.getAll(key);
      }
    } else {
      data[key] = value;
    }
  });

  return data;
};

// For every change button
filterForm.addEventListener('change', () => {
  const currentFilters = getFormData();
  console.log('Current filters:', currentFilters);
});

// For Submit (Enter) button
filterForm.addEventListener('submit', (e) => {
  e.preventDefault();
  console.log('Final filters:', getFormData());
});
</script>