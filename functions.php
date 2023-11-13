<?php 

function planty_add_admin_link_to_nav_menu($items, $args) {

    // Je vérifie si l'utilisateur est connecté

    if($args->menu == "planty-footer")  {
        return $items;
    }

    if (is_user_logged_in()) {

        // Je vérifie si l'utilisateur a un rôle d'administrateur
        $user = wp_get_current_user();
        if (in_array('administrator', $user->roles)) {
            // J' ajoute le lien "admin" au menu
            $admin_link = '<li class="admin-link"><a class="Admin-button" href="/wp-admin/">Admin</a></li>';

            // mettre au milieu de la nav
            $items_array = explode('</li>', $items);
            $middle_index = floor(count($items_array) / 2);

            // pour mettre le lien Admin au milieu de la nav 
            array_splice($items_array, $middle_index, 0, $admin_link);

            $items = implode('</li>', $items_array);
        }
    }
    return $items;
}

add_filter('wp_nav_menu_items', 'planty_add_admin_link_to_nav_menu', 10, 2);

function planty_register_menu() {

    register_nav_menu(
        
      'planty-footer',
      'footer-menu'
    );

  }
  add_action( 'after_setup_theme', 'planty_register_menu' );


?>


