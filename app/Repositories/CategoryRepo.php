<?php

namespace App\Repositories;

use App\Category;

class CategoryRepo{

	public function saveCategory($name){
		$category = new Category;
        $category->name = $name;
        $category->save();

        return $category;
	}

}


?>