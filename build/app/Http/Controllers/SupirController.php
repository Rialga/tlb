<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSupirRequest;
use App\Http\Requests\UpdateSupirRequest;
use App\Models\Produksi;
use App\Models\Supir;
use App\Repositories\SupirRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SupirController extends AppBaseController
{
    /** @var  SupirRepository */
    private $supirRepository;

    public function __construct(SupirRepository $supirRepo)
    {
        $this->supirRepository = $supirRepo;
        $this->middleware('role:admin,manager_produksi');
    }

    /**
     * Display a listing of the Supir.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->supirRepository->pushCriteria(new RequestCriteria($request));
        $supirs = $this->supirRepository->all();
        $title = "Supir";

        $historysupir = Produksi::with('pemesanan')->get();

        return view('supirs.index')
              ->with('supirs', $supirs)
              ->with('title', $title)
               ->with('data', $historysupir);
    }

    /**
     * Show the form for creating a new Supir.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Supir - Tambah";
        return view('supirs.create')
              ->with('title', $title);
    }

    /**
     * Store a newly created Supir in storage.
     *
     * @param CreateSupirRequest $request
     *
     * @return Response
     */
    public function store(CreateSupirRequest $request)
    {
        $input = $request->all();

        $supir = $this->supirRepository->create($input);

        Flash::success('Supir saved successfully.');

        return redirect(route('supirs.index'));
    }

    /**
     * Display the specified Supir.
     *
     * @param  int $id
     *
     * @return Response
     */




    public function show($id)
    {
        $supir = $this->supirRepository->findWithoutFail($id);
        $title = "Supir - Lihat";

        if (empty($supir)) {
            Flash::error('Supir not found');

            return redirect(route('supirs.index'));
        }

        return view('supirs.show')
              ->with('supir', $supir)
              ->with('title', $title);
    }

    /**
     * Show the form for editing the specified Supir.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $supir = $this->supirRepository->findWithoutFail($id);
        $title = "Supir - Edit";

        if (empty($supir)) {
            Flash::error('Supir not found');

            return redirect(route('supirs.index'));
        }

        return view('supirs.edit')
              ->with('supir', $supir)
              ->with('title', $title);
    }

    /**
     * Update the specified Supir in storage.
     *
     * @param  int              $id
     * @param UpdateSupirRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $supir = Supir::where('id',$id)->first();

        if (empty($supir)) {
            Flash::error('Supir not found');

            return redirect(route('supirs.index'));
        }

        $supir->nama_supir = $request->nama_supir;
        $supir->no_sim = $request->no_sim;
        $supir->expired_sim = $request->expired_sim;
        $supir->update();

        Flash::success('Supir updated successfully.');

        return redirect(route('supirs.index'));
    }

    /**
     * Remove the specified Supir from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $supir = $this->supirRepository->findWithoutFail($id);

        if (empty($supir)) {
            Flash::error('Supir not found');

            return redirect(route('supirs.index'));
        }

        $this->supirRepository->delete($id);

        Flash::success('Supir deleted successfully.');

        return redirect(route('supirs.index'));
    }

    public function filter(Request $request)
    {
        $historysupir = Produksi::with('pemesanan');
        $this->supirRepository->pushCriteria(new RequestCriteria($request));
        $histories = $historysupir->orderBy('waktu_produksi', 'desc')->get();
        $histories = $histories->filter(function ($history) use ($request) {
            $dari = $request['tanggal_kirim_dari'] ? Carbon::parse($request['tanggal_kirim_dari']) : null;
            $sampai = $request['tanggal_kirim_sampai'] ? Carbon::parse($request['tanggal_kirim_sampai']) : null;
            if ($dari) {
                if ($sampai) {
                    return ($history->waktu_produksi >= $dari &&
                            $history->waktu_produksi < $sampai->addDays(1)) ||
                        ($history->waktu_produksi >= $dari &&
                            $history->waktu_produksi < $dari->addDays(1));
                }
                return $history->waktu_produksi >= $dari &&
                    $history->waktu_produksi < $dari->addDays(1);
            }
            return $history;
        });

        $histories = $histories->filter(function ($history) use ($request) {
            return $request['supir'] != null ?
                $history->supir_id == $request['supir'] :
                $history;
        });



        $this->supirRepository->pushCriteria(new RequestCriteria($request));
        $supirs = $this->supirRepository->all();
        $title = "Supir";

        return view('supirs.index')
            ->with('data', $histories)
            ->with('supirs', $supirs)
            ->with('title', $title)
            ->with('dari', $request['tanggal_kirim_dari'])
            ->with('sampai', $request['tanggal_kirim_sampai']);
    }


}
