<?php get_header(); ?>

  <div class="merchants">
      <h1 class="merchants__title stc-h1" id="merchants-title">Merchant Locations</h1>
    <div class="merchants__filter">
      <div class="filter">
          <h4 class="filter__text stc-h4" id="filter-text">Filter Merchants</h4>
        </div>
        <div class="map" id="map"></div>
      </div>
      <div class="merchants__form">
        <div class="registration-form__header">
          <h1 class="form-header__title stc-h1" id="form-title">Merchant Registration</h1>
          <h4 class="form-header__desc stc-h4" id="form-desc">Tell us which brand you want to see at STC Pay Network</h4>
        </div>
        <div class="registration-form__group" id="form-ltr">
          <?php
            echo do_shortcode(
              '[contact-form-7 id="17" title="Contact form 1"]'
            );
          ?>
        </div>
        <div class="registration-form__group" id="form-rtl">
          <?php
            echo do_shortcode(
              '[contact-form-7 id="55" title="Contact Form Ar"]'
            );
          ?>
        </div>
      </div>
  </div>

<?php get_footer(); ?>