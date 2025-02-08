<form action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search" class="d-flex align-content-center justify-content-between">
    <input name="s" type="text" placeholder="Search" id="search" value="<?php the_search_query(); ?>" />
    <button type="submit">
    <i class="bi bi-search"></i>
    </button>
</form>


