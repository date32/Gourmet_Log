<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function category_tags() {
        return $this->hasOne(Category_tag::class);
    }

    public function delete() {
        $this->category_tags()->delete();

        return parent::delete();
    }
}
