<?php

namespace App\Http\Controllers;

use App\Events\DailyLogCreated;
use App\Mail\DailyLogCopy;
use App\Models\DailyLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Rules\BlockWords;

class DailyLogController extends Controller
{

    public function destroy(DailyLog $dailylog)
    {
        DailyLog::first()->delete();

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
            'log' => ['required', 'string', new BlockWords],
            'day' => 'required|date',
        ]);

        $dailylog =  DailyLog::create([
            'user_id' => $request->user()->id,
            'log' => $validated['log'],
            'day' => $validated['day']
        ]);

        DailyLogCreated::dispatch($dailylog);
    }
}
