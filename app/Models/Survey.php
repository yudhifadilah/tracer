<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;


class Survey extends Model
{
    use HasFactory;

    public $incrementing = false; // Non-incrementing primary key
    protected $keyType = 'string'; // Primary key type

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
        });
    }


    public function respondens(){
        return $this->hasMany(Responden::class, 'surveys_id', 'id');
    }
}
