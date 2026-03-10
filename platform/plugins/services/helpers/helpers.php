<?php

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Models\BaseModel;
use Botble\Base\Supports\SortItemsWithChildrenHelper;
use Botble\Services\Repositories\Interfaces\CategoryInterface;
use Botble\Services\Repositories\Interfaces\PostInterface;
use Botble\Services\Repositories\Interfaces\TagInterface;
use Botble\Services\Supports\PostFormat;
use Botble\Page\Models\Page;
use Botble\Services\Models\Category;
use Botble\Services\Models\Post;



use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

if (! function_exists('get_featured_servicesposts')) {
    function get_featured_servicesposts(int $limit, array $with = []): Collection
    {
        return app(PostInterface::class)->getFeatured($limit, $with);
    }
}

if (! function_exists('get_latest_servicesposts')) {
    function get_latest_servicesposts(int $limit, array $excepts = [], array $with = []): Collection
    {
        return app(PostInterface::class)->getListPostNonInList($excepts, $limit, $with);
    }
}

if (! function_exists('get_related_servicesposts')) {
    function get_related_servicesposts(int|string $id, int $limit): Collection
    {
        return app(PostInterface::class)->getRelated($id, $limit);
    }
}
if (! function_exists('get_featured_services_posts')) {
    function get_featured_services_posts(): Collection|LengthAwarePaginator|Post|null 
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
if (! function_exists('get_featured_services_categories')) {
    function get_featured_services_categories(): Collection|LengthAwarePaginator|Category|null
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
if (! function_exists('get_servicesposts_by_category')) {
    function get_servicesposts_by_category(int|string $categoryId, int $paginate = 12, int $limit = 0): Collection|LengthAwarePaginator
    {
        return app(PostInterface::class)->getByCategory($categoryId, $paginate, $limit);
    }
}

if (! function_exists('get_servicesposts_by_tag')) {
    function get_servicesposts_by_tag(string $slug, int $paginate = 12): Collection|LengthAwarePaginator
    {
        return app(PostInterface::class)->getByTag($slug, $paginate);
    }
}

if (! function_exists('get_servicesposts_by_user')) {
    function get_servicesposts_by_user(int|string $authorId, int $paginate = 12): Collection|LengthAwarePaginator
    {
        return app(PostInterface::class)->getByUserId($authorId, $paginate);
    }
}

if (! function_exists('get_all_servicesposts')) {
    function get_all_servicesposts(
        bool $active = true,
        int $perPage = 12,
        array $with = ['slugable', 'servicescategories', 'servicescategories.slugable', 'author']
    ): Collection|LengthAwarePaginator {
        return app(PostInterface::class)->getAllservicesposts($perPage, $active, $with);
    }
}

if (! function_exists('get_recent_servicesposts')) {
    function get_recent_servicesposts(int $limit): Collection|LengthAwarePaginator
    {
        return app(PostInterface::class)->getRecentservicesposts($limit);
    }
}

if (! function_exists('get_featured_servicescategories')) {
    function get_featured_servicescategories(int $limit, array $with = []): Collection|LengthAwarePaginator
    {
        return app(CategoryInterface::class)->getFeaturedservicescategories($limit, $with);
    }
}

if (! function_exists('get_all_servicescategories')) {
    function get_all_servicescategories(array $condition = [], array $with = []): Collection|LengthAwarePaginator
    {
        return app(CategoryInterface::class)->getAllservicescategories($condition, $with);
    }
}

if (! function_exists('get_all_servicestags')) {
    function get_all_servicestags(bool $active = true): Collection|LengthAwarePaginator
    {
        return app(TagInterface::class)->getAllservicestags($active);
    }
}

if (! function_exists('get_popular_servicestags')) {
    function get_popular_servicestags(
        int $limit = 10,
        array $with = ['slugable'],
        array $withCount = ['servicesposts']
    ): Collection|LengthAwarePaginator {
        return app(TagInterface::class)->getPopularservicestags($limit, $with, $withCount);
    }
}

if (! function_exists('get_popular_servicesposts')) {
    function get_popular_servicesposts(int $limit = 10, array $args = []): Collection|LengthAwarePaginator
    {
        return app(PostInterface::class)->getPopularservicesposts($limit, $args);
    }
}

if (! function_exists('get_popular_servicescategories')) {
    function get_popular_servicescategories(
        int $limit = 10,
        array $with = ['slugable'],
        array $withCount = ['servicesposts']
    ): Collection|LengthAwarePaginator {
        return app(CategoryInterface::class)->getPopularservicescategories($limit, $with, $withCount);
    }
}

if (! function_exists('get_category_by_id')) {
    function get_category_by_id(int|string $id): ?BaseModel
    {
        return app(CategoryInterface::class)->getCategoryById($id);
    }
}

if (! function_exists('get_servicescategories')) {
    function get_servicescategories(array $args = []): array
    {
        $indent = Arr::get($args, 'indent', '——');

        $repo = app(CategoryInterface::class);

        $servicescategories = $repo->getservicescategories(Arr::get($args, 'select', ['*']), [
            'is_default' => 'DESC',
            'order' => 'ASC',
            'created_at' => 'DESC',
        ], Arr::get($args, 'condition', ['status' => BaseStatusEnum::PUBLISHED]));

        $servicescategories = sort_item_with_children($servicescategories);

        foreach ($servicescategories as $category) {
            $depth = (int)$category->depth;
            $indentText = str_repeat($indent, $depth);
            $category->indent_text = $indentText;
        }

        return $servicescategories;
    }
}

if (! function_exists('get_servicescategories_with_children')) {
    function get_servicescategories_with_children(): array
    {
        $servicescategories = app(CategoryInterface::class)
            ->getAllservicescategoriesWithChildren(['status' => BaseStatusEnum::PUBLISHED], [], ['id', 'name', 'parent_id']);

        return app(SortItemsWithChildrenHelper::class)
            ->setChildrenProperty('child_cats')
            ->setItems($servicescategories)
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

if (! function_exists('get_services_page_id')) {
    function get_services_page_id(): string|null
    {
        return theme_option('services_page_id', setting('services_page_id'));
    }
}

if (! function_exists('get_services_page_url')) {
    function get_services_page_url(): string
    {
        $servicesPageId = (int)theme_option('services_page_id', setting('services_page_id'));

        if (! $servicesPageId) {
            return BaseHelper::getHomepageUrl();
        }

        $servicesPage = Page::query()->find($servicesPageId);

        if (! $servicesPage) {
            return BaseHelper::getHomepageUrl();
        }

        return $servicesPage->url;
    }
}
