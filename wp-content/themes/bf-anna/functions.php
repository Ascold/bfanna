<?php
/**
 * BF Anna functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BF_Anna
 */

if (!function_exists('bf_anna_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function bf_anna_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on BF Anna, use a find and replace
         * to change 'bf-anna' to the name of your theme in all the template files.
         */
        load_theme_textdomain('bf-anna', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        //Add image sizes
        add_image_size('front-page-slider-image', 1400, 460, true);
        add_image_size('album-grid', 500, 300, true);
        add_image_size('thumb-gallery', 350, 250, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'bf-anna'),
            'menu-2' => esc_html__('Menu for lang switcher'),
            'menu-3' => esc_html__('Menu in footer'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('bf_anna_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
    }
endif;
add_action('after_setup_theme', 'bf_anna_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bf_anna_content_width()
{
    $GLOBALS['content_width'] = apply_filters('bf_anna_content_width', 640);
}

add_action('after_setup_theme', 'bf_anna_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bf_anna_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'bf-anna'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'bf-anna'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('gallery', 'bf-anna'),
        'id' => 'photo-gallery',
        'description' => esc_html__('Add widgets here.', 'bf-anna'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'bf_anna_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function bf_anna_scripts()
{
    wp_enqueue_style('bf-anna-style', get_stylesheet_uri());

    wp_enqueue_script('bf-anna-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('bf-anna-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    //Register jQuery
    wp_enqueue_script('jquery');

    //Register owl-carousel files
    wp_enqueue_script('OwlCarousel-scripts', get_stylesheet_directory_uri() . '/libs/OwlCarousel/dist/owl.carousel.min.js', array('jquery'), ' ');
    wp_enqueue_style('OwlCarousel', get_template_directory_uri() . '/libs/OwlCarousel/dist/assets/owl.carousel.min.css', array(), ' ');

    //Register flex-slider files
    wp_enqueue_script('flexslider-scripts', get_stylesheet_directory_uri() . '/libs/flexslider/jquery.flexslider.js', array('jquery'), ' ');
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/libs/flexslider/flexslider.css', array(), ' ');

    //Register bootstrap css from CDN
    wp_register_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-css');

    //Register bootstrap js from CDN
    wp_register_script('bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
    wp_enqueue_script('bootstrap-js');

    //Register Font Awesome
    wp_register_script('font-awesome', '//use.fontawesome.com/6eebe0124d.js');
    wp_enqueue_script('font-awesome');

    //Register main.js file
    wp_enqueue_script('main-js-file', get_template_directory_uri() . '/js/main.js');

    //Register main.css file
    $theme_uri = get_template_directory_uri();
    wp_register_style('bfanna-theme-style', $theme_uri . '/css/main.css', false, '0.1');
    wp_enqueue_style('bfanna-theme-style');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'bf_anna_scripts');

/**
 * Loading google fonts
 */
function load_fonts()
{
    wp_register_style('et-googleFonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,700i" rel="stylesheet');
    wp_enqueue_style('et-googleFonts');
}

add_action('wp_print_styles', 'load_fonts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function create_posttype()
{
    register_post_type('photo_gallery_img',
        array(
            'labels' => array(
                'name' => __('photo_gallery_img'),
                'singular_name' => __('gallery_img'),
                'menu_name' => __('Галлерея')
            ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields')
        )
    );

    //Registering post-type for carousel on front page
    register_post_type('slider_post',
        array(
            'labels' => array(
                'name' => __('Слайды'),
                'singular_name' => __('Слайд'),
                'add_new' => __('Новый слайд'),
                'menu_name' => __('Слайды карусели'),
                'edit_item' => __('Изменить слайд')
            ),
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => true,
            'supports' => array('thumbnail', 'title')
        )
    );
}

add_action('init', 'create_posttype');


//включение комментариев для страниц по умолчанию start
function wph_enable_comments_pages($status, $post_type, $comment_type)
{
    if ('page' === $post_type) {
        if (in_array($comment_type, array('pingback', 'trackback'))) {
            $status = get_option('default_ping_status');
        } else {
            $status = get_option('default_comment_status');
        }
    }
    return $status;
}

add_filter('get_default_comment_status', 'wph_enable_comments_pages', 10, 3);
//включение комментариев для страниц по умолчанию end


//function mytheme_comment($comment, $args, $depth)
//{
//    $GLOBALS['comment'] = $comment; ?>
<!--        <li --><?php //comment_class(); ?><!-- id="li-comment---><?php //comment_ID() ?><!--">-->
    <!--    <div id="comment---><?php //comment_ID(); ?><!--">-->
    <!--        <div class="comment-inner">-->
    <!--            <div class="title-for-comment">-->
    <!--                <h3>-->
    <!--                    --><?php //echo get_comment_meta($comment->comment_ID, 'my_metadata_key', true); ?>
    <!--                </h3>-->
    <!---->
    <!--            </div>-->
    <!--            <div class="comment-text">-->
    <!--                --><?php //comment_text() ?>
    <!--            </div>-->
    <!--            <div class="comment-footer">-->
    <!--                <div class="comment-meta commentmetadata">-->
    <!--                    <div class="fn">--><?php //echo get_comment_author_link() ?><!-- </div>-->
    <!--                    <div class="com-date">--><?php //echo get_comment_date('d/m/Y') ?><!--</div>-->
    <!--                </div>-->
    <!--                <div class="reply">-->
    <!--                    --><?php //comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!---->
    <!--    --><?php
//}
//
//?>
<?php function sort_comment_fields($fields)
{
    $new_fields = array();
    $myorder = array('author', 'title', 'comment');

    foreach ($myorder as $key) {
        $new_fields[$key] = $fields[$key];
        unset($fields[$key]);
    }

    if ($fields)
        foreach ($fields as $key => $val)
            $new_fields[$key] = $val;
    return $new_fields;
}

add_filter('comment_form_fields', 'sort_comment_fields');

function remove_comment_fields($fields)
{
    unset($fields['email']);
    return $fields;
}

add_filter('comment_form_default_fields', 'remove_comment_fields');

function add_comment_fields($fields)
{

    $fields['title'] = '<p class="comment-form-age"><label for="age">' . __('Title') . '</label>' .
        '<input id="title" name="title" type="text" size="30" /></p>';
    return $fields;
}

add_filter('comment_form_default_fields', 'add_comment_fields');

add_action('comment_post', 'add_comment_meta_values', 1);


function add_comment_meta_values($comment_id) {

    if(isset($_POST['title'])) {
        $title = wp_filter_nohtml_kses($_POST['title']);
        add_comment_meta($comment_id, 'title', $title, false);
    }
}

add_action ('comment_post', 'add_comment_meta_values', 1);


function my_comments_callback( $comment, $args, $depth ) {

    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>">
            <div class="comment-inner">
                <div class="title-for-comment">
                    <h3>
                        <?php echo get_comment_meta($comment->comment_ID, 'title', true); ?>
                    </h3>
                </div>
                <div class="comment-text">
                    <?php comment_text() ?>
                </div>
                <div class="comment-footer">
                    <div class="comment-meta commentmetadata">
                        <div class="fn"><?php echo get_comment_author_link() ?> </div>
                        <div class="com-date"><?php echo get_comment_date('d/m/Y') ?></div>
                    </div>
                    <div class="reply">
                        <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <?php
}
?>



<?php

function my_meta_box()
{
    add_meta_box(
        'date-album', // Идентификатор(id)
        'date-album', // Заголовок области с мета-полями(title)
        'show_my_metabox', // Вызов(callback)
        'photo_gallery_img', // Где будет отображаться наше поле
        'normal',
        'high');
}

add_action('add_meta_boxes', 'my_meta_box'); // Запускаем функцию

$meta_fields = array(
    array(
        'label' => 'Дата',
        'desc' => 'Введите дату',
        'id' => 'date-album', // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    )


);
// Вызов метаполей
function show_my_metabox()
{
    global $meta_fields; // Обозначим наш массив с полями глобальным
    global $post;  // Глобальный $post для получения id создаваемого/редактируемого поста
// Выводим скрытый input, для верификации. Безопасность прежде всего!
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

    // Начинаем выводить таблицу с полями через цикл
    echo '<table class="form-table">';
    foreach ($meta_fields as $field) {
        // Получаем значение если оно есть для этого поля
        $meta = get_post_meta($post->ID, $field['id'], true);
        // Начинаем выводить таблицу
        echo '<tr> 
                <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th> 
                <td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="30" />
        <br /><span class="description">' . $field['desc'] . '</span>';
                break;
            case 'textarea':
                echo '<textarea name="' . $field['id'] . '" id="' . $field['id'] . '" cols="60" rows="4">' . $meta . '</textarea> 
        <br /><span class="description">' . $field['desc'] . '</span>';
                break;
        }
        echo '</td></tr>';
    }
    echo '</table>';
}


// Пишем функцию для сохранения
function save_my_meta_fields($post_id) {
    global $meta_fields;  // Массив с нашими полями

    // проверяем наш проверочный код
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    // Проверяем авто-сохранение
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // Проверяем права доступа
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // Если все отлично, прогоняем массив через foreach
    foreach ($meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true); // Получаем старые данные (если они есть), для сверки
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {  // Если данные новые
            update_post_meta($post_id, $field['id'], $new); // Обновляем данные
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old); // Если данных нету, удаляем мету.
        }
    } // end foreach
}

add_action('save_post', 'save_my_meta_fields'); // Запускаем функцию сохранения


// Регистрируем переводы для страниц Мероприятия, Контакты, Реквизиты
pll_register_string('events_page_title', 'Мероприятия');
pll_register_string('read_more', 'Читать дальше...');

pll_register_string('title_reply', 'Ваш відгук дуже важливий для нас');
pll_register_string('label_submit', 'Відправити');
pll_register_string('more', 'Більше відгуків');
pll_register_string('submit', 'До початку');

pll_register_string('contacts_page_title', 'Контакты');
pll_register_string('address', 'Адрес');
pll_register_string('phone', 'Телефон');
pll_register_string('socials', 'Социальные сети');

pll_register_string('assistance_page title', 'Помощь фонду');
pll_register_string('requisites', 'Реквизиты');


// Подключаем функцию активации мета блока
add_action('add_meta_boxes', 'contacts_page_metabox_create', 1);

function contacts_page_metabox_create() {
    $contacts_ru_id = get_page_by_path('contacts-ru')->ID;
    $contacts_ua_id = get_page_by_path('contacts-ukr')->ID;
    if ($contacts_ru_id == $_GET['post'] || $contacts_ua_id == $_GET['post']):
        add_meta_box(
            'contacts_page_metabox',
            'Контактные данные',
            'contacts_page_metabox_show',
            'page',
            'normal',
            'high');
    endif;
}

// Добавляем необходимые поля
function contacts_page_metabox_show($post)
{
    $contacts_ru_id = get_page_by_path('contacts-ru')->ID;
    ?>
    <div class="my-admin-page-styles">
        <p class="user-tutorial">
            Все данные, кроме адреса, являются общими для страниц на русском и украинском языках. Поля можно заполнить
            на
            любой из этих страниц. Адрес, в силу того, что язык имеет значение, заполняется для каждой страницы
            отдельно.
            Изменения вступают в силу после нажатия кнопки "Update" в правой верхней части экрана. Чтобы удалить
            какое-либо
            значение, достаточно очистить соответствующее поле и сохранить изменения.
        </p>
        <p>
            <label for="contacts[address]">Адрес:</label>
            <textarea name="contacts[address]" id="contacts[address]"
                      placeholder="Адрес организации"><?php echo get_post_meta($post->ID, 'address', true); ?></textarea>
        </p>
        <div>
        <fieldset>
            <legend>Телефоны:</legend>
            <label for="contacts[tel_1]">тел. #1: </label>
            <input type="text" name="contacts[tel_1]" id="contacts[tel_1]"
                   value="<?php echo get_post_meta($contacts_ru_id, 'tel_1', true); ?>" placeholder="+380 ХХ ХХХХХХХ"><br>
            <label for="contacts[tel_2]">тел. #2: </label>
            <input type="text" name="contacts[tel_2]" id="contacts[tel_2]"
                   value="<?php echo get_post_meta($contacts_ru_id, 'tel_2', true); ?>" placeholder="+380 ХХ ХХХХХХХ"><br>
            <label for="contacts[tel_3]">тел. #2: </label>
            <input type="text" name="contacts[tel_3]" id="contacts[tel_3]"
                   value="<?php echo get_post_meta($contacts_ru_id, 'tel_3', true); ?>" placeholder="+380 ХХ ХХХХХХХ"><br>
        </fieldset>
        </div>
        <div>
        <fieldset>
            <legend>Социальные сети:</legend>
            <label for="contacts[socials_vk]">VK: </label>
            <input type="text" name="contacts[socials_vk]" id="contacts[socials_vk]"
                   value="<?php echo get_post_meta($contacts_ru_id, 'socials_vk', true); ?>"><br>
            <label for="contacts[socials_fb]">Facebook: </label>
            <input type="text" name="contacts[socials_fb]" id="contacts[socials_fb]"
                   value="<?php echo get_post_meta($contacts_ru_id, 'socials_fb', true); ?>">
        </fieldset>
        </div>
        <p>
            <label for="contacts[email]">Email: </label>
            <input type="text" name="contacts[email]" id="contacts[email]"
                   value="<?php echo get_post_meta($contacts_ru_id, 'email', true); ?>" placeholder="Email">
        </p>
        <p>
            <label for="contacts[map]">Код для карты Google Map: </label>
        </p>
        <p class="user-tutorial">
            Для получения кода карты откройте карты Google Maps, в поле поискового запроса введите адрес
            вашей организации, среди появившихся результатов поиска выберите нужный. Нажмите кнопку поделиться и в
            появившемся диалоговом окне выберите вкладку "Код". После этого скопируйте значение в поле над картой и
            вставьте его в поле под этим текстом.
        </p>
        <input type="text" name="contacts[map]" id="contacts[map]"
               value="<?php echo esc_html(get_post_meta('121', 'map', true)); ?>"
               placeholder="Код карты">


        <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>"/>
    </div>

    <?php
}

// включаем обновление полей при сохранении
add_action('save_post', 'contacts_page_metabox_update');

/* Сохраняем данные, при сохранении поста */
function contacts_page_metabox_update($post_id) {
    $contacts_ru_id = get_page_by_path('contacts-ru')->ID;
    //if ( ! wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // проверка
    //if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // выходим если это автосохранение
    // if ( !current_user_can('edit_page', $post_id) ) return false; // выходим если юзер не имеет право редактировать запись

    if (!isset($_POST['contacts'])) {
        return false;
    } // выходим если данных нет

    // Все ОК! Теперь, нужно сохранить/удалить данные
    $_POST['contacts'] = array_map('trim', $_POST['contacts']); // чистим все данные от пробелов по краям
    foreach ($_POST['contacts'] as $key => $value) {
        if (empty($value)) {
            delete_post_meta($key != 'address' ? $contacts_ru_id : $post_id, $key); // удаляем поле если значение пустое
            continue;
        }

        update_post_meta($key != 'address' ? $contacts_ru_id : $post_id, $key, $value); // add_post_meta() работает автоматически
    }
    return $post_id;
}

// Стилим админку
add_action('admin_enqueue_scripts', 'metabox_styling');

function metabox_styling()
{
    ?>
    <style>
        .my-admin-page-styles label {
            display: inline-block;
            vertical-align: top;
            font-size: 12px;
            font-weight: bold;
            padding-top: 4px;
        }

        .my-admin-page-styles legend {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .my-admin-page-styles p,
        .my-admin-page-styles div {
            padding: 10px;
        }

        .my-admin-page-styles .user-tutorial {
            font-style: italic;
            color: #a05b2f;
        }

        .my-admin-page-styles input[name='contacts[map]'] {
            width: 100%;
        }
    </style>
    <?php
}
