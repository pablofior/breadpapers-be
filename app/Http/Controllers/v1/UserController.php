<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 20/07/19
 * Time: 22:37
 */

namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\TestRequest;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
use App\Repositories\UserRepository;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    private $repo;

    public function __construct(UserRepository $repository)
    {
        $this->repo = $repository;
    }

    /*
     *  Store User
     *
     * @param name required string User Name
     * @param email required email User Email
     * @param password required string min:6 confirmed User Password
     * @param password_confirmation required string
     *
     * @return App\Http\Resources\User
     */
    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        DB::beginTransaction();

        try {

            $user = $this->repo->create($data);

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->error($e);
        }

        return new UserResource($user);
    }

    /*
     *  Update User
     *
     * @param name required string User Name
     * @param email required email User Email
     * @param password nullable string min:6 confirmed User Password
     * @param password_confirmation required_with:password string
     *
     * @return App\Http\Resources\User
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->validated();

        if(isset($data['password']))
            $data['password'] = Hash::make($data['password']);

        DB::beginTransaction();

        try {

            $user = $this->repo->update($data, $id);

            DB::commit();

        } catch(\Exception $e) {

            DB::rollBack();

            return response()->error($e);
        }

        return new UserResource($user);
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $user = $this->repo->find($id);

            $user->breadpapers()->delete();

            $user->ownedBreadpapers()->delete();

            $this->repo->delete($id);

            DB::commit();
        } catch(\Exception $e) {

            DB::rollBack();

            return response()->error($e);
        }

        return response()->success('deleted');
    }

    public function getLoggedUser(Request $request)
    {
        return new UserResource(Auth::user());
    }

    public function all(Request $request)
    {
        return new UserCollection($this->repo->all());
    }
}