<?php

namespace app\repository;

namespace app\repository;

use app\entity\Menu;

class MenuRepository
{

    public static function createNewMenu($title, $description, $compound, $price, $volume, $category_id)
    {
        $menu = new Menu();
        $menu->title = $title;
        $menu->description = $description;
        $menu->compound = $compound;
        $menu->price = $price;
        $menu->volume = $volume;
        $menu->category_id = $category_id;
        $menu->save();
        return $menu->id;
    }

    public static function getMenu()
    {
        return Menu::find()->all();
    }
}