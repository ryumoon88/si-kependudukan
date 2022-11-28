<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyCardMember extends Model
{
    use HasFactory;

    public function familyCard()
    {
        return $this->belongsTo(FamilyCard::class);
    }

    public function citizen()
    {
        return $this->belongsTo(Resident::class);
    }
}