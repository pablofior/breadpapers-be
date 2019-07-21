<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 20/07/19
 * Time: 22:39
 */

namespace App\Repositories;


use App\Models\User;
use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class UserRepository extends Repository implements RepositoryInterface
{
    public function model()
    {
        return User::class;
    }
}