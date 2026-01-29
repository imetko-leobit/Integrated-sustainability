<?php
$slides = [
    [
        'img' => '../assets/img/image4.jpg',
        'title' => 'need a quick fix? <strong>call our facility troubleshooting team</strong>',
        'desc' => 'Reach out to our industrial water treatment specialists and stabilize your facility – fast.',
        'btn'  => 'Troubleshoot Your Facility'
    ],
    [
        'img' => '../assets/img/image2.jpg',
        'title' => 'text 2? <strong>call our facility troubleshooting team</strong>',
        'desc' => 'description 2',
        'btn'  => 'button 2'
    ],
    [
        'img' => '../assets/img/image3.jpg',
        'title' => 'text 3? <strong>call our facility troubleshooting team</strong>',
        'desc' => 'description 3',
        'btn'  => 'button 3'
    ],
];
?>

<link rel="stylesheet" href="../assets/css/components-info_card_slider.css" />

<div class="info-slider-container">
  <div class="info-card-wrapper">
    <?php foreach ($slides as $index => $slide): ?>
    <div class="info-card <?php echo $index === 0 ? 'active' : ''; ?>">
      <img src="<?php echo $slide['img']; ?>" alt="Slide Image" class="info-card__image">

      <div class="info-card__content">
        <div class="info-card__content-top"></div>
        <div class="info-card__content-bottom">
          <h3 class="title"><?php echo $slide['title']; ?></h3>
          <p class="text-content"><?php echo $slide['desc']; ?></p>
          <button class="btn btn--gradient"><?php echo $slide['btn']; ?></button>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <?php if(count($slides) > 1): // Покажемо controls лише якщо більше 1 слайду ?>
  <div class="slider-controls">
    <div class="progress-bar">
      <div class="progress-fill"></div>
    </div>
    <div class="dots">
      <?php foreach ($slides as $index => $slide): ?>
      <span class="dot <?php echo $index === 0 ? 'active' : ''; ?>" data-index="<?php echo $index; ?>"></span>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const slides = document.querySelectorAll('.info-card');
  const dots = document.querySelectorAll('.dot');
  const progressFill = document.querySelector('.progress-fill');
  let currentIndex = 0;
  let isPaused = false;
  let animationFrameId = null;
  let startTime = null;
  let pausedTime = 0;
  const slideDuration = 7500; // 50% longer than original 5000ms

  function updateSlider(index) {
    slides.forEach(slide => slide.classList.remove('active'));
    if(dots.length > 0) dots.forEach(dot => dot.classList.remove('active'));

    slides[index].classList.add('active');
    if(dots.length > 0) dots[index].classList.add('active');
  }

  function animateProgress() {
    if (isPaused) {
      animationFrameId = requestAnimationFrame(animateProgress);
      return;
    }

    const currentTime = Date.now();
    if (!startTime) startTime = currentTime;

    const elapsed = currentTime - startTime + pausedTime;
    const progress = Math.min((elapsed / slideDuration) * 100, 100);

    if(progressFill) progressFill.style.width = `${progress}%`;

    if (progress >= 100) {
      currentIndex = (currentIndex + 1) % slides.length;
      updateSlider(currentIndex);

      startTime = null;
      pausedTime = 0;
      if(progressFill) progressFill.style.width = '0%';
    }

    animationFrameId = requestAnimationFrame(animateProgress);
  }

  function pauseAnimation() {
    if (!isPaused && startTime) {
      pausedTime = Date.now() - startTime + pausedTime;
      startTime = null;
      isPaused = true;
    }
  }

  function resumeAnimation() {
    if (isPaused) {
      isPaused = false;
      startTime = null;
    }
  }

  function cleanup() {
    if (animationFrameId) {
      cancelAnimationFrame(animationFrameId);
      animationFrameId = null;
    }
  }

  if(dots.length > 0){
    dots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
        currentIndex = index;
        updateSlider(currentIndex);
        startTime = null;
        pausedTime = 0;
        if(progressFill) progressFill.style.width = '0%';
        isPaused = false;
        animateProgress();
      });

      dot.addEventListener('mouseenter', pauseAnimation);
      dot.addEventListener('mouseleave', resumeAnimation);
    });
  }

  slides.forEach(slide => {
    slide.addEventListener('mouseenter', pauseAnimation);
    slide.addEventListener('mouseleave', resumeAnimation);
  });

  window.addEventListener('beforeunload', cleanup);

  if (typeof document.hidden !== 'undefined') {
    document.addEventListener('visibilitychange', function() {
      if (document.hidden) cleanup();
    });
  }

  animateProgress();
});
</script>
