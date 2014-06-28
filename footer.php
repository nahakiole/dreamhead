
<footer class="main-footer top30">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; <?php bloginfo('name') ?> <?php echo date('Y') ?></p>
                <?php if (dynamic_sidebar('footer-left')); ?>
            </div>
            <div class="col-md-6 text-right">
                <ul class="list-inline">

                    <li>
                        <a href="http://www.manuelmeister.ch">manuelmeister.ch
                        </a>
                    </li>
                    <li>
                        <a href="http://www.robinio.ch">robinio.ch</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="//use.typekit.net/ijo2uri.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php wp_footer() ?>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X');
    ga('send', 'pageview');
</script>
</body>
</html>