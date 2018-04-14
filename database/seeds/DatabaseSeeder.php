<?php

use Illuminate\Database\Seeder;
use App\Language;
use App\Cardset;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->english();
        $this->spanish();
        $this->italian();
        $this->german();
        $this->french();
    }
    public function spanish(){
        // SPANISH LANG
        $spanish = new Language();
        $spanish->name = 'Spanish';
        $spanish->locale = 'es-ES';
        $spanish->save();

        // BÀSICO CARDSET
        $basic = new Cardset();
        $basic->name = 'Cartas básico';
        $basic->cover_url = 'http://66-s.ru/getimage?id=basico_cardset';
        $basic->language()->associate($spanish);
        $basic->save();

        // WORDS FOR BÀSICO CARDSET
        $basic->addWord("gato", "Кощька", "gato");
        $basic->addWord("perro", "Щинок", "perro");
        $basic->addWord("coche", "Тачка", "coche");
        $basic->addWord("cerveza", "Пивас", "cerveza");

    }
    public function english(){
        // ENGLISH LANG
        $english = new Language();
        $english->name = 'English';
        $english->locale = 'en_US';
        $english->save();

        // BASIC CARDSET
        $basic = new Cardset();
        $basic->name = 'Basic words';
        $basic->cover_url = 'http://66-s.ru/getimage?id=basic_cardset';
        $basic->language()->associate($english);
        $basic->save();

        // WORDS FOR BASIC CARDSET
        $basic->addWord("cat", "Кощька", "Ket");
        $basic->addWord("dog", "Щинок", "dok");
        $basic->addWord("car", "Тачка", "kar");
        $basic->addWord("beer", "Пивас", "bîr");

        // IT CARDSET
        $it = new Cardset();
        $it->name = 'IT words';
        $it->cover_url = 'http://66-s.ru/getimage?id=it_cardset';
        $it->language()->associate($english);
        $it->save();

        // WORDS FOR BASIC CARDSET
        $it->addWord("loop", "Цикл", "Lüp");
        $it->addWord("debug", "Отладка", "dibak");
        $it->addWord("execution", "Выполнение", "eksekjushön");
        $it->addWord("prosecco", "просекко", "proseko");
        $it->addWord("my prosecco", "мой просекко", "mai proseko");
        $it->addWord("our prosecco", "наш просекко", "aur proseko");
        $it->addWord("Your health", "Здоровье ваше", "jour hэlf");
    }
    public function italian(){
        // ITALIAN LANG
        $italian = new Language();
        $italian->name = 'Italian';
        $italian->locale = 'it-IT';
        $italian->save();
    }
    public function german(){
        // GERMAN LANG
        $german = new Language();
        $german->name = 'German';
        $german->locale = 'de-DE';
        $german->save();
    }
    public function french(){
        // FRENCH LANG
        $french = new Language();
        $french->name = 'French';
        $french->locale = 'fr-FR';
        $french->save();
    }
}
