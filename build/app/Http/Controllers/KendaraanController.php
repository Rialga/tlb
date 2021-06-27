<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKendaraanRequest;
use App\Http\Requests\UpdateKendaraanRequest;
use App\Models\Kendaraan;
use App\Repositories\KendaraanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class KendaraanController extends AppBaseController
{
    /** @var  KendaraanRepository */
    private $kendaraanRepository;

    public function __construct(KendaraanRepository $kendaraanRepo)
    {
        $this->kendaraanRepository = $kendaraanRepo;
        $this->status = [
          '1' => 'StandBy',
          '2' => 'Rusak',
          '3' => 'Rental'
        ];
        $this->middleware('role:admin,manager_produksi,produksi,logistik');
    }

    /**
     * Display a listing of the Kendaraan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kendaraanRepository->pushCriteria(new RequestCriteria($request));
        $kendaraans = $this->kendaraanRepository->all();
        $title = "Kendaraan";

        return view('kendaraans.index')
            ->with('kendaraans', $kendaraans)
            ->with('status', $this->status)
            ->with('title', $title);
    }

    /**
     * Show the form for creating a new Kendaraan.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Kendaraan - Tambah";
        return view('kendaraans.create')
              ->with('title', $title);
    }

    /**
     * Store a newly created Kendaraan in storage.
     *
     * @param CreateKendaraanRequest $request
     *
     * @return Response
     */
    public function store(CreateKendaraanRequest $request)
    {
        $input = $request->all();

        $kendaraan = $this->kendaraanRepository->create($input);

        Flash::success('Kendaraan saved successfully.');

        return redirect(route('kendaraans.index'));
    }

    /**
     * Display the specified Kendaraan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kendaraan = $this->kendaraanRepository->findWithoutFail($id);
        $title = "Kendaraan - Lihat";

        if (empty($kendaraan)) {
            Flash::error('Kendaraan not found');

            return redirect(route('kendaraans.index'));
        }

        return view('kendaraans.show')
              ->with('kendaraan', $kendaraan)
              ->with('title', $title);
    }

    /**
     * Show the form for editing the specified Kendaraan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kendaraan = $this->kendaraanRepository->findWithoutFail($id);
        $title = "Kendaraan - Edit";

        if (empty($kendaraan)) {
            Flash::error('Kendaraan not found');

            return redirect(route('kendaraans.index'));
        }

        return view('kendaraans.edit')
              ->with('kendaraan', $kendaraan)
              ->with('title', $title);
    }

    /**
     * Update the specified Kendaraan in storage.
     *
     * @param  int              $id
     * @param UpdateKendaraanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKendaraanRequest $request)
    {
        $kendaraan = $this->kendaraanRepository->findWithoutFail($id);

        if (empty($kendaraan)) {
            Flash::error('Kendaraan not found');

            return redirect(route('kendaraans.index'));
        }

        $kendaraan = $this->kendaraanRepository->update($request->all(), $id);

        Flash::success('Kendaraan updated successfully.');

        return redirect(route('kendaraans.index'));
    }

    /**
     * Remove the specified Kendaraan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kendaraan = $this->kendaraanRepository->findWithoutFail($id);

        if (empty($kendaraan)) {
            Flash::error('Kendaraan not found');

            return redirect(route('kendaraans.index'));
        }

        $this->kendaraanRepository->delete($id);

        Flash::success('Kendaraan deleted successfully.');

        return redirect(route('kendaraans.index'));
    }

}
