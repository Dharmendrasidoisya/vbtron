<?php

namespace Botble\Products\Repositories\Interfaces;

use Botble\Support\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Support\Collection;

interface TagInterface extends RepositoryInterface
{
    public function getDataSiteMap(): Collection;

    public function getPopularproductstags(int $limit, array $with = ['slugable'], array $withCount = ['productsposts']): Collection;

    public function getAllproductstags(bool $active = true): Collection;
}
