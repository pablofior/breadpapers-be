<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 20/07/19
 * Time: 22:34
 */

namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\BreadpaperStoreRequest;
use App\Http\Requests\BreadpaperSyncCollaboratorsRequest;
use App\Http\Requests\BreadpaperUpdateRequest;
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

    public function store(BreadpaperStoreRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();

        try {

            $breadpaper = $this->repo->create($data);

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->error($e);
        }

        return new BreadpaperResource($breadpaper);
    }

    public function update(BreadpaperUpdateRequest $request, $id)
    {
        $data = $request->validated();

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

    public function syncCollaborators(BreadpaperSyncCollaboratorsRequest $request)
    {
        $data = $request->validated();

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