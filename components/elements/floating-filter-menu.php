<?php
/**
 * FloatingFilterMenu component
 *
 * Renders a floating filter trigger button on the left side of the viewport
 * and a slide-in filter panel whose level-navigation behaviour is identical
 * to the existing main-menu patterns (same HTML structure, same CSS classes,
 * same arrow indicators, hover/active states, expand/collapse behaviour).
 *
 * Only difference from the main menu: each selectable item includes a
 * checkbox before the label.
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

      <!-- Panel content: mirrors main-menu__content structure for identical
           level-slide behaviour. Uses floating-filter-panel__content class
           to keep slide transforms scoped away from the main menu. -->
      <div class="floating-filter-panel__content" data-current-level="0">

        <!-- ── Level 0 – filter group list ─────────────────────────────── -->
        <!-- Identical structure to main-menu level-0 column -->
        <div id="filter-level-0" class="main-menu__col main-menu__col--level-0 active-level" data-level="0">
          <h5 class="main-menu__title">Lifecycle Accountability for Industrial Water Assets</h5>

          <ul class="navbar-nav">

            <!-- Locations -->
            <li class="nav-item has-submenu" data-target="filter-level-locations">
              <a href="#" class="nav-link">
                locations
                <span class="filter-count" aria-live="polite"></span>
              </a>
              <button class="submenu-button" aria-label="Open Locations filter">
                <span class="arrow-icon">
                  <svg viewBox="0 0 24 24"><path class="icon-arrow" fill="currentColor" d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/></svg>
                </span>
              </button>
            </li>

            <!-- Industries -->
            <li class="nav-item has-submenu" data-target="filter-level-industries">
              <a href="#" class="nav-link">
                industries
                <span class="filter-count" aria-live="polite"></span>
              </a>
              <button class="submenu-button" aria-label="Open Industries filter">
                <span class="arrow-icon">
                  <svg viewBox="0 0 24 24"><path class="icon-arrow" fill="currentColor" d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/></svg>
                </span>
              </button>
            </li>

            <!-- Project Services -->
            <li class="nav-item has-submenu" data-target="filter-level-services">
              <a href="#" class="nav-link">
                project services
                <span class="filter-count" aria-live="polite"></span>
              </a>
              <button class="submenu-button" aria-label="Open Project Services filter">
                <span class="arrow-icon">
                  <svg viewBox="0 0 24 24"><path class="icon-arrow" fill="currentColor" d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/></svg>
                </span>
              </button>
            </li>

            <!-- Tags -->
            <li class="nav-item has-submenu" data-target="filter-level-tags">
              <a href="#" class="nav-link">
                tags
                <span class="filter-count" aria-live="polite"></span>
              </a>
              <button class="submenu-button" aria-label="Open Tags filter">
                <span class="arrow-icon">
                  <svg viewBox="0 0 24 24"><path class="icon-arrow" fill="currentColor" d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/></svg>
                </span>
              </button>
            </li>

            <!-- Rank By -->
            <li class="nav-item has-submenu top-margin" data-target="filter-level-rank">
              <a href="#" class="nav-link">
                rank by
                <span class="filter-count" aria-live="polite"></span>
              </a>
              <button class="submenu-button" aria-label="Open Rank By filter">
                <span class="arrow-icon">
                  <svg viewBox="0 0 24 24"><path class="icon-arrow" fill="currentColor" d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/></svg>
                </span>
              </button>
            </li>

          </ul>
        </div><!-- /filter-level-0 -->

        <!-- ── Level 1 – Locations ──────────────────────────────────────── -->
        <!-- Identical structure to main-menu level-1 submenu -->
        <div id="filter-level-locations" class="main-menu__col main-menu__col--level-1 submenu" data-level="1" data-filter-key="locations">
          <button class="submenu-header" data-prev-target="filter-level-0" aria-label="Go back to filter groups">
            <span class="back-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><mask id="mfilt-loc" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha"><path fill="#D9D9D9" d="M0 0h24v24H0z"/></mask><g mask="url(#mfilt-loc)"><path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/></g></svg>
            </span>
            <h3 class="submenu-title">locations</h3>
          </button>
          <ul class="navbar-nav">
            <li class="nav-item">
              <label class="nav-link" for="filter-loc-canada">
                <input type="checkbox" id="filter-loc-canada" name="locations[]" value="canada" class="filter-checkbox">
                canada
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-loc-yukon">
                <input type="checkbox" id="filter-loc-yukon" name="locations[]" value="yukon" class="filter-checkbox">
                yukon
              </label>
            </li>
          </ul>
        </div><!-- /filter-level-locations -->

        <!-- ── Level 1 – Industries ─────────────────────────────────────── -->
        <div id="filter-level-industries" class="main-menu__col main-menu__col--level-1 submenu" data-level="1" data-filter-key="industries">
          <button class="submenu-header" data-prev-target="filter-level-0" aria-label="Go back to filter groups">
            <span class="back-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><mask id="mfilt-ind" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha"><path fill="#D9D9D9" d="M0 0h24v24H0z"/></mask><g mask="url(#mfilt-ind)"><path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/></g></svg>
            </span>
            <h3 class="submenu-title">industries</h3>
          </button>
          <ul class="navbar-nav">
            <li class="nav-item">
              <label class="nav-link" for="filter-ind-mining">
                <input type="checkbox" id="filter-ind-mining" name="industries[]" value="mining-metals" class="filter-checkbox">
                mining &amp; metals
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-ind-other">
                <input type="checkbox" id="filter-ind-other" name="industries[]" value="other" class="filter-checkbox">
                other
              </label>
            </li>
          </ul>
        </div><!-- /filter-level-industries -->

        <!-- ── Level 1 – Project Services ──────────────────────────────── -->
        <div id="filter-level-services" class="main-menu__col main-menu__col--level-1 submenu" data-level="1" data-filter-key="project_services">
          <button class="submenu-header" data-prev-target="filter-level-0" aria-label="Go back to filter groups">
            <span class="back-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><mask id="mfilt-svc" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha"><path fill="#D9D9D9" d="M0 0h24v24H0z"/></mask><g mask="url(#mfilt-svc)"><path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/></g></svg>
            </span>
            <h3 class="submenu-title">project services</h3>
          </button>
          <ul class="navbar-nav">
            <li class="nav-item">
              <label class="nav-link" for="filter-svc-assessment">
                <input type="checkbox" id="filter-svc-assessment" name="project_services[]" value="assessment-and-evaluations" class="filter-checkbox">
                assessment and evaluations
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-svc-water">
                <input type="checkbox" id="filter-svc-water" name="project_services[]" value="water-resources" class="filter-checkbox">
                water resources
              </label>
            </li>
          </ul>
        </div><!-- /filter-level-services -->

        <!-- ── Level 1 – Tags ───────────────────────────────────────────── -->
        <div id="filter-level-tags" class="main-menu__col main-menu__col--level-1 submenu" data-level="1" data-filter-key="project_tags">
          <button class="submenu-header" data-prev-target="filter-level-0" aria-label="Go back to filter groups">
            <span class="back-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><mask id="mfilt-tag" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha"><path fill="#D9D9D9" d="M0 0h24v24H0z"/></mask><g mask="url(#mfilt-tag)"><path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/></g></svg>
            </span>
            <h3 class="submenu-title">tags</h3>
          </button>
          <ul class="navbar-nav">
            <li class="nav-item">
              <label class="nav-link" for="filter-tag-ammonia">
                <input type="checkbox" id="filter-tag-ammonia" name="project_tags[]" value="ammonia-removal" class="filter-checkbox">
                ammonia removal
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-tag-chlorination">
                <input type="checkbox" id="filter-tag-chlorination" name="project_tags[]" value="breakpoint-chlorination" class="filter-checkbox">
                breakpoint chlorination
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-tag-design">
                <input type="checkbox" id="filter-tag-design" name="project_tags[]" value="detailed-design" class="filter-checkbox">
                detailed design
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-tag-engineering">
                <input type="checkbox" id="filter-tag-engineering" name="project_tags[]" value="engineering" class="filter-checkbox">
                engineering
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-tag-feasibility">
                <input type="checkbox" id="filter-tag-feasibility" name="project_tags[]" value="feasibility-studies" class="filter-checkbox">
                feasibility studies
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-tag-pilot">
                <input type="checkbox" id="filter-tag-pilot" name="project_tags[]" value="pilot-testing" class="filter-checkbox">
                pilot testing
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-tag-optimization">
                <input type="checkbox" id="filter-tag-optimization" name="project_tags[]" value="process-optimization" class="filter-checkbox">
                process optimization
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-tag-processes">
                <input type="checkbox" id="filter-tag-processes" name="project_tags[]" value="processes" class="filter-checkbox">
                processes
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-tag-wastewater">
                <input type="checkbox" id="filter-tag-wastewater" name="project_tags[]" value="wastewater-treatment" class="filter-checkbox">
                wastewater treatment
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-tag-water">
                <input type="checkbox" id="filter-tag-water" name="project_tags[]" value="water-treatment" class="filter-checkbox">
                water treatment
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-tag-water-res">
                <input type="checkbox" id="filter-tag-water-res" name="project_tags[]" value="water-resources" class="filter-checkbox">
                water resources
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-tag-other">
                <input type="checkbox" id="filter-tag-other" name="project_tags[]" value="other" class="filter-checkbox">
                other
              </label>
            </li>
          </ul>
        </div><!-- /filter-level-tags -->

        <!-- ── Level 1 – Rank By ────────────────────────────────────────── -->
        <div id="filter-level-rank" class="main-menu__col main-menu__col--level-1 submenu" data-level="1" data-filter-key="rank">
          <button class="submenu-header" data-prev-target="filter-level-0" aria-label="Go back to filter groups">
            <span class="back-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><mask id="mfilt-rank" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha"><path fill="#D9D9D9" d="M0 0h24v24H0z"/></mask><g mask="url(#mfilt-rank)"><path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/></g></svg>
            </span>
            <h3 class="submenu-title">rank by</h3>
          </button>
          <ul class="navbar-nav">
            <li class="nav-item">
              <label class="nav-link" for="filter-rank-az">
                <input type="radio" id="filter-rank-az" name="rank" value="a-z" class="filter-checkbox">
                name: a → z
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-rank-za">
                <input type="radio" id="filter-rank-za" name="rank" value="z-a" class="filter-checkbox">
                name: z → a
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-rank-new">
                <input type="radio" id="filter-rank-new" name="rank" value="new" class="filter-checkbox">
                newest first
              </label>
            </li>
            <li class="nav-item">
              <label class="nav-link" for="filter-rank-old">
                <input type="radio" id="filter-rank-old" name="rank" value="old" class="filter-checkbox">
                oldest first
              </label>
            </li>
          </ul>
        </div><!-- /filter-level-rank -->

      </div><!-- /floating-filter-panel__content -->

    </div><!-- /floating-filter-panel__drawer-inner -->
  </div><!-- /floating-filter-panel__drawer -->
</div><!-- /floating-filter-panel -->

<script src="../assets/js/components-floating_filter_menu.js"></script>