<?php
/*
Template Name: Contacts Page
*/
?>

<?php get_header(); ?>
<?php $post = get_post(); ?>
<?php $contacts_data = array() ?>

    <div id="primary" class="content-area container-inner contacts-page">
        <main id="main" class="site-main" role="main">
            <h2> <?php echo get_field('contacts_page_title') ?> </h2>

            <div class="contacts-wrapper clearfix">

                <div class="contacts-text">

                    <?php if ($post->ID == 121): // If current page language = RU?>
                        <?php $contacts_data = array(
                            'address_label' => 'Адрес:',
                            'phone_label' => 'Телефон:',
                            'email_label' => 'Email:',
                        ); ?>
                    <?php endif; ?>

                    <?php if ($post->ID == 24): // If current page language = RU?>
                        <?php $contacts_data = array(
                            'address_label' => 'Адреса:',
                            'phone_label' => 'Телефон:',
                            'email_label' => 'Email:',
                        ); ?>
                    <?php endif; ?>

                    <?php if (get_field('contacts_address')): ?>
                        <h3> <?php echo $contacts_data['address_label'] ?> </h3>
                        <address class="contacts-item-text"> <?php echo get_field('contacts_address') ?> </address>
                    <?php endif; ?>

                    <?php if (get_field('contacts_phone')): ?>
                        <h3> <?php echo $contacts_data['phone_label'] ?> </h3>
                        <div class="contacts-item-text"> <?php echo get_field('contacts_phone') ?> </div>
                    <?php endif; ?>

                    <?php if (get_field('contacts_email')): ?>
                        <h3> <?php echo $contacts_data['email_label'] ?> </h3>
                        <div class="contacts-item-text"> <?php echo get_field('contacts_email') ?> </div>
                    <?php endif; ?>

                </div>

                <div class="contacts-map">
                    <?php if (get_field('contacts_map')) echo get_field('contacts_map'); ?>
                </div>

            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>