<?php
/*
Template Name: Contacts Page
*/
?>

<?php get_header(); ?>
<?php $post = get_post(); ?>
<?php $contacts_data = array() ?>
<?php $contacts_ru_id = get_page_by_path('contacts-ru')->ID; ?>
<?php ?>

    <div id="primary" class="content-area container-inner contacts-page">
        <main id="main" class="site-main" role="main">
            <h2> <?php echo get_the_title($post->ID) ?> </h2>

            <div class="contacts-wrapper clearfix">

                <div class="contacts-text">

                    <?php $contacts_data = array(
                        'address_label' => pll__('Адрес') . ': ',
                        'phone_label' => pll__('Телефон') . ': ',
                        'tel_1' => get_post_meta($contacts_ru_id, 'tel_1', true),
                        'tel_2' => get_post_meta($contacts_ru_id, 'tel_2', true),
                        'tel_3' => get_post_meta($contacts_ru_id, 'tel_3', true),
                        'tel_icon' => get_post_meta($contacts_ru_id, 'tel_icon', true),
                        'email_label' => 'Email: ',
                        'email' => get_post_meta($contacts_ru_id, 'email', true),
                        'map' => get_post_meta($contacts_ru_id, 'map', true),
                        'sociald_label' => pll__('Социальные сети') . ': ',
                        'socials_vk' => get_post_meta($contacts_ru_id, 'socials_vk', true),
                        'socials_fb' => get_post_meta($contacts_ru_id, 'socials_fb', true),
                        'socials_vk_icon' => get_post_meta($contacts_ru_id, 'socials_vk_icon', true),
                        'socials_fb_icon' => get_post_meta($contacts_ru_id, 'socials_fb_icon', true),
                    ); ?>

                    <?php if (get_post_meta($post->ID, 'address', true)): ?>
                        <h3> <?php echo $contacts_data['address_label']; ?> </h3>
                        <address
                                class="contacts-item-text"> <?php echo get_post_meta($post->ID, 'address', true); ?> </address>
                    <?php endif; ?>

                    <?php if ($contacts_data['tel_1'] || $contacts_data['tel_2'] || $contacts_data['tel_3']):
                        $tel_icon = $contacts_data['tel_icon'];
                        ?>
                        <h3> <?php echo $contacts_data['phone_label']; ?> </h3>
                    <?php endif; ?>
                    <?php if ($contacts_data['tel_1']): ?>
                        <a href="<?php echo 'tel:' . $contacts_data['tel_1']; ?>"
                           class="contacts-item-text"> <?php echo $contacts_data['tel_icon'] . ' ' . $contacts_data['tel_1']; ?> </a>
                    <?php endif; ?>
                    <?php if ($contacts_data['tel_2']): ?>
                        <a href="<?php echo 'tel:' . $contacts_data['tel_2']; ?>"
                           class="contacts-item-text"> <?php echo $contacts_data['tel_icon'] . ' ' . $contacts_data['tel_2']; ?> </a>
                    <?php endif; ?>
                    <?php if ($contacts_data['tel_3']): ?>
                        <a href="<?php echo 'tel:' . $contacts_data['tel_3']; ?>"
                           class="contacts-item-text"> <?php echo $contacts_data['tel_icon'] . ' ' . $contacts_data['tel_3']; ?> </a>
                    <?php endif; ?>

                    <?php if ($contacts_data['email']): ?>
                        <h3> <?php echo $contacts_data['email_label']; ?> </h3>
                        <a href="<?php echo 'mailto:' . $contacts_data['email']; ?>"
                           class="contacts-item-text"> <?php echo $contacts_data['email']; ?> </a>
                    <?php endif; ?>
                    <?php if ($contacts_data['socials_vk'] || $contacts_data['socials_fb']): ?>
                        <h3 class="socials"> <?php echo $contacts_data['sociald_label']; ?> </h3>
                        <?php if ($contacts_data['socials_vk'] && $contacts_data['socials_vk_icon']): ?>
                            <a class="socials" target="_blank"
                               href="<?php echo get_post_meta($contacts_ru_id, 'socials_vk', true); ?>"> <?php echo $contacts_data['socials_vk_icon']; ?> </a>
                        <?php endif; ?>
                        <?php if ($contacts_data['socials_fb'] && $contacts_data['socials_fb_icon']): ?>
                            <a class="socials" target="_blank"
                               href="<?php echo get_post_meta($contacts_ru_id, 'socials_fb', true); ?>"> <?php echo $contacts_data['socials_fb_icon']; ?> </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="contacts-map">
                    <?php if ($contacts_data['map']) echo $contacts_data['map']; ?>
                </div>

            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>