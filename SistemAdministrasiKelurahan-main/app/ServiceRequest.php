<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'service_category_id',
        'description',
        'document'
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor nomor telepon untuk WhatsApp
    public function getPhoneForWhatsappAttribute()
    {
        $num = preg_replace('/[^0-9]/', '', $this->phone);

        if (!$num) {
            return null;
        }

        // Jika diawali 0, ganti jadi 62
        return (substr($num, 0, 1) === '0')
            ? '62' . substr($num, 1)
            : $num;
    }
}