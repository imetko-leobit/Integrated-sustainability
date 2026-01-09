/**
 * Infinite Scroll Module
 * Uses Intersection Observer API to detect when scroll trigger is visible
 */

class InfiniteScroll {
  constructor(triggerSelector, filterInstance) {
    this.trigger = document.querySelector(triggerSelector);
    this.filter = filterInstance;

    if (!this.trigger || !this.filter) return;

    this.observer = null;
    this.init();
  }

  init() {
    // Create Intersection Observer
    this.observer = new IntersectionObserver(
      (entries) => this.handleIntersection(entries),
      {
        root: null, // viewport
        rootMargin: "100px", // trigger 100px before trigger element is visible
        threshold: 0.1,
      }
    );

    // Start observing
    this.observer.observe(this.trigger);
    console.log("InfiniteScroll: Observing trigger element");

    // Listen to posts loaded event to re-observe if needed
    document.addEventListener("postsLoaded", (e) => {
      this.handlePostsLoaded(e.detail);
    });
  }

  handleIntersection(entries) {
    entries.forEach((entry) => {
      if (
        entry.isIntersecting &&
        !this.filter.isLoading &&
        this.filter.hasMore
      ) {
        // Trigger is visible, load more posts
        this.filter.loadMore();
      }
    });
  }

  handlePostsLoaded(detail) {
    // If no more posts, stop observing
    if (!detail.hasMore) {
      this.destroy();
    }
  }

  destroy() {
    if (this.observer) {
      this.observer.disconnect();
      this.observer = null;
    }
  }
}

export default InfiniteScroll;
