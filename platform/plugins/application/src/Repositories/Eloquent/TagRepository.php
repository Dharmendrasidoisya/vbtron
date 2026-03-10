<?php

namespace Botble\Application\Repositories\Eloquent;

use Botble\Application\Repositories\Interfaces\TagInterface;
use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Illuminate\Support\Collection;

class TagRepository extends RepositoriesAbstract implements TagInterface
{
    public function getDataSiteMap(): Collection
    {
        $data = $this->model
            ->with('slugable')
            ->wherePublished()
            ->orderByDesc('created_at')
            ->select(['id', 'name', 'updated_at']);

        return $this->applyBeforeExecuteQuery($data)->get();
    }

    public function getPopularapplicationtags(int $limit, array $with = ['slugable'], array $withCount = ['applicationposts']): Collection
    {
        $data = $this->model
            ->with($with)
            ->withCount($withCount)
            ->orderByDesc('applicationposts_count')
            ->limit($limit);

        return $this->applyBeforeExecuteQuery($data)->get();
    }

    public function getAllapplicationtags($active = true): Collection
    {
        $data = $this->model;
        if ($active) {
            $data = $data->wherePublished();
        }

        return $this->applyBeforeExecuteQuery($data)->get();
    }
}
