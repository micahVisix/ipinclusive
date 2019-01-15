<?php if ( isset( $field['choices'] ) && is_array( $field['choices'] ) ) : ?>
  <div class="input-container">
    <select <?= acf_esc_atts($attributes); ?>>
      <?php if ($field['allow_null']) : ?>
        <option value=""><?= (isset($field['placeholder']) ? $field['placeholder'] : 'Please Select'); ?></option>
      <?php endif; ?>
      <?php foreach ($field['choices'] as $value => $label) : ?>
        <option value="<?= $value; ?>" <?php selected($value, $field['value']); ?> <?= (isset($field['option']) && isset($field['option']['attributes']) ? acf_esc_atts($field['option']['attributes']) : ''); ?>><?= $label; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
<?php endif; ?>