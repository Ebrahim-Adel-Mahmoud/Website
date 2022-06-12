<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function navbarCategories()
    {
        $categories = Category::with('children')->where('parent', 0)->orWhere('parent', null)->get();
        return new CategoryCollection($categories);
    }
      public function indexPageCategoriesWithPosts()
    {
        $categories_with_posts = Category::with(['posts'=>function ($q){
            $q->with('category')->limit(5);
        }])->get();

        return new CategoryCollection($categories_with_posts);
    }

}
