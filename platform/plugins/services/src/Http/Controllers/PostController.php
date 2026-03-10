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
use Botble\Services\Services\StoreTagService;
use Botble\Services\Tables\PostTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Botble\Theme\Facades\Theme;

class PostController extends BaseController
{

    public function show($id)
    {
        // Fetch the specific servicespost from the database
        $post = DB::table('servicesposts')->where('id', $id)->where('status', 'published')->first();
        $servicescategories = DB::table('servicescategories')->where('parent_id', $id)->get();
    
        if (!$post) {
            abort(404); // Show 404 page if post not found
        }
    
        return Theme::scope('servicesposts', compact('post','servicescategories'))->render();
    }

    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()
            ->add(trans('plugins/services::base.menu_name'))
            ->add(trans('plugins/services::posts.menu_name'), route('servicesposts.index'));
    }

    public function index(PostTable $dataTable)
    {
        $this->pageTitle(trans('plugins/services::posts.menu_name'));

        return $dataTable->renderTable();
    }

    public function create()
    {
        $this->pageTitle(trans('plugins/services::posts.create'));

        return PostForm::create()->renderForm();
    }

    public function store(
        PostRequest $request,
        Storetagservice $servicestagservice,
        StoreCategoryService $categoryService
    ) {
        $postForm = PostForm::create();

        $postForm->saving(function (PostForm $form) use ($request, $servicestagservice, $categoryService) {
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

            $servicestagservice->execute($request, $post);

            $categoryService->execute($request, $post);
        });

        return $this
            ->httpResponse()
            ->setPreviousRoute('servicesposts.index')
            ->setNextRoute('servicesposts.edit', $postForm->getModel()->getKey())
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
        Storetagservice $servicestagservice,
        StoreCategoryService $categoryService,
    ) {
        PostForm::createFromModel($post)
            ->setRequest($request)
            ->saving(function (PostForm $form) use ($categoryService, $servicestagservice) {
                $request = $form->getRequest();

                $post = $form->getModel();
                $post->fill($request->input());
                $post->save();

                $form->fireModelEvents($post);

                $servicestagservice->execute($request, $post);

                $categoryService->execute($request, $post);
            });

        return $this
            ->httpResponse()
            ->setPreviousRoute('servicesposts.index')
            ->withUpdatedSuccessMessage();
    }

    public function destroy(Post $post)
    {
        return DeleteResourceAction::make($post);
    }

    public function getWidgetRecentservicesposts(Request $request): BaseHttpResponse
    {
        $limit = $request->integer('paginate', 10);
        $limit = $limit > 0 ? $limit : 10;

        $servicesposts = Post::query()
            ->with(['slugable'])
            ->orderByDesc('created_at')
            ->limit($limit)
            ->get();

        return $this
            ->httpResponse()
            ->setData(view('plugins/services::widgets.servicesposts', compact('servicesposts', 'limit'))->render());
    }
}
