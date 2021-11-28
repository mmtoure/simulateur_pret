<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $table = 'produits';

    protected $fillable = ['title, description, price, users_id'];

   /**
     * Get the User that owns the categories                                   .
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id')->withTrashed();
    }

   

    /**
     * Get the Status that owns the categories.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
