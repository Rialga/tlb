<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreatePemesananBahanBakuRequest;
use App\Http\Requests\UpdatePemesananBahanBakuRequest;
use App\Repositories\PemesananBahanBakuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Carbon\Carbon;
use App\Models\BahanBaku;
use App\Models\PemesananBahanBaku;
use PDF;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PemesananBahanBakuExport;

class PemesananBahanBakuController extends AppBaseController
{
    /** @var  PemesananBahanBakuRepository */
    private $pemesananBahanBakuRepository;

    public function __construct(PemesananBahanBakuRepository $pemesananBahanBakuRepo)
    {
        $this->pemesananBahanBakuRepository = $pemesananBahanBakuRepo;
        $this->bahanBakus = BahanBaku::pluck('nama_bahan_baku', 'id');
        $this->middleware('role:admin,manager_produksi,logistik');
    }

    /**
     * Display a listing of the pemesanan_bahan_baku.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pemesananBahanBakuRepository->pushCriteria(new RequestCriteria($request));
        $pemesananBahanBakus = $this->pemesananBahanBakuRepository->orderBy('tanggal_pemesanan', 'desc')->all();
        $title = 'Pemesanan Material';

        return view('pemesanan_bahan_bakus.index')
            ->with('pemesananBahanBakus', $pemesananBahanBakus)
            ->with('title', $title);
    }

    public function filter(Request $request)
    {
        $this->pemesananBahanBakuRepository->pushCriteria(new RequestCriteria($request));
        $suppliers = $this->pemesananBahanBakuRepository->orderBy('tanggal_pemesanan', 'desc')->all();
        $suppliers = $suppliers->filter(function ($supplier) use ($request) {
            $dari = $request['tanggal_kirim_dari'] ? Carbon::parse($request['tanggal_kirim_dari']) : null;
            $sampai = $request['tanggal_kirim_sampai'] ? Carbon::parse($request['tanggal_kirim_sampai']) : null;
            if ($dari) {
                if ($sampai) {
                    return ($supplier->tanggal_pemesanan >= $dari &&
                         $supplier->tanggal_pemesanan < $sampai->addDays(1)) ||
                         ($supplier->tanggal_pemesanan >= $dari &&
                         $supplier->tanggal_pemesanan < $dari->addDays(1));
                }
                return $supplier->tanggal_pemesanan >= $dari &&
                 $supplier->tanggal_pemesanan < $dari->addDays(1);
            }
            return $supplier;
        });
        $suppliers = $suppliers->filter(function ($supplier) use ($request) {
            return $request['bahan_baku'] ?
                   $supplier->bahan_baku_id == $request['bahan_baku'] :
                   $supplier;
        });


        $title = 'Pemesanan Material - Filter';

        return view('pemesanan_bahan_bakus.index')
              ->with('pemesananBahanBakus', $suppliers)
              ->with('title', $title);
    }

    /**
     * Show the form for creating a new pemesanan_bahan_baku.
     *
     * @return Response
     */
    public function create()
    {
        $title = 'Pemesanan Material - Tambah';
        return view('pemesanan_bahan_bakus.create')
                ->with('bahanBakus', $this->bahanBakus)
                ->with('title', $title);
    }

    /**
     * Store a newly created pemesanan_bahan_baku in storage.
     *
     * @param CreatePemesananBahanBakuRequest $request
     *
     * @return Response
     */
    public function store(CreatePemesananBahanBakuRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        $pemesananBahanBaku = $this->pemesananBahanBakuRepository->create($input);

        Flash::success('Pemesanan Material saved successfully.');

        return redirect(route('supplier.index'));
    }

    /**
     * Display the specified pemesanan_bahan_baku.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pemesananBahanBaku = $this->pemesananBahanBakuRepository->findWithoutFail($id);
        $title = 'Pemesanan Material - Lihat';
        if (empty($pemesananBahanBaku)) {
            Flash::error('Pemesanan Material not found');

            return redirect(route('supplier.index'));
        }

        return view('pemesanan_bahan_bakus.show')
          ->with('pemesananBahanBaku', $pemesananBahanBaku)
          ->with('title', $title);
    }

    /**
     * Show the form for editing the specified pemesanan_bahan_baku.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pemesananBahanBaku = $this->pemesananBahanBakuRepository->findWithoutFail($id);

        if (empty($pemesananBahanBaku)) {
            Flash::error('Pemesanan Material not found');

            return redirect(route('supplier.index'));
        }
        $title = 'Pemesanan Material - Lihat';

        return view('pemesanan_bahan_bakus.edit')
                ->with('bahanBakus', $this->bahanBakus)
                ->with('pemesananBahanBaku', $pemesananBahanBaku)
                ->with('title', $title);
    }

    /**
     * Update the specified pemesanan_bahan_baku in storage.
     *
     * @param  int              $id
     * @param UpdatePemesananBahanBakuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePemesananBahanBakuRequest $request)
    {
        $pemesananBahanBaku = $this->pemesananBahanBakuRepository->findWithoutFail($id);
        $request['user_id'] = Auth::user()->id;

        if (empty($pemesananBahanBaku)) {
            Flash::error('Pemesanan Material not found');

            return redirect(route('supplier.index'));
        }

        $pemesananBahanBaku = $this->pemesananBahanBakuRepository->update($request->all(), $id);

        Flash::success('Pemesanan Material updated successfully.');

        return redirect(route('supplier.index'));
    }

    /**
     * Remove the specified pemesanan_bahan_baku from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pemesananBahanBaku = $this->pemesananBahanBakuRepository->findWithoutFail($id);

        if (empty($pemesananBahanBaku)) {
            Flash::error('Pemesanan Material not found');

            return redirect()->back();
        }

        $this->pemesananBahanBakuRepository->delete($id);

        Flash::success('Pemesanan Material deleted successfully.');

        return redirect()->back();
    }

    public function downloadPdf(Request $request)
    {
        $data = json_decode($request['pemesananBahanBakus'], true);
        $suppliers = PemesananBahanBaku::hydrate($data);
        $suppliers = $suppliers->flatten();
        $user =  Auth::user()->name;
        $pdf = PDF::loadView('pemesanan_bahan_bakus.pdf', ['pemesananBahanBakus' => $suppliers,'user'=>$user]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('pemesanan_'.time().'.pdf');
    }

    public function exportExcel(Request $request)
    {
        set_time_limit(0);
        ini_set('memory_limit', '1G');
        $data = json_decode($request['pemesananBahanBakus'], true);
        $pemesananBahanBakus = PemesananBahanBaku::hydrate($data);
        $pemesananBahanBakus = $pemesananBahanBakus->flatten();
        $user = Auth::user()->name;
        $filename = 'Rekapitulasi-Pemesanan-Material-' . time();

        return Excel::download(new PemesananBahanBakuExport($user, $pemesananBahanBakus, $filename ), 'Pengadaan.xlsx');
    }
}
