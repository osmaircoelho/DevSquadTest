<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class DailyLog extends Model
{
    use HasFactory;

    /*protected $fillable = [
        'user_id',
        'log',
        'day'
    ];*/

    //protected $day = Carbon::now()->format('Y-m-d');

    /*protected $casts = [
        'day' => Carbon::class,
    ];*/

    public function user()
    {
        return $this->belongsTo( User::class );
    }

    public function scopeFromToday(){
        return $this->whereDate('day', today());
    }

}


