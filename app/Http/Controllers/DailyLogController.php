<?php

namespace App\Http\Controllers;

use App\Models\DailyLog;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DailyLogController extends Controller
{
    public function destroy(DailyLog $dailylog)
    {
        $this->authorize('delete', $dailylog);
    }

    public function update(DailyLog $dailylog): RedirectResponse
    {
        $dailylog->update(request()->only('log'));

        return back();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'log' => 'required',
            'day' => 'required|date',
        ]);

        return DailyLog::create([
            'user_id' => $request->user()->id,
            'log' => $validated['log'],
            'day' => $validated['day']
        ]);
    }
}
