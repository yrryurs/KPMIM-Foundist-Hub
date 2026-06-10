<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes; //Allow soft deletion

    protected $fillable=['itemname','description','category_id','status','location','date','image'];

    protected $date=['deleted_at']; //Soft delete timestamp

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

