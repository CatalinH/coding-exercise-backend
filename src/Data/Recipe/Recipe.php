<?php

namespace App\Data\Recipe;


class Recipe extends \ArrayObject
{
    /**
     * @param string $thumbnail
     *
     * @return $this
     */
    public function setThumbnail(string $thumbnail)
    {
        parent::offsetSet('thumbnail', $thumbnail);

        return $this;
    }

    /**
     * @param string $ingredients
     *
     * @return $this
     */
    public function setIngredients(string $ingredients)
    {
        parent::offsetSet('ingredients', $ingredients);

        return $this;
    }

    /**
     * @param string $href
     *
     * @return $this
     */
    public function setHref(string $href)
    {
        parent::offsetSet('href', $href);

        return $this;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title)
    {
        parent::offsetSet('title', $title);

        return $this;
    }
}
