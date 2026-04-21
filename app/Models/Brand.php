<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property bool $active
 */
class Brand extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'active'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
