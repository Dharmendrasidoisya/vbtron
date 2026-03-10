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
use Botble\Products\Products\StoreTagService;
use Botble\Products\Tables\PostTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Botble\Theme\Facades\Theme;

class PostController extends BaseController
{

    public function show($id)
    {
        // Fetch the specific productspost from the database
        $post = DB::table('productsposts')->where('id', $id)->where('status', 'published')->first();
        $productscategories = DB::table('productscategories')->where('parent_id', $id)->get();

        if (!$post) {
            abort(404); // Show 404 page if post not found
        }

        return Theme::scope('productsposts', compact('post', 'productscategories'))->render();
    }

    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()
            ->add(trans('plugins/products::base.menu_name'))
            ->add(trans('plugins/products::posts.menu_name'), route('productsposts.index'));
    }

    public function index(PostTable $dataTable)
    {
        $this->pageTitle(trans('plugins/products::posts.menu_name'));

        return $dataTable->renderTable();
    }

    public function create()
    {
        $this->pageTitle(trans('plugins/products::posts.create'));
        return PostForm::create()->renderForm();
    }

    public function store(
        PostRequest $request,
        Storetagservice $productstagservice,
        StoreCategoryService $categoryService
    ) {
        $postForm = PostForm::create();

        $postForm->saving(function (PostForm $form) use ($request, $productstagservice, $categoryService) {
            $input = $request->input();
            $input['images'] = array_values(array_filter($input['images'] ?? []));
            $data['images'] = json_encode($request->input('images', []));
            $form
                ->getModel()
                ->fill([
                    ...$request->input(),
                    'author_id' => Auth::guard()->id(),
                    'author_type' => User::class,
                ])
                ->save();
            $post = $form->getModel();
            $form->fireModelEvents($post);
            $productstagservice->execute($request, $post);
            $categoryService->execute($request, $post);
        });

        return $this
            ->httpResponse()
            ->setPreviousRoute('productsposts.index')
            ->setNextRoute('productsposts.edit', $postForm->getModel()->getKey())
            ->withCreatedSuccessMessage();
    }
    public function edit(Post $post)
    {
        $this->pageTitle(trans('core/base::forms.edit_item', ['name' => $post->name]));
        return PostForm::createFromModel($post)->renderForm();
    }

    public function update(
        Post $post,
        PostRequest $request,
        Storetagservice $productstagservice,
        StoreCategoryService $categoryService,
    ) {
        PostForm::createFromModel($post)
            ->setRequest($request)
            ->saving(function (PostForm $form) use ($categoryService, $productstagservice) {
                $request = $form->getRequest();

                $input = $request->input();
                $input['images'] = array_values(array_filter($input['images'] ?? []));
                $data['images'] = json_encode($request->input('images', []));
                $post = $form->getModel();
                $post->fill($input);
                $post->save();

                $form->fireModelEvents($post);

                $productstagservice->execute($request, $post);

                $categoryService->execute($request, $post);
            });

        return $this
            ->httpResponse()
            ->setPreviousRoute('productsposts.index')
            ->withUpdatedSuccessMessage();
    }

    public function destroy(Post $post)
    {
        return DeleteResourceAction::make($post);
    }

    public function getWidgetRecentproductsposts(Request $request): BaseHttpResponse
    {
        $limit = $request->integer('paginate', 10);
        $limit = $limit > 0 ? $limit : 10;

        $productsposts = Post::query()
            ->with(['slugable'])
            ->orderByDesc('created_at')
            ->limit($limit)
            ->get();

        return $this
            ->httpResponse()
            ->setData(view('plugins/products::widgets.productsposts', compact('productsposts', 'limit'))->render());
    }
}
