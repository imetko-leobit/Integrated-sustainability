/******/ (() => { // webpackBootstrap
/*!*********************************************!*\
  !*** ./src/scripts/section/block_slider.js ***!
  \*********************************************/
document.addEventListener('DOMContentLoaded', function () {
  var carouselWrapper = document.querySelector('.js-pillar-carousel');
  var prevButton = document.querySelector('.js-pillar-prev');
  var nextButton = document.querySelector('.js-pillar-next');
  if (!carouselWrapper) return;

  // Get all slides currently in the DOM
  var allSlides = Array.from(carouselWrapper.querySelectorAll('.pillar-carousel-card'));

  // Parameters
  var slideDuration = 5000; // Time each slide is active (5 seconds)
  var animationDuration = 500; // CSS transition time (0.5s)
  var slideMargin = 40; // Gap distance from SCSS (40px)

  var autoRotateInterval;
  var isTransitioning = false;
  var isCurrentlyVisible = false;
  var isNavigatingManually = false;
  var timebarStartTime;
  var timebarElapsedTime = 0;
  var carouselObserver;

  // --- Timebar Control Functions ---

  /** Resets the progress bar width and removes the transition instantly. */
  var resetAllTimebars = function resetAllTimebars() {
    allSlides.forEach(function (slide) {
      var timebar = slide.querySelector('.js-timebar');
      if (timebar) {
        timebar.style.transition = 'none';
        timebar.style.width = '0%';
      }
    });
    timebarElapsedTime = 0;
  };

  /** Starts the progress bar animation from 0% to 100%. */
  var startTimebar = function startTimebar(timebarElement) {
    timebarElapsedTime = 0;
    timebarStartTime = Date.now();
    setTimeout(function () {
      timebarElement.style.transition = "width ".concat(slideDuration / 1000, "s linear");
      timebarElement.style.width = '100%';
    }, 50);
  };

  /** Pauses the timebar animation and stops the interval. */
  var pauseTimebar = function pauseTimebar() {
    var _getActiveSlide;
    var activeTimebar = (_getActiveSlide = getActiveSlide()) === null || _getActiveSlide === void 0 ? void 0 : _getActiveSlide.querySelector('.js-timebar');
    if (activeTimebar && isCurrentlyVisible) {
      timebarElapsedTime = Date.now() - timebarStartTime;
      var pausedWidth = timebarElapsedTime / slideDuration * 100;
      activeTimebar.style.transition = 'none';
      activeTimebar.style.width = "".concat(pausedWidth, "%");
    }
    clearInterval(autoRotateInterval); // Stop rotation cycle
  };

  /** Resumes the timebar animation and restarts the interval. */
  var resumeTimebar = function resumeTimebar() {
    var _getActiveSlide2;
    var activeTimebar = (_getActiveSlide2 = getActiveSlide()) === null || _getActiveSlide2 === void 0 ? void 0 : _getActiveSlide2.querySelector('.js-timebar');
    if (activeTimebar && isCurrentlyVisible && timebarElapsedTime > 0) {
      var remainingTime = slideDuration - timebarElapsedTime;
      if (remainingTime <= 50) {
        moveSlides('next', true);
        return;
      }
      setTimeout(function () {
        activeTimebar.style.transition = "width ".concat(remainingTime / 1000, "s linear");
        activeTimebar.style.width = '100%';
      }, 50);
      timebarStartTime = Date.now() - timebarElapsedTime;
      startAutoRotate(remainingTime);
    } else if (isCurrentlyVisible) {
      startAutoRotate();
    }
  };
  var getActiveSlide = function getActiveSlide() {
    return carouselWrapper.querySelector('.pillar-carousel-card:first-child');
  };

  // --- Observer Management Functions ---

  /** Stops the observer from watching the carousel. */
  var disconnectObserver = function disconnectObserver() {
    if (carouselObserver) {
      carouselObserver.unobserve(carouselWrapper);
    }
  };

  /** Restarts the observer watching the carousel. */
  var reconnectObserver = function reconnectObserver() {
    if (carouselObserver) {
      carouselObserver.observe(carouselWrapper);
    }
  };

  // --- Core State and Movement Functions ---

  /** Resets the carousel to its initial state (original first slide visible). */
  var resetToInitialState = function resetToInitialState() {
    var shouldUpdateActive = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
    clearInterval(autoRotateInterval);
    resetAllTimebars();
    var targetIndex = -1;
    allSlides.forEach(function (slide, index) {
      if (slide.dataset.index === '0') {
        targetIndex = index;
      }
    });
    if (targetIndex > 0) {
      for (var i = 0; i < targetIndex; i++) {
        var slideToMove = carouselWrapper.querySelector('.pillar-carousel-card:first-child');
        carouselWrapper.appendChild(slideToMove);
      }
    }
    carouselWrapper.style.transition = 'none';
    carouselWrapper.style.transform = 'translateX(0)';
    allSlides = Array.from(carouselWrapper.querySelectorAll('.pillar-carousel-card'));
    if (shouldUpdateActive) {
      updateActiveState(isCurrentlyVisible);
    }
  };

  /** Moves the carousel one step forward or backward. */
  var moveSlides = function moveSlides(direction) {
    var isAuto = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
    if (isTransitioning) return;
    isTransitioning = true;
    if (!isAuto) {
      isNavigatingManually = true;
      disconnectObserver();
      pauseTimebar();
    }

    // Stop auto-rotation and reset all timebars
    clearInterval(autoRotateInterval);
    resetAllTimebars();

    // Pre-emptively update active state to trigger width animation simultaneously
    var currentActive = carouselWrapper.querySelector('.pillar-carousel-card.is-active');
    var nextActive;
    if (direction === 'next') {
      nextActive = currentActive ? currentActive.nextElementSibling : null;
      if (!nextActive) {
        nextActive = carouselWrapper.querySelector('.pillar-carousel-card:first-child');
      }
    } else {
      nextActive = currentActive ? currentActive.previousElementSibling : null;
      if (!nextActive) {
        nextActive = carouselWrapper.querySelector('.pillar-carousel-card:last-child');
      }
    }

    // Apply active class to next card before starting transition
    if (currentActive) currentActive.classList.remove('is-active');
    if (nextActive) nextActive.classList.add('is-active');
    var slideWidth = allSlides[0].offsetWidth;
    var translateValue = direction === 'next' ? -(slideWidth + slideMargin) : slideWidth + slideMargin;
    carouselWrapper.style.transition = "transform ".concat(animationDuration / 1000, "s cubic-bezier(0.25, 0.46, 0.45, 0.94)");
    carouselWrapper.style.transform = "translateX(".concat(translateValue, "px)");
    setTimeout(function () {
      carouselWrapper.style.transition = 'none';
      carouselWrapper.style.transform = 'translateX(0)';
      var firstSlide = carouselWrapper.querySelector('.pillar-carousel-card:first-child');
      if (direction === 'next') {
        carouselWrapper.appendChild(firstSlide);
      } else {
        var lastSlide = carouselWrapper.querySelector('.pillar-carousel-card:last-child');
        carouselWrapper.prepend(lastSlide);
      }
      allSlides = Array.from(carouselWrapper.querySelectorAll('.pillar-carousel-card'));
      updateActiveState(true);
      isTransitioning = false;
      if (!isAuto) {
        isNavigatingManually = false;
        reconnectObserver();
      }
    }, animationDuration);
  };

  /** Updates the 'is-active' class. */
  var updateActiveState = function updateActiveState(shouldStartTimer) {
    allSlides.forEach(function (slide) {
      return slide.classList.remove('is-active');
    });
    var activeSlide = getActiveSlide();
    if (activeSlide) {
      activeSlide.classList.add('is-active');
      var activeTimebar = activeSlide.querySelector('.js-timebar');
      if (shouldStartTimer && activeTimebar && isCurrentlyVisible) {
        startTimebar(activeTimebar);
        startAutoRotate();
      }
    }
  };
  var startAutoRotate = function startAutoRotate() {
    var delay = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : slideDuration;
    clearInterval(autoRotateInterval);
    autoRotateInterval = setInterval(function () {
      moveSlides('next', true);
    }, delay);
  };

  // --- Event Handlers ---
  prevButton.addEventListener('click', function () {
    return moveSlides('prev', false);
  }); // Move to the previous slide
  nextButton.addEventListener('click', function () {
    return moveSlides('next', false);
  }); // Move to the next slide

  // --- Intersection Observer Logic ---
  var observerOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.1 // Trigger when 10% of the element is visible
  };
  var observerCallback = function observerCallback(entries) {
    entries.forEach(function (entry) {
      if (isNavigatingManually) return;
      if (entry.isIntersecting) {
        // --- BLOCK BECOMES VISIBLE ---
        if (!isCurrentlyVisible) {
          isCurrentlyVisible = true;
          resetToInitialState();
          updateActiveState(true); // Start the timer
        }
      } else {
        // --- BLOCK DISAPPEARS ---
        if (isCurrentlyVisible) {
          isCurrentlyVisible = false;
          resetToInitialState();
        }
      }
    });
  };

  // Initialize the observer instance
  carouselObserver = new IntersectionObserver(observerCallback, observerOptions);

  // --- Initialization ---
  resetToInitialState();
  carouselObserver.observe(carouselWrapper);

  // Stop rotation on mouseover/mouseleave
  carouselWrapper.addEventListener('mouseenter', function () {
    if (isCurrentlyVisible && !isTransitioning) {
      pauseTimebar();
    }
  });
  carouselWrapper.addEventListener('mouseleave', function () {
    if (isCurrentlyVisible && !isTransitioning) {
      resumeTimebar();
    }
  });

  // --- Swipe Logic ---
  var touchStartX = 0;
  var touchEndX = 0;
  var handleGesture = function handleGesture() {
    var swipeThreshold = 50; // Minimum distance for a swipe in pixels
    if (touchEndX < touchStartX - swipeThreshold) {
      // Swipe left -> Next slide
      moveSlides('next', false);
    }
    if (touchEndX > touchStartX + swipeThreshold) {
      // Swipe right -> Previous slide
      moveSlides('prev', false);
    }
  };
  carouselWrapper.addEventListener('touchstart', function (e) {
    touchStartX = e.changedTouches[0].screenX;
  }, {
    passive: true
  });
  carouselWrapper.addEventListener('touchend', function (e) {
    touchEndX = e.changedTouches[0].screenX;
    handleGesture();
  }, {
    passive: true
  });
});
/******/ })()
;