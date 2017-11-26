<?php

namespace App\Data\Recipe;


class RecipeCreator
{

    /**
     * @param string $title
     * @param string $href
     * @param string $ingredients
     * @param string $thumbnail
     *
     * @return Recipe
     */
    public static function create($title = '', $href = '', $ingredients = '', $thumbnail = '')
    {
        if (!empty($title)) {
            $title = trim(strip_tags($title));
        }

        if (!empty($href)) {
            $href = filter_var($href, FILTER_SANITIZE_URL);
        }

        if (!empty($ingredients)) {
            $ingredients = trim(strip_tags($ingredients));
        }

        if (!empty($thumbnail)) {
            $thumbnail = filter_var($thumbnail, FILTER_SANITIZE_URL);
        }

        $recipe = new Recipe();
        $recipe->setTitle($title)->setHref($href)->setIngredients($ingredients)->setThumbnail($thumbnail);

        return $recipe;
    }
}
