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
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const slides = document.querySelectorAll('.info-card');
  const dots = document.querySelectorAll('.dot');
  const progressFill = document.querySelector('.progress-fill');
  let currentIndex = 0;

  function updateSlider(index) {
    // Update active slide
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));

    slides[index].classList.add('active');
    dots[index].classList.add('active');

    // Update progress-bar (33.3% every slide)
    const progressWidth = ((index + 1) / slides.length) * 100;
    progressFill.style.width = `${progressWidth}%`;
  }

  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      currentIndex = index;
      updateSlider(currentIndex);
    });
  });

  // Optional
  setInterval(() => {
    currentIndex = (currentIndex + 1) % slides.length;
    updateSlider(currentIndex);
  }, 5000);
});
</script>