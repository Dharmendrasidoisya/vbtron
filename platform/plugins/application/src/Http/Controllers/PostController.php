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
use Botble\Application\Application\StoreTagService;
use Botble\Application\Tables\PostTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Botble\Theme\Facades\Theme;

class PostController extends BaseController
{

    public function show($id)
    {
        // Fetch the specific applicationpost from the database
        $post = DB::table('applicationposts')->where('id', $id)->where('status', 'published')->first();
        $applicationcategories = DB::table('applicationcategories')->where('parent_id', $id)->get();
    
        if (!$post) {
            abort(404); // Show 404 page if post not found
        }
    
        return Theme::scope('applicationposts', compact('post','applicationcategories'))->render();
    }

    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()
            ->add(trans('plugins/application::base.menu_name'))
            ->add(trans('plugins/application::posts.menu_name'), route('applicationposts.index'));
    }

    public function index(PostTable $dataTable)
    {
        $this->pageTitle(trans('plugins/application::posts.menu_name'));

        return $dataTable->renderTable();
    }

    public function create()
    {
        $this->pageTitle(trans('plugins/application::posts.create'));

        return PostForm::create()->renderForm();
    }

    public function store(
        PostRequest $request,
        Storetagservice $applicationtagservice,
        StoreCategoryService $categoryService
    ) {
        $postForm = PostForm::create();

        $postForm->saving(function (PostForm $form) use ($request, $applicationtagservice, $categoryService) {
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

            $applicationtagservice->execute($request, $post);

            $categoryService->execute($request, $post);
        });

        return $this
            ->httpResponse()
            ->setPreviousRoute('applicationposts.index')
            ->setNextRoute('applicationposts.edit', $postForm->getModel()->getKey())
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
        Storetagservice $applicationtagservice,
        StoreCategoryService $categoryService,
    ) {
        PostForm::createFromModel($post)
            ->setRequest($request)
            ->saving(function (PostForm $form) use ($categoryService, $applicationtagservice) {
                $request = $form->getRequest();

                $post = $form->getModel();
                $post->fill($request->input());
                $post->save();

                $form->fireModelEvents($post);

                $applicationtagservice->execute($request, $post);

                $categoryService->execute($request, $post);
            });

        return $this
            ->httpResponse()
            ->setPreviousRoute('applicationposts.index')
            ->withUpdatedSuccessMessage();
    }

    public function destroy(Post $post)
    {
        return DeleteResourceAction::make($post);
    }

    public function getWidgetRecentapplicationposts(Request $request): BaseHttpResponse
    {
        $limit = $request->integer('paginate', 10);
        $limit = $limit > 0 ? $limit : 10;

        $applicationposts = Post::query()
            ->with(['slugable'])
            ->orderByDesc('created_at')
            ->limit($limit)
            ->get();

        return $this
            ->httpResponse()
            ->setData(view('plugins/application::widgets.applicationposts', compact('applicationposts', 'limit'))->render());
    }
}
