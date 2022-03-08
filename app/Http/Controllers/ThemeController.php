<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
   public function SelectTheme(Request $request){

    $theme = Theme::where('name', $request->theme)->first();

    session()->put('theme', $theme);

    return redirect()->back();

   }
}
