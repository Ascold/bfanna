<?php the_post(); ?>
<?php
$post_year = get_the_date('Y');
$post_month = get_the_date('m');
$post_day = get_the_date('d');
?>

<li class="event-post-item clearfix">

    <div class="event-post-thumbnail">
        <div class="thumbnail-wrapper">
            <img src=" <?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : '' ; ?>"
                 alt="<?php echo get_the_title() ?>">
        </div>
    </div>

    <div class="event-post-text">
        <div class="event-post-title clearfix">
            <a href="<?php the_permalink() ?>"><h3> <?php the_title(); ?> </h3></a>
            <span class="post-date">
           <a href="<?php echo get_day_link($post_year, $post_month, $post_day); ?>"> <?php echo $post_day; ?> </a>
           <span>/</span>
           <a href="<?php echo get_month_link($post_year, $post_month); ?>"> <?php echo $post_month; ?> </a>
           <span>/</span>
           <a href="<?php echo get_year_link($post_year); ?>"> <?php echo $post_year; ?></a>
           </span>
        </div>
        <p class="event-post-excerpt">
            <?php echo get_the_excerpt(); ?>
        </p>
        <div class="read-more-wrapper">
            <a href="<?php the_permalink() ?>"><?php echo pll__('Читать дальше...') ?></a>
        </div>
    </div>
</li>