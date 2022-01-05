<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postData = $request->all();
        $fromDate = $postData['formData'] && $postData['formData']['range'] && $postData['formData']['range'][0] ? $postData['formData']['range'][0] : '';
        $toDate = $postData['formData'] && $postData['formData']['range'] && $postData['formData']['range'][1] ? $postData['formData']['range'][1] : '';
        $title = $postData['formData'] && $postData['formData']['title'] ? $postData['formData']['title'] : '';

        $mondays = [];
        $tuesdays = [];
        $wednesdays = [];
        $thursdays = [];
        $fridays = [];
        $saturdays = [];
        $sundays = [];

        if ($postData['formData']) {
            if (isset($postData['formData']['mon']) && $postData['formData']['mon']) {
                $startDate = Carbon::parse($fromDate)->modify('this monday');
                $endDate = Carbon::parse($toDate);
        
                for ($date = $startDate; $date->lte($endDate); $date->addWeek()) {
                    $mondays[] = $date->format('Y-m-d');
                }

                if (count($mondays) > 0) {
                    foreach ($mondays as $monday) {
                        $model = new Event;
                        $model->title = $title;
                        $model->date = $monday;
                        $model->save();
                    }
                } else {
                    return response()->json(['success' => false, 'message' => 'No Monday between date range selected.']);
                }
            } else if (isset($postData['formData']['tue']) && $postData['formData']['tue']) {
                $startDate = Carbon::parse($fromDate)->modify('this tuesday');
                $endDate = Carbon::parse($toDate);
        
                for ($date = $startDate; $date->lte($endDate); $date->addWeek()) {
                    $tuesdays[] = $date->format('Y-m-d');
                }

                if (count($tuesdays) > 0) {
                    foreach ($tuesdays as $tuesday) {
                        $model = new Event;
                        $model->title = $title;
                        $model->date = $tuesday;
                        $model->save();
                    }
                } else {
                    return response()->json(['success' => false, 'message' => 'No Tuesday between date range selected.']);
                }
            } else if (isset($postData['formData']['wed']) && $postData['formData']['wed']) {
                $startDate = Carbon::parse($fromDate)->modify('this wednesday');
                $endDate = Carbon::parse($toDate);
        
                for ($date = $startDate; $date->lte($endDate); $date->addWeek()) {
                    $wednesdays[] = $date->format('Y-m-d');
                }

                if (count($wednesdays) > 0) {
                    foreach ($wednesdays as $wednesday) {
                        $model = new Event;
                        $model->title = $title;
                        $model->date = $wednesday;
                        $model->save();
                    }
                } else {
                    return response()->json(['success' => false, 'message' => 'No Wednesday between date range selected.']);
                }
            } else if (isset($postData['formData']['thu']) && $postData['formData']['thu']) {
                $startDate = Carbon::parse($fromDate)->modify('this thursday');
                $endDate = Carbon::parse($toDate);
        
                for ($date = $startDate; $date->lte($endDate); $date->addWeek()) {
                    $thursdays[] = $date->format('Y-m-d');
                }

                if (count($thursdays) > 0) {
                    foreach ($thursdays as $thursday) {
                        $model = new Event;
                        $model->title = $title;
                        $model->date = $thursday;
                        $model->save();
                    }
                } else {
                    return response()->json(['success' => false, 'message' => 'No Thursday between date range selected.']);
                }
            } else if (isset($postData['formData']['fri']) && $postData['formData']['fri']) {
                $startDate = Carbon::parse($fromDate)->modify('this friday');
                $endDate = Carbon::parse($toDate);
        
                for ($date = $startDate; $date->lte($endDate); $date->addWeek()) {
                    $fridays[] = $date->format('Y-m-d');
                }

                if (count($fridays) > 0) {
                    foreach ($fridays as $friday) {
                        $model = new Event;
                        $model->title = $title;
                        $model->date = $friday;
                        $model->save();
                    }
                } else {
                    return response()->json(['success' => false, 'message' => 'No Friday between date range selected.']);
                }
            } else if (isset($postData['formData']['sat']) && $postData['formData']['sat']) {
                $startDate = Carbon::parse($fromDate)->modify('this saturday');
                $endDate = Carbon::parse($toDate);
        
                for ($date = $startDate; $date->lte($endDate); $date->addWeek()) {
                    $saturdays[] = $date->format('Y-m-d');
                }

                if (count($saturdays) > 0) {
                    foreach ($saturdays as $saturday) {
                        $model = new Event;
                        $model->title = $title;
                        $model->date = $saturday;
                        $model->save();
                    }
                } else {
                    return response()->json(['success' => false, 'message' => 'No Saturday between date range selected.']);
                }
            } else if (isset($postData['formData']['sun']) && $postData['formData']['sun']) {
                $startDate = Carbon::parse($fromDate)->modify('this sunday');
                $endDate = Carbon::parse($toDate);
        
                for ($date = $startDate; $date->lte($endDate); $date->addWeek()) {
                    $sundays[] = $date->format('Y-m-d');
                }

                if (count($sundays) > 0) {
                    foreach ($sundays as $sunday) {
                        $model = new Event;
                        $model->title = $title;
                        $model->date = $sunday;
                        $model->save();
                    }
                } else {
                    return response()->json(['success' => false, 'message' => 'No Sunday between date range selected.']);
                }
            } else {
                $days = [];

                $startDate = Carbon::parse($fromDate);
                $endDate = Carbon::parse($toDate);
        
                for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                    $days[] = $date->format('Y-m-d');
                }

                if (count($days) > 0) {
                    foreach ($days as $day) {
                        $model = new Event;
                        $model->title = $title;
                        $model->date = $day;
                        $model->save();
                    }
                } else {
                    return response()->json(['success' => false, 'message' => 'No date between date range selected.']);
                }
            }

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Error occurred.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllEvents()
    {
        $events = Event::get();
        if ($events) {
            return response()->json(['success' => true, 'data' => $events]);
        }
        return response()->json(['success' => false]);

    }

    public function destroyAll()
    {
        Event::truncate();
        return response()->json(['success' => true]);
    }
}
