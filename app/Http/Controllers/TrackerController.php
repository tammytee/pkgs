<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Rules\Ship24\TrackingNumber;
use App\Services\Ship24\Tracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TrackerController extends Controller
{
    public function __construct(
        protected Tracker $ship24,
    ) {
    }

    public function track(Request $request)
    {
        $request->validate([
            'trackingNumber' => ['required', 'string', new TrackingNumber],
        ]);

        $pkg = Package::firstOrCreate([
            'tracking_number' => $request->input('trackingNumber'),
        ]);

        $response = $this->ship24->track([
            'trackingNumber' => $request->input('trackingNumber'),
            'shipmentReference' => $pkg->number,
        ]);

        $data = $response->collect('data.trackings')->first();

        $pkg->update([
            'tracker_id' => $data['tracker']['trackerId'],
            'status' => $data['events'][0]['statusMilestone'],
            'status_note' => $data['events'][0]['status'],
        ]);

        return Redirect::route('dashboard');
    }
}
