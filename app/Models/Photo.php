<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    const NAMES = ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "6.jpg"];
    const TITLES = [":3", "O_O", "Взорвал чето", "Ура, с др!", "После качалки", "Тоже взорвал чето.."];
}
