<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CVController extends Controller
{
    public function index()
    {
        $data = [
            'nama' => 'AHLAN RAMADHANI',
            'study' => 'STMIK IKMI CIREBON',
            'prodi' => 'Manajemen Informatika (MI)',
            'angkatan' => '2024',
            'phone' => '081909898007',
            'email' => 'ahlanr91@gmail.com',
            'alamat' => 'Jl Teling Dusun 01 RT 01 Rw 01 Desa Jagapura Kidul Kec Gegesik Kab Cirebon',
            'bisnis' => 'Owner Kurniyah Jaya (Distributor Minuman Kemasan)',
            'profilePhoto' => $this->getProfilePhoto(),
            
            // Data Pendidikan
            'pendidikan' => [
                [
                    'tingkat' => 'Perguruan Tinggi',
                    'institusi' => 'STMIK IKMI CIREBON',
                    'jurusan' => 'Manajemen Informatika (MI)',
                    'tahun' => '2024 - Sekarang',
                    'status' => 'Aktif'
                ]
            ],
            
            // Data Keahlian
            'keahlian' => [
                'Bisnis & Manajemen' => [
                    'Manajemen Distribusi',
                    'Manajemen Bisnis',
                    'Kewirausahaan'
                ],
                'Teknologi Informasi' => [
                    'Manajemen Informatika',
                    'Sistem Informasi',
                    'Database Management'
                ],
                'Soft Skills' => [
                    'Leadership',
                    'Problem Solving',
                    'Communication'
                ]
            ]
        ];
        
        return view('cv.index', $data);
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            $oldPhoto = $this->getProfilePhotoPath();
            if ($oldPhoto && Storage::disk('public')->exists($oldPhoto)) {
                Storage::disk('public')->delete($oldPhoto);
            }

            // Store new photo
            $path = $request->file('profile_photo')->store('profile', 'public');
            
            // Save path to session or you could use database
            session(['profile_photo' => $path]);

            return response()->json([
                'success' => true,
                'message' => 'Foto profil berhasil diupload!',
                'photo_url' => Storage::url($path)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal mengupload foto'
        ], 400);
    }

    public function deletePhoto()
    {
        $photoPath = $this->getProfilePhotoPath();
        
        if ($photoPath && Storage::disk('public')->exists($photoPath)) {
            Storage::disk('public')->delete($photoPath);
            session()->forget('profile_photo');

            return response()->json([
                'success' => true,
                'message' => 'Foto profil berhasil dihapus!'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Tidak ada foto untuk dihapus'
        ], 400);
    }

    private function getProfilePhoto()
    {
        $path = $this->getProfilePhotoPath();
        return $path ? Storage::url($path) : null;
    }

    private function getProfilePhotoPath()
    {
        return session('profile_photo');
    }
}
