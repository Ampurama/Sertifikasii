<?php

namespace App\Http\Controllers;

use App\Models\Regions;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Province;
use PDF;




class MahasiswaController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'namaLengkap' => 'required|string|max:255',
            'alamatktp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required|string|max:255',
            'nomortlp' => 'required|string|max:255',
            'nomorhp' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'kewarganegaraan' => 'required',
            'tanggallahir' => 'required|date',
            'tempatlahir' => 'required|string|max:255',
            'statusMenikah' => 'required|string|max:255',
            'agama' => 'required|string',
        ]);


        $mahasiswa = new Mahasiswa([
            'namaLengkap' => $request->input('namaLengkap'),
            'alamatktp' => $request->input('alamatktp'),
            'alamat' => $request->input('alamat'),
            'provinsi' => $request->input('provinsi'),
            'kabupaten' => $request->input('kabupaten'),
            'kecamatan' => $request->input('kecamatan'),
            'nomortlp' => $request->input('nomortlp'),
            'nomorhp' => $request->input('nomorhp'),
            'email' => $request->input('email'),
            'kewarganegaraan' => $request->input('kewarganegaraan'),
            'tanggallahir' => $request->input('tanggallahir'),
            'tempatlahir' => $request->input('tempatlahir'),
            'statusMenikah' => $request->input('statusMenikah'),
            'agama' => $request->input('agama'),
            'user_id' => $request->input('user_id'),
        ]);
        if ($request->input('kewarganegaraan') === 'WNA') {

            $mahasiswa['asalWNA'] = $request->input('asalWNA');
        }
        $mahasiswa->save();
        
        $pdf = PDF::loadView('pages.template', ['data' => $mahasiswa]);

        
        $pdfFileName = 'mahasiswa_' . time() . '.pdf';

        
        return $pdf->download($pdfFileName);
        


        
    }
    public function getKabupaten($provinsiId)
    {
        $kabupaten = Regions::where('province_id', $provinsiId)->get();
        return response()->json($kabupaten);
    }
    public function create()
    {
        $provinces = Province::all();
        return view('pages.form-mahasiswa', compact('provinces'));
    }
    public function index()
    {

        $mahasiswa = Mahasiswa::all();


        return view('pages.admin.data-mahasiswa', compact('mahasiswa'));


    }
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $provinces = Province::all();
        return view('pages.admin.edit-mahasiswa', compact('mahasiswa'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'namaLengkap' => 'required',
            'alamatktp' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'nomortlp' => 'required',
            'nomorhp' => 'required',
            'email' => 'required|email',
            'kewarganegaraan' => 'required',
            'asalWNA' => 'nullable', 
            'tanggallahir' => 'required|date',
            'tempatlahir' => 'required',
            'statusMenikah' => 'required',
            'agama' => 'required',
        ]);

        Mahasiswa::whereId($id)->update($validatedData);
        return redirect('data-mahasiswa')->with('success', 'Data mahasiswa berhasil diupdate.');
    }


    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect('data-mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
