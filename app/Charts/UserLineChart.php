<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\User;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserLineChart extends BaseChart
{
    public function handler(Request $request): Chartisan
    {
        $users = User::select(DB::raw("COUNT(*) as count"),DB::raw('YEAR(created_at) as year'))
            ->whereYear('created_at', date('Y'))
            ->groupByRaw('year')
            ->get();

        return Chartisan::build()
            ->labels($users->pluck('year')->toArray())
            ->dataset('Sample 2', $users->pluck('count')->toArray());
    }
}
