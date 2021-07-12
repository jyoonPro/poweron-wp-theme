<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div class="field has-addons">
    <div class="control is-expanded has-icons-left">
        <input class="input" type="search" value="<?php echo get_search_query();?>" name="s" id="s" placeholder="Find a project&hellip;">
        <span class="icon is-left">
            <i class="fas fa-search" aria-hidden="true"></i>
        </span>
    </div>
    <div class="control">
        <input type="submit" id="searchsubmit" value="Search" class="button is-danger">
    </div>
    </div>
</form>