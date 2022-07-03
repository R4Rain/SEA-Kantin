<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'user_id',
    ];
    protected $with = [
        'user',
    ];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        });
        $query->when($filters['select'] ?? false, function ($query, $select) {
            if ($select === 'old') {
                return $query->orderBy('created_at', 'ASC');
            } else if ($select === 'asc') {
                return $query->orderBy('name', 'ASC');
            } else if ($select === 'desc') {
                return $query->orderBy('name', 'DESC');
            } else {
                return $query->orderBy('created_at', 'DESC');
            }
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
