<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'name',
        'description',
        'short_description',
        'motivation',
        'requirements',
        'total_team',
        'active',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'projects_categories', 'project_id', 'category_id');
    }
}
