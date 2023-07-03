<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helper\BiznetHelper;
use App\Http\Requests\StoreFaceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FaceController extends Controller
{
    public function create()
    {
        $response = BiznetHelper::listFaces();
        $FACED = true;
        $UNFACED = false;
        // Log::info($response);

        // dd($response);

        if ($response['risetai']['status'] != 200 || count($response['risetai']['faces']) < 1) {
            return view('pages.face.create', ['faced' => [$UNFACED]])->with('fail', 'Gagal mengecek data');
        }

        $faces = collect($response['risetai']['faces']);
        if (!$faces->contains('user_id', Auth::user()->username)) {
            return view('pages.face.create', ['faced' => [$UNFACED]]);
        }

        // dd($faces->contains('user_id', Auth::user()->username));
        return view('pages.face.create', ['faced' => [$FACED]]);
    }

    public function store(StoreFaceRequest $request)
    {
        // dd($request);
        $user_id = Auth::user()->username;
        $user_name = Auth::user()->name;
        $image = str_replace("data:image/png:base64,", "", $request->image);
        $response = BiznetHelper::enrollFace($image, $user_id, $user_name);
        $error = "-";
        Log::info($response);

        if ($response['risetai']['status'] == 200) {
            return redirect()->back()->with('success', __('Data berhasil ditambahkan'));
        } else {
            return redirect()->back()->with('fail', __('Data gagal ditambahkan'));
        }
    }

    public function destroy()
    {
        $user_id = Auth::user()->username;
        $response = BiznetHelper::deleteFace($user_id);
        $error = "-";
        Log::info($response);

        if ($response['risetai']['status'] == 200) {
            return redirect()->back()->with('success', __('Data berhasil terhapus'));
        } else {
            return redirect()->back()->with('fail', __('Data gagal terhapus'));
        }
    }
}
