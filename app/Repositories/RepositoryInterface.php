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
     * @param  $id
     * @return mixed
     */
    public function findOrFail($id);

    /**
     * Create
     *
     * @param  object $attributes
     * @return mixed
     */
    public function create(object $attributes);

    /**
     * Update
     *
     * @param  object $attributes
     * @param  int    $id
     * @return mixed
     */
    public function update(object $attributes, $id);

    /**
     * Delete
     *
     * @param  int   $id
     * @return mixed
     */
    public function delete($id);
}
