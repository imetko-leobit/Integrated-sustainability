<?php
/**
 * FloatingFilterMenu component
 *
 * Renders a floating filter trigger button on the left side of the viewport
 * and a slide-in filter panel whose level-navigation behaviour mirrors the
 * existing main-menu patterns (expandable groups, arrow indicators, back
 * button, checkboxes before each value).
 *
 * Usage: include this file inside any section that needs floating filters.
 * A hidden .filter-form is also rendered so the existing FilterHandler.js /
 * InfiniteScroll.js modules continue to work without modification.
 */
?>

<link rel="stylesheet" href="../assets/css/components-floating_filter_menu.css" />

<!-- Hidden filter form kept for JS compatibility with FilterHandler.js -->
<form class="filter-form" data-post-type="projects" style="display:none;" aria-hidden="true">
  <select name="locations[]" multiple="">
    <option value="canada">Canada</option>
    <option value="yukon">Yukon</option>
  </select>
  <select name="industries[]" multiple="">
    <option value="mining-metals">Mining &amp; Metals</option>
    <option value="other">Other</option>
  </select>
  <select name="project_services[]" multiple="">
    <option value="assessment-and-evaluations">Assessment and Evaluations</option>
    <option value="water-resources">Water Resources</option>
  </select>
  <select name="project_tags[]" multiple="">
    <option value="ammonia-removal">Ammonia Removal</option>
    <option value="breakpoint-chlorination">Breakpoint Chlorination</option>
    <option value="detailed-design">Detailed Design</option>
    <option value="engineering">Engineering</option>
    <option value="feasibility-studies">Feasibility Studies</option>
    <option value="pilot-testing">Pilot Testing</option>
    <option value="process-optimization">Process Optimization</option>
    <option value="processes">Processes</option>
    <option value="wastewater-treatment">Wastewater Treatment</option>
    <option value="water-treatment">Water Treatment</option>
    <option value="water-resources">Water Resources</option>
    <option value="other">Other</option>
  </select>
  <select name="rank">
    <option value="a-z">Name: A → Z</option>
    <option value="z-a">Name: Z → A</option>
    <option value="new">Newest first</option>
    <option value="old">Oldest first</option>
  </select>
</form>

<!-- ─── Floating trigger button ──────────────────────────────────────────── -->
<button
  class="floating-filter-btn"
  aria-label="Open filters"
  aria-expanded="false"
  aria-controls="floating-filter-panel"
>
  <!-- Filter icon -->
  <span class="floating-filter-btn__icon" aria-hidden="true">
    <svg viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd"
        d="M3 5a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1zm3 5a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1zm2 5a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1z"/>
    </svg>
  </span>
  <span class="floating-filter-btn__label">Filters</span>
  <span class="floating-filter-btn__badge" aria-live="polite">0</span>
</button>

<!-- ─── Filter panel ─────────────────────────────────────────────────────── -->
<div
  id="floating-filter-panel"
  class="floating-filter-panel"
  role="dialog"
  aria-modal="true"
  aria-label="Filter panel"
