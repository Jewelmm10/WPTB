
<?php if ( is_active_sidebar( 'default-sidebar' ) ) { ?>
    <div class="col-lg-4">
        <div class="blog__bright__bar">
            <?php dynamic_sidebar( 'default-sidebar' ); ?>
        </div>
    </div>
<?php } ?>
