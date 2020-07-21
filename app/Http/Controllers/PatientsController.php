<?php

namespace App\Http\Controllers;

use App\Measure;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index()
    {
        $patients = User::where('supervisor_id', Auth::user()->id)
            ->take('1000')
            ->get();

//        dd($patients);

        return view('patients.index', compact('patients'));
    }

    public function show($id)
    {
        //Get users email to obtain hash
        $user = User::where('id', $id)
            ->firstOrFail();

        //Make users hash to fetch measures
        $userHash = (string)md5($user->email);

        $latestMeasure = Measure::where('user_hash', $userHash)
            ->latest()
            ->first();

        #$remainingMeasures = Measure::remainingUserMeasures($userHash);
        $remainingMeasures = Measure::where('user_hash', $userHash)
            ->orderBy('created_at', 'desc')
            ->skip('1')
            ->take('1000')
            ->get();

        //dd($latestMeasure->measure);
        //dd($remainingMeasures->count());

        //dd($latestMeasure);
        return view('patients.show', compact('latestMeasure', 'remainingMeasures', 'id'));
    }

    public function showMeasure($id, $measureId)
    {
        //Get users email to obtain hash
        $user = User::where('id', $id)
            ->firstOrFail();

        //Make users hash to fetch measures
        $userHash = (string)md5($user->email);

        $measure = Measure::where('user_hash', $userHash)
            ->where('id', $measureId)
            ->first();

        return view('patients.showMeasure', compact('measure', 'id'));
    }
}
