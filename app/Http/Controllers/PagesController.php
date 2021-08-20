<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;
use App\Models\Speaker;

class PagesController extends Controller
{
    //function to return home page
    public function index(){
        $speakers = Speaker::orderBy('display_order', 'ASC')->get();
        return view('dashboard')->with(compact('speakers', $speakers));
    }

    //function to return page
    public function page($slug){
        $page = Page::where('slug', '=', $slug)->firstOrFail();
        return view('page')->with(compact('page', $page));
    }
}
