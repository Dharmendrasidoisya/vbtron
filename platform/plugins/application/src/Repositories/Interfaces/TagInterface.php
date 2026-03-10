<?php

namespace Botble\Application\Repositories\Interfaces;

use Botble\Support\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Support\Collection;

interface TagInterface extends RepositoryInterface
{
    public function getDataSiteMap(): Collection;

    public function getPopularapplicationtags(int $limit, array $with = ['slugable'], array $withCount = ['applicationposts']): Collection;

    public function getAllapplicationtags(bool $active = true): Collection;
}
