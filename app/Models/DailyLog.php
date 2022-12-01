<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class DailyLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'log',
        'day'
    ];

    protected $dates = [
        'day'
    ];

 /*  public function setDayAttribute($value)
    {
        //dd(strtotime($value));
        //dd(date('Y-m-d', strtotime($value)));
       // $this->attributes['day'] = date('Y-m-d', $value);
        //$this->attributes['day'] = Carbon::parse($value)->format('Y-m-d');
    }*/

    public function user()
    {
        return $this->belongsTo( User::class );
    }

    public function scopeFromToday(){
        return $this->whereDate('day', today());
    }

}


