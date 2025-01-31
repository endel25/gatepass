<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'ProductType','ProductName','ProductCode','ProductUnit','TheoraticalWeight','ProductPrice','Notes','CreatedBy','UpdateBy','IsActive'
    ];
}
 