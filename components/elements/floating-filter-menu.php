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
 * Two filter structures are demonstrated:
 *   Filter 1 – Industries: Filter → Subcategories → Items  (nested)
 *   Filter 2 – Locations:  Filter → Items                  (flat)
 *
 * Usage: include this file inside any section that needs floating filters.
 * A hidden .filter-form is also rendered so the existing FilterHandler.js /
 * InfiniteScroll.js modules continue to work without modification.
 */
?>

<link rel="stylesheet" href="../assets/css/components-floating_filter_menu.css" />

<!-- Hidden filter form kept for JS compatibility with FilterHandler.js -->
<form class="filter-form" data-post-type="projects" style="display:none;">
  <select name="locations[]" multiple="">
    <option value="canada">Canada</option>
    <option value="yukon">Yukon</option>
  </select>
  <select name="industries[]" multiple="">
    <option value="metals-mining">Metals &amp; Mining</option>
    <option value="gold-mining">Gold Mining</option>
    <option value="environmental">Environmental</option>
    <option value="water-treatment">Water Treatment</option>
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
  class="floating-filter-btn floating-filter-trigger-btn"
  aria-label="Open filters"
  aria-expanded="false"
  aria-controls="floating-filter-panel"
>
  <!-- Filter icon -->
  <span class="floating-filter-btn__icon">
    <img src="../assets/img/filter-trigger-icon.svg" alt="" aria-hidden="true" width="30" height="30" />
  </span>
</button>

<!-- ─── Floating credentials button ─────────────────────────────────────── -->
<button
  class="floating-filter-btn floating-filter-btn-request-credentials"
  aria-label="Open filters"
  aria-expanded="false"
  aria-controls="floating-filter-panel"
