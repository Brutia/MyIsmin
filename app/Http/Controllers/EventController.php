<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Evenement;
use Auth;
use App\Lieu;

class EventController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$events = Evenement::where ( 'start', '>', (new \DateTime ()) )->get ();
		// dd($events[0]->);
		return view ( 'evenements.index', [ 
				'events' => $events 
		] );
	}
	public function getall() {
		$events = Evenement::with ( 'lieu' )->where ( 'start', '>', (new \DateTime ()) )->get ();
		return $events->toJson ();
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$lieus = Lieu::all ();
		return view ( 'evenements.add', [ 
				'lieus' => $lieus,
				"errors" => [ ] 
		] );
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$errors = [ ];
		$lieus = Lieu::all ();
		$user = Auth::user ();
		$event = new Evenement ();
		$event->title = $request->input ( 'title' );
		$event->start = \DateTime::createFromFormat ( 'd/m/Y H:i', $request->input ( 'start' ) );
		$event->end = \DateTime::createFromFormat ( 'd/m/Y H:i', $request->input ( 'end' ) );
		$event->description = $request->input ( 'description' );

		$lieu = Lieu::find ( $request->input ( 'lieu' ) );
		if ($event->start > $event->end) {
			$errors [] = "La date de début doit être avant la date de fin";
		}
		if(Evenement::where ( 'start', '<', $event->start )
				->where('end', '>', $event->start)
				->where('lieu_id','=',$lieu->id)
				->get () != null) {
			$errors[] = "Un évènement est déjà prévu à la ".$lieu->name." sur ce créneau";										
		}
		// Todo : renvoyer vers l'autre methode du controlleur
		if (count ( $errors )) {
			return view ( 'evenements.create', [ 
					"id" => $event->id,
					"title" => $event->title,
					"lieus"=>$lieus,
					"lieu_s" => $event->lieu,
					"start" => "",
					"end" => "",
					"desc" => $event->description,
					"errors" => $errors 
			] );
		}
		
		$event->lieu ()->associate ( $lieu );
		$user->events ()->save ( $event );
		return redirect ()->action ( 'EventController@index' );
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$event = Evenement::find ( $id );
		$lieus = Lieu::all ();
		// dd($event->start);
		return view ( 'evenements.edit', [ 
				"id" => $event->id,
				"title" => $event->title,
				"lieus" => $lieus,
				"lieu_s" => $event->lieu->id,
				"start" => (new \DateTime ( $event->start ))->format ( "d/m/Y H:i" ),
				"end" => (new \DateTime ( $event->end ))->format ( "d/m/Y H:i" ),
				"desc" => $event->description 
		] );
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		
		$errors = [];
		$event = Evenement::find ( $id );
		$event->title = $request->input ( 'title' );
		$event->start = \DateTime::createFromFormat ( 'd/m/Y H:i', $request->input ( 'start' ) );
		$event->end = \DateTime::createFromFormat ( 'd/m/Y H:i', $request->input ( 'end' ) );
		$event->description = $request->input ( 'description' );
		$lieu = Lieu::find ( $request->input ( 'lieu' ) );
		if ($event->start > $event->end) {
			$errors [] = "La date de début doit être avant la date de fin";
		}
		if(Evenement::where ( 'start', '<', $event->start )
				->where('end', '>', $event->start)
				->where('lieu_id','=',$lieu->id)
				->get () != null) {
					$errors[] = "Un évènement est déjà prévu à la ".$lieu->name." sur ce créneau";
		}
		
		if (count ( $errors )) {
			return view ( 'evenements.edit', [ 
					"id" => $event->id,
					"title" => $event->title,
					"lieu" => $event->lieu,
					"start" => "",
					"end" => "",
					"desc" => $event->description,
					"errors" => $errors 
			] );
		}

		$event->lieu ()->associate ( $lieu );
		$event->save ();
		return redirect ( '/admin/event' );
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$event = Evenement::find ( $id );
		$event->delete ();
		return redirect ( '/admin/event' );
	}
}
