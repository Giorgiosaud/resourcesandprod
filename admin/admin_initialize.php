<?php
add_action('admin_menu', 'child_theme_menu');
function child_theme_menu() {
	add_theme_page('Zonapro Options', 'Zonapro Child Theme Option', 'edit_theme_options', 'child_theme_option', 'child_options');
}
function child_options()
{
	echo require CHILD_ADMIN_DIR.'/Page/child_options_settings.php';
}
