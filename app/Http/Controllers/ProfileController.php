<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\AkunModel;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreProfileRequest;

class ProfileController extends Controller
{
    public function index(){
        return Inertia::render('Profile/Index', [
            'profile' => Auth::user()
        ]);
    }

    //API METHOD
    public function getUsername(){
        $data = [
            'status' => true,
            'data' => AkunModel::select('username')->where('id', Auth::id())->first(),
            'message' => 'data di temukan'
        ];

        return response()->json($data, Response::HTTP_OK);
    }

    public function getPassword(){
        //DB::table('users')->find(3);
        $data = [
            'status' => true,
            'data' => DB::table('users')->select('password')->find(Auth::id()),
            'message' => 'data di temukan'
        ];

        return response()->json($data, Response::HTTP_OK);
    }

    public function updateUsername(Request $request){

        $validated = $request->validate([
            'username' => 'required|string',
            'newUsername' => 'required|string'
        ],
        [
            'username.required' => 'username wajib di isi',
            'username.string' => 'data wajib berbentuk string',
            'newUsername.required' => 'username baru wajib di isi',
            'newUsername.string' => 'data wajib berbentuk string'
        ]);

        $akunModel = AkunModel::find(Auth::id());
 
        $akunModel->username = $validated['newUsername'];
        
        $akunModel->save();

        return response()->json([
            'success' => true,
            'message' => 'username berhasil di ubah',
            'data' => $akunModel
        ], 200);
    }

    public function updatePassword(Request $request){
        $validated = $request->validate([
            'newPass' => 'required|string',
            'konfPass' => 'required|string',
            'oldPass' => 'required|string'
        ],
        [
            'newPass.required' => 'password baru wajib di isi',
            'newPass.string' => 'data wajib berbentuk string',
            'konfPass.required' => 'konfirmasi password wajib di isi',
            'konfPass.string' => 'data wajib berbentuk string',
            'oldPass.required' => 'error',
            'oldPass.string' => 'error'
        ]);

        if (Hash::check($validated['konfPass'], $validated['oldPass'])) {
            $validated['newPass'] = Hash::make($validated['newPass']);

            DB::table('users')->where('id', Auth::id())->update(['password' => $validated['newPass']]);

            $response = [
                'status' => true,
                'message' => 'berhasil update password akun'
            ];

            return response()->json($response, Response::HTTP_OK);
        }

        $response = [
            'status' => false,
            'message' => 'gagal update password akun',
            'code' => 400
        ];

        return response()->json($response, 400);
    }
}
