<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    // Method untuk menampilkan halaman beranda
    public function index()
    {
        return view('beranda');
    }

    // Method untuk menampilkan daftar semua member
    public function list()
    {
        $members = Member::all();
        return view('daftar_member', compact('members'));
    }

    // Method untuk menampilkan halaman tambah member
    public function toAdd()
    {
        return view('form_add');
    }

    // Method untuk menampilkan halaman edit member berdasarkan ID
    public function toEdit($id)
    {
        $members = Member::find($id);
        return view('edit_member', compact('members'));
    }

    // Method untuk menyimpan data member baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input termasuk validasi untuk file gambar
        $request->validate([
            'nama' => 'required|string',
            'telp' => ['required', 'string', 'regex:/^0[0-9]*$/'],
            'tglmulai' => 'required|date', // validasi untuk tanggal
            'tglakhir' => 'required|date', // Validasi untuk tanggal
            'fotokartu' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Maksimum 2MB
        ]);

        // Simpan file gambar ke dalam direktori penyimpanan
        if ($request->hasFile('fotokartu')) {
            $gambar = $request->file('fotokartu');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads'), $nama_gambar);
        }

        // Simpan data ke dalam database menggunakan model Member
        Member::create([
            'nama' => $request->input('nama'),
            'telp' => $request->input('telp'),
            'tglmulai' => $request->input('tglmulai'),
            'tglakhir' => $request->input('tglakhir'),
            'fotokartu' => $nama_gambar ?? null,
        ]);

        // Redirect ke halaman daftar member setelah berhasil menyimpan data
        return redirect()->route('member.list')->with('success', 'Member berhasil ditambahkan!');
    }

    // Method untuk mengupdate data member berdasarkan ID
    public function update(Request $request, $id)
    {
        $members = Member::find($id);
        
        // Periksa apakah member ditemukan
        if (!$members) {
            return redirect()->route('members.list')->with('error', 'Member not found');
        }

        $members->nama = $request->input('nama');
        $members->telp = $request->input('telp');
        $members->tglmulai = $request->input('tglmulai');
        $members->tglakhir = $request->input('tglakhir');
        
        if($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($members->fotokartu) {
                // Pastikan untuk menghapus foto yang lama dari direktori sebelumnya
                $oldFilePath = public_path('uploads').'/'.$members->photo;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            
            // Simpan foto baru
            $file = $request->file('fotokartu');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $members->fotokartu = $filename;
        }

        $members->save();
        return redirect()->route('member.list')->with('success', 'Member updated successfully');
    }

    // Method untuk menghapus member berdasarkan ID
    public function hapus($id)
    {
        Member::destroy($id);

        // Set ulang auto-increment ID setelah menghapus data
        DB::statement('ALTER TABLE member AUTO_INCREMENT = 1');

        return redirect()->route('member.list')->with('success', 'Member berhasil dihapus!');
    }
}
