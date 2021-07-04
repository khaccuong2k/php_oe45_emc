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
     * @param object $attributes
     * @return mixed
     */
    public function create(object $request);

    /**
     * Update
     * 
     * @param        $id
     * @param object $attributes
     * @return mixed
     */
    public function update(object $request, $id);

    /**
     * Delete
     * 
     * @param int    $id
     * @return mixed
     */
    public function delete(int $id);

    /**
     * Handle update images to public
     * 
     * @var object $request
     */
    public function handleUploadImage(object $request);
}
