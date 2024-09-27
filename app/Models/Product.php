<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function productType(){
        return $this->belongsTo(related: ProductType::class, foreignKey: 'product_type_id');
    }

    public function getimageUrl(){
        if($this->image_url==null || $this->image_url==""){
            return "/assets/img/box.png";

        }else{
            return $this->image_url;
        }
    }
}
