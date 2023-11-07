<?php 

function add_admin_link_to_nav_menu($items, $args) {
    // Je vérifie si l'utilisateur est connecté
    if (is_user_logged_in()) {
        // Je vérifie si l'utilisateur actuel a le rôle d'administrateur
        $user = wp_get_current_user();
        if (in_array('administrator', $user->roles)) {
            // J' Ajoute le lien "admin" au menu
            $admin_link = '<li><a href="/wp-admin/">Admin</a></li>';

            // Trouve le milieu de la barre de navigation
            $items_array = explode('</li>', $items);
            $middle_index = floor(count($items_array) / 2);

            // J'Insére le lien "Admin" au milieu
            array_splice($items_array, $middle_index, 0, $admin_link);

            // Rejoindre à nouveau les éléments
            $items = implode('</li>', $items_array);
        }
    }
    return $items;
}

add_filter('wp_nav_menu_items', 'add_admin_link_to_nav_menu', 10, 2);



function enqueue_custom_script() {
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');

?>


