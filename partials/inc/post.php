<div class="cell medium-6 large-4 <?= get_post_type($info); ?>" id="post-<?= $info; ?>">

  <span class="event-url">
    <?php echo sharethis_inline_buttons(); ?>
  </span>

  <div class="card">

    <?php $image_id = get_post_thumbnail_id($info); ?>

    <?php $card_image = get_the_post_thumbnail_url($info); ?>
    <a href="<?= get_permalink($info); ?>" class="card-image b-lazy" style="background-image: url(<?= wp_get_attachment_image_src($image_id, 'small')[0];  ?>);" data-blazy="<?= wp_get_attachment_image_src($image_id, 'medium')[0]; ?>">
    </a>
    <div class="card-section">
      <?php
        $post_categories = wp_get_post_categories( $info );
        $cats = array();
      ?>

      <div class="spacer tiny"></div>
        <h5 class="ip-pink h6">Categories:</h5>
        <h5 class="ip-pink h6">
          <?php foreach ($post_categories as $c_index => $c) :

            $cat = get_category( $c ); ?>

            <?php $itemPos = ( $c_index !== count( $post_categories ) -1 ) ? "," : ""; ?>

            <a class="ip-pink" href="<?= site_url("newsandfeatures/?news_cat_id=$cat->term_id"); ?>"><?= $cat->name; ?></a><?= $itemPos; ?>

          <?php endforeach; ?>

        </h5>

      <div class="spacer tiny"></div>

      <a href="<?= get_permalink($info); ?>" class="ip-pink h3"><h3><?= get_the_title($info); ?></h3></a>
      <div class="spacer tiny"></div>

      <div class="grid-x small-up-2 align-middle">
        <div class="cell">
          <time><i class="icon icon-comment ip-pink"></i> <?= get_comments_number($info); ?></time>
        </div>

        <div class="cell">
          <time><i class="icon icon-eye ip-pink"></i> <?= getPostViews($info); ?></time>
        </div>
      </div>

      <div class="spacer small"></div>
      <a class="button clear pink" href="<?= get_permalink($info); ?>">Read <i class="icon icon-long-arrow-right"></i></a>
    </div>
  </div>
</div>
