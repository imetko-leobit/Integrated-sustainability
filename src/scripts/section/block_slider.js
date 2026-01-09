document.addEventListener('DOMContentLoaded', () => {
  const carouselWrapper = document.querySelector('.js-pillar-carousel');
  const prevButton = document.querySelector('.js-pillar-prev');
  const nextButton = document.querySelector('.js-pillar-next');

  if (!carouselWrapper) return;

  // Get all slides currently in the DOM
  let allSlides = Array.from(carouselWrapper.querySelectorAll('.pillar-carousel-card'));
  
  // Parameters
  const slideDuration = 5000;      // Time each slide is active (5 seconds)
  const animationDuration = 500;   // CSS transition time (0.5s)
  const slideMargin = 40;          // Gap distance from SCSS (40px)
  
  let autoRotateInterval;
  let isTransitioning = false;
  let isCurrentlyVisible = false;
  let isNavigatingManually = false; 

  let timebarStartTime;
  let timebarElapsedTime = 0;
  let carouselObserver;

  // --- Timebar Control Functions ---

  /** Resets the progress bar width and removes the transition instantly. */
  const resetAllTimebars = () => {
      allSlides.forEach(slide => {
          const timebar = slide.querySelector('.js-timebar');
          if (timebar) {
              timebar.style.transition = 'none';
              timebar.style.width = '0%';
          }
      });
      timebarElapsedTime = 0;
  };

  /** Starts the progress bar animation from 0% to 100%. */
  const startTimebar = (timebarElement) => {
      timebarElapsedTime = 0;
      timebarStartTime = Date.now();
      
      setTimeout(() => {
          timebarElement.style.transition = `width ${slideDuration / 1000}s linear`;
          timebarElement.style.width = '100%';
      }, 50);
  };
  
  /** Pauses the timebar animation and stops the interval. */
  const pauseTimebar = () => {
      const activeTimebar = getActiveSlide()?.querySelector('.js-timebar');
      if (activeTimebar && isCurrentlyVisible) {
          
          timebarElapsedTime = Date.now() - timebarStartTime;
          const pausedWidth = (timebarElapsedTime / slideDuration) * 100;
          
          activeTimebar.style.transition = 'none';
          activeTimebar.style.width = `${pausedWidth}%`;
      }
      clearInterval(autoRotateInterval); // Stop rotation cycle
  };

  /** Resumes the timebar animation and restarts the interval. */
  const resumeTimebar = () => {
      const activeTimebar = getActiveSlide()?.querySelector('.js-timebar');
      if (activeTimebar && isCurrentlyVisible && timebarElapsedTime > 0) {
          
          const remainingTime = slideDuration - timebarElapsedTime;
          
          if (remainingTime <= 50) {
              moveSlides('next', true);
              return;
          }

          setTimeout(() => {
              activeTimebar.style.transition = `width ${remainingTime / 1000}s linear`;
              activeTimebar.style.width = '100%';
          }, 50);

          timebarStartTime = Date.now() - timebarElapsedTime;

          startAutoRotate(remainingTime);
      }
      else if (isCurrentlyVisible) {
           startAutoRotate();
      }
  };


  const getActiveSlide = () => {
      return carouselWrapper.querySelector('.pillar-carousel-card:first-child');
  };

  // --- Observer Management Functions ---

  /** Stops the observer from watching the carousel. */
  const disconnectObserver = () => {
      if (carouselObserver) {
          carouselObserver.unobserve(carouselWrapper);
      }
  };

  /** Restarts the observer watching the carousel. */
  const reconnectObserver = () => {
      if (carouselObserver) {
          carouselObserver.observe(carouselWrapper);
      }
  };


  // --- Core State and Movement Functions ---

  /** Resets the carousel to its initial state (original first slide visible). */
  const resetToInitialState = (shouldUpdateActive = false) => {
      clearInterval(autoRotateInterval);
      resetAllTimebars();
      
      let targetIndex = -1;
      allSlides.forEach((slide, index) => {
          if (slide.dataset.index === '0') { 
              targetIndex = index;
          }
      });

      if (targetIndex > 0) {
          for (let i = 0; i < targetIndex; i++) {
              const slideToMove = carouselWrapper.querySelector('.pillar-carousel-card:first-child');
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
  const moveSlides = (direction, isAuto = false) => {
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

      const slideWidth = allSlides[0].offsetWidth; 
      const translateValue = direction === 'next' 
          ? -(slideWidth + slideMargin) 
          : (slideWidth + slideMargin);

      carouselWrapper.style.transition = `transform ${animationDuration / 1000}s cubic-bezier(0.25, 0.46, 0.45, 0.94)`;
      carouselWrapper.style.transform = `translateX(${translateValue}px)`;

      setTimeout(() => {
          
          carouselWrapper.style.transition = 'none';
          carouselWrapper.style.transform = 'translateX(0)';

          const firstSlide = carouselWrapper.querySelector('.pillar-carousel-card:first-child');

          if (direction === 'next') {
              carouselWrapper.appendChild(firstSlide); 
          } else {
              const lastSlide = carouselWrapper.querySelector('.pillar-carousel-card:last-child');
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
  const updateActiveState = (shouldStartTimer) => {
      allSlides.forEach(slide => slide.classList.remove('is-active'));
      const activeSlide = getActiveSlide();
      
      if (activeSlide) {
          activeSlide.classList.add('is-active');
          
          const activeTimebar = activeSlide.querySelector('.js-timebar');
          
          if (shouldStartTimer && activeTimebar && isCurrentlyVisible) { 
              startTimebar(activeTimebar);
              startAutoRotate();
          }
      }
  };

  const startAutoRotate = (delay = slideDuration) => {
      clearInterval(autoRotateInterval);
      autoRotateInterval = setInterval(() => {
          moveSlides('next', true); 
      }, delay);
  };

  // --- Event Handlers ---
  prevButton.addEventListener('click', () => moveSlides('prev', false)); // Move to the previous slide
  nextButton.addEventListener('click', () => moveSlides('next', false)); // Move to the next slide

  // --- Intersection Observer Logic ---
  const observerOptions = {
      root: null, 
      rootMargin: '0px',
      threshold: 0.1 // Trigger when 10% of the element is visible
  };

  const observerCallback = (entries) => {
      entries.forEach(entry => {
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
  carouselWrapper.addEventListener('mouseenter', () => {
      if (isCurrentlyVisible && !isTransitioning) {
          pauseTimebar();
      }
  });
  carouselWrapper.addEventListener('mouseleave', () => {
      if (isCurrentlyVisible && !isTransitioning) {
          resumeTimebar();
      }
  });

  // --- Swipe Logic ---
  let touchStartX = 0;
  let touchEndX = 0;

  const handleGesture = () => {
    const swipeThreshold = 50; // Minimum distance for a swipe in pixels
    if (touchEndX < touchStartX - swipeThreshold) {
      // Swipe left -> Next slide
      moveSlides('next', false);
    }
    if (touchEndX > touchStartX + swipeThreshold) {
      // Swipe right -> Previous slide
      moveSlides('prev', false);
    }
  };

  carouselWrapper.addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
  }, { passive: true });

  carouselWrapper.addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].screenX;
    handleGesture();
  }, { passive: true });
});