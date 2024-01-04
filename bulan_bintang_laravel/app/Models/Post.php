<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $primaryKey = 'item_id';

    public $timestamps = false;

    protected $fillable = [
        'image_path',
        'item_name',
        'price',
        'user_id',
        'product_information',
        'material',
        'inside_box',
        'category',
        'subcategory',
<<<<<<< HEAD
=======
        
>>>>>>> 8c0d920b955eb177133f3b50dff8d6200a0254b6
    ];

    

    
}
