<?php

namespace App\Http\Controllers;

use App\Charts\MeasureChart;
use Illuminate\Http\Request;

class MeasureChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measureChart = new MeasureChart();
        $measureChart->labels(['Jan', 'Feb', 'Mar']);
        $measureChart->dataset('Users by trimester', 'line', [10, 25, 13]);
    }
}
