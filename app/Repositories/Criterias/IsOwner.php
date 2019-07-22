<?php

namespace App\Repositories\Criterias;

use Bosnadev\Repositories\Criteria\Criteria;
use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;

class IsOwner extends Criteria {

    private $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $model = $model->where('user_id', '=', $this->userId);
        return $model;
    }
}