<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function category_tags() {
        return $this->hasMany(Category_tag::class);
    }

    public function delete() {
        $this->category_tags()->delete();

        return parent::delete();
    }
}
