<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quran extends Model
{
    public function detail()
    {
    	return $this->belongsTo('App\Detail', 'detail_id');
    }
}
