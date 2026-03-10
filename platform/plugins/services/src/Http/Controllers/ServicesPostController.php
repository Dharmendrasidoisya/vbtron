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
class ServicesPostController extends BaseController
{
    public function show($id)
    {
        $category = DB::table('servicescategories')->where('id', $id)->first();
        // $categoryposts = DB::table('servicesposts')->where('id', $id)->first();
        // Get all post IDs related to this category
        $postIds = DB::table('post_categories')
            ->where('post_id', $id)
            ->pluck('post_id'); // Get only post IDs as an array
        // dd($postIds);

        $servicescategories = DB::table('servicescategories')->where('id', $id)->get();
        // dd($servicescategories);
        // Fetch posts that match the retrieved post IDs
        $posts = DB::table('servicesposts')
        ->whereNotIn('id', $postIds) // Exclude records with IDs in $postIds
        ->orderBy('id', 'desc') // Order by ID in descending order
        ->limit(4) // Limit the result to 4 records
        ->get();
    
       

        // Fetch the post details by ID
        $post = DB::table('servicesposts')->where('id', $id)->first();
        $postImages = $post->image ? json_decode($post->image) : [];
        if (!$post) {
            return abort(404); // Show 404 page if post not found
        }
        $servicescategories = DB::table('servicescategories')
        ->where('is_featured', 1)
        ->get();
        // return view('service-post-details', compact('post'));
        return Theme::scope('service-post-details', compact('post','postImages','posts','servicescategories'))->render();
    }
   
    
}
