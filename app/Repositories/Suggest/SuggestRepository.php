<?php

namespace App\Repositories\Suggest;

use App\Models\Suggest;
use App\Repositories\BaseRepository;
use App\Repositories\Suggest\SuggestRepositoryInterface;

class SuggestRepository extends BaseRepository implements SuggestRepositoryInterface
{
    /**
     *
     * @var const CHANGE_STATUS_SUGGEST_TO_NEST_STEP
     */
    private const CHANGE_STATUS_SUGGEST_TO_NEST_STEP = 1;

    public function getModel()
    {
        return Suggest::class;
    }

    public function all()
    {
        $orders = $this->model::with('user')
        ->orderBy(
            'id',
            'desc',
        )->paginate(
            config('app.paginate_number')
        );

        return $orders;
    }

    public function changeStatus(int $id)
    {
        $find = $this->findOrFail($id);
        if ($find) {
            $find->update(['status' => $find->status + self::CHANGE_STATUS_SUGGEST_TO_NEST_STEP,]);

            return true;
        }

        return false;
    }
}
