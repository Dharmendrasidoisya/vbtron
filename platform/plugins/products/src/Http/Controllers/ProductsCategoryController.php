<?php

namespace Botble\Products\Http\Controllers;

use Botble\ACL\Models\User;
use Botble\Base\Http\Actions\DeleteResourceAction;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Base\Supports\Breadcrumb;
use Botble\Products\Forms\PostForm;
use Botble\Products\Http\Requests\PostRequest;
use Botble\Products\Models\Post;
use Botble\Products\Products\StoreCategoryService;

use Botble\Products\Tables\PostTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Botble\Base\Facades\BaseHelper;

use Botble\Products\Repositories\Interfaces\PostInterface;
use Botble\SeoHelper\Facades\SeoHelper;
use Botble\Theme\Facades\Theme;

class ProductsCategoryController extends BaseController
{

    public function subcategory($id)
    {
        // `productscategories` ટેબલમાંથી parent_id ના આધારે ડેટા લાવો
        $productscategory = DB::table('productscategories')->where('parent_id', $id)->get();

        $category = DB::table('productscategories')->where('id', $id)->first();

        // View ને `$productscategory` વેરિએબલ સાથે return કરો
        return Theme::scope('subcategory', compact('productscategory', 'category'))
        ->render();
    }
    public function index()
    {
        // Fetch all categories
        $productscategories = DB::table('productscategories')->get();
        return view('Ads-productscategory', compact('productscategories'));
    }

    // Function to show subcategories based on parent_id
//     public function showSubcategories($id, $slug)
// {
 
//     // Fetch the category by slug from the products_categories table
//     $category = DB::table('productscategories')->where('id', $id)->first();

//     // Fetch all related subcategories from the database
//     $productscategories = DB::table('productscategories')
//         ->where('parent_id',$id) // Assuming 'parent_id' links to the main category
//         ->get();

//     // Pass the retrieved data to the view
//     return Theme::scope('subcategory', compact('productscategories', 'category'))
//         ->render();
// }
    public function showSubcategories($id)
    {
      
        // Fetch subcategories where parent_id matches the clicked category's id
        $productscategories = DB::table('productscategories')->where('parent_id', $id)->get();
        $category = DB::table('productscategories')->where('id', $id)->first();
   
        return Theme::scope('subcategory', compact('productscategories', 'category'))
            ->render();
    }
    public function showCategoryPosts($id)
    {
       
        // Get category details
        $category = DB::table('productscategories')->where('id', $id)->first();
        // $categoryposts = DB::table('productsposts')->where('id', $id)->first();
        // Get all post IDs related to this category
        $postIds = DB::table('post_categories')
            ->where('category_id', $id)
            ->pluck('post_id'); // Get only post IDs as an array
        // dd($postIds);

        $productscategories = DB::table('productscategories')->where('id', $id)->get();
        // dd($productscategories);
        // Fetch posts that match the retrieved post IDs
        $posts = DB::table('productsposts')
            ->whereIn('id', $postIds)
            ->get();
        // dd($posts);
        return Theme::scope('category-posts', compact('category', 'posts', 'productscategories'))->render();
    }
}

