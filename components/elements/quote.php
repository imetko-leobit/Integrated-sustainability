<link rel="stylesheet" href="../assets/css/components-quote.css" />

<?php
  $details_quote = $details_quote ?? null;
  $details_quote_author = $details_quote_author ?? null;
?>

<section class="quote">
  <div class="quote__wrapper">
    <p class='quote__text'>”<?php echo $details_quote; ?>”</p>
    <?php if ($details_quote_author): ?>
    <p class='quote__author'><?php echo $details_quote_author; ?></p>
    <?php endif; ?>
  </div>

</section>