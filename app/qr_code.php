<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class qr_code extends Model
{
    protected $table = 'qr_code';
    public $timestamps = false;
    protected $fillable = 
    [
        'count_qrcode'
    ];
  public function reserves()
    {
        return $this->hasMany(Reserve::class , 'id_qrcode' , 'id_qrcode');
    }

}
