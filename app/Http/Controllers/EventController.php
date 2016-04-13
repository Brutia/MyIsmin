<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Evenement;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$events = Evenement::where('start','>',(new \DateTime()))->get();
//     	dd($events[0]->);
    	return view('evenements.index', ['events'=>$events]);
    }
    
    public function getall(){
    	$events = Evenement::all();
    	return $events->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evenements.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$user = Auth::user();
    	$event = new Evenement();
    	$event->title= $request->input('title');
    	$event->start = \DateTime::createFromFormat('d/m/Y H:i',$request->input('start'));
    	$event->end = \DateTime::createFromFormat('d/m/Y H:i',$request->input('end'));
    	$event->description = $request->input('description');
    	$event->lieu = $request->input('lieu');
    			
    	$user->events()->save($event);
    	return redirect()->action('ArticleController@show',['m-gate']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$event = Evenement::find($id);
//     	dd($event->start);
    	return view('evenements.edit',["id"=>$event->id,
    			"title"=>$event->title,
    			"lieu"=>$event->lieu,
    			"start"=>(new \DateTime($event->start))->format("d/m/Y H:i"),
    			"end"=>(new \DateTime($event->end))->format("d/m/Y H:i"),
    			"desc"=>$event->description,
    	]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$event = Evenement::find($id);
    	$event->title= $request->input('title');
    	$event->start = \DateTime::createFromFormat('d/m/Y H:i',$request->input('start'));
    	$event->end = \DateTime::createFromFormat('d/m/Y H:i',$request->input('end'));
    	$event->description = $request->input('description');
    	$event->lieu = $request->input('lieu');
    	$event->save();
    	return redirect('/event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Evenement::find($id);
        $event->delete();
        return redirect('/event');
    }
}
