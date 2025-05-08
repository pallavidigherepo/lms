<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'label' => 'Real English Primer',
                'icon'  => 'ner-english',
                'standard_id' => 1,
            ],
            [
                'label' => 'Amblin Capital and Small Writing',
                'icon'  => 'ner-cap-small-wri',
                'standard_id' => 1,
            ],

            [
                'label' => 'Enviro Watch',
                'icon'  => 'ner-env-watch',
                'standard_id' => 1,
            ],
            [
                'label' => 'I can do it - A',
                'icon'  => 'ner-i-can-do-it',
                'standard_id' => 1,
            ],
            [
                'label' => 'Maths Mania 1-20',
                'icon'  => 'ner-maths-1-20',
                'standard_id' => 1,
            ],
            [
                'label' => 'Akshar Parichay',
                'icon'  => 'ner-akshar-parichay',
                'standard_id' => 1,
            ],
            [
                'label' => 'Number Skills - A',
                'icon'  => 'ner-num-skill-a',
                'standard_id' => 1,
            ],
            [
                'label' => 'Anmol Rhymes English/Hindi',
                'icon'  => 'ner-anmol-rymes',
                'standard_id' => 1,
            ],
            [
                'label' => 'The magic of drawing - B',
                'icon'  => 'ner-magic-drawing',
                'standard_id' => 1,
            ],
            [
                'label' => 'Phonics - B',
                'icon'  => 'jr-phonics-b',
                'standard_id' => 2,
            ],
            [
                'label' => 'Happy Letters - B (Small)',
                'icon'  => 'jr-happy-letters-b',
                'standard_id' => 2,
            ],

            [
                'label' => 'Ascent in English',
                'icon'  => 'jr-asc-eng',
                'standard_id' => 2,
            ],
            [
                'label' => 'Anmol Rhymes Hindi/English - B',
                'icon'  => 'jr-anmol-rhy',
                'standard_id' => 2,
            ],
            [
                'label' => 'I can do it',
                'icon'  => 'jr-i-can-do-it',
                'standard_id' => 2,
            ],
            [
                'label' => 'Ready Steady Go 40 - A',
                'icon'  => 'jr-red-st-go',
                'standard_id' => 2,
            ],
            [
                'label' => 'The Little Mathematician',
                'icon'  => 'jr-the-ltl-math',
                'standard_id' => 2,
            ],
            [
                'label' => 'Vihaan Akshar Lekhan',
                'icon'  => 'jr-vih-aks',
                'standard_id' => 2,
            ],
            [
                'label' => 'Growing with nature - B',
                'icon'  => 'jr-grow-with-nature',
                'standard_id' => 2,
            ],
            [
                'label' => 'The Magic of Drawing - B',
                'icon'  => 'jr-magic-draw',
                'standard_id' => 2,
            ],
            [
                'label' => 'Literacy Skills - C',
                'icon'  => 'sr-literacy-c',
                'standard_id' => 3,
            ],
            [
                'label' => 'Phonics - C',
                'icon'  => 'sr-phonics-c',
                'standard_id' => 3,
            ],
            [
                'label' => 'I can do it - C',
                'icon'  => 'sr-i-can-do-it',
                'standard_id' => 3,
            ],
            [
                'label' => 'Ready Steady Go - C English',
                'icon'  => 'sr-red-st-go-eng',
                'standard_id' => 3,
            ],
            [
                'label' => 'Ready Steady Go - C Maths',
                'icon'  => 'sr-red-st-go-maths',
                'standard_id' => 3,
            ],
            [
                'label' => 'Anmol Rhymes Hindi/English - C',
                'icon'  => 'sr-anmol-rhy',
                'standard_id' => 3,
            ],
            [
                'label' => 'Numberacy Skills - C',
                'icon'  => 'sr-num-ski-c',
                'standard_id' => 3,
            ],
            [
                'label' => 'Hindi Activity Book',
                'icon'  => 'sr-hindi-activity',
                'standard_id' => 3,
            ],
            [
                'label' => 'My EVS Book',
                'icon'  => 'sr-my-evs',
                'standard_id' => 3,
            ],
            [
                'label' => 'The Magic of Drawing - C',
                'icon'  => 'sr-magic-draw',
                'standard_id' => 3,
            ],
            [
                'label' => 'Coding Computing Skills',
                'icon'  => '1-coding-com',
                'standard_id' => 4,
            ],
            [
                'label' => 'Vihaan Hindi Sulekh',
                'icon'  => '1-vihaan-hin',
                'standard_id' => 4,
            ],
            [
                'label' => 'Modern English Reader',
                'icon'  => '1-mor-eng-read',
                'standard_id' => 4,
            ],
            [
                'label' => 'The Talk Show',
                'icon'  => '1-talk-show',
                'standard_id' => 4,
            ],
            [
                'label' => 'Speed Maths',
                'icon'  => '1-speed-maths',
                'standard_id' => 4,
            ],
            [
                'label' => 'Exploring Environment',
                'icon'  => '1-env',
                'standard_id' => 4,
            ],
            [
                'label' => 'Smart Brain All in One',
                'icon'  => '1-smart-brain',
                'standard_id' => 4,
            ],
            [
                'label' => 'Drawing Book Big',
                'icon'  => '1-draw',
                'standard_id' => 4,
            ],
            [
                'label' => 'Hindi Rimjhim',
                'icon'  => '1-hindi-rimjhim',
                'standard_id' => 4,
            ],
            [
                'label' => 'Majet Shiku Ya Marathi',
                'icon'  => '1-marathi',
                'standard_id' => 4,
            ],
            [
                'label' => 'Coding Computing Skills',
                'icon'  => '2-coding-com',
                'standard_id' => 5,
            ],
            [
                'label' => 'Vihaan Hindi Sulekh',
                'icon'  => '2-vihaan-hin',
                'standard_id' => 5,
            ],
            [
                'label' => 'Modern English Reader',
                'icon'  => '2-mor-eng-read',
                'standard_id' => 5,
            ],
            [
                'label' => 'The Talk Show',
                'icon'  => '2-talk-show',
                'standard_id' => 5,
            ],
            [
                'label' => 'Speed Maths',
                'icon'  => '2-speed-maths',
                'standard_id' => 5,
            ],
            [
                'label' => 'Exploring Environment',
                'icon'  => '2-env',
                'standard_id' => 5,
            ],
            [
                'label' => 'Smart Brain All in One',
                'icon'  => '2-smart-brain',
                'standard_id' => 5,
            ],
            [
                'label' => 'Drawing Book Big',
                'icon'  => '2-draw',
                'standard_id' => 5,
            ],
            [
                'label' => 'Hindi Rimjhim',
                'icon'  => '2-hindi-rimjhim',
                'standard_id' => 5,
            ],
            [
                'label' => 'Majet Shiku Ya Marathi',
                'icon'  => '2-marathi',
                'standard_id' => 5,
            ],
            [
                'label' => 'Coding Computing Skills',
                'icon'  => '3-coding-com',
                'standard_id' => 6,
            ],
            [
                'label' => 'Vihaan Hindi Sulekh',
                'icon'  => '3-vihaan-hin',
                'standard_id' => 6,
            ],
            [
                'label' => 'Modern English Reader',
                'icon'  => '3-mor-eng-read',
                'standard_id' => 6,
            ],
            [
                'label' => 'The Talk Show',
                'icon'  => '3-talk-show',
                'standard_id' => 6,
            ],
            [
                'label' => 'Speed Maths',
                'icon'  => '3-speed-maths',
                'standard_id' => 6,
            ],
            [
                'label' => 'Exploring Environment',
                'icon'  => '3-env',
                'standard_id' => 6,
            ],
            [
                'label' => 'Smart Brain All in One',
                'icon'  => '3-smart-brain',
                'standard_id' => 6,
            ],
            [
                'label' => 'Drawing Book Big',
                'icon'  => '3-draw',
                'standard_id' => 6,
            ],
            [
                'label' => 'Hindi Rimjhim',
                'icon'  => '3-hindi-rimjhim',
                'standard_id' => 6,
            ],
            [
                'label' => 'Majet Shiku Ya Marathi',
                'icon'  => '3-marathi',
                'standard_id' => 6,
            ],
            [
                'label' => 'Coding Computing Skills',
                'icon'  => '4-coding-com',
                'standard_id' => 7,
            ],
            [
                'label' => 'Vihaan Hindi Sulekh',
                'icon'  => '4-vihaan-hin',
                'standard_id' => 7,
            ],
            [
                'label' => 'Modern English Reader',
                'icon'  => '4-mor-eng-read',
                'standard_id' => 7,
            ],
            [
                'label' => 'The Talk Show',
                'icon'  => '4-talk-show',
                'standard_id' => 7,
            ],
            [
                'label' => 'Speed Maths',
                'icon'  => '4-speed-maths',
                'standard_id' => 7,
            ],
            [
                'label' => 'Panorama',
                'icon'  => '4-panorama',
                'standard_id' => 7,
            ],
            [
                'label' => 'Smart Brain All in One',
                'icon'  => '4-smart-brain',
                'standard_id' => 7,
            ],
            [
                'label' => 'Drawing Book Big',
                'icon'  => '4-draw',
                'standard_id' => 7,
            ],
            [
                'label' => 'Hands On Science',
                'icon'  => '4-hands-sci',
                'standard_id' => 7,
            ],
            [
                'label' => 'Sulabh Bharti Marathi',
                'icon'  => '4-marathi',
                'standard_id' => 7,
            ],
            [
                'label' => 'Counting Coding Counting',
                'icon'  => '5-count-code',
                'standard_id' => 8,
            ],
            [
                'label' => 'Hindi Rimjhim',
                'icon'  => '5-rimjhim-hin',
                'standard_id' => 8,
            ],
            [
                'label' => 'Modern English Reader',
                'icon'  => '5-mor-eng-read',
                'standard_id' => 8,
            ],
            [
                'label' => 'The Talk Show',
                'icon'  => '5-talk-show',
                'standard_id' => 8,
            ],
            [
                'label' => 'Speed Maths',
                'icon'  => '5-speed-maths',
                'standard_id' => 8,
            ],
            [
                'label' => 'Panorama',
                'icon'  => '5-panorama',
                'standard_id' => 8,
            ],
            [
                'label' => 'Smart Brain All in One',
                'icon'  => '5-smart-brain',
                'standard_id' => 8,
            ],
            [
                'label' => 'Drawing Book',
                'icon'  => '5-draw',
                'standard_id' => 8,
            ],
            [
                'label' => 'Hands On Science',
                'icon'  => '5-hands-sci',
                'standard_id' => 8,
            ],
            [
                'label' => 'Sulabh Bharti Marathi',
                'icon'  => '5-marathi',
                'standard_id' => 8,
            ],
            [
                'label' => 'File 7',
                'icon'  => '5-file-7',
                'standard_id' => 8,
            ],
            [
                'label' => 'Notebook 21x29',
                'icon'  => '5-notebook',
                'standard_id' => 8,
            ],
            [
                'label' => 'Living Grammar',
                'icon'  => '5-living-grm',
                'standard_id' => 8,
            ],
            [
                'label' => 'Coding Computing Skills',
                'icon'  => '6-code-comp',
                'standard_id' => 9,
            ],
            [
                'label' => 'Hindi Vasant Part',
                'icon'  => '6-vasant-hin',
                'standard_id' => 9,
            ],
            [
                'label' => 'Modern English Reader',
                'icon'  => '6-mor-eng-read',
                'standard_id' => 9,
            ],
            [
                'label' => 'Social and Political Life',
                'icon'  => '6-soc-pol-life',
                'standard_id' => 9,
            ],
            [
                'label' => 'The Earth our Habitat Geography',
                'icon'  => '6-geo',
                'standard_id' => 9,
            ],
            [
                'label' => 'Our Past History',
                'icon'  => '6-history',
                'standard_id' => 9,
            ],
            [
                'label' => 'Relife Notebook',
                'icon'  => '6-relife-otebook',
                'standard_id' => 9,
            ],
            [
                'label' => 'Drawing Book',
                'icon'  => '6-draw',
                'standard_id' => 9,
            ],
            [
                'label' => 'Hands On Science',
                'icon'  => '6-hands-sci',
                'standard_id' => 9,
            ],
            [
                'label' => 'Sulabh Bharti Marathi',
                'icon'  => '6-marathi',
                'standard_id' => 9,
            ],
            [
                'label' => 'File 5',
                'icon'  => '6-file-5',
                'standard_id' => 9,
            ],
            [
                'label' => 'Living Grammar',
                'icon'  => '6-living-grm',
                'standard_id' => 9,
            ],
            [
                'label' => 'Speed Maths',
                'icon'  => '6-speed-math',
                'standard_id' => 9,
            ],
        ];
        foreach ($subjects as $subject) {
            $input = [
                'label' => json_encode($subject['label']),
                'description' => json_encode($subject['label']),
                'icon' => $subject['icon'],
                'language_id' => 1,
                'parent_id' => NULL,
                'board_id' => 1,
                'standard_id' => $subject['standard_id'],
                'created_by' => 1,
                'updated_by' => 1,
            ];
            Subject::create($input);
        }
    }
}
