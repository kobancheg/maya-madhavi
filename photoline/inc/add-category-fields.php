<?php
/**
 * Custom fields for Category
 * @package Photoline
 */
add_action('category_add_form_fields','add_extra_fields_to_category');
add_action( 'create_category', 'save_extra_taxonomy_fields' );
add_action('category_edit_form_fields','edit_extra_fields_for_category');
add_action( 'edit_category', 'save_extra_taxonomy_fields' );

function add_extra_fields_to_category($taxonomy_name) {
?>

    <div class="form-field">
        <label for="category-select"><?php _e('Templates','photoline'); ?></label>
        <select name="category-select" id="category-select">
            <option value=""><?php _e('Default','photoline'); ?></option>
            <option value="square"><?php _e('Square Tiles','photoline'); ?></option>
            <option value="mosaic"><?php _e('Mosaic Tiles','photoline'); ?></option>
        </select>
        <p><?php _e('Select Category Templates','photoline'); ?></p>
    </div>
    <?php
}

function save_extra_taxonomy_fields( $term_id ) {

    $term_item = get_term( $term_id, 'category' );
    $term_slug = $term_item->slug;

// Sanitize before saving
$term_category_select = sanitize_text_field( $_POST['category-select'] );

// Save
update_option('term_category_select_' . $term_slug, $term_category_select);

}

function edit_extra_fields_for_category($term){

    $term_slug = $term->slug;
    $term_category_select = get_option('term_category_select_' . $term_slug); 

?>

    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="category-select"><?php _e('Templates','photoline'); ?></label>
        </th>
        <td>
            <select name="category-select" id="category-select" value="<?php echo $term_category_select; ?>">
                <option value="" <?php if($term_category_select==''){ echo 'selected';}?>><?php _e('Default','photoline'); ?></option>
                <option value="square" <?php if($term_category_select=='square'){ echo 'selected';}?>><?php _e('Square Tiles','photoline'); ?></option>
                <option value="mosaic" <?php if($term_category_select=='mosaic'){ echo 'selected';}?>><?php _e('Mosaic Tiles','photoline'); ?></option>
            </select>
            <p class="description"><?php _e('Select Category Templates','photoline'); ?></p>
        </td>
    </tr>

    <?php
}