<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BreadpaperCreateRequest;
use App\Http\Requests\BreadpaperUpdateRequest;
use App\Repositories\BreadpaperRepository;

/**
 * Class BreadpapersController.
 *
 * @package namespace App\Http\Controllers;
 */
class BreadpapersController extends Controller
{
    /**
     * @var BreadpaperRepository
     */
    protected $repository;

    /**
     * BreadpapersController constructor.
     *
     * @param BreadpaperRepository $repository
     * @param BreadpaperValidator $validator
     */
    public function __construct(BreadpaperRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $breadpapers = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $breadpapers,
            ]);
        }

        return view('breadpapers.index', compact('breadpapers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BreadpaperCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BreadpaperCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $breadpaper = $this->repository->create($request->all());

            $response = [
                'message' => 'Breadpaper created.',
                'data'    => $breadpaper->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $breadpaper = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $breadpaper,
            ]);
        }

        return view('breadpapers.show', compact('breadpaper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breadpaper = $this->repository->find($id);

        return view('breadpapers.edit', compact('breadpaper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BreadpaperUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BreadpaperUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $breadpaper = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Breadpaper updated.',
                'data'    => $breadpaper->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Breadpaper deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Breadpaper deleted.');
    }
}
