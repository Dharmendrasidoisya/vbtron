<?php

namespace Botble\Services\Repositories\Interfaces;

use Botble\Support\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Support\Collection;

interface TagInterface extends RepositoryInterface
{
    public function getDataSiteMap(): Collection;

    public function getPopularservicestags(int $limit, array $with = ['slugable'], array $withCount = ['servicesposts']): Collection;

    public function getAllservicestags(bool $active = true): Collection;
}
