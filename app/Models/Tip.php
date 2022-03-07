<?php

namespace App\Models;

use App\Models\vehicle\Brand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelLegends\EloquentFilter\Concerns\HasFilter;

class Tip extends Model
{
    use HasFactory, HasFilter;

    protected $fillable = ['name', 'description', 'brand_id', 'model', 'version'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
