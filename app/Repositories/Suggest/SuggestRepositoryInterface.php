<?php

namespace App\Repositories\Suggest;

interface SuggestRepositoryInterface
{
    /**
     * Change status of Suggest
     *
     * @var int $id
     * @return boolean
     */
    public function changeStatus(int $id);
}
