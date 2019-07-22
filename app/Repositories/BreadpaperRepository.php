<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 20/07/19
 * Time: 22:31
 */

namespace App\Repositories;


use App\Models\Breadpaper;
use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class BreadpaperRepository extends Repository implements RepositoryInterface
{
    public function model()
    {
        return Breadpaper::class;
    }

    public function addCollaborators($collaborators, $breadpaperId)
    {
        $breadpaper = $this->find($breadpaperId);

        $breadpaper->collaborators()->sync($collaborators);

        return $breadpaper;
    }
}