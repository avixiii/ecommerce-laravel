<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $check = false;
            try {
                // $path = $request->file('file')->store('uploads');

                $name = $request->file('file')->getClientOriginalName();
                $path = $request->file('file')->storeAs(
                    'public/uploads/' . date('Y/m/d'), time() . $name
                );

                $url = '/storage/uploads/' . date('Y/m/d') . '/' . time() . $name;
                $flg = true;
            } catch (\Exception $err) {
                $flg = false;
            }

            if ($flg !== false) {
                return response()->json([
                    'error' => false,
                    'url' => $url
                ]);
            }

            return response()->json(['error' => true]);
        }
    }
}
