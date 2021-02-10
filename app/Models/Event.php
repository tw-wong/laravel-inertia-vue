<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'date_time',
    ];
        
    public function setDateTimeAttribute($value)
    {
        $this->attributes['date_time'] = date('Y-m-d H:i:s', strtotime($value));
    }
    
    public function run()
    {
        Event::factory()->count(10)->create();
    }
}
