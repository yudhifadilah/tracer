<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Responden extends Model
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

    public function survey(){
        return $this->belongsTo(Survey::class, 'surveys_id');
    }
}
