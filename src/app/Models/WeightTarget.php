<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightTarget extends Model
{
    use HasFactory;

    protected $table = 'weight_targets'; // テーブル名を指定

    protected $fillable = [
        'user_id',
        'target_weight',
    ];
}
