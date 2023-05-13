<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Contact;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'contact_id'
    ];

    public function contacts(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

}