>
  <!-- Credentials icon -->
  <span class="floating-filter-btn__icon">
    <img src="../assets/img/filter-credentials-icon.svg" alt="" aria-hidden="true" width="33" height="33" />
  </span>
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
  <div class="floating-filter-panel__backdrop"></div>

  <!-- Drawer -->
  <div class="floating-filter-panel__drawer" role="document">
    <div class="floating-filter-panel__drawer-inner">
      <button
        class="floating-filter-btn floating-filter-panel-btn floating-filter-panel__btn-close"
        aria-label="Close filters"
        aria-expanded="true"
        aria-controls="floating-filter-panel"
      >
        <!-- Close icon -->
        <span class="floating-filter-btn__icon">
          <img src="../assets/img/filter-close-icon.svg" alt="" aria-hidden="true" width="34" height="34" />
        </span>
      </button>

      <button
        class="floating-filter-btn floating-filter-panel-btn floating-filter-btn-request-credentials"
        aria-label="Open filters"
        aria-expanded="false"
        aria-controls="floating-filter-panel"
      >
        <!-- Credentials icon -->
        <span class="floating-filter-btn__icon">
          <img src="../assets/img/filter-credentials-icon.svg" alt="" aria-hidden="true" width="33" height="33" />
        </span>
      </button>

      <!-- Panel content: mirrors main-menu__content structure for identical
           level-slide behaviour. Uses floating-filter-panel__content class
           to keep slide transforms scoped away from the main menu. -->
      <div class="floating-filter-panel__content" data-current-level="0">

        <!-- ── Level 0 – filter group list ─────────────────────────────── -->
        <!-- Identical structure to main-menu level-0 column -->
        <div id="filter-level-0" class="main-menu__col main-menu__col--level-0 active-level" data-level="0">
          <h5 class="main-menu__title">Project Filter</h5>

          <ul class="navbar-nav">

            <!-- Filter 1: Industries (nested – subcategories → items) -->
            <li class="nav-item has-submenu" data-target="filter-level-industries">
              <a href="#" class="nav-link">industries</a>
              <input type="checkbox" class="filter-checkbox category-state-checkbox" tabindex="-1" aria-label="Filter selection state">
              <button class="submenu-button" aria-label="Open Industries filter">
                <span class="arrow-icon">
                  <img src="../assets/img/filter-arrow-right.svg" alt="" aria-hidden="true" width="24" height="24" />
                </span>
              </button>
            </li>

            <!-- Filter 2: Locations (flat – items directly) -->
            <li class="nav-item has-submenu" data-target="filter-level-locations">
              <a href="#" class="nav-link">locations</a>
              <input type="checkbox" class="filter-checkbox category-state-checkbox" tabindex="-1" aria-label="Filter selection state">
              <button class="submenu-button" aria-label="Open Locations filter">
                <span class="arrow-icon">
                  <img src="../assets/img/filter-arrow-right.svg" alt="" aria-hidden="true" width="24" height="24" />
                </span>
              </button>
            </li>

            <!-- Mobile applied-filter chips – shown only on mobile -->
            <li class="mobile-applied-chips-item">
              <span class="mobile-applied-chips-label">Filters applied</span>
              <div class="mobile-applied-chips" role="list" aria-label="Applied filters" aria-live="polite"></div>
            </li>

            <!-- Rank By -->
            <li class="nav-item has-submenu nav-item-bottom" data-target="filter-level-rank">
              <a href="#" class="nav-link">rank by</a>
              <button class="submenu-button" aria-label="Open Rank By filter">
                <span class="arrow-icon">
                  <svg viewBox="0 0 24 24"><path class="icon-arrow" fill="currentColor" d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/></svg>
                </span>
              </button>
            </li>

            <!-- Switch to Insights -->
            <li class="nav-item has-submenu" data-target="filter-level-insights">
              <a href="#" class="nav-link">Switch to Insights</a>
            </li>

            <!-- Request a Tailored Credentials Package -->
            <li class="nav-item has-submenu" data-target="filter-level-insights">
              <a href="#" class="nav-link">
                Can't find what you're looking for? <br> Request a Tailored Credentials Package
              </a>
            </li>

          </ul>
        </div><!-- /filter-level-0 -->

        <!-- ── Level 1 – Industries (nested: subcategories → items) ─────── -->
        <div id="filter-level-industries" class="main-menu__col main-menu__col--level-1 submenu" data-level="1" data-filter-key="industries">
          <button class="submenu-header" data-prev-target="filter-level-0" aria-label="Go back to Filters">
            <h3 class="submenu-header__title">Project Filter Menu</h3>
            <span class="back-arrow">
              <img src="../assets/img/filter-arrow-back.svg" alt="" aria-hidden="true" width="24" height="24" />
            </span>
          </button>
          <div class="submenu-category-row">
            <span class="submenu-category-name">industries</span>
            <span class="submenu-category-arrow">
              <img src="../assets/img/filter-arrow-expand.svg" alt="" aria-hidden="true" width="20" height="20" />
            </span>
          </div>

          <!-- Subcategory 1: Metals & Mining -->
          <div class="submenu-subcategory">
            <div class="submenu-subcategory__header">Metals &amp; Mining</div>
            <ul class="navbar-nav">
              <li class="nav-item">
                <label class="nav-link" for="filter-ind-gold">
                  <input type="checkbox" id="filter-ind-gold" name="industries[]" value="gold-mining" class="filter-checkbox">
                  gold mining
                </label>
              </li>
              <li class="nav-item">
                <label class="nav-link" for="filter-ind-metals-mining">
                  <input type="checkbox" id="filter-ind-metals-mining" name="industries[]" value="metals-mining" class="filter-checkbox">
                  metals &amp; mining
                </label>
              </li>
            </ul>
          </div>

          <!-- Subcategory 2: Environmental -->
          <div class="submenu-subcategory">
            <div class="submenu-subcategory__header">Environmental</div>
            <ul class="navbar-nav">
              <li class="nav-item">
                <label class="nav-link" for="filter-ind-environmental">
                  <input type="checkbox" id="filter-ind-environmental" name="industries[]" value="environmental" class="filter-checkbox">
                  environmental
                </label>
              </li>
              <li class="nav-item">
                <label class="nav-link" for="filter-ind-water-treatment">
                  <input type="checkbox" id="filter-ind-water-treatment" name="industries[]" value="water-treatment" class="filter-checkbox">
                  water treatment
                </label>
              </li>
            </ul>
          </div>
        </div><!-- /filter-level-industries -->

        <!-- ── Level 1 – Locations (flat: items directly) ──────────────── -->
        <div id="filter-level-locations" class="main-menu__col main-menu__col--level-1 submenu" data-level="1" data-filter-key="locations">
          <button class="submenu-header" data-prev-target="filter-level-0" aria-label="Go back to Filters">
            <h3 class="submenu-header__title">Project Filter Menu</h3>
            <span class="back-arrow">
              <img src="../assets/img/filter-arrow-back.svg" alt="" aria-hidden="true" width="24" height="24" />
            </span>
          </button>
          <div class="submenu-category-row">
            <span class="submenu-category-name">locations</span>
            <span class="submenu-category-arrow">
              <img src="../assets/img/filter-arrow-expand.svg" alt="" aria-hidden="true" width="24" height="24" />
            </span>
          </div>
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

      </div><!-- /floating-filter-panel__content -->

    </div><!-- /floating-filter-panel__drawer-inner -->
  </div><!-- /floating-filter-panel__drawer -->
</div><!-- /floating-filter-panel -->

<!-- ─── Bottom sticky filter summary bar ─────────────────────────────────── -->
<div class="filter-summary-bar" role="region" aria-label="Applied filters" aria-live="polite">
  <div class="filter-summary-bar__inner">
    <h5 class="filter-summary-bar__label">Filters applied:</h5>
    <div class="filter-summary-bar__chips" role="list"></div>
  </div>
</div>

<script src="../assets/js/components-floating_filter_menu.js"></script>
