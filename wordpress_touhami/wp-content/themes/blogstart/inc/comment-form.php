<?php
/**
 *
 * Modifiying WordPress default Comment Fields
 *
 * @package blogstart
 */

add_filter( 'comment_form_default_fields', 'blogstart_comment_form' );
/**
 *
 * Blogstart Comment form custmoize
 *
 * @param args $blogstart_fields comment form deault fields.
 */
function blogstart_comment_form( $blogstart_fields ) {
	$blogstart_fields['author'] = '<div class="col-md-6">
                  <div class="form-group d-flex justify-content-between mb-20">
                    <input type="text" name="author" id="name-cmt" placeholder="Name">
                  </div>
                </div>';
	$blogstart_fields['email'] = ' <div class="col-md-6">
                  <div class="form-group d-flex justify-content-between mb-20">
                    <input type="email" name="email" id="email-cmt" placeholder="Email">
                  </div>
                </div>';
	$blogstart_fields['url'] = ' ';
	$blogstart_fields['cookies'] = ' ';
	return $blogstart_fields;
}
add_filter( 'comment_form_defaults', 'blogstart_comment_default_forms' );
/**
 *
 * Blogstart Comment form textarea customize
 *
 * @param args $default_form blogstart default comment form textarea and button.
 */
function blogstart_comment_default_forms( $default_form ) {
	$default_form['comment_field'] = '<div class="row"><div class="col-sm-12">
                  <div class="form-group d-flex justify-content-between mb-20 comment-message">
                    <textarea name="comment" rows="7" placeholder="Comments"></textarea>
                  </div>
                </div>';
	$default_form['submit_button'] = '</div><div class="submit-button"> <button type="submit" class="submit">' . __( 'Post Comment', 'blogstart' ) . '</button></div></div>';
	$default_form['comment_notes_before'] = '';
	$default_form['title_reply'] = __( 'leave a Comment', 'blogstart' );
	$default_form['title_reply_before'] = '<div class="comments-from"><h2 class="widget-title">';
	$default_form['title_reply_after'] = '</h2>';
	return $default_form;
}
