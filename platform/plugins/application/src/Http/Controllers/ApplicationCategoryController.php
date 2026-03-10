<?php

namespace Botble\Application\Http\Controllers;

use Botble\ACL\Models\User;
use Botble\Base\Http\Actions\DeleteResourceAction;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Base\Supports\Breadcrumb;
use Botble\Application\Forms\PostForm;
use Botble\Application\Http\Requests\PostRequest;
use Botble\Application\Models\Post;
use Botble\Application\Application\StoreCategoryService;

use Botble\Application\Tables\PostTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Botble\Base\Facades\BaseHelper;

use Botble\Application\Repositories\Interfaces\PostInterface;
use Botble\SeoHelper\Facades\SeoHelper;
use Botble\Theme\Facades\Theme;

class ApplicationCategoryController extends BaseController
{

    public function subcategory($id)
    {
        // `applicationcategories` ટેબલમાંથી parent_id ના આધારે ડેટા લાવો
        $applicationcategory = DB::table('applicationcategories')->where('parent_id', $id)->get();

        $category = DB::table('applicationcategories')->where('id', $id)->first();

        // View ને `$applicationcategory` વેરિએબલ સાથે return કરો
        return Theme::scope('subcategory', compact('applicationcategory', 'category'))
        ->render();
    }
    public function index()
    {
        // Fetch all categories
        $applicationcategories = DB::table('applicationcategories')->get();
        return view('Ads-applicationcategory', compact('applicationcategories'));
    }

    // Function to show subcategories based on parent_id
//     public function showSubcategories($id, $slug)
// {
 
//     // Fetch the category by slug from the application_categories table
//     $category = DB::table('applicationcategories')->where('id', $id)->first();

//     // Fetch all related subcategories from the database
//     $applicationcategories = DB::table('applicationcategories')
//         ->where('parent_id',$id) // Assuming 'parent_id' links to the main category
//         ->get();

//     // Pass the retrieved data to the view
//     return Theme::scope('subcategory', compact('applicationcategories', 'category'))
//         ->render();
// }
    public function showSubcategories($id)
    {
      
        // Fetch subcategories where parent_id matches the clicked category's id
        $applicationcategories = DB::table('applicationcategories')->where('parent_id', $id)->get();
        $category = DB::table('applicationcategories')->where('id', $id)->first();
   
        return Theme::scope('subcategory', compact('applicationcategories', 'category'))
            ->render();
    }
    public function showCategoryPosts($id)
    {
       
        // Get category details
        $category = DB::table('applicationcategories')->where('id', $id)->first();
        // $categoryposts = DB::table('applicationposts')->where('id', $id)->first();
        // Get all post IDs related to this category
        $postIds = DB::table('post_categories')
            ->where('category_id', $id)
            ->pluck('post_id'); // Get only post IDs as an array
        // dd($postIds);

        $applicationcategories = DB::table('applicationcategories')->where('id', $id)->get();
        // dd($applicationcategories);
        // Fetch posts that match the retrieved post IDs
        $posts = DB::table('applicationposts')
            ->whereIn('id', $postIds)
            ->get();
        // dd($posts);
        return Theme::scope('category-posts', compact('category', 'posts', 'applicationcategories'))->render();
    }
}

