<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->

    <?php
    $date = new DateTime('29.05.2014');
    $now = new DateTime(get_the_date('c'));
    $isLegacyPost = $date->diff($now)->invert;
    if (!$isLegacyPost) {

        $color = get_post_meta(get_the_ID(), 'DREAMHEAD_color', true);
        $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

        $subtitle = get_post_meta(get_the_ID(), 'DREAMHEAD_subtitle', true);
        $svgClass = substr($image,-3,3) == 'svg' ? 'svg' : '';
        ?>
        <div class="jumbotron main-article <?php echo $svgClass ?>"
             style="background-image: url('<?php
             echo $image;
             ?>'); background-color: <?php echo $color?>">
            <div class="article-pretext">
                <div class="container">

                    <h1><?php the_title(); ?></h1>
                   <p>
                       <?php echo $subtitle; ?>

                   </p>

                </div>
            </div>


        </div>
    <?php
    }

    ?>


    <div class="container ">
    <div class="row ">


        <?php
        if ($isLegacyPost) {

        $format = get_post_format();
        //Get the video meta data

        $omc_is_video = get_post_meta(get_the_ID(), 'omc_is_video', true);
        $omc_video_encode = get_post_meta(get_the_ID(), 'omc_video_encode', true);
        ?>




        <div class="col-md-8 col-md-offset-2 top30 single-article">
            <?php
            if ($format == 'video') {

                ?>
                <section class="row">
                    <div class="col-md-12">
                        <div class="flex-video widescreen"><?php echo($omc_video_encode);?></div>
                    </div>
                </section>



            <?php }
            else {
            ?>
            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" alt=""
                 class="img-responsive wp-post-image"/>
                <?php } ?>
            <h1><?php the_title(); ?></h1>
            <span class="autor-name"> Am <?php the_date('d.m.Y'); ?> von  <?php echo get_the_author(); ?></span><br/>rrr

            <?php
            }
            else {

            ?>
            <div class="col-md-8 col-md-offset-2 top30 single-article">
                <?php
                }
                ?>

                <?php the_content();

                $omc_video_encode = get_post_meta(get_the_ID(), 'video_encode', true);
                $format = get_post_format();
                ?>

            </div>


        </div>

    </div>


<?php endwhile;
else:
endif;
get_footer();
?>