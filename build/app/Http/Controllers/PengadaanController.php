<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePengadaanRequest;
use App\Http\Requests\UpdatePengadaanRequest;
use App\Repositories\PengadaanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use App\Models\BahanBakuHistory;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\BahanBaku;
use Response;
use Auth;
use App\Models\PemesananBahanBaku;

class PengadaanController extends AppBaseController
{
    /** @var  PengadaanRepository */
    private $pengadaanRepository;

    public function __construct(PengadaanRepository $pengadaanRepo)
    {
        $this->pengadaanRepository = $pengadaanRepo;
        $this->bahanBakus = BahanBaku::pluck('nama_bahan_baku', 'id');
        $this->pemesanan_bahan_bakus = PemesananBahanBaku::orderBy('tanggal_pemesanan', 'desc')->get()->pluck('supplier_bahan_baku', 'id');
        $this->middleware('role:admin,manager_produksi,logistik');
    }

    /**
     * Display a listing of the Pengadaan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pengadaanRepository->pushCriteria(new RequestCriteria($request));
        $pengadaans = $this->pengadaanRepository->orderBy('tanggal_pengadaan', 'desc')->all();
        $title = "Penerimaan Material";
        return view('pengadaans.index')
            ->with('pengadaans', $pengadaans)
            ->with('title', $title);
    }

    /**
     * Show the form for creating a new Pengadaan.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Penerimaan Material - Tambah";
        return view('pengadaans.create')
            ->with('bahanBakus', $this->bahanBakus)
            ->with('title', $title)
            ->with('supplier', $this->pemesanan_bahan_bakus);
    }

    /**
     * Store a newly created Pengadaan in storage.
     *
     * @param CreatePengadaanRequest $request
     *
     * @return Response
     */
    public function store(CreatePengadaanRequest $request)
    {
        $input = $request->all();
        $supplier = PemesananBahanBaku::findOrFail($input['pemesanan_bahan_baku_id']);
        $input['bahan_baku_id'] = $supplier->bahan_baku_id;
        $bahan_baku = BahanBaku::find($input['bahan_baku_id']);
        $exists = $supplier->pengadaans->sum('berat');

        if ($supplier->volume_pemesanan < $exists+$input['berat']) {
            Flash::error('Volume pengadaan lebih besar dari volume pemesanan bahan baku. Sisa '.($supplier->volume_pemesanan-$exists).' '.$bahan_baku->satuan);
            return redirect()->back()->withInput($input);
        }

        $input['user_id'] = Auth::user()->id;

        $pengadaan = $this->pengadaanRepository->create($input);
        $bahan_baku->sisa = $bahan_baku->sisa + $pengadaan->berat;
        $bahan_baku->save();

        $history = new BahanBakuHistory();
        $history->bahan_baku_id = $pengadaan->bahan_baku_id;
        $history->type = 2;
        $history->waktu = $pengadaan->tanggal_pengadaan;
        $history->volume = $pengadaan->berat;
        $history->pengadaan_id = $pengadaan->id;
        $history->total_sisa = $bahan_baku->sisa;
        $history->save();


        Flash::success('Penerimaan Material saved successfully.');

        return redirect(route('pengadaans.index'));
    }

    /**
     * Display the specified Pengadaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pengadaan = $this->pengadaanRepository->findWithoutFail($id);
        $title = "Penerimaan Material - Lihat";

        if (empty($pengadaan)) {
            Flash::error('Penerimaan Material not found');

            return redirect(route('pengadaans.index'));
        }

        return view('pengadaans.show')
        ->with('pengadaan', $pengadaan)
        ->with('title', $title);
    }

    /**
     * Show the form for editing the specified Pengadaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pengadaan = $this->pengadaanRepository->findWithoutFail($id);
        $title = "Penerimaan Material - Edit";
        if (empty($pengadaan)) {
            Flash::error('Penerimaan Material not found');

            return redirect(route('pengadaans.index'));
        }

        return view('pengadaans.edit')
              ->with('pengadaan', $pengadaan)
              ->with('bahanBakus', $this->bahanBakus)
              ->with('title', $title)
              ->with('supplier', $this->pemesanan_bahan_bakus);
    }

    /**
     * Update the specified Pengadaan in storage.
     *
     * @param  int              $id
     * @param UpdatePengadaanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePengadaanRequest $request)
    {
        $input = $request->all();

        $pengadaan = $this->pengadaanRepository->findWithoutFail($id);
        $bahan_baku = BahanBaku::findOrFail($pengadaan->bahan_baku_id);
        $supplier   = PemesananBahanBaku::findOrFail($input['pemesanan_bahan_baku_id']);

        $exists = $supplier->pengadaans->filter(function ($p) use ($pengadaan) {
            return $p->id != $pengadaan->id;
        })->sum('berat');

        if ($supplier->volume_pemesanan < $exists+$input['berat']) {
            Flash::error('Volume pengadaan lebih besar dari volume pemesanan bahan baku. Sisa '.($supplier->volume_pemesanan-$exists).' '.$bahan_baku->satuan);
            return redirect()->back()->withInput($input);
        }

        $old_volume = $pengadaan->berat;

        if (empty($pengadaan)) {
            Flash::error('Penerimaan Material not found');

            return redirect(route('pengadaans.index'));
        }

        $bahan_baku->sisa += $input['berat'] - $old_volume;

        $bahan_baku->update();
        $pengadaan = $this->pengadaanRepository->update($input, $id);

        $history = $bahan_baku->bahan_baku_histories->where('pengadaan_id', $pengadaan->id)->first();
        $history->bahan_baku_id = $pengadaan->bahan_baku_id;
        $history->type = 2;
        $history->waktu = $pengadaan->tanggal_pengadaan;
        $history->volume = $pengadaan->berat;
        $history->pengadaan_id = $pengadaan->id;
        $history->total_sisa = $bahan_baku->sisa;
        $history->update();

        Flash::success('Penerimaan Material updated successfully.');

        return redirect(route('pengadaans.index'));
    }

    /**
     * Remove the specified Pengadaan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pengadaan = $this->pengadaanRepository->findWithoutFail($id);
        $bahan_baku = BahanBaku::find($pengadaan->bahan_baku_id);
        $old_volume = $pengadaan->berat;

        $bahan_baku->sisa -=  $old_volume;
        $bahan_baku->save();

        if (empty($pengadaan)) {
            Flash::error('Penerimaan Material not found');

            return redirect(route('pengadaans.index'));
        }

        $this->pengadaanRepository->delete($id);

        Flash::success('Penerimaan Material deleted successfully.');

        return redirect(route('pengadaans.index'));
    }
}
