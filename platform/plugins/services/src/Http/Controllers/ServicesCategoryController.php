<?php

namespace Botble\Services\Http\Controllers;

use Botble\ACL\Models\User;
use Botble\Base\Http\Actions\DeleteResourceAction;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Base\Supports\Breadcrumb;
use Botble\Services\Forms\PostForm;
use Botble\Services\Http\Requests\PostRequest;
use Botble\Services\Models\Post;
use Botble\Services\Services\StoreCategoryService;

use Botble\Services\Tables\PostTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Botble\Base\Facades\BaseHelper;

use Botble\Services\Repositories\Interfaces\PostInterface;
use Botble\SeoHelper\Facades\SeoHelper;
use Botble\Theme\Facades\Theme;

class ServicesCategoryController extends BaseController
{

    public function subcategory($id)
    {
        // `servicescategories` ટેબલમાંથી parent_id ના આધારે ડેટા લાવો
        $servicescategory = DB::table('servicescategories')->where('parent_id', $id)->get();
        // dd($servicescategory);

        $category = DB::table('servicescategories')->where('id', $id)->first();

        // View ને `$servicescategory` વેરિએબલ સાથે return કરો
        return Theme::scope('subcategory', compact('servicescategory', 'category'))
        ->render();
    }
    public function index()
    {
        // Fetch all categories
        $servicescategories = DB::table('servicescategories')->get();
        
        return view('Ads-servicescategory', compact('servicescategories'));
    }

    // Function to show subcategories based on parent_id
//     public function showSubcategories($id, $slug)
// {
 
//     // Fetch the category by slug from the services_categories table
//     $category = DB::table('servicescategories')->where('id', $id)->first();

//     // Fetch all related subcategories from the database
//     $servicescategories = DB::table('servicescategories')
//         ->where('parent_id',$id) // Assuming 'parent_id' links to the main category
//         ->get();

//     // Pass the retrieved data to the view
//     return Theme::scope('subcategory', compact('servicescategories', 'category'))
//         ->render();
// }
    public function showSubcategories($id)
    {
      
        // Fetch subcategories where parent_id matches the clicked category's id
        $servicescategories = DB::table('servicescategories')->where('parent_id', $id)->get();
        $category = DB::table('servicescategories')->where('id', $id)->first();
   
        return Theme::scope('subcategory', compact('servicescategories', 'category'))
            ->render();
    }
    public function showCategoryPosts($id)
    {
       
        // Get category details
        $category = DB::table('servicescategories')->where('id', $id)->first();
        // $categoryposts = DB::table('servicesposts')->where('id', $id)->first();
        // Get all post IDs related to this category
        $postIds = DB::table('post_categories')
            ->where('category_id', $id)
            ->pluck('post_id'); // Get only post IDs as an array
        // dd($postIds);

        $servicescategories = DB::table('servicescategories')->where('id', $id)->get();
        // dd($servicescategories);
        // Fetch posts that match the retrieved post IDs
        $posts = DB::table('servicesposts')
            ->whereIn('id', $postIds)
            ->get();
        // dd($posts);
        return Theme::scope('category-posts', compact('category', 'posts', 'servicescategories'))->render();
    }
}

