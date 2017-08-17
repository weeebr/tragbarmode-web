<form name="search_form" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="pm_search_form">
    <input type="text" class="search_input" name="s" placeholder="<?php echo __('Search', 'pm_local'); ?>" value="">
    <input type="submit" class="search_button" value="<?php echo __('Search', 'pm_local'); ?>">
</form>