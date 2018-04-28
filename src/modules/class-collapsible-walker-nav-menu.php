<?php

/**
 * Implement sub menu items as a collapsible
 *
 * @since 3.0.0
 *
 * @see Walker
 */
class Collapsible_Walker_Nav_Menu extends Walker_Nav_Menu {
    /**
     * Traverse elements to create list from elements.
     *
     * Display one element if the element doesn't have any children otherwise,
     * display the element and its children. Will only traverse up to the max
     * depth and no ignore elements under that depth. It is possible to set the
     * max depth to include all depths, see walk() method.
     *
     * This method should not be called directly, use the walk() method instead.
     *
     * @since 2.5.0
     *
     * @param object $element           Data object.
     * @param array  $children_elements List of elements to continue traversing (passed by reference).
     * @param int    $max_depth         Max depth to traverse.
     * @param int    $depth             Depth of current element.
     * @param array  $args              An array of arguments.
     * @param string $output            Used to append additional content (passed by reference).
     */
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element ) {
            return;
        }

        $id_field = $this->db_fields['id'];
        $id       = $element->$id_field;

        //display this element
        $this->has_children = ! empty( $children_elements[ $id ] );
        if ( isset( $args[0] ) && is_array( $args[0] ) ) {
            $args[0]['has_children'] = $this->has_children; // Back-compat.
        }

        $cb_args = array_merge( array(&$output, $element, $depth), $args);
        call_user_func_array(array($this, 'start_el'), $cb_args);

        // descend only when the depth is right and there are childrens for this element
        if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

            foreach ( $children_elements[ $id ] as $child ){

                if ( !isset($newlevel) ) {
                    $newlevel = true;
                    //start the child delimiter
                    $cb_args = array_merge( array(&$output, $element, $depth), $args);
                    call_user_func_array(array($this, 'custom_start_lvl'), $cb_args);
                }
                $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
            }
            unset( $children_elements[ $id ] );
        }

        if ( isset($newlevel) && $newlevel ){
            //end the child delimiter
            $cb_args = array_merge( array(&$output, $depth), $args);
            call_user_func_array(array($this, 'end_lvl'), $cb_args);
        }

        //end this element
        $cb_args = array_merge( array(&$output, $element, $depth), $args);
        call_user_func_array(array($this, 'end_el'), $cb_args);
    }

    /**
     * Starts the list before the elements are added.
     *
     * @since 3.0.0
     *
     * @see Walker::custom_start_lvl()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param WP_Post  $parent Menu item data object.
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function custom_start_lvl( &$output, $parent, $depth = 0, $args = array() ) {
        global $wpdb;
        global $post;

        $class = "";

        if ( !empty( $post ) ) {
            $children = $wpdb->get_results( "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_menu_item_menu_item_parent' AND meta_value = {$parent->ID}" );
            $children_ids = array();
            foreach ( $children as $child ) {
                $children_ids[] = $child->post_id;
            }
            $children = implode( ',', $children_ids );
            $active_child = $wpdb->get_results( "SELECT meta_id FROM {$wpdb->postmeta} WHERE post_id IN ({$children}) AND meta_key = '_menu_item_object_id' AND meta_value = {$post->ID}");

            $is_active = !empty( $active_child );

            if ($is_active) {
                $class = ' class="active"';
            }
        }

        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );

        $output .= '<li class="no-padding"><ul class="collapsible collapsible-accordion">';

        $output .= '<li' . $class . '><a class="hide"></a>';

        $output .= '<div class="collapsible-body">';

        $output .= "{$n}{$indent}<ul>{$n}";
    }

    /**
     * Ends the list of after the elements are added.
     *
     * @since 3.0.0
     *
     * @see Walker::end_lvl()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
        $output .= "$indent</ul>{$n}";

        $output .= '</div>';

        $output .= '</li>';

        $output .= '</ul></li>';
    }

} // Walker_Nav_Menu
