<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{   
    public function subcategories()
    {
        return $this->hasMany(Categories::class, 'parent_id', 'category_id');
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'category_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name',
        'parent_id',
        // Add other fields as needed
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'parent_id' => 'integer',
        // Add other casts as needed
    ];
}



