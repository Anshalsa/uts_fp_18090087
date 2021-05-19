<?php

namespace App\Http\Controllers;

use App\Models\Datahp;
use Illuminate\Http\Request;

class DatahpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datahps = Datahp::latest()->paginate(5);
    
        return view('datahps.index',compact('datahps'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datahps.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'merk_hp' => 'required',
            'tipe_hp' => 'required',
            'thn_produksi' => 'required',
        ]);
    
        Datahp::create($request->all());
     
        return redirect()->route('datahps.index')
                        ->with('Sukses','Data berhasil di simpan');
    }
     

    public function show(Datahp $datahp)
    {
        return view('datahps.show',compact('datahp'));
    } 
     

    public function edit(Datahp $datahp)
    {
        return view('datahps.edit',compact('datahp'));
    }
    

    public function update(Request $request, Datahp $datahp)
    {
        $request->validate([
            'merk_hp' => 'required',
            'tipe_hp' => 'required',
            'thn_produksi' => 'required',
        ]);
    
        $datahp->update($request->all());
    
        return redirect()->route('datahps.index')
                        ->with('Sukses','Data berhasil di ubah');
    }
    

    public function destroy(Datahp $datahp)
    {
        $datahp->delete();
    
        return redirect()->route('datahps.index')
                        ->with('Sukses','Data berhasil di hapus');
    }
}
