<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Services\GoogleCalendar;

class AcmeController extends Controller {
	public function test(GoogleCalendar $calendar) {
		
		
		$calendarId = "sccitv1blrvnoa00pacsr229cg@group.calendar.google.com";
		$result = $calendar->get($calendarId);
		dd($result);
	}
}
