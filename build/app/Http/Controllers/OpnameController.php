<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOpnameRequest;
use App\Http\Requests\UpdateOpnameRequest;
use App\Repositories\OpnameRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\BahanBaku;
use App\Models\BahanBakuHistory;
use Flash;
use Carbon\Carbon;
use PDF;
use Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Opname;
use App\Exports\OpnameExport;
use Maatwebsite\Excel\Facades\Excel;
class OpnameController extends AppBaseController
{
    /** @var  OpnameRepository */
    private $opnameRepository;

    public function __construct(OpnameRepository $opnameRepo)
    {
        $this->opnameRepository = $opnameRepo;
        $this->bahanBakus = BahanBaku::pluck('nama_bahan_baku', 'id');
        $this->middleware('role:admin,manager_produksi,logistik');
    }

    /**
     * Display a listing of the Material Keluar.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->opnameRepository->pushCriteria(new RequestCriteria($request));
        $opnames = $this->opnameRepository->orderBy('tanggal_pemakaian', 'desc')->all();
        $title = "Material Keluar";

        return view('opnames.index')
            ->with('opnames', $opnames)
            ->with('title', $title);
    }

    public function filter(Request $request)
    {
        $this->opnameRepository->pushCriteria(new RequestCriteria($request));
        $opnames = $this->opnameRepository->orderBy('tanggal_pemakaian', 'desc')->all();
        $opnames = $opnames->filter(function ($opname) use ($request) {
            $dari = $request['tanggal_kirim_dari'] ? Carbon::parse($request['tanggal_kirim_dari']) : null;
            $sampai = $request['tanggal_kirim_sampai'] ? Carbon::parse($request['tanggal_kirim_sampai']) : null;
            if ($dari) {
                if ($sampai) {
                    return ($opname->tanggal_pemakaian >= $dari &&
                         $opname->tanggal_pemakaian < $sampai->addDays(1)) ||
                         ($opname->tanggal_pemakaian >= $dari &&
                         $opname->tanggal_pemakaian < $dari->addDays(1));
                }
                return $opname->tanggal_pemakaian >= $dari &&
                 $opname->tanggal_pemakaian < $dari->addDays(1);
            }
            return $opname;
        });
        $opnames = $opnames->filter(function ($opname) use ($request) {
            return $request['bahan_baku'] ?
                   $opname->bahan_baku_id == $request['bahan_baku'] :
                   $opname;
        });


        $title = 'Material Keluar - Filter';

        return view('opnames.index')
              ->with('opnames', $opnames)
              ->with('title', $title);
    }

    public function downloadPdf(Request $request)
    {
        $data = json_decode($request['opnames'], true);
        $opnames = Opname::hydrate($data);
        $opnames = $opnames->flatten();
        $user =  Auth::user()->name;
        $pdf = PDF::loadView('opnames.pdf', ['opnames' => $opnames,'user'=>$user]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('pemesanan_'.time().'.pdf');
    }

    public function exportExcel(Request $request)
    {
        set_time_limit(0); ini_set('memory_limit', '1G'); 
        $data = json_decode($request['opnames'], true);
        $opnames = Opname::hydrate($data);
        $opnames = $opnames->flatten();
        $user =  Auth::user()->name;
        $filename = 'Rekapitulasi-Material-Keluar-'.time();

        return Excel::download(new OpnameExport ($opnames, $user), 'Opename.xlsx');

//        return Excel::create($filename, function($excel) use($opnames, $user, $filename) {
//            $excel->sheet('Rekapitulasi Material Keluar', function($sheet) use ($opnames, $user) {
//                $sheet->loadView('opnames.xls',compact('opnames','user'));
//                $sheet->mergeCells('A1:E1');
//            }, [
//                'Content-Type' => 'application/vnd.ms-excel',
//                'Content-Disposition' => "attachment; filename='".$filename.".xls'"
//            ]);
//        })->download();
    }

    /**
     * Show the form for creating a new Material Keluar.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Material Keluar - Tambah";
        return view('opnames.create')
              ->with('bahanBakus', $this->bahanBakus)
              ->with('title', $title);
    }

    /**
     * Store a newly created Material Keluar in storage.
     *
     * @param CreateOpnameRequest $request
     *
     * @return Response
     */
    public function store(CreateOpnameRequest $request)
    {
        $input = $request->all();
        $bahan_baku = BahanBaku::find($input['bahan_baku_id']);

        if ($bahan_baku->sisa-$input['volume_opname'] < 0) {
            Flash::error('Stock Material Tidak Mencukupi');
            return redirect()->back()->withInput($input);
        }

        $opname = $this->opnameRepository->create($input);
        $bahan_baku->sisa -= $opname->volume_opname;

        $bahan_baku->save();

        $history = new BahanBakuHistory();
        $history->bahan_baku_id = $opname->bahan_baku_id;
        $history->type = 1;
        $history->waktu = $opname->tanggal_pemakaian;
        $history->opname_id = $opname->id;
        $history->volume = $opname->volume_opname;
        $history->total_sisa = $bahan_baku->sisa;
        $history->save();

        Flash::success('Material Keluar saved successfully.');

        return redirect(route('opnames.index'));
    }

