<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierMaterial extends Model
{
    use HasFactory;
    protected $table = 'supplier_materials';

    protected $fillable = [
        'supplier_id',
        'material_id',
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'supplier_id' => 'integer',
        'material_id' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
        });
        self::created(function ($model) {
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
        });
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function scopeMaterialId($query, $material_id)
    {
        if (is_array($material_id)) {
            return $query->whereIn('supplier_materials.material_id', $material_id);
        }
        return $query->where('supplier_materials.material_id', $material_id);
    }

    public function scopeSupplierId($query, $supplier_id)
    {
        if (is_array($supplier_id)) {
            return $query->whereIn('supplier_materials.supplier_id', $supplier_id);
        }
        return $query->where('supplier_materials.supplier_id', $supplier_id);
    }
}
