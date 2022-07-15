<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Susenas2020 extends Model
{
    use HasFactory;

    protected $table='susenas2020';
    protected $guarded = [];

    public function wilayah(){
        return $this->belongsTo(NamaWilayah::class,'r101','r101');
    }

    public function getPendudukMiskinAttribute(){
        return $this->poor == 1 ? $this->weind : 0; 
    }

    public function getPendudukMiskinPercentageAttribute(){
        return $this->poor == 1 ? $this->weind : 0; 
    }
}
