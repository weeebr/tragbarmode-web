<?php

/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*/

if (post_password_required()) {
    echo '<p class="nocomments">' . __('This post is password protected. Enter the password to view comments.', 'pm_local') . '</p>';
    return;
} else {
    ?>

    <div class="comments">

        <?php

        if (is_singular()) wp_enqueue_script('comment-reply');

        if (have_comments()) { ?>
            <h4 class="preview_headers"><?php echo $post->comment_count . ' ' . __('Comments', 'pm_local') . ": "; ?></h4>
            <?php wp_list_comments('type=comment&callback=pm_comment'); ?>
            <div class="dn"><?php paginate_comments_links(); ?></div>
        <?php }

        if ($post->comment_status == 'open') {

            $comment_form = array(
                'fields' => apply_filters('comment_form_default_fields', array(
                    'author' => '<label class="label-name"></label><input type="text" placeholder="' . __('Name*', 'pm_local') . '" title="' . __('Name *', 'pm_local') . '" id="author" name="author" class="form_field">',
                    'email' => '<label class="label-email"></label><input type="text" placeholder="' . __('Email*', 'pm_local') . '" title="' . __('Email *', 'pm_local') . '" id="email" name="email" class="form_field">',
                    'url' => '<label class="label-web"></label><input type="text" placeholder="' . __('URL*', 'pm_local') . '" title="' . __('URL', 'pm_local') . '" id="web" name="url" class="form_field">'
                )),
                'comment_field' => '<label class="label-message"></label><textarea name="comment" cols="45" rows="5" placeholder="' . __('Message', 'pm_local') . '" id="comment-message" class="form_field"></textarea>',
                'comment_form_before' => '',
                'comment_form_after' => '',
                'must_log_in' => __('You must be logged in to post a comment.', 'pm_local'),
                'title_reply' => __('Leave a Reply!', 'pm_local'),
                'label_submit' => __('Post Comment', 'pm_local'),
                'logged_in_as' => '<p class="logged-in-as">' . __('Logged in as', 'pm_local') . ' <a href="' . admin_url('profile.php') . '">' . $user_identity . '</a>. <a href="' . wp_logout_url(apply_filters('the_permalink', get_permalink())) . '">' . __('Log out?', 'pm_local') . '</a></p>',
            );
            comment_form($comment_form, $post->ID);

        } else {
            # Comments are closed
            ?>
            <p><?php /* _e('Sorry, the comment form is closed at this time.', 'pm_local'); */ ?></p>
        <?php } ?>
    </div>
<?php
}