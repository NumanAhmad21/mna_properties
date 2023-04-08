<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyProject extends Model
{
    protected $table = 'property_projects';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'location'];    
    use HasFactory;
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
