<?php
use App\Models\Product_category;

if (!function_exists('getMenu')) {
    /**
     * Retrieve the menu items with hierarchy.
     *
     * @return \Illuminate\Support\Collection
     */
    function getMenu()
    {
        $menus = Product_category::where('is_active', '=', 1)->orderBy('id', 'desc')->get();
        return $menus;
    }
}