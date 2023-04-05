<?php
global $wp;
$search_string='';
if(is_search() || is_404()) {
    $search_string = apply_filters('get_search_query', get_query_var('s')) ?: implode(' ', preg_split('/(-|_)/', $wp->request));
}
?>

<form class="search-form flex-grow relative" action="<?php echo esc_url(home_url('/')); ?>" method="get">
    <input class="border-2 border-offwhite rounded-full px-4 py-2 w-full" type="text" name="s" id="search" placeholder="Search"
           value="<?php echo $search_string; ?>"/>
    <button type="submit" value="Search" class="search-submit absolute top-1.5 bottom-0 text-grey-dark right-2 border-0 bg-transparent hover:bg-transparent w-8 h-8 rounded-none overflow-hidden"><i class=" fas fa-search"></i>
    </button>
</form>
