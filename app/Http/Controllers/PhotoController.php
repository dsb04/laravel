<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function photo(Request $request)
    {
        $requst->photo->storeAs('public', 'file.png');
        return 'Vish!';
    }
}
