<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */

// Do not delete these lines
if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
        die('Please do not load this page directly. Thanks!');
}

if ( post_password_required() ) { ?>
        <p class="nocomments"><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'udesign'); ?></p>
<?php   return;
}
global $udesign_options; ?>



<!-- You can start editing from here: -->
<?php if ( have_comments() ) : ?>

            <h5 id="comments"><?php comments_number(__('No Responses', 'udesign'), __('1 Comment', 'udesign'), __('% Comments', 'udesign')); ?></h5>
            <div class="clear"></div>
            <ol class="commentlist">
<?php           wp_list_comments( 'type=comment&callback=udesign_theme_comment' ); ?>
            </ol>
            <div class="clear"></div>
<?php
            // comment pagination
            if ( function_exists('wp_commentnavi') ) :
                wp_commentnavi();
            else : ?>
                <div class="navigation">
                    <div class="alignleft"><?php previous_comments_link() ?></div>
                    <div class="alignright"><?php next_comments_link() ?></div>
                </div>
<?php       endif; ?>
            
<?php endif; ?>
            

<?php if ( comments_open() ) : ?>
            
            <div id="respond">
                <h5><?php comment_form_title(__('Leave a Reply', 'udesign'), __('Leave a Reply to %s', 'udesign')); ?></h5>
                <div class="cancel-comment-reply">
                    <small><?php cancel_comment_reply_link(); ?></small>
                </div>

<?php           if ( get_option('comment_registration') && !is_user_logged_in() ) :
                    printf( __('<p>You must be <a href="%s">logged in</a> to post a comment.</p>', 'udesign'), wp_login_url(get_permalink()) );
                else : ?>
                    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php                   if ( is_user_logged_in() ) : ?>
                            <p><?php printf(__('Logged in as <a href="%1$s/wp-admin/profile.php">%2$s</a>.', 'udesign'), get_option('siteurl'), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_html_e('Log out of this account', 'udesign'); ?>"><?php esc_html_e('Log out &raquo;', 'udesign'); ?></a></p>
<?php                   else : ?>
                            <p>
                                <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                                <label for="author"><small><?php esc_html_e('Name', 'udesign'); ?> <?php if ($req) esc_html_e('(required)', 'udesign'); ?></small></label>
                            </p>
                            <p>
                                <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                                <label for="email"><small><?php esc_html_e('Mail (will not be published)', 'udesign'); ?> <?php if ($req) esc_html_e('(required)', 'udesign'); ?></small></label>
                            </p>
                            <p>
                                <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
                                <label for="url"><small><?php esc_html_e('Website', 'udesign'); ?></small></label>
                            </p>
<?php                   endif; ?>
                        <!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php //echo allowed_tags(); ?></code></small></p>-->
                        <p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
                        <p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Submit Comment', 'udesign'); ?>" /><?php comment_id_fields(); ?></p>
<?php                   do_action( 'comment_form', $post->ID ); ?>
                    </form>
<?php           endif; // If registration required and not logged in  ?>
            </div><!-- end respond -->
            
<?php elseif ( $udesign_options['show_comments_are_closed_message'] ) : // comments are closed ?>
            
            <p class="nocomments"><?php esc_html_e('Comments are closed.', 'udesign'); ?></p>
            
<?php endif; // if you delete this the sky will fall on your head


