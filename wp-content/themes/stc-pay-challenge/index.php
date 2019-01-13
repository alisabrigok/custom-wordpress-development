<?php get_header(); ?>

  <div class="merchants">
      <h1 class="merchants__title stc-h1">Merchant Locations</h1>
    <div class="merchants__filter">
      <div class="filter">
          <h4 class="filter__text stc-h4">Filter Merchants</h4>
        </div>
        <div class="map" id="map"></div>
      </div>
      <div class="merchants__form">
        <div class="registration-form__header">
          <h1 class="form-header__title stc-h1">Merchant Registration</h1>
          <h4 class="form-header__desc stc-h4">Tell us which brand you want to see at STC Pay Network</h4>
        </div>
        <div class="registration-form__group">
          <!-- {status && message && (
            <div class={`group__message ${messageClass}`}>
              {message}
              <div class="close" onClick={() => this.setState({status: '', message: ''})}>&times;</div>
            </div>
          )} -->
          <?php
            echo do_shortcode(
              '[contact-form-7 id="17" title="Contact form 1"]'
            );
          ?>
        </div>
      </div>
  </div>

<?php get_footer(); ?>