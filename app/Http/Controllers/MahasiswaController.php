<?php

namespace App\Http\Controllers;

use App\Models\Regions;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Province;
use Barryvdh\DomPDF\Facade as PDF;



class MahasiswaController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
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

        // Buat objek Mahasiswa dan isi dengan data dari request
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
            // Jika ya, tambahkan data asal WNA
            $mahasiswa['asalWNA'] = $request->input('asalWNA');
        }

        // Simpan data ke database
        $mahasiswa->save();

        // Redirect ke halaman yang sesuai setelah penyimpanan data
        return back()->with('success', 'Data mahasiswa berhasil disimpan.');
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


        return view('pages.data-mahasiswa', compact('mahasiswa'));


    }
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $provinces = Province::all();
        return view('pages.edit-mahasiswa', compact('mahasiswa'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nim' => 'required|max:20',
            'nama' => 'required',
            'fakultas' => 'required',
            'prodi' => 'required',
            'email' => 'required|email',
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
