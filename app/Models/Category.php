<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Contact;

class Category extends Model
{
    use HasFactory;

    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class);
    }
}
