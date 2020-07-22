<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Measure;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class MeasuresController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){

        } else {
            # User hash hard-coded below is a hash for password 'testing123' hashed with md5
            #$userHash= '$2y$10$70UfLceNDKb.QcT5Wu2i/O43lU3UHxZZ9jlyyTTf3tt8ucXe3tZge';
            $userHash = (string)md5(Auth::user()->email);

            #$latestMeasure = Measure::latestUserMeasure($userHash);
            $latestMeasure = Measure::where('user_hash', $userHash)
                ->latest()
                ->first();

            #$remainingMeasures = Measure::remainingUserMeasures($userHash);
            $remainingMeasures = Measure::where('user_hash', $userHash)
                ->orderBy('created_at', 'desc')
                ->skip('1')
                ->take('1000')
                ->get();

            return view('measures.index', compact('latestMeasure', 'remainingMeasures'));
        }

    }

    public function show(Measure $measure)
    {
        $userHash = (string)md5(Auth::user()->email);

        $measure = Measure::where('user_hash', $userHash)
            ->where('id', $measure->id)
            ->first();

        return view('measures.show', compact('measure'));
    }

    public function destroy(Measure $measure)
    {
        $measure->delete();

        return redirect('measures');
    }

    public function create()
    {
        $userHash = (string)md5(Auth::user()->email);

        $path = base_path() . '/index.py';

        $process = new Process(['python3', $path, $userHash]);

        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $output = $process->getOutput();
        return view('measures.create', compact('output'));
    }
}