>
  <!-- Backdrop -->
  <div class="floating-filter-panel__backdrop" aria-hidden="true"></div>

  <!-- Drawer -->
  <div class="floating-filter-panel__drawer" role="document">
    <div class="floating-filter-panel__drawer-inner">

      <!-- Panel content (two-level menu) -->
      <div class="floating-filter-panel__content" data-current-level="0">

        <!-- ── Level 0 – filter group list ─────────────────────────────── -->
        <div id="filter-level-0" class="filter-menu__col filter-menu__col--level-0 active-level" data-level="0">
          <h5 class="main-menu__title">Lifecycle Accountability for Industrial Water Assets</h5>

          <ul class="filter-menu__list" role="list">

            <!-- Locations -->
            <li
              class="filter-nav-item"
              data-target="filter-level-locations"
              role="listitem"
              tabindex="0"
              aria-haspopup="true"
            >
              <span class="filter-nav-item__label">
                Locations
                <span class="filter-nav-item__count" aria-live="polite"></span>
              </span>
              <span class="filter-nav-item__arrow" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="currentColor">
                  <path d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/>
                </svg>
              </span>
            </li>

            <!-- Industries -->
            <li
              class="filter-nav-item"
              data-target="filter-level-industries"
              role="listitem"
              tabindex="0"
              aria-haspopup="true"
            >
              <span class="filter-nav-item__label">
                Industries
                <span class="filter-nav-item__count" aria-live="polite"></span>
              </span>
              <span class="filter-nav-item__arrow" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="currentColor">
                  <path d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/>
                </svg>
              </span>
            </li>

            <!-- Project Services -->
            <li
              class="filter-nav-item"
              data-target="filter-level-services"
              role="listitem"
              tabindex="0"
              aria-haspopup="true"
            >
              <span class="filter-nav-item__label">
                Project Services
                <span class="filter-nav-item__count" aria-live="polite"></span>
              </span>
              <span class="filter-nav-item__arrow" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="currentColor">
                  <path d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/>
                </svg>
              </span>
            </li>

            <!-- Tags -->
            <li
              class="filter-nav-item"
              data-target="filter-level-tags"
              role="listitem"
              tabindex="0"
              aria-haspopup="true"
            >
              <span class="filter-nav-item__label">
                Tags
                <span class="filter-nav-item__count" aria-live="polite"></span>
              </span>
              <span class="filter-nav-item__arrow" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="currentColor">
                  <path d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/>
                </svg>
              </span>
            </li>

            <!-- Rank By -->
            <li
              class="filter-nav-item"
              data-target="filter-level-rank"
              role="listitem"
              tabindex="0"
              aria-haspopup="true"
            >
              <span class="filter-nav-item__label">
                Rank By
                <span class="filter-nav-item__count" aria-live="polite"></span>
              </span>
              <span class="filter-nav-item__arrow" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="currentColor">
                  <path d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/>
                </svg>
              </span>
            </li>

          </ul>
        </div><!-- /filter-level-0 -->

        <!-- ── Level 1 – Locations ──────────────────────────────────────── -->
        <div
          id="filter-level-locations"
          class="filter-menu__col filter-menu__col--level-1"
          data-level="1"
          data-filter-key="locations"
        >
          <button
            class="filter-submenu-header"
            data-prev-target="filter-level-0"
            aria-label="Go back to filter groups"
          >
            <span class="filter-submenu-header__back" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                <path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/>
              </svg>
            </span>
            <h3 class="filter-submenu-header__title">Locations</h3>
          </button>
          <ul class="filter-options-list" role="list">
            <li class="filter-option-item" role="listitem">
              <input
                type="checkbox"
                id="filter-loc-canada"
                name="locations[]"
                value="canada"
                class="filter-option-item__checkbox"
              />
              <label class="filter-option-item__label" for="filter-loc-canada">Canada</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input
                type="checkbox"
                id="filter-loc-yukon"
                name="locations[]"
                value="yukon"
                class="filter-option-item__checkbox"
              />
              <label class="filter-option-item__label" for="filter-loc-yukon">Yukon</label>
            </li>
          </ul>
        </div><!-- /filter-level-locations -->

        <!-- ── Level 1 – Industries ─────────────────────────────────────── -->
        <div
          id="filter-level-industries"
          class="filter-menu__col filter-menu__col--level-1"
          data-level="1"
          data-filter-key="industries"
        >
          <button
            class="filter-submenu-header"
            data-prev-target="filter-level-0"
            aria-label="Go back to filter groups"
          >
            <span class="filter-submenu-header__back" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                <path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/>
              </svg>
            </span>
            <h3 class="filter-submenu-header__title">Industries</h3>
          </button>
          <ul class="filter-options-list" role="list">
            <li class="filter-option-item" role="listitem">
              <input
                type="checkbox"
                id="filter-ind-mining"
                name="industries[]"
                value="mining-metals"
                class="filter-option-item__checkbox"
              />
              <label class="filter-option-item__label" for="filter-ind-mining">Mining &amp; Metals</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input
                type="checkbox"
                id="filter-ind-other"
                name="industries[]"
                value="other"
                class="filter-option-item__checkbox"
              />
              <label class="filter-option-item__label" for="filter-ind-other">Other</label>
            </li>
          </ul>
        </div><!-- /filter-level-industries -->

        <!-- ── Level 1 – Project Services ──────────────────────────────── -->
        <div
          id="filter-level-services"
          class="filter-menu__col filter-menu__col--level-1"
          data-level="1"
          data-filter-key="project_services"
        >
          <button
            class="filter-submenu-header"
            data-prev-target="filter-level-0"
            aria-label="Go back to filter groups"
          >
            <span class="filter-submenu-header__back" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                <path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/>
              </svg>
            </span>
            <h3 class="filter-submenu-header__title">Project Services</h3>
          </button>
          <ul class="filter-options-list" role="list">
            <li class="filter-option-item" role="listitem">
              <input
                type="checkbox"
                id="filter-svc-assessment"
                name="project_services[]"
                value="assessment-and-evaluations"
                class="filter-option-item__checkbox"
              />
              <label class="filter-option-item__label" for="filter-svc-assessment">Assessment and Evaluations</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input
                type="checkbox"
                id="filter-svc-water"
                name="project_services[]"
                value="water-resources"
                class="filter-option-item__checkbox"
              />
              <label class="filter-option-item__label" for="filter-svc-water">Water Resources</label>
            </li>
          </ul>
        </div><!-- /filter-level-services -->

        <!-- ── Level 1 – Tags ───────────────────────────────────────────── -->
        <div
          id="filter-level-tags"
          class="filter-menu__col filter-menu__col--level-1"
          data-level="1"
          data-filter-key="project_tags"
        >
          <button
            class="filter-submenu-header"
            data-prev-target="filter-level-0"
            aria-label="Go back to filter groups"
          >
            <span class="filter-submenu-header__back" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                <path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/>
              </svg>
            </span>
            <h3 class="filter-submenu-header__title">Tags</h3>
          </button>
          <ul class="filter-options-list" role="list">
            <li class="filter-option-item" role="listitem">
              <input type="checkbox" id="filter-tag-ammonia" name="project_tags[]" value="ammonia-removal" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-tag-ammonia">Ammonia Removal</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input type="checkbox" id="filter-tag-chlorination" name="project_tags[]" value="breakpoint-chlorination" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-tag-chlorination">Breakpoint Chlorination</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input type="checkbox" id="filter-tag-design" name="project_tags[]" value="detailed-design" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-tag-design">Detailed Design</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input type="checkbox" id="filter-tag-engineering" name="project_tags[]" value="engineering" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-tag-engineering">Engineering</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input type="checkbox" id="filter-tag-feasibility" name="project_tags[]" value="feasibility-studies" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-tag-feasibility">Feasibility Studies</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input type="checkbox" id="filter-tag-pilot" name="project_tags[]" value="pilot-testing" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-tag-pilot">Pilot Testing</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input type="checkbox" id="filter-tag-optimization" name="project_tags[]" value="process-optimization" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-tag-optimization">Process Optimization</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input type="checkbox" id="filter-tag-processes" name="project_tags[]" value="processes" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-tag-processes">Processes</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input type="checkbox" id="filter-tag-wastewater" name="project_tags[]" value="wastewater-treatment" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-tag-wastewater">Wastewater Treatment</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input type="checkbox" id="filter-tag-water" name="project_tags[]" value="water-treatment" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-tag-water">Water Treatment</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input type="checkbox" id="filter-tag-water-res" name="project_tags[]" value="water-resources" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-tag-water-res">Water Resources</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input type="checkbox" id="filter-tag-other" name="project_tags[]" value="other" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-tag-other">Other</label>
            </li>
          </ul>
        </div><!-- /filter-level-tags -->

        <!-- ── Level 1 – Rank By ────────────────────────────────────────── -->
        <div
          id="filter-level-rank"
          class="filter-menu__col filter-menu__col--level-1"
          data-level="1"
          data-filter-key="rank"
        >
          <button
            class="filter-submenu-header"
            data-prev-target="filter-level-0"
            aria-label="Go back to filter groups"
          >
            <span class="filter-submenu-header__back" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                <path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/>
              </svg>
            </span>
            <h3 class="filter-submenu-header__title">Rank By</h3>
          </button>
          <ul class="filter-options-list" role="list">
            <li class="filter-option-item" role="listitem">
              <input type="radio" id="filter-rank-az" name="rank" value="a-z" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-rank-az">Name: A → Z</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input type="radio" id="filter-rank-za" name="rank" value="z-a" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-rank-za">Name: Z → A</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input type="radio" id="filter-rank-new" name="rank" value="new" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-rank-new">Newest first</label>
            </li>
            <li class="filter-option-item" role="listitem">
              <input type="radio" id="filter-rank-old" name="rank" value="old" class="filter-option-item__checkbox"/>
              <label class="filter-option-item__label" for="filter-rank-old">Oldest first</label>
            </li>
          </ul>
        </div><!-- /filter-level-rank -->

      </div><!-- /floating-filter-panel__content -->

    </div><!-- /floating-filter-panel__drawer-inner -->
  </div><!-- /floating-filter-panel__drawer -->
</div><!-- /floating-filter-panel -->

<script src="../assets/js/components-floating_filter_menu.js"></script>