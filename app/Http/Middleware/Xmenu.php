<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Theme;
use App\Models\Category;
use Illuminate\Http\Request;

class Xmenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $menu_categories = session()->get('menu');
        

        if($request->session()->missing('currency')){

            $request->session()->put('currency', 'euro') ;

        }

        $theme = session()->get('theme');


        if($request->session()->missing('theme')){

            $theme = Theme::where('name', 'light')->first();
            session()->put('theme', $theme);

        }
        
        if(!$menu_categories){
            
            $categories= Category::with('subcategories')->get();

            //for navbar 
            session()->put('menu',$categories);

        }

        return $next($request);
    }
}
