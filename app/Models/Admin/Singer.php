<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    protected $table='singers';
    function getActiveTextAttribute(){
        if($this->active==1){
            return 'Có sử dụng';
        }
        return 'Không sử dụng';
    }
    public function nguoitao()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    
    //
}
