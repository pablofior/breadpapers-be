<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 20/07/19
 * Time: 22:37
 */

namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\User as UserResource;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $repo;

    public function __construct(UserRepository $repository)
    {
        $this->repo = $repository;
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->only('email', 'password');

        $data['password'] = Hash::make($data['password']);

        $user = $this->repo->create($data);

        return new UserResource($user);
    }
}