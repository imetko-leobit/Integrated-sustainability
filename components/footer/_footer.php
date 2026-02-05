<!-- footer -->
<?php
// Default heading level for footer sections
$footer_heading_level = $footer_heading_level ?? 4;
include_once(__DIR__ . '/../helpers/heading.php');
?>
<link rel="stylesheet" href="../assets/css/components-footer.css" />

<footer class="footer">
  <div class="footer-logo">
    <img src="../assets/img/logo.png" alt="Integrated Sustainability Logo">
    <div class="divider"></div>
  </div>
  <div class="footer-links-wrapper tablet">
    <div class="footer-sections">
      <section class="footer-section">
        <?php render_heading('insights', $footer_heading_level, 'title'); ?>
        <ul class="link-list">
          <li><a href="#">Projects</a></li>
          <li><a href="#">ESG Reports</a></li>
          <li><a href="#">Newsroom</a></li>
          <li><a href="#">Bulletins</a></li>
        </ul>
      </section>

      <section class="footer-section">
        <?php render_heading('offices', $footer_heading_level, 'title'); ?>
        <ul class="link-list">
          <li><a href="#">Calgary, AB, Canada</a></li>
          <li><a href="#">Carlsbad, CA, United States</a></li>
          <li><a href="#">Saskatoon, SK, Canada</a></li>
          <li><a href="#">St. Michael, Barbados</a></li>
          <li><a href="#">Vancouver, BC, Canada</a></li>
        </ul>
      </section>

      <section class="footer-section">
        <?php render_heading('safeguards', $footer_heading_level, 'title'); ?>
        <ul class="link-list">
          <li><a href="#">Health, Safety & Environment</a></li>
          <li><a href="#">DEI Statement</a></li>
          <li><a href="#">Indigenous</a></li>
          <li><a href="#">Privacy</a></li>
        </ul>
      </section>

      <section class="footer-section">
        <?php render_heading('work with us', $footer_heading_level, 'title'); ?>
        <ul class="link-list">
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">Careers</a></li>
        </ul>
      </section>
    </div>

    <div class="footer-social">
      <a href="#" aria-label="LinkedIn"><img src="../assets/img/linkedin.png" alt="linkedin icon" /></a>
      <a href="#" aria-label="YouTube"><img src="../assets/img/youtube.png" alt="youtube icon" /></a>
      <a href="#" aria-label="X (formerly Twitter)"><img src="../assets/img/x.png" alt="x icon" /></a>
      <a href="#" aria-label="Facebook"><img src="../assets/img/facebook.png" alt="facebook icon" /></a>
    </div>
  </div>

  <div class="footer-social mobile">
    <a href="#" aria-label="LinkedIn"><img src="../assets/img/linkedinSmall.png" alt="linkedin icon" /></a>
    <a href="#" aria-label="YouTube"><img src="../assets/img/youtubeSmall.png" alt="youtube icon" /></a>
    <a href="#" aria-label="X (formerly Twitter)"><img src="../assets/img/xSmall.png" alt="x icon" /></a>
    <a href="#" aria-label="Facebook"><img src="../assets/img/facebookSmall.png" alt="facebook icon" /></a>
  </div>

  <div class="footer-bottom">
    <p class="copyright tablet">© All Rights Reserved. Integrated Sustainability 2025</p>
    <div class="bottom-links">
      <a class="link link--text" href="#">Term of Use</a>
      <a class="link link--text" href="#">Privacy Policy</a>
      <a class="link link--text mobile" href="#">Site Map</a>
    </div>
  </div>
</footer>
<!-- end footer -->