<div class="cell medium-6 large-4 <?= get_post_type($info); ?>" id="post-<?= $info; ?>">

  <div class="card">


    <?php $card_image = get_the_post_thumbnail_url($info); ?>
    <a target="_blank" href="<?= get_field('company_url',$info); ?>" class="card-image <?php if($card_image): ?> b-lazy <?php endif; ?>" <?php if($card_image): ?> data-blazy="<?= get_the_post_thumbnail_url($info); ?>" <?php endif; ?>>
    </a>
    <div class="card-section">
      <?php $support_type = get_field('type', $info); ?>

      <?php if(is_array($support_type)): ?>

        <h3 class="ip-pink h5">
          <?php foreach ($support_type as $support_type_index =>  $support) : ?>

            <?= $support.'&nbsp;'; ?>

          <?php endforeach; ?>

        </h3>
      <?php else: ?>

        <h3 class="ip-pink h5"><?= get_the_title($support_type); ?></h3>

      <?php endif; ?>
    </div>
  </div>
</div>