<?php

namespace App\Contracts\Blog;

interface BlogRepositoryContract
{
    /**
     * Store categories data.
     *
     * @param $data
     * @return bool
     */
    public function store($data): bool;

    /**
     * List all categories data;
     *
     * @return array
     */
    public function list(): array;

    /**
     * Destroy category by id.
     *
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool;

    /**
     * Show category data by id.
     *
     * @param int $id
     * @return array
     */
    public function show(int $id): array;

    /**
     * Update category data by id.
     *
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function update(int $id, array $data): bool;
}
