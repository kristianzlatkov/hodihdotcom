<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactForm extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'email',
        'lastName',
        'message'
    ];

    protected static function newFactory()
    {
        return \Modules\Contact\Database\factories\ContactFormFactory::new();
    }
}
