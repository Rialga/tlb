<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use App\Repositories\JabatanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class JabatanController extends AppBaseController
{
    /** @var  JabatanRepository */
    private $jabatanRepository;

    public function __construct(JabatanRepository $jabatanRepo)
    {
        $this->jabatanRepository = $jabatanRepo;
        $this->middleware('role:admin,manager_produksi');
    }

    /**
     * Display a listing of the Jabatan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jabatanRepository->pushCriteria(new RequestCriteria($request));
        $jabatans = $this->jabatanRepository->all();
        $title = "Jabatan";

        return view('jabatans.index')
            ->with('jabatans', $jabatans)
            ->with('title', $title);
    }

    /**
     * Show the form for creating a new Jabatan.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Jabatan - Tambah";

        Flash::error('Tidak bisa mengakses halaman tersebut!');
        return redirect()->route('jabatans.index');
    }

    /**
     * Store a newly created Jabatan in storage.
     *
     * @param CreateJabatanRequest $request
     *
     * @return Response
     */
    public function store(CreateJabatanRequest $request)
    {
        Flash::error('Tidak bisa mengakses halaman tersebut!');

        return redirect()->route('jabatans.index');
    }

    /**
     * Display the specified Jabatan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jabatan = $this->jabatanRepository->findWithoutFail($id);
        $title = "Jabatan - Lihat";

        Flash::error('Tidak bisa mengakses halaman tersebut!');

        return redirect()->route('jabatans.index');
    }

    /**
     * Show the form for editing the specified Jabatan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jabatan = $this->jabatanRepository->findWithoutFail($id);
        $title = "Jabatan - Edit";

        if (empty($jabatan)) {
            Flash::error('Jabatan not found');

            return redirect(route('jabatans.index'));
        }

        return view('jabatans.edit')
              ->with('jabatan', $jabatan)
              ->with('title', $title);
    }

    /**
     * Update the specified Jabatan in storage.
     *
     * @param  int              $id
     * @param UpdateJabatanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJabatanRequest $request)
    {
        $jabatan = $this->jabatanRepository->findWithoutFail($id);

        if (empty($jabatan)) {
            Flash::error('Jabatan not found');

            return redirect(route('jabatans.index'));
        }

        $jabatan = $this->jabatanRepository->update($request->all(), $id);

        Flash::success('Jabatan updated successfully.');

        return redirect(route('jabatans.index'));
    }

    /**
     * Remove the specified Jabatan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jabatan = $this->jabatanRepository->findWithoutFail($id);

        Flash::error('Tidak bisa mengakses halaman tersebut!');

        return redirect()->route('jabatans.index');
    }
}
