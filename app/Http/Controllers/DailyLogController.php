<?php

namespace App\Http\Controllers;

use App\Models\DailyLog;
use Illuminate\Http\RedirectResponse;

class DailyLogController extends Controller
{
    public function update($id): RedirectResponse
    {
        $log = DailyLog::findOrFail($id);

        $log->update(request()->only('log'));

        return back();
    }
}
