<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search)=>
            $query->where(fn($query)=>
                $query
                    ->where('name','like','%'.$search.'%')
                    ->orWhere('description','like','%'.$search.'%')
            )
        );
        $query->when($filters['category'] ?? false, fn($query, $category)=>
            $query->whereHas('category', fn($query)=>
                $query->where('slug',$category)
            )

        );
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function purchas()
    {
        return $this->hasMany(Purchas::class);
    }

}
