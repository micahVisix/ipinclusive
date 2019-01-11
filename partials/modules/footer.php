<footer>
  <div class="grid-container">
    <div class="grid-x grid-padding-x grid-margin-y medium-up-2 large-up-4">
      <div class="cell">
        <h3><a href="<?= site_url('about'); ?>" class="ip-white">About us</a></h3>

        <ul class="menu no-bullet">
          <?php $about_page_title = get_page_id_by_title('About'); ?>

          <?php $child_pages = get_all_child_pages($about_page_title);

          foreach($child_pages as $child): ?>
          <li>
            <a href="<?= get_permalink($child); ?>"><?= get_the_title($child); ?></a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="cell">
        <h3><a href="" class="ip-white">Communities</a></h3>

        <ul class="menu no-bullet">
          <?php $communities = get_pages_by_post_type('community');

          foreach($communities as $community):?>

          <li>
            <a href="<?= get_permalink($community); ?>"><?= get_the_title($community); ?></a>
          </li>

          <?php endforeach; ?>
        </ul>
      </div>

      <div class="cell">
        <h3><a href="" class="ip-white">Resources</a></h3>
      </div>

      <div class="cell">
        <h3><a href="" class="ip-white">Events</a></h3>
      </div>

      <div class="cell">
        <h3><a href="" class="ip-white">Our Supporters &amp Partners</a></h3>
      </div>

      <div class="cell">
        <h3><a href="" class="ip-white">News &amp Features</a></h3>

        <ul class="menu no-bullet">
          <?php $articles = get_pages_by_post_type('post');

          foreach($articles as $article):?>

          <li>
            <a href="<?= get_permalink($article); ?>"><?= get_the_title($article); ?></a>
          </li>

          <?php endforeach; ?>
        </ul>
      </div>

      <div class="cell large-auto">
        <h3><a href="<?= site_url('contact'); ?>" class="ip-white">Contact</a></h3>

        <?php if (have_rows('profile', 'option')): ?>

        <ul class="menu no-bullet no-arrows">

          <?php while(have_rows('profile', 'option')): the_row();
            $social_profile = get_sub_field('social_profile'); ?>
            <li><a target="_blank" href="<?= get_sub_field('social_profile_url'); ?>" class=""><i class="icon icon-<?= $social_profile['value']; ?>"></i> <?= $social_profile['label']; ?></a></li>
          <?php endwhile; ?>

        </ul>

        <?php endif; ?>
      </div>
    </div>

    <div class="spacer"></div>

    <div class="grid-x grid-margin-y">
      <div class="cell small-6">
        <span class="copyright ip-white">&copy; Copyright <?= bloginfo().' '.date('Y'); ?></span>
      </div>

      <?php
      $rows = get_field('sub_footer_items', 'option');
      ?>
      <?php if($rows): ?>
      <div class="cell medium-6">
        <div class="grid-x sub-footer">
          <?php foreach($rows as $row): ?>

            <div class="cell medium-4"><a href="<?= esc_url($row['item']['url']); ?>" class="ip-white"><?= $row['item']['title']; ?></a></div>

          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </div>
</footer>

<aside class="fixed-social">
  <?php if (have_rows('profile', 'option')): ?>

    <?php while(have_rows('profile', 'option')): the_row();
      $social_profile = get_sub_field('social_profile'); ?>

      <div class="social">
        <a href="<?= get_sub_field('social_profile_url'); ?>" target="_blank"><i class="icon icon-<?= $social_profile['value']; ?>"></i></a>
      </div>

    <?php endwhile; ?>

  <?php endif; ?>
</aside>
