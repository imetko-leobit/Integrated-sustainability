<link href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../assets/css/components-custom_select.css" />
<link rel="stylesheet" href="../assets/css/components-search_form.css" />

<div class='search-results-form'>
  <form class="search-form">
    <input type="text" name="search" class="filter-search form-item" placeholder="Search...">

    <div id='locationSelect' class='custom-select js-custom-multiselect form-item' data-label='Type'
      data-select-all="true">
      <select name="locations[]" class="filter-select" multiple="">
        <option value="canada">Canada</option>
        <option value="yukon">Yukon</option>
      </select>
    </div>

    <div id="industrySelect" class='custom-select js-custom-multiselect form-item' data-label='Industries'>
      <select name="industries[]" class="filter-select" multiple="">
        <option value="mining-metals">Mining &amp; Metals</option>
        <option value="other">Other</option>
      </select>
    </div>

    <div id="servicesSelect" class='custom-select js-custom-multiselect form-item' data-label='Services'>
      <select name="project_services[]" class="filter-select" multiple="">
        <option value="assessment-and-evaluations">Assessment and Evaluations</option>
        <option value="water-resources">Water Resources</option>
      </select>
    </div>

    <div id="tags" class='form-item custom-select js-custom-multiselect' data-label='Tags'>
      <select name="project_tags[]" class="filter-select" multiple="">
        <option value="ammonia-removal">Ammonia Removal</option>
        <option value="breakpoint-chlorination">Breakpoint Chlorination</option>
        <option value="detailed-design">Detailed Design</option>
      </select>
    </div>
    <div class='form-item'>
      <input type="text" placeholder="Date" name="date" class="date-input" onfocus="(this.type='date')"
        onblur="if(!this.value)this.type='text'">
    </div>
  </form>
</div>

<script type='text/javascript' src="../assets/js/components-multiselect.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
const searchForm = document.querySelector('.search-results-form .search-form');

// Get filter data as an object
const getFormData = () => {
  const formData = new FormData(searchForm);
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
searchForm.addEventListener('change', () => {
  const currentFilters = getFormData();
  console.log('Current filters:', currentFilters);
});

// For Submit (Enter) button
searchForm.addEventListener('submit', (e) => {
  e.preventDefault();
  console.log('Final filters:', getFormData());
});
</script>