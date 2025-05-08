<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            [
                "name" => 'English', 
                "iso_639-1" => 'en',
            ],
            [
                "name" => 'Afar', 
                "iso_639-1" => 'aa'
            ],
            [
                "name" => 'Abkhazian',
                "iso_639-1" => 'ab'
            ],
            [
                'name' => 'Afrikaans', 
                "iso_639-1" => 'af'
            ],
            [
                "name" => 'Amharic', 
                "iso_639-1" => 'am',
            ],
            [
                "name" => 'Arabic', 
                "iso_639-1" => 'ar',
            ],
            [
                "name" => 'Assamese', 
                "iso_639-1" => 'as'
            ],
            [
                "name" => 'Aymara', 
                "iso_639-1" => 'ay',
            ],
            [
                "name" => 'Azerbaijani', 
                "iso_639-1" => 'az'
            ],
            [
                "name" => 'Bashkir', 
                "iso_639-1" => 'ba'
            ],
            [
                "name" => 'Belarusian', 
                "iso_639-1" => 'be',
            ],
            [
                "name" => 'Bulgarian', 
                "iso_639-1" => 'bg',
            ],
            [
                "name" => 'Bihari', 
                "iso_639-1" => 'bh'
            ],
            [
                "name" => 'Bislama', 
                "iso_639-1" => 'bi',
            ],
            [
                "name" => 'Bengali/Bangla', 
                "iso_639-1" => 'bn'
            ],
            [
                "name" => 'Tibetan', 
                "iso_639-1" => 'bo'
            ],
            [
                "name" => 'Breton', 
                "iso_639-1" => 'br'
            ],
            [
                "name" => 'Catalan', 
                "iso_639-1" => 'ca'
            ],
            [
                "name" => 'Corsican', 
                "iso_639-1" => 'co'
            ],
            [
                "name" => 'Czech', 
                "iso_639-1" => 'cs',
            ],
            [
                "name" => 'Welsh', 
                "iso_639-1" => 'cy'],
            [
                "name" => 'Danish', 
                "iso_639-1" => 'da'
            ],
            [
                "name" => 'German', 
                "iso_639-1" => 'de'
            ],
            [
                "name" => 'Bhutani', 
                "iso_639-1" => 'dz'
            ],
            [
                "name" => 'Greek', 
                "iso_639-1" => 'el'
            ],
            [
                "name" => 'Esperanto', 
                "iso_639-1" => 'eo'
            ],
            [
                "name" => 'Spanish', 
                "iso_639-1" => 'es'
            ],
            [
                "name" => 'Estonian', 
                "iso_639-1" => 'et'
            ],
            [
                "name" => 'Basque', 
                "iso_639-1" => 'eu'
            ],
            [
                "name" => 'Persian', 
                "iso_639-1" => 'fa'
            ],
            [
                "name" => 'Finnish', 
                "iso_639-1" => 'fi'
            ],
            [
                "name" => 'Fiji', 
                "iso_639-1" => 'fj'
            ],
            [
                "name" => 'Faeroese', 
                "iso_639-1" => 'fo'
            ],
            [
                "name" => 'French', 
                "iso_639-1" => 'fr'
            ],
            [
                "name" => 'Frisian', 
                "iso_639-1" => 'fy'
            ],
            [
                "name" => 'Irish', 
                "iso_639-1" => 'ga'
            ],
            [
                "name" => 'Scots/Gaelic', 
                "iso_639-1" => 'gd'
            ],
            [
                "name" => 'Galician', 
                "iso_639-1" => 'gl'
            ],
            [
                "name" => 'Guarani', 
                "iso_639-1" => 'gn'
            ],
            [
                "name" => 'Gujarati', 
                "iso_639-1" => 'gu'
            ],
            [
                "name" => 'Hausa', 
                "iso_639-1" => 'ha'
            ],
            [
                "name" => 'Hindi', 
                "iso_639-1" => 'hi'
            ],
            [
                "name" => 'Croatian', 
                "iso_639-1" => 'hr'
            ],
            [
                "name" => 'Hungarian', 
                "iso_639-1" => 'hu'
            ],
            [
                "name" => 'Armenian', 
                "iso_639-1" => 'hy'
            ],
            [
                "name" => 'Interlingua', 
                "iso_639-1" => 'ia'
            ],
            [
                "name" => 'Interlingue', 
                "iso_639-1" => 'ie'
            ],
            [
                "name" => 'Inupiak', 
                "iso_639-1" => 'ik'
            ],
            [
                "name" => 'Indonesian', 
                "iso_639-1" => 'in'
            ],
            [
                "name" => 'Icelandic', 
                "iso_639-1" => 'is'
            ],
            [
                "name" => 'Italian', 
                "iso_639-1" => 'it'
            ],
            [
                "name" => 'Hebrew', 
                "iso_639-1" => 'iw'
            ],
            [
                "name" => 'Japanese', 
                "iso_639-1" => 'ja'
            ],
            [
                "name" => 'Yiddish', 
                "iso_639-1" => 'ji'
            ],
            [
                "name" => 'Javanese', 
                "iso_639-1" => 'jw'
            ],
            [
                "name" => 'Georgian', 
                "iso_639-1" => 'ka'
            ],
            [
                "name" => 'Kazakh', 
                "iso_639-1" => 'kk'
            ],
            [
                "name" => 'Greenlandic', 
                "iso_639-1" => 'kl'
            ],
            [
                "name" => 'Cambodian', 
                "iso_639-1" => 'km'
            ],
            [
                "name" => 'Kannada', 
                "iso_639-1" => 'kn'
            ],
            [
                "name" => 'Korean', 
                "iso_639-1" => 'ko'
            ],
            [
                "name" => 'Kashmiri', 
                "iso_639-1" => 'ks'
            ],
            [
                "name" => 'Kurdish', 
                "iso_639-1" => 'ku'
            ],
            [
                "name" => 'Kirghiz', 
                "iso_639-1" => 'ky'
            ],
            [
                "name" => 'Latin', 
                "iso_639-1" => 'la'
            ],
            [
                "name" => 'Lingala', 
                "iso_639-1" => 'ln'
            ],
            [
                "name" => 'Laothian', 
                "iso_639-1" => 'lo'
            ],
            [
                "name" => 'Lithuanian', 
                "iso_639-1" => 'lt'
            ],
            [
                "name" => 'Latvian/Lettish', 
                "iso_639-1" => 'lv'
            ],
            [
                "name" => 'Malagasy', 
                "iso_639-1" => 'mg'
            ],
            [
                "name" => 'Maori', 
                "iso_639-1" => 'mi'
            ],
            [
                "name" => 'Macedonian', 
                "iso_639-1" => 'mk'
            ],
            [
                "name" => 'Malayalam', 
                "iso_639-1" => 'ml'
            ],
            [
                "name" => 'Mongolian', 
                "iso_639-1" => 'mn'
            ],
            [
                "name" => 'Moldavian', 
                "iso_639-1" => 'mo'
            ],
            [
                "name" => 'Marathi', 
                "iso_639-1" => 'mr'
            ],
            [
                "name" => 'Malay', 
                "iso_639-1" => 'ms'
            ],
            [
                "name" => 'Maltese', 
                "iso_639-1" => 'mt'
            ],
            [
                "name" => 'Burmese', 
                "iso_639-1" => 'my'
            ],
            [
                "name" => 'Nauru', 
                "iso_639-1" => 'na'
            ],
            [
                "name" => 'Nepali', 
                "iso_639-1" => 'ne'
            ],
            [
                "name" => 'Dutch', 
                "iso_639-1" => 'nl'
            ],
            [
                "name" => 'Norwegian', 
                "iso_639-1" => 'no'
            ],
            [
                "name" => 'Occitan', 
                "iso_639-1" => 'oc'
            ],
            [
                "name" => '(Afan)/Oromoor/Oriya', 
                "iso_639-1" => 'om',
            ],
            [
                "name" => 'Punjabi', 
                "iso_639-1" => 'pa'
            ],
            [
                "name" => 'Polish', 
                "iso_639-1" => 'pl'
            ],
            [
                "name" => 'Pashto/Pushto', 
                "iso_639-1" => 'ps'],
            [
                "name" => 'Portuguese', 
                "iso_639-1" => 'pt'
            ],
            [
                "name" => 'Quechua', 
                "iso_639-1" => 'qu'
            ],
            [
                "name" => 'Rhaeto-Romance', 
                "iso_639-1" => 'rm'
            ],
            [
                "name" => 'Kirundi', 
                "iso_639-1" => 'rn'
            ],
            [
                "name" => 'Romanian', 
                "iso_639-1" => 'ro'
            ],
            [
                "name" => 'Russian', 
                "iso_639-1" => 'ru',
            ],
            [
                "name" => 'Kinyarwanda', 
                "iso_639-1" => 'rw'
            ],
            [
                "name" => 'Sanskrit', 
                "iso_639-1" => 'sa'
            ],
            [
                "name" => 'Sindhi', 
                "iso_639-1" => 'sd'
            ],
            [
                "name" => 'Sangro', 
                "iso_639-1" => 'sg'
            ],
            [
                "name" => 'Serbo-Croatian', 
                "iso_639-1" => 'sh'
            ],
            [
                "name" => 'Singhalese', 
                "iso_639-1" => 'si'
            ],
            [
                "name" => 'Slovak', 
                "iso_639-1" => 'sk'
            ],
            [
                "name" => 'Slovenian', 
                "iso_639-1" => 'sl'
            ],
            [
                "name" => 'Samoan', 
                "iso_639-1" => 'sm'
            ],
            [
                "name" => 'Shona', 
                "iso_639-1" => 'sn'
            ],
            [
                "name" => 'Somali', 
                "iso_639-1" => 'so'
            ],
            [
                "name" => 'Albanian', 
                "iso_639-1" => 'sq'
            ],
            [
                "name" => 'Serbian', 
                "iso_639-1" => 'sr'
            ],
            [
                "name" => 'Siswati', 
                "iso_639-1" => 'ss'
            ],
            [
                "name" => 'Sesotho', 
                "iso_639-1" => 'st'
            ],
            [
                "name" => 'Sundanese', 
                "iso_639-1" => 'su'
            ],
            [
                "name" => 'Swedish', 
                "iso_639-1" => 'sv'
            ],
            [
                "name" => 'Swahili', 
                "iso_639-1" => 'sw'
            ],
            [
                "name" => 'Tamil', 
                "iso_639-1" => 'ta'
            ],
            [
                "name" => 'Telugu', 
                "iso_639-1" => 'te'
            ],
            [
                "name" => 'Tajik', 
                "iso_639-1" => 'tg'
            ],
            [
                "name" => 'Thai', 
                "iso_639-1" => 'th'
            ],
            [
                "name" => 'Tigrinya', 
                "iso_639-1" => 'ti'
            ],
            [
                "name" => 'Turkmen', 
                "iso_639-1" => 'tk'
            ],
            [
                "name" => 'Tagalog', 
                "iso_639-1" => 'tl'
            ],
            [
                "name" => 'Setswana', 
                "iso_639-1" => 'tn'
            ],
            [
                "name" => 'Tonga', 
                "iso_639-1" => 'to'
            ],
            [
                "name" => 'Turkish', 
                "iso_639-1" => 'tr'
            ],
            [
                "name" => 'Tsonga', 
                "iso_639-1" => 'ts'
            ],
            [
                "name" => 'Tatar', 
                "iso_639-1" => 'tt'
            ],
            [
                "name" => 'Twi', 
                "iso_639-1" => 'tw'
            ],
            [
                "name" => 'Ukrainian', 
                "iso_639-1" => 'uk'
            ],
            [
                "name" => 'Urdu', 
                "iso_639-1" => 'ur'
            ],
            [
                "name" => 'Uzbek', 
                "iso_639-1" => 'uz'
            ],
            [
                "name" => 'Vietnamese', 
                "iso_639-1" => 'vi'
            ],
            [
                "name" => 'Volapuk', 
                "iso_639-1" => 'vo'
            ],
            [
                "name" => 'Wolof', 
                "iso_639-1" => 'wo'
            ],
            [
                "name" => 'Xhosa', 
                "iso_639-1" => 'xh'
            ],
            [
                "name" => 'Yoruba', 
                "iso_639-1" => 'yo'
            ],
            [
                "name" => 'Chinese', 
                "iso_639-1" => 'zh'
            ],
            [
                "name" => 'Zulu', 
                "iso_639-1" => 'zu'
            ],
        ];

        foreach ($languages as $language) {
            $input = [
                'name' => $language['name'],
                'iso_639-1' => $language['iso_639-1'],
            ];
            Language::create($input);
        }
    }
}
