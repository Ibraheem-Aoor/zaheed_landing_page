<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Products Page
    |--------------------------------------------------------------------------
    |
    | Shows the /products page and its links in the header and mobile menu.
    | When disabled, the links are hidden and /products returns a 404.
    | The app download page (/download) is not affected.
    |
    */

    'products_page' => (bool) env('PRODUCTS_PAGE_ENABLED', false),

];