    /**
     * Display the specified Material Keluar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $opname = $this->opnameRepository->findWithoutFail($id);
        $title = "Material Keluar - Lihat";

        if (empty($opname)) {
            Flash::error('Material Keluar not found');

            return redirect(route('opnames.index'));
        }

        return view('opnames.show')->with('opname', $opname)->with('title', $title);
    }

    /**
     * Show the form for editing the specified Material Keluar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $opname = $this->opnameRepository->findWithoutFail($id);
        $title = "Material Keluar - Edit";

        if (empty($opname)) {
            Flash::error('Material Keluar not found');

            return redirect(route('opnames.index'));
        }

        return view('opnames.edit')
              ->with('opname', $opname)
              ->with('bahanBakus', $this->bahanBakus)
              ->with('title', $title);
    }

    /**
     * Update the specified Material Keluar in storage.
     *
     * @param  int              $id
     * @param UpdateOpnameRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOpnameRequest $request)
    {
        $opname = $this->opnameRepository->findWithoutFail($id);
        $bahan_baku = BahanBaku::find($opname->bahan_baku_id);
        $input = $request->all();
        $old_volume = $opname->volume_opname;


        if (empty($opname)) {
            Flash::error('Material Keluar not found');

            return redirect(route('opnames.index'));
        }

        $bahan_baku->sisa -= $input['volume_opname'] - $old_volume;

        if ($bahan_baku->sisa < 0) {
            Flash::error('Material Tidak Mencukupi');
            return redirect()->back()->withInput($input);
        }

        $bahan_baku->update();

        $opname = $this->opnameRepository->update($input, $id);

        $history = $bahan_baku->bahan_baku_histories->where('opname_id', $opname->id)->first();
        $history->bahan_baku_id = $opname->bahan_baku_id;
        $history->type = 1;
        $history->waktu = $opname->tanggal_pemakaian;
        $history->opname_id = $opname->id;
        $history->volume = $opname->volume_opname;
        $history->total_sisa = $bahan_baku->sisa;
        $history->update();


        Flash::success('Material Keluar updated successfully.');

        return redirect(route('opnames.index'));
    }

    /**
     * Remove the specified Material Keluar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $opname = $this->opnameRepository->findWithoutFail($id);
        $bahan_baku = BahanBaku::find($opname->bahan_baku_id);
        $old_volume = $opname->volume_opname;

        $bahan_baku->sisa +=  $old_volume;
        $bahan_baku->update();

        if (empty($opname)) {
            Flash::error('Material Keluar not found');

            return redirect(route('opnames.index'));
        }

        $this->opnameRepository->delete($id);

        Flash::success('Material Keluar deleted successfully.');

        return redirect(route('opnames.index'));
    }
}
