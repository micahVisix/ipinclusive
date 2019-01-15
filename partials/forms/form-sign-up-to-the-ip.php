<?php if ( af_has_submission() ) : ?>
  <div class="callout success">
    <h5>Form Submission Successful!</h5>
    <p><?= ($form['display']['success_message'] ?: 'Thanks for getting in touch.') ?></p>
  </div>
<?php elseif ( $restriction ) : ?>

  <div class="callout alert">
    <h5>Restricted.</h5>
    <p><?= $restriction ?></p>
  </div>

<?php else : ?>

  <form <?= acf_esc_atts( $form_attributes ); ?>>

    <?php visix_partial( 'inputs/hidden', compact('hidden_inputs'), VISIX_PLUGIN_FORMS_NAME ); ?>

    <?php wp_nonce_field( 'form_submission', '_acfnonce' ) ?>

    <?php foreach ($field_groups as $field_group) : ?>
      <?php if (isset($form['display_title'])) : ?><fieldset><?php endif; ?>

        <div class="form-wrapper-orange"> <!--Start of form wrappe-->

          <div class="section section-form-1 ip-white-bg"> <!--Start of section 1 of the form-->
            <div class="grid-container">

              <div class="grid-x grid-padding-x grid-margin-y">
                <div class="cell medium-6 large-4">
                  <h3 class="h1 ip-orange">
                    A charter for equality, diversity and inclusion
                  </h3>
                </div>
                <div class="cell medium-6 large-8">
                  <div class="grid-x grid-margin-y">

                    <div class="cell">
                      <p>* Indicates required field</p>
                    </div>

                    <div class="cell">

                      <?php foreach ($field_group['fields'] as $key => $field) : ?>

                        <?php if ($key < 3): ?>
                          <?php visix_partial( 'inputs/field', compact( 'field' ), VISIX_PLUGIN_FORMS_NAME ); ?>
                          <div class="spacer tiny"></div>
                        <?php endif; ?>

                      <?php endforeach; ?>

                    </div>

                    <div class="cell">
                      <p>The organisation will be named as a signatory in the public area of the IP Inclusive website.</p>
                    </div>

                    <div class="cell">

                      <?php foreach ($field_group['fields'] as $key => $field) : ?>

                        <?php if ($key >= 3 && $key < 8): ?>
                          <?php visix_partial( 'inputs/field', compact( 'field' ), VISIX_PLUGIN_FORMS_NAME ); ?>
                          <div class="spacer tiny"></div>
                        <?php endif; ?>

                      <?php endforeach; ?>

                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div> <!--End of section 1 of the form-->

          <div class="section section-form-2 ip-white-smoke-bg"> <!--Start of section 2 of the form-->
            <div class="grid-container">

              <div class="grid-x grid-padding-x grid-margin-y">
                <div class="cell medium-6 large-4">
                  <h3 class="h1 ip-teal">
                    I am signing:
                  </h3>
                </div>
                <div class="cell medium-6 large-8">
                  <div class="grid-x grid-margin-y">

                    <div class="cell">
                      <?php
                      $field = get_form_field_by_name($field_group['fields'], 'sign_up_option');
                      $field['show_label'] = false;
                      visix_partial( 'inputs/field', compact( 'field' ), VISIX_PLUGIN_FORMS_NAME );
                      ?>
                    </div>

                    <div class="cell">
                      <button type="submit" class="button clear orange">Submit <i class="icon icon-long-arrow-right ip-orange"></i></button>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div> <!--End of section 2 of the form-->

        </div> <!--End of form wrappe-->

      <?php endforeach; ?>

    </form>

  <?php endif; ?>