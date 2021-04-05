<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'date',
    ];
        
    // public function setDateTimeAttribute($value)
    // {
    //     $this->attributes['date_time'] = date('Y-m-d H:i:s', strtotime($value));
    // }
    
    // public function getDateTimeAttribute($value)
    // {
    //     return date('Y-m-d\TH:i', strtotime($value));        
    // }
    
    // protected static function booted()
    // {
    //     static::creating(function ($event) {
    //         $event->user_id = Auth()->user()->id;
    //     });
    // }    
    
    public function run()
    {
        Event::factory()->count(10)->create();
    }
}
