<?php
/**
 * BF Anna Theme Customizer
 *
 * @package BF_Anna
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bf_anna_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'bf_anna_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bf_anna_customize_preview_js() {
	wp_enqueue_script( 'bf_anna_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bf_anna_customize_preview_js' );


// Добавляем в кастомайзер поля для редактирования страницы Контакты и Помощь
function contacts_assistance_page_customize($wp_customize) {
    // Страница Контакты
    $wp_customize -> add_section('contacts_section', array(
        'title' => 'Страница "Контакты"',
    ));

    $wp_customize -> add_setting('contacts_title_ru_setting', array(
        'default' => 'Контакты',
    ));

    $wp_customize -> add_setting('contacts_title_ua_setting', array(
        'default' => 'Контакти',
    ));

    $wp_customize -> add_setting('contacts_text_ru_setting', array(

    ));

    $wp_customize -> add_setting('contacts_text_ua_setting', array(

    ));

    $wp_customize -> add_setting('contacts_map_setting', array(

    ));

    $wp_customize -> add_control(new WP_Customize_Control($wp_customize, contacts_title_ru_control, array(
        'label' => 'Заголовок страницы',
        'section' => 'contacts_section',
        'settings' => 'contacts_title_ru_setting',
    )));

    $wp_customize -> add_control(new WP_Customize_Control($wp_customize, contacts_title_ua_control, array(
        'label' => 'Заголовок сторінки',
        'section' => 'contacts_section',
        'settings' => 'contacts_title_ua_setting',
    )));

    $wp_customize -> add_control(new WP_Customize_Control($wp_customize, contacts_text_ru_control, array(
        'label' => 'Контактные данные',
        'section' => 'contacts_section',
        'settings' => 'contacts_text_ru_setting',
        'type' => 'textarea',
    )));

    $wp_customize -> add_control(new WP_Customize_Control($wp_customize, contacts_text_ua_control, array(
        'label' => 'Контактні дані',
        'section' => 'contacts_section',
        'settings' => 'contacts_text_ru_setting',
        'type' => 'textarea',
    )));

    $wp_customize -> add_control(new WP_Customize_Control($wp_customize, contacts_map_control, array(
        'label' => 'Карта (в это поле вставить код карты из Google Maps)',
        'section' => 'contacts_section',
        'settings' => 'contacts_map_setting',
    )));


    $wp_customize -> add_setting('my_contact_setting');
    // Страница Реквизиты

}

add_action('customize_register', 'contacts_assistance_page_customize');