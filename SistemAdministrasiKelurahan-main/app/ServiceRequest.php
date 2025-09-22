<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email', 'phone',
        'service_category_id', 'description', 'document'
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

