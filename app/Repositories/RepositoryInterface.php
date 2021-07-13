<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Get all
     *
     * @return mixed
     */
    public function all();

    /**
     * Get one
     *
     * @param int $id
     * @return mixed
     */
    public function findOrFail(int $id);

    /**
     * Create
     *
     * @param  array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update
     *
     * @param  int    $id
     * @param  array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Delete
     *
     * @param  int   $id
     * @return mixed
     */
    public function delete(int $id);

    /**
     * Handle update images to public
     *
     * @var array $request
     */
    public function handleUploadImage(array $request);
}
