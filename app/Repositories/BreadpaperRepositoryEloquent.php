<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BreadpaperRepository;
use App\Models\Breadpaper;
use App\Validators\BreadpaperValidator;

/**
 * Class BreadpaperRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BreadpaperRepositoryEloquent extends BaseRepository implements BreadpaperRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Breadpaper::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
