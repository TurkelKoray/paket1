<?php
declare(strict_types = 1);

namespace App\Core\Repositories;

use Illuminate\Support\Collection;

interface RepositoryInterface
{
    public function find($id): ?Collection;

    public function findByField(string $field, $value): ?Collection;

    public function findIn(array $ids): Collection;

    public function findInByField(string $field, array $values): Collection;

}