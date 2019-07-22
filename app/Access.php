<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $table = 'access';

    public function rolename(){
        return $this->belongsTo('App\Role');
    }
}
