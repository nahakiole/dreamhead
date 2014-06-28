<?php

get_header();
$color = "#663399";
?>
<style>
    .article-pretext h1, .article-pretext p {
        color: #fff;
    }
</style>
    <div class="notfound jumbotron main-article <?php echo $svgClass ?>"
         style="background-image: url('<?php
         echo $image;
         ?>'); background-color: <?php echo $color ?>;
             color: #fff;
             ">

        <div class="article-pretext">
            <div class="container">

                <h1>404 Wat</h1>
                <p>
                    Was hesch du gmacht?

                </p>

            </div>
        </div>

    </div>

    <div class="container">




    </div>
<?php get_footer(); ?>