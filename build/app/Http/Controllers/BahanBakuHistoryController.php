<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBahanBakuHistoryRequest;
use App\Http\Requests\UpdateBahanBakuHistoryRequest;
use App\Repositories\BahanBakuHistoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Auth;
use PDF;
use Carbon\Carbon;
use App\Models\BahanBakuHistory;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\BahanBaku;
use App\Exports\HistoryMaterialExport;
use Maatwebsite\Excel\Facades\Excel;

class BahanBakuHistoryController extends AppBaseController
{
    /** @var  BahanBakuHistoryRepository */
    private $bahanBakuHistoryRepository;

    public function __construct(BahanBakuHistoryRepository $bahanBakuHistoryRepo)
    {
        set_time_limit(0);
        $this->bahanBakuHistoryRepository = $bahanBakuHistoryRepo;
    }

    /**
     * Display a listing of the BahanBakuHistory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bahanBakuHistoryRepository->pushCriteria(new RequestCriteria($request));
        $bahanBakuHistories = $this->bahanBakuHistoryRepository->orderBy('waktu', 'desc')->all();
        $title = "Riwayat Material";

        return view('bahan_baku_histories.index')
              ->with('bahanBakuHistories', $bahanBakuHistories)
              ->with('title', $title);
    }

    public function filter(Request $request)
    {
        $this->bahanBakuHistoryRepository->pushCriteria(new RequestCriteria($request));
        $histories = $this->bahanBakuHistoryRepository->orderBy('waktu', 'desc')->all();
        $histories = $histories->filter(function ($history) use ($request) {
            $dari = $request['tanggal_kirim_dari'] ? Carbon::parse($request['tanggal_kirim_dari']) : null;
            $sampai = $request['tanggal_kirim_sampai'] ? Carbon::parse($request['tanggal_kirim_sampai']) : null;
            if ($dari) {
                if ($sampai) {
                    return ($history->waktu >= $dari &&
                         $history->waktu < $sampai->addDays(1)) ||
                         ($history->waktu >= $dari &&
                         $history->waktu < $dari->addDays(1));
                }
                return $history->waktu >= $dari &&
                 $history->waktu < $dari->addDays(1);
            }
            return $history;
        });

        $histories = $histories->filter(function ($history) use ($request) {
            return $request['bahan_baku'] != null ?
                   $history->bahan_baku_id == $request['bahan_baku'] :
                   $history;
        });

        $title = 'Riwayat Material - Filter';

        return view('bahan_baku_histories.index')
        ->with('bahanBakuHistories', $histories)
        ->with('title', $title)
        ->with('dari', $request['tanggal_kirim_dari'])
        ->with('sampai', $request['tanggal_kirim_sampai']);
    }

    public function downloadPdf(Request $request)
    {
        $data = json_decode($request['bahanBakuHistories'], true);
        $bahanBakuHistories = BahanBakuHistory::hydrate($data);
        $bahanBakuHistories = $bahanBakuHistories->flatten();
        $stock = [];
        $bahan_bakus = $bahanBakuHistories->groupBy('bahan_baku_id');

        foreach ($bahan_bakus as $key => $bahan_baku) {
            $masuk = $bahan_baku->filter(function ($b) {
                return $b->type == 2;
            })->sum('volume');
            $keluar = $bahan_baku->filter(function ($b) {
                return $b->type == 0 || $b->type == 1;
            })->sum('volume');
            $sisa = $bahan_baku->sortByDesc('waktu')->first()->total_sisa;
            $data = ['masuk' => $masuk, 'keluar' => $keluar, 'stock' => $sisa];
            $stock[$key] = $data;
        }

        $user =  Auth::user()->name;
        $pdf = PDF::loadView(
            'bahan_baku_histories.pdf',
                [
                  'bahanBakuHistories' => $bahanBakuHistories,
                  'user' => $user,
                  'stock' => $stock,
                  'dari' => $request['dari'],
                  'sampai' => $request['sampai'],
                ]
        );

        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('material_'.time().'.pdf');
    }

    public function exportExcel(Request $request)
    {

      $data = json_decode($request['bahanBakuHistories'], true);
      $bahanBakuHistories = BahanBakuHistory::hydrate($data);
      $bahanBakuHistories = $bahanBakuHistories->flatten();
      $stock = [];
      $bahan_bakus = $bahanBakuHistories->groupBy('bahan_baku_id');

      foreach ($bahan_bakus as $key => $bahan_baku) {
          $masuk = $bahan_baku->filter(function ($b) {
              return $b->type == 2;
          })->sum('volume');
          $keluar = $bahan_baku->filter(function ($b) {
              return $b->type == 0 || $b->type == 1;
          })->sum('volume');
          $sisa = $bahan_baku->sortByDesc('waktu')->first()->total_sisa;
          $data = ['masuk' => $masuk, 'keluar' => $keluar, 'stock' => $sisa];
          $stock[$key] = $data;
      }

      $user =  Auth::user()->name;
      $dari = $request['dari'];
      $sampai = $request['sampai'];


        return Excel::download(new HistoryMaterialExport($user, $stock, $dari, $sampai), 'Material.xlsx');

    }

    /**
     * Show the form for creating a new BahanBakuHistory.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Riwayat Material - Tambah";
        return view('bahan_baku_histories.create')
              ->with('title', $title);
    }

    /**
     * Store a newly created BahanBakuHistory in storage.
     *
     * @param CreateBahanBakuHistoryRequest $request
     *
     * @return Response
     */
    public function store(CreateBahanBakuHistoryRequest $request)
    {
        $input = $request->all();

        $bahanBakuHistory = $this->bahanBakuHistoryRepository->create($input);

        Flash::success('Material History saved successfully.');

        return redirect(route('bahanBakuHistories.index'));
    }

