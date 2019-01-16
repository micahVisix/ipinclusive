<?php

function get_all_news_cat($tax) {
  return get_categories(array(
    'orderby' => 'name',
    'taxonomy' => $tax,
  ));
}

function get_all_news_tags(){
  return get_tags(array(
    'orderby' => 'name',
    'post_type' => 'post'
  ));
}

function getPostViews($postID){
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return "0";
  }
  return $count;
}

function setPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
  }else{
    $count++;
    update_post_meta($postID, $count_key, $count);
  }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/**
* Register post form with options
*
* @param array		$post_data	$_GET or $_POST array of request
* @param array 	$args				WP_Query args
*
* @return array 	Specific args for post form
*/
add_filter('visix_register_post_forms', function ($post_forms) {

  $post_forms['news'] = [
    'submit_type' 		=> 'on-change',	// on-submit / on-change
    'pagination_type' => 'load-more'	// load-more / page-numbers
  ];

  return $post_forms;

}, 1, 10);

/**
* Change post form args
*
* @param array		$post_data	$_GET or $_POST array of request
* @param array 	$args				WP_Query args
*
* @return array 	Specific args for post form
*/
add_filter('visix_post_forms_args_news', function ($args, $post_data) {

  $args['post_type'] = 'post';
  $args['showposts'] = 6;
  if(isset($post_data['news_cat_id']) && $post_data['news_cat_id'] ) {
    $args['cat'] = $post_data['news_cat_id'];
  }

  if(isset($post_data['news_tag_id']) && $post_data['news_tag_id'] ) {
    $args['tag_id'] = $post_data['news_tag_id'];
  }

  if ($post_data['recommended'] == '1') {
    $args['orderby'] = 'meta_value_num';

    $args['meta_query'] = array(
      array(
        'key' => 'post_views_count',
        'value' => 5,
        'compare' => '>='
      )
    );
  } elseif($post_data['recommended'] == '2') {
    $args['orderby'] = 'date';
    $args['order'] = 'ASC';
  }


  return $args;

}, 1, 10);

/**
* Generate posts html
*
* @param array $post_ids	List of post ids from query
*
* @param array List of html for each post
*/
add_filter('visix_post_forms_posts_html_news', function ($posts_html, $post_ids) {

  foreach ($post_ids as $post_id) {

    $posts_html[] =  visix_partial('listings/article', ['post_id' => $post_id], false, false);

  }

  return $posts_html;

}, 1, 10);

/**
 * Generate empty posts html message
 *
 * @param array $post_ids	List of post ids from query
 *
 * @return String HTML of no posts found
 */
add_filter('visix_post_forms_posts_empty_html_signatories', function () {

	return sprintf('
  <div class="cell text-center">
    <div class="spacer"></div>
      <h3>No Signatories found</h3>
    <div class="spacer"></div>
  </div>
  ');

}, 1, 10);
