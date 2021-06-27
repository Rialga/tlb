<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Repositories\ProdukRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\BahanBaku;
use App\Models\KomposisiMutu;

class ProdukController extends AppBaseController
{
    /** @var  ProdukRepository */
    private $produkRepository;

    public function __construct(ProdukRepository $produkRepo)
    {
        $this->produkRepository = $produkRepo;
        $this->bahan_bakus = BahanBaku::orderBy('created_at', 'asc')->get();
        $this->middleware('role:admin,manager_produksi,marketing');
    }

    /**
     * Display a listing of the Produk.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->produkRepository->pushCriteria(new RequestCriteria($request));
        $produks = $this->produkRepository->all();
        $title = "Produk";

        return view('produks.index')
              ->with('produks', $produks)
              ->with('title', $title);
    }

    /**
     * Show the form for creating a new Produk.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Produk - Tambah";
        return view('produks.create')
              ->with('bahan_bakus', $this->bahan_bakus)
              ->with('title', $title);
    }

    /**
     * Store a newly created Produk in storage.
     *
     * @param CreateProdukRequest $request
     *
     * @return Response
     */
    public function store(CreateProdukRequest $request)
    {
        $input = $request->all();
        $bahan_baku_field = [];
        foreach ($this->bahan_bakus as $key => $bahan_baku) {
            $field = $bahan_baku->kode;
            $bahan_baku_field[$field] = $input[$field];
            unset($input[$field]);
        }
        $produk = $this->produkRepository->create($input);

        foreach ($bahan_baku_field as $key => $bbf) {
            $bahan_baku_id = BahanBaku::where('kode', $key)->first()->id;
            KomposisiMutu::create([
            'bahan_baku_id' => $bahan_baku_id,
            'produk_id'     => $produk->id,
            'volume'        => $bbf
          ]);
        }
        Flash::success('Produk saved successfully.');

        return redirect(route('produks.index'));
    }

    /**
     * Display the specified Produk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);
        $title = "Produk - Lihat";

        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produks.index'));
        }

        return view('produks.show')->with('produk', $produk)->with('title', $title);
    }

    /**
     * Show the form for editing the specified Produk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);
        $title = "Produk - Edit";

        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produks.index'));
        }

        return view('produks.edit')
              ->with('produk', $produk)
              ->with('bahan_bakus', $this->bahan_bakus)
              ->with('title', $title);
    }

    /**
     * Update the specified Produk in storage.
     *
     * @param  int              $id
     * @param UpdateProdukRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProdukRequest $request)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produks.index'));
        }
        $input = $request->all();
        $bahan_baku_field = [];
        foreach ($this->bahan_bakus as $key => $bahan_baku) {
            $field = $bahan_baku->kode;
            $bahan_baku_field[$field] = $input[$field];
            unset($input[$field]);
        }
        $produk = $this->produkRepository->update($input, $id);
        foreach ($bahan_baku_field as $key => $bbf) {
            $bahan_baku_id = BahanBaku::where('kode', $key)
                          ->first()->id;
            $komposisi = KomposisiMutu::where([
            'produk_id' => $id,
            'bahan_baku_id' => $bahan_baku_id
          ])->first() ?:
          new KomposisiMutu([
            'produk_id' => $id,
            'bahan_baku_id' => $bahan_baku_id
          ]);
            $komposisi->volume = $bbf;
            $komposisi->save();
        }
        Flash::success('Produk updated successfully.');

        return redirect(route('produks.index'));
    }

    /**
     * Remove the specified Produk from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produks.index'));
        }

        $this->produkRepository->delete($id);

        Flash::success('Produk deleted successfully.');

        return redirect(route('produks.index'));
    }
}
