<link rel="stylesheet" href="../assets/css/section-block_author.css" />

<section class="block-author">
  <div class="block-author__wrapper">

    <!-- Left Column: Author Card -->
    <div class="block-author__col block-author__col--sidebar">
      <div class="person-card">
        <div class="person-card__image-container">
          <img src="<?php echo $person_photo; ?>" alt="person photo" class="person-card__image">
        </div>
        <div class="person-card__info">
          <h4 class="card__name"><?php echo $person_name; ?></h4>
          <p class="card__credentials"><?php echo $person_degree; ?></p>
          <p class="card__title"><?php echo $person_role; ?></p>
        </div>
      </div>
    </div>

    <!-- Right Column: Author Details -->
    <div class="block-author__col block-author__col--content">
      <div class="author-block">
        <p class="tagline"><?php echo $author_details_blocks['pillar']; ?></p>
        <?php if (!empty($author_details_blocks['title'])): ?>
        <h2 class='title title--h3 author-block__title'><?php echo $author_details_blocks['title']; ?></h2>
        <?php endif; ?> <?php if (!empty($author_details_blocks['paragraphs'])): ?> <div class="author-block__text">
          <?php foreach ($author_details_blocks['paragraphs'] as $paragraph): ?>
          <p><?php echo htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8'); ?></p>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($author_details_blocks['list_title'])): ?>
        <h3 class='title title--h3 author-block__list-title'>
          <?php echo $author_details_blocks['list_title']; ?>
        </h3>
        <?php endif; ?> <?php if (!empty($author_details_blocks['list_items'])): ?> <ul class="author-block__list">
          <?php foreach ($author_details_blocks['list_items'] as $item): ?>
          <li class="author-block__list-item">
            <img src="../assets/img/mark.svg" alt="" class="author-block__icon" />
            <span><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <button class="btn btn--gradient"><?php echo $author_details_blocks['action']; ?></button>
      </div>
    </div>

  </div>
</section>