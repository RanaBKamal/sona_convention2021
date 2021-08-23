<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;
use App\Models\Speaker;
use App\Models\KeynoteSpeaker;
use App\Models\InvitedSpeaker;
use App\Models\EventPartner;
use App\Models\EventFaq;

class PagesController extends Controller
{
    //function to return home page
    public function index(){
        $keynote_speakers = KeynoteSpeaker::orderBy('display_order', 'ASC')->get();
        $invited_speakers = InvitedSpeaker::orderBy('display_order', 'ASC')->get();
        $event_partners = EventPartner::orderBy('display_order', 'ASC')->get();
        $event_faqs = EventFaq::orderBy('display_order', 'ASC')->get();
        return view('dashboard')->with(compact('keynote_speakers', $keynote_speakers))
                                ->with(compact('invited_speakers', $invited_speakers))
                                ->with(compact('event_partners', $event_partners))
                                ->with(compact('event_faqs', $event_faqs));
    }

    //function to return page
    public function page($slug){
        if (strcmp($slug, 'about-us') == 0) {
            $about_us_members = Speaker::orderBy('display_order', 'ASC')->get();    
        }else{
            $about_us_members = [[]];
        }
        
        $page = Page::where('slug', '=', $slug)->firstOrFail();
        return view('page')->with(compact('page', $page))->with(compact('about_us_members', $about_us_members));
    }
}
