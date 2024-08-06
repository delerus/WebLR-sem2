<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interests extends Model
{
    use HasFactory;

    const IDS = ["Games", "Games2", "Fimls", "Sport"];
    const NAMES = ["Игры", "Игры2", "Фильмы", "Спорт"];
    const DESCRIPTIONS = [
        "В свободное время я в основном играю в видеоигры.
        Мои ЛЮБИМЫЕ игры: Dota 2, Persona 5, Yakuza 0, Divinity: Original Sin 2.",
        "Бывает, что обычные игры надоедают. Тогда я запускаю эти игры:",
        "Также люблю смотреть фильмы. Особенно люблю фильмы из тик ток эдитов с сигмами. Каждый день выделяю 1 час и 40 минут для просмотра фильма 'Драйв', чтобы стать как Райан Гослинг.",
        "Спорт это очень круто и полезно, но я предпочитаю пить пиво."
    ];
    const IMAGES = ["games.jpg", "games2.png", "films.jpg", "sport.jpg"];
}
