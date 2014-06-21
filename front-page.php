<?php get_header(); ?>


<?php if (have_posts()) {

    if (get_query_var('paged')) {
        $paged = get_query_var('paged');
    } elseif (get_query_var('page')) {
        $paged = get_query_var('page');
    } else {
        $paged = 1;
    }

    query_posts('posts_per_page=11&paged=' . $paged);

    $count = 0;
    while (have_posts()) {
        the_post();
        $count++;
        if ($count == 1 && $paged == 1) {

            $color = get_post_meta(get_the_ID(), 'DREAMHEAD_color', true);
            $color = empty($color) ? 'transparent' : $color;
            $subtitle = get_post_meta(get_the_ID(), 'DREAMHEAD_subtitle', true);
            $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            $svgClass = substr($image, -3, 3) == 'svg' ? 'svg' : '';
            ?>

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <a href="<?php the_permalink() ?>">
                <div class="jumbotron main-article <?php echo $svgClass ?>"
                     style="background-image: url('<?php
                     echo $image;
                     ?>'); background-color: <?php echo $color ?>">

                    <div class="article-pretext">
                        <div class="container">

                            <h1>

                                <?php the_title(); ?>


                            </h1>

                            <p>
                                <?php echo $subtitle; ?>

                            </p>

                        </div>
                    </div>

                </div>
            </a>
            <div class="container">
            <div class="row">
            <?php

            continue;
        }
        if ($paged != 1 && $count == 1) {
            ?>
            <div class="container">
            <div class="row">
        <?php
        }
        ?>
        <div class="col-md-12 top60 article-preview">

            <div class="col-lg-6 col-md-12">

                <?php
                echo get_the_post_thumbnail(null, 'large', "class=img-responsive")
                ?>

            </div>
            <div class="caption col-lg-6 col-md-12">
                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                <span class="autor-name"> Am <?php the_date('d.m.Y'); ?> von  <?php echo get_the_author(); ?></span>

                <p> <?php
                    echo substr(strip_tags(get_the_excerpt()), 0, 240) . "..." ?></p>
            </div>
            <a class="read-more"
               href="<?php the_permalink() ?>">Weiterlesen
            </a>
        </div>



    <?php
    }
} else {

} ?>

    <div class="col-md-8 col-md-offset-2">
        <?php get_navigation(); ?>
    </div>

    </div>

    </div>

<?php
get_footer();
