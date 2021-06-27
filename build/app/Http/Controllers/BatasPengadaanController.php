<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBatasPengadaanRequest;
use App\Http\Requests\UpdateBatasPengadaanRequest;
use App\Repositories\BatasPengadaanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\BahanBaku;

class BatasPengadaanController extends AppBaseController
{
    /** @var  BatasPengadaanRepository */
    private $batasPengadaanRepository;

    public function __construct(BatasPengadaanRepository $batasPengadaanRepo)
    {
        $this->batasPengadaanRepository = $batasPengadaanRepo;
        $this->middleware('role:admin,manager_produksi');
    }

    /**
     * Display a listing of the BatasPengadaan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->batasPengadaanRepository->pushCriteria(new RequestCriteria($request));
        $batasPengadaans = $this->batasPengadaanRepository->all();
        $bahanBakus = BahanBaku::all();
        $title = 'Pengaturan - Batas Pengadaan';

        return view('batas_pengadaans.index')
              ->with('batasPengadaans', $batasPengadaans)
              ->with('bahanBakus', $bahanBakus)
              ->with('title', $title);
    }


    /**
     * Store a newly created BatasPengadaan in storage.
     *
     * @param CreateBatasPengadaanRequest $request
     *
     * @return Response
     */
    public function store(CreateBatasPengadaanRequest $request)
    {
        $input = $request->all();
        $bahanBaku = BahanBaku::findOrFail($input['bahan_baku_id']);
        Flash::success('Perubahan berhasil disimpan!');
        if (!$bahanBaku->batas_pengadaan) {
            $this->batasPengadaanRepository->create($input);
            return redirect()->back();
        }

        $batas_pengadaan_id = $bahanBaku->batas_pengadaan->id;
        $this->batasPengadaanRepository->update($input, $batas_pengadaan_id);

        return redirect()->back();
    }
}
