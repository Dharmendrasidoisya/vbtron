<?php

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Models\BaseModel;
use Botble\Base\Supports\SortItemsWithChildrenHelper;
use Botble\Application\Repositories\Interfaces\CategoryInterface;
use Botble\Application\Repositories\Interfaces\PostInterface;
use Botble\Application\Repositories\Interfaces\TagInterface;
use Botble\Application\Supports\PostFormat;
use Botble\Page\Models\Page;
use Botble\Application\Models\Category;
use Botble\Application\Models\Post;



use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

if (! function_exists('get_featured_applicationposts')) {
    function get_featured_applicationposts(int $limit, array $with = []): Collection
    {
        return app(PostInterface::class)->getFeatured($limit, $with);
    }
}

if (! function_exists('get_latest_applicationposts')) {
    function get_latest_applicationposts(int $limit, array $excepts = [], array $with = []): Collection
    {
        return app(PostInterface::class)->getListPostNonInList($excepts, $limit, $with);
    }
}

if (! function_exists('get_related_applicationposts')) {
    function get_related_applicationposts(int|string $id, int $limit): Collection
    {
        return app(PostInterface::class)->getRelated($id, $limit);
    }
}
if (! function_exists('get_featured_application_posts')) {
    function get_featured_application_posts(): Collection|LengthAwarePaginator|Post|null 
    {
        return Post::query()
            // ->where('is_featured', true)
            ->wherePublished()  
            // ->orderBy('order')
            ->orderByDesc('created_at')
            ->with('slugable')
            ->get();
    }
}
if (! function_exists('get_featured_application_categories')) {
    function get_featured_application_categories(): Collection|LengthAwarePaginator|Category|null
    {
        return Category::query()
            ->where('is_featured', true)
            ->wherePublished()
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->with('slugable')
            ->get();
    }
}
if (! function_exists('get_applicationposts_by_category')) {
    function get_applicationposts_by_category(int|string $categoryId, int $paginate = 12, int $limit = 0): Collection|LengthAwarePaginator
    {
        return app(PostInterface::class)->getByCategory($categoryId, $paginate, $limit);
    }
}

if (! function_exists('get_applicationposts_by_tag')) {
    function get_applicationposts_by_tag(string $slug, int $paginate = 12): Collection|LengthAwarePaginator
    {
        return app(PostInterface::class)->getByTag($slug, $paginate);
    }
}

if (! function_exists('get_applicationposts_by_user')) {
    function get_applicationposts_by_user(int|string $authorId, int $paginate = 12): Collection|LengthAwarePaginator
    {
        return app(PostInterface::class)->getByUserId($authorId, $paginate);
    }
}

if (! function_exists('get_all_applicationposts')) {
    function get_all_applicationposts(
        bool $active = true,
        int $perPage = 12,
        array $with = ['slugable', 'applicationcategories', 'applicationcategories.slugable', 'author']
    ): Collection|LengthAwarePaginator {
        return app(PostInterface::class)->getAllapplicationposts($perPage, $active, $with);
    }
}

if (! function_exists('get_recent_applicationposts')) {
    function get_recent_applicationposts(int $limit): Collection|LengthAwarePaginator
    {
        return app(PostInterface::class)->getRecentapplicationposts($limit);
    }
}

if (! function_exists('get_featured_applicationcategories')) {
    function get_featured_applicationcategories(int $limit, array $with = []): Collection|LengthAwarePaginator
    {
        return app(CategoryInterface::class)->getFeaturedapplicationcategories($limit, $with);
    }
}

if (! function_exists('get_all_applicationcategories')) {
    function get_all_applicationcategories(array $condition = [], array $with = []): Collection|LengthAwarePaginator
    {
        return app(CategoryInterface::class)->getAllapplicationcategories($condition, $with);
    }
}

if (! function_exists('get_all_applicationtags')) {
    function get_all_applicationtags(bool $active = true): Collection|LengthAwarePaginator
    {
        return app(TagInterface::class)->getAllapplicationtags($active);
    }
}

if (! function_exists('get_popular_applicationtags')) {
    function get_popular_applicationtags(
        int $limit = 10,
        array $with = ['slugable'],
        array $withCount = ['applicationposts']
    ): Collection|LengthAwarePaginator {
        return app(TagInterface::class)->getPopularapplicationtags($limit, $with, $withCount);
    }
}

if (! function_exists('get_popular_applicationposts')) {
    function get_popular_applicationposts(int $limit = 10, array $args = []): Collection|LengthAwarePaginator
    {
        return app(PostInterface::class)->getPopularapplicationposts($limit, $args);
    }
}

if (! function_exists('get_popular_applicationcategories')) {
    function get_popular_applicationcategories(
        int $limit = 10,
        array $with = ['slugable'],
        array $withCount = ['applicationposts']
    ): Collection|LengthAwarePaginator {
        return app(CategoryInterface::class)->getPopularapplicationcategories($limit, $with, $withCount);
    }
}

if (! function_exists('get_category_by_id')) {
    function get_category_by_id(int|string $id): ?BaseModel
    {
        return app(CategoryInterface::class)->getCategoryById($id);
    }
}

if (! function_exists('get_applicationcategories')) {
    function get_applicationcategories(array $args = []): array
    {
        $indent = Arr::get($args, 'indent', '——');

        $repo = app(CategoryInterface::class);

        $applicationcategories = $repo->getapplicationcategories(Arr::get($args, 'select', ['*']), [
            'is_default' => 'DESC',
            'order' => 'ASC',
            'created_at' => 'DESC',
        ], Arr::get($args, 'condition', ['status' => BaseStatusEnum::PUBLISHED]));

        $applicationcategories = sort_item_with_children($applicationcategories);

        foreach ($applicationcategories as $category) {
            $depth = (int)$category->depth;
            $indentText = str_repeat($indent, $depth);
            $category->indent_text = $indentText;
        }

        return $applicationcategories;
    }
}

if (! function_exists('get_applicationcategories_with_children')) {
    function get_applicationcategories_with_children(): array
    {
        $applicationcategories = app(CategoryInterface::class)
            ->getAllapplicationcategoriesWithChildren(['status' => BaseStatusEnum::PUBLISHED], [], ['id', 'name', 'parent_id']);

        return app(SortItemsWithChildrenHelper::class)
            ->setChildrenProperty('child_cats')
            ->setItems($applicationcategories)
            ->sort();
    }
}

if (! function_exists('register_post_format')) {
    function register_post_format(array $formats): void
    {
        PostFormat::registerPostFormat($formats);
    }
}

if (! function_exists('get_post_formats')) {
    function get_post_formats(bool $toArray = false): array
    {
        return PostFormat::getPostFormats($toArray);
    }
}

if (! function_exists('get_application_page_id')) {
    function get_application_page_id(): string|null
    {
        return theme_option('application_page_id', setting('application_page_id'));
    }
}

if (! function_exists('get_application_page_url')) {
    function get_application_page_url(): string
    {
        $applicationPageId = (int)theme_option('application_page_id', setting('application_page_id'));

        if (! $applicationPageId) {
            return BaseHelper::getHomepageUrl();
        }

        $applicationPage = Page::query()->find($applicationPageId);

        if (! $applicationPage) {
            return BaseHelper::getHomepageUrl();
        }

        return $applicationPage->url;
    }
}
