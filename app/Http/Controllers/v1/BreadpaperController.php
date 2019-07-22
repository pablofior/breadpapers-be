<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 20/07/19
 * Time: 22:34
 */

namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Http\Resources\Breadpaper as BreadpaperResource;
use App\Http\Resources\BreadpaperCollection;
use App\Repositories\BreadpaperRepository;
use App\Repositories\Criterias\IsOwner;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BreadpaperController extends Controller
{
    private $repo;

    public function __construct(BreadpaperRepository $repository)
    {
        $this->repo = $repository;
    }

    public function store(Request $request)
    {
        $data = $request->only('title', 'content', 'user_id');

        $validator = validate($data,
            [
                'title' => ['required', 'string'],
                'content' => ['required', 'string'],
                'user_id' => ['required', Rule::exists('users', 'id')]
            ]
        );
//
        if($validator->fails()) {
            return response()->json($validator->errors());
        }
//
        DB::beginTransaction();
//
        try {

            $breadpaper = $this->repo->create($data);

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->error($e);
        }
//
//        }
//
//        return response()->success($breadpaper);

        return new BreadpaperResource($breadpaper);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('title', 'content');

        $validator = validate($data,
            [
                'title' => ['required', 'string'],
                'content' => ['required', 'string'],
                'user_id' => ['required', Rule::exists('users', 'id')]
            ]
        );

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        DB::beginTransaction();

        try {

            $breadpaper = $this->repo->update($data, $id);

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->error($e);
        }

        return new BreadpaperResource($breadpaper);
    }

    public function syncCollaborators(Request $request)
    {
        $data = $request->only('breadpaper_id', 'user_id', 'collaborators');

        $validator = validate($data,
            [
                'breadpaper_id' => ['required', Rule::exists('breadpapers', 'id')],
                'user_id' => ['required', Rule::exists('users', 'id')],
                'collaborators.*' => ['required',  Rule::exists('users', 'id')],
            ]
        );

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        DB::beginTransaction();

        try {

            $breadpaper = $this->repo->addCollaborators($data['collaborators'], $data['breadpaper_id']);

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->error($e);
        }

        return new BreadpaperResource($breadpaper);
    }

    public function getOwned(Request $request, $userId)
    {
        $breadpapers = (new UserRepository())->find($userId)->ownedBreadpapers;

        return new BreadpaperCollection($breadpapers);
    }

    public function getCollaborating(Request $request, $userId)
    {
        $breadpapers = (new UserRepository())->find($userId)->breadpapers;

        return new BreadpaperCollection($breadpapers);
    }
}