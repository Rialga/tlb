<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBahanBakuRequest;
use App\Http\Requests\UpdateBahanBakuRequest;
use App\Repositories\BahanBakuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BahanBakuController extends AppBaseController
{
    /** @var  BahanBakuRepository */
    private $bahanBakuRepository;

    public function __construct(BahanBakuRepository $bahanBakuRepo)
    {
        $this->bahanBakuRepository = $bahanBakuRepo;
        $this->middleware('role:admin,manager_produksi');
    }

    /**
     * Display a listing of the BahanBaku.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bahanBakuRepository->pushCriteria(new RequestCriteria($request));
        $bahanBakus = $this->bahanBakuRepository->all();
        $title = "Material";

        return view('bahan_bakus.index')
              ->with('bahanBakus', $bahanBakus)
              ->with('title', $title);
    }

    /**
     * Show the form for creating a new BahanBaku.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Material - Tambah";
        return view('bahan_bakus.create')
              ->with('title', $title);
    }

    /**
     * Store a newly created BahanBaku in storage.
     *
     * @param CreateBahanBakuRequest $request
     *
     * @return Response
     */
    public function store(CreateBahanBakuRequest $request)
    {
        $input = $request->all();
        $input['kode'] = strtolower(str_replace(' ', '_', $input['nama_bahan_baku']));

        $bahanBaku = $this->bahanBakuRepository->create($input);

        Flash::success('Material saved successfully.');

        return redirect(route('bahanBakus.index'));
    }

    /**
     * Display the specified BahanBaku.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bahanBaku = $this->bahanBakuRepository->findWithoutFail($id);
        $title = "Material - Lihat";

        if (empty($bahanBaku)) {
            Flash::error('Material not found');

            return redirect(route('bahanBakus.index'));
        }

        return view('bahan_bakus.show')
              ->with('bahanBaku', $bahanBaku)
              ->with('title', $title);
    }

    /**
     * Show the form for editing the specified BahanBaku.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bahanBaku = $this->bahanBakuRepository->findWithoutFail($id);
        $title = "Material - Edit";

        if (empty($bahanBaku)) {
            Flash::error('Material not found');

            return redirect(route('bahanBakus.index'));
        }

        return view('bahan_bakus.edit')
              ->with('bahanBaku', $bahanBaku)
              ->with('title', $title);
    }

    /**
     * Update the specified BahanBaku in storage.
     *
     * @param  int              $id
     * @param UpdateBahanBakuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBahanBakuRequest $request)
    {
        $bahanBaku = $this->bahanBakuRepository->findWithoutFail($id);

        if (empty($bahanBaku)) {
            Flash::error('Material not found');

            return redirect(route('bahanBakus.index'));
        }

        $bahanBaku = $this->bahanBakuRepository->update($request->all(), $id);

        Flash::success('Material updated successfully.');

        return redirect(route('bahanBakus.index'));
    }

    /**
     * Remove the specified BahanBaku from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bahanBaku = $this->bahanBakuRepository->findWithoutFail($id);

        if (empty($bahanBaku)) {
            Flash::error('Material not found');

            return redirect(route('bahanBakus.index'));
        }

        $this->bahanBakuRepository->delete($id);

        Flash::success('Material deleted successfully.');

        return redirect(route('bahanBakus.index'));
    }
}