    /**
     * Display the specified BahanBakuHistory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bahanBakuHistory = $this->bahanBakuHistoryRepository->findWithoutFail($id);
        $title = "Riwayat Material - Lihat";

        if (empty($bahanBakuHistory)) {
            Flash::error('Material History not found');

            return redirect(route('bahanBakuHistories.index'));
        }

        return view('bahan_baku_histories.show')
              ->with('bahanBakuHistory', $bahanBakuHistory)
              ->with('title', $title);
    }

    /**
     * Show the form for editing the specified BahanBakuHistory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bahanBakuHistory = $this->bahanBakuHistoryRepository->findWithoutFail($id);
        $title = "Riwayat Material - Edit";

        if (empty($bahanBakuHistory)) {
            Flash::error('Material History not found');

            return redirect(route('bahanBakuHistories.index'));
        }

        return view('bahan_baku_histories.edit')
              ->with('bahanBakuHistory', $bahanBakuHistory)
              ->with('title', $title);
    }

    /**
     * Update the specified BahanBakuHistory in storage.
     *
     * @param  int              $id
     * @param UpdateBahanBakuHistoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBahanBakuHistoryRequest $request)
    {
        $bahanBakuHistory = $this->bahanBakuHistoryRepository->findWithoutFail($id);

        if (empty($bahanBakuHistory)) {
            Flash::error('Material History not found');

            return redirect(route('bahanBakuHistories.index'));
        }

        $bahanBakuHistory = $this->bahanBakuHistoryRepository->update($request->all(), $id);

        Flash::success('Material History updated successfully.');

        return redirect(route('bahanBakuHistories.index'));
    }

    /**
     * Remove the specified BahanBakuHistory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bahanBakuHistory = $this->bahanBakuHistoryRepository->findWithoutFail($id);

        if (empty($bahanBakuHistory)) {
            Flash::error('Material History not found');

            return redirect(route('bahanBakuHistories.index'));
        }

        $this->bahanBakuHistoryRepository->delete($id);

        Flash::success('Material History deleted successfully.');

        return redirect(route('bahanBakuHistories.index'));
    }
}
