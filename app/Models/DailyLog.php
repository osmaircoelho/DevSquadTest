<?php

namespace App\Models;

use App\Events\DailyLogCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'log',
        'day'
    ];

    protected $dates = [
        'day'
    ];

    protected $events = [
        'created' => DailyLogCreated::class
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


