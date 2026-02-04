<link rel="stylesheet" href="../assets/css/components-post_card.css" />

<article class="post-card--simple" data-post-id="<?php echo $project['id']; ?>">
  <a href="<?php echo $project['link']; ?>" class="post-card__link">
    <?php if (!empty($project['image'])) : ?>
    <div class="post-card__image-wrapper">
      <img src="<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>" class="post-card__image" />
    </div>
    <?php endif; ?>
    <div class="post-card__content">
      <h5 class="post-card__title">
        <?php echo $project['title']; ?>
      </h5>
    </div>
    <div class="post-card__arrow--right">
      <span class="arrow-icon ">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <mask id="mask0_8640_38690" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="8" y="14" width="27"
            height="16">
            <path d="M34.7188 14.7813L34.7187 29.2188L8.14516 29.2188L8.14516 14.7813L34.7188 14.7813Z" fill="white" />
          </mask>
          <g mask="url(#mask0_8640_38690)">
            <path
              d="M31.9069 22.7289L8.14517 22.7289L8.14517 21.2706L31.9069 21.2706L26.588 15.9531L27.6193 14.9219L34.6985 21.9997L27.6193 29.0775L26.588 28.0476L31.9069 22.7289Z"
              fill="white" />
          </g>
        </svg>
      </span>
    </div>
  </a>
</article>