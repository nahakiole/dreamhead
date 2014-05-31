<?php get_header(); ?>


<?php if (have_posts()) {

    if (get_query_var('paged')) {
        $paged = get_query_var('paged');
    } elseif (get_query_var('page')) {
        $paged = get_query_var('page');
    } else {
        $paged = 1;
    }

    query_posts('posts_per_page=10&paged=' . $paged);

    $count = 0;
    while (have_posts()) {
        the_post();
        $count++;
        if ($count == 1 && $paged == 1) {
            ?>
            <!-- Main jumbotron for a primary marketing message or call to action -->
            <a href="<?php the_permalink() ?>">
                <div class="jumbotron main-article"
                     style="background-image: url('<?php echo wp_get_attachment_url(
                         get_post_thumbnail_id($post->ID)
                     ) ?>')">

                    <div class="article-pretext">
                        <div class="container">

                            <h1>

                                <?php the_title(); ?>

                            </h1>

                            <p></p>

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
        <div class="col-md-12 top60">
            <div class="row">
                <div class="col-lg-3 col-lg-offset-2 col-md-3 col-md-offset-1">

                    <?php
                    echo get_the_post_thumbnail(null, 'medium', "class=img-responsive")
                    ?>

                </div>
                <div class="caption col-lg-5 col-md-7">
                    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <span class="autor-name"> Am <?php the_date('d.m.Y'); ?> von  <?php echo get_the_author(); ?></span>

                    <p> <?php
                        echo substr(strip_tags(get_the_excerpt()), 0, 180) . "..." ?></p> <a
                        href="<?php the_permalink() ?>">Weiterlesen
                    </a>


                </div>
            </div>

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
