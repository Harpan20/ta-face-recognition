<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helper\BiznetHelper;
use App\Http\Requests\StoreFaceRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $user = User::find(Auth::user()->id);
        $user_id = Auth::user()->username;
        $user_name = Auth::user()->name;
        $image = str_replace("data:image/png;base64,", "", $request->image);

        // handle save image
        $imageName = Str::random(20) . '.png';
        $newImage = str_replace(' ', '+', $image);
        $path = Storage::disk('public')->put('faces/' . $imageName, base64_decode($newImage));

        $response = BiznetHelper::enrollFace($image, $user_id, $user_name);
        $error = "-";
        Log::info($response);

        if ($response['risetai']['status'] == 200) {
            $user->update(['face_image' => $imageName]);
            return redirect()->back()->with('success', __('Data berhasil ditambahkan'));
        } else {
            return redirect()->back()->with('fail', __('Data gagal ditambahkan'));
        }
    }

    public function destroy()
    {
        $user = User::find(Auth::user()->id);
        $user_id = Auth::user()->username;
        $response = BiznetHelper::deleteFace($user_id);
        $error = "-";
        Log::info($response);

        if ($response['risetai']['status'] == 200) {
            if ($user->face_image) {
                Storage::disk('public')->delete('faces/' . $user->face_image);
            }
            return redirect()->back()->with('success', __('Data berhasil terhapus'));
        } else {
            return redirect()->back()->with('fail', __('Data gagal terhapus'));
        }
    }

    public function downloadFaceImage(User $user)
    {
        $current_user = Auth::user();

        if (!$user) {
            return abort(404);
        }

        if (!$user->face_image) {
            return abort(404);
        }

        if ($user->id !== $current_user->id) {
            return abort(401);
        }

        return Storage::download('public/faces/' . $user->face_image);
    }
}
