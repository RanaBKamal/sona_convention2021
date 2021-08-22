<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;
use App\Models\Speaker;
use App\Models\EventPartner;
use App\Models\EventFaq;

class PagesController extends Controller
{
    //function to return home page
    public function index(){
        $speakers = Speaker::orderBy('display_order', 'ASC')->get();
        $event_partners = EventPartner::orderBy('display_order', 'ASC')->get();
        $event_faqs = EventFaq::orderBy('display_order', 'ASC')->get();
        return view('dashboard')->with(compact('speakers', $speakers))
                                ->with(compact('event_partners', $event_partners))
                                ->with(compact('event_faqs', $event_faqs));
    }

    //function to return page
    public function page($slug){
        $page = Page::where('slug', '=', $slug)->firstOrFail();
        return view('page')->with(compact('page', $page));
    }
}
