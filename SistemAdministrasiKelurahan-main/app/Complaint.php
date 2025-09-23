<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'complaint_category_id',
        'other_category',
        'attachment',
        'user_id',
        'name',
        'email',
        'phone_number',
        'complaint'
    ];

    protected $with = ['category', 'user'];

    public function category()
    {
        return $this->belongsTo(ComplaintCategory::class, 'complaint_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(ComplaintComment::class);
    }

    // ✅ Accessor untuk format nomor WhatsApp
    public function getPhoneNumberForWhatsappAttribute()
    {
        // Hapus semua karakter selain angka
        $num = preg_replace('/[^0-9]/', '', $this->phone_number);

        // Jika diawali 0, ubah jadi 62
        if (substr($num, 0, 1) === '0') {
            $num = '62' . substr($num, 1);
        }

        return $num;
    }
}