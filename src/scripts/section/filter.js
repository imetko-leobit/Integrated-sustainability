import PostsFilter from "../modules/FilterHandler.js";
import InfiniteScroll from "../modules/InfiniteScroll.js";

// Initialize posts filter and infinite scroll
document.addEventListener("DOMContentLoaded", () => {
  const filterForm = document.querySelector(".posts-filter-form");

  if (filterForm) {
    // Initialize filter
    const filter = new PostsFilter(".posts-filter-form");
    // Initialize infinite scroll
    new InfiniteScroll(".scroll-trigger", filter);
  }
});
