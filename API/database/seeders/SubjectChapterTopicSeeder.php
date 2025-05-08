<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Chapter;
use App\Models\Topic;

class SubjectChapterTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = [
            [
                'label' => json_encode('English'),
                'description' => json_encode('Description for English subject.'),
                'icon' => 'icon_english',
                'language_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'parent_id' => NULL,
                'board_id' => 1,
                'standard_id' => 1,
                'tags' => ['english'],
                'chapters' => [
                    [
                        'label' => json_encode('A Letter To God'),
                        'description' => json_encode('This story is about Lencho, a dedicated farmer and how he places trust in God to help him out of his misery. Lencho had hoped for a good harvest, but a hail storm destroyed his crops. He was devastated, but he firmly believed that God would help him. He knew how to write, so he wrote a letter to God, asking him to send 100 pesos and posted the letter.

                        The postman noticed the letter and pulled it out of the mailbox. Upon seeing whom it was addressed to, he started laughing loudly. He ran to the postmaster to show him the strange letter. As the postmaster read the contents of the letter, he became very serious. He decided to help Lencho financially by asking for donations from the post office employees. The postmaster himself decided to put a part of his salary into helping Lencho.
                        
                        However, they could only raise 70 pesos and decide to put it in an envelope and sign it off in the name of God. The following Sunday, Lencho visited the post office and asked if there was any letter for him. The postmaster handed him the letter. Lencho did not get surprised seeing the money but got dismayed upon counting it. He was sure that God could not make a mistake, so he took paper and ink, wrote another letter to God, and put it in the mailbox.
                        
                        After Lencho left, the postmaster and employees read the letter. In it, Lencho complained to God that he only received 70 pesos. He also asked God to send him the rest of the money this time. Then he asked God not to send money through the mail as he thought the post office employees were a group of scammers.
                        
                        Through this English Chapter 1 A letter to God, we learn how faith can be a moving force in our lives, but extreme greed and ungratefulness can act as boulders in our path towards kindness.'),
                        'icon' => 'icon_english_alettertoGOD',
                        'language_id' => 1,
                        'created_by' => 1,
                        'updated_by' => 1,
                        'parent_id' => NULL,
                        'board_id' => 1,
                        'standard_id' => 1,
                        'tags' => ['english', 'a-letter-to-GOD'],
                        'topics' => [
                            [
                                'label' => json_encode('Having Faith'),
                                'description' => json_encode('Having faith'),
                                'icon' => 'icon_faith',
                                'language_id' => 1,
                                'created_by' => 1,
                                'updated_by' => 1,
                                'parent_id' => NULL,
                                'board_id' => 1,
                                'standard_id' => 1,
                                'tags' => ['english', 'a-letter-to-GOD', 'faith']
                            ],
                            [
                                'label' => json_encode('Testing'),
                                'description' => json_encode('Testing'),
                                'icon' => 'icon_testing',
                                'language_id' => 1,
                                'created_by' => 1,
                                'updated_by' => 1,
                                'parent_id' => NULL,
                                'board_id' => 1,
                                'standard_id' => 1,
                                'tags' => ['english', 'a-letter-to-GOD', 'faith']
                            ]
                        ]
                    ],
                    [
                        'label' => json_encode('Nelson Mandela Long Walk To Freedom'),
                        'description' => json_encode("Nelson Mandela's 'Desire for Freedom' is about the freedom struggle in South Africa. Born in the year 1918, Mandela became the first South African president who got democratically elected. On May 10, 1994, Nelson Mandela was sworn in as the first black president of South Africa. Mandela thanked all the distinguished guests in his speech. Mandela assured his country's people that their country would never suffer the same repression as it had before."),
                        'icon' => 'icon_english',
                        'language_id' => 1,
                        'created_by' => 1,
                        'updated_by' => 1,
                        'parent_id' => NULL,
                        'board_id' => 1,
                        'standard_id' => 1,
                        'tags' => ['english'],
                        'topics' => [
                            [
                                'label' => json_encode('Comprehension Check'),
                                'description' => json_encode('Comprehension Check.'),
                                'icon' => 'icon_english',
                                'language_id' => 1,
                                'created_by' => 1,
                                'updated_by' => 1,
                                'parent_id' => NULL,
                                'board_id' => 1,
                                'standard_id' => 1,
                                'tags' => ['english']
                            ]
                        ]
                    ]
                    
                ]
            ],
            [
                'label' => json_encode('Mathematics'),
                'description' => json_encode('Mathematics.'),
                'icon' => 'icon_maths',
                'language_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'parent_id' => NULL,
                'board_id' => 1,
                'standard_id' => 1,
                'tags' => ['mathematics'],
                'chapters' => [
                    [
                        'label' => json_encode('Real Number'),
                        'description' => json_encode("Euclid's division theorem states that if 'a = bq + r', where the range of r lies between 0 and b. When Euclid's division algorithm is applied on given two positive integers, if the remainder (r) is zero, then 'b' is the HCF of 'a'. The Fundamental Theorem of Arithmetic states that every composite number can be written as the product of the powers of primes."),
                        'icon' => 'icon_real_number',
                        'language_id' => 1,
                        'created_by' => 1,
                        'updated_by' => 1,
                        'parent_id' => NULL,
                        'board_id' => 1,
                        'standard_id' => 1,
                        'tags' => ['mathematics', 'real_number'],
                        'topics' => [
                            [
                                'label' => json_encode('Use Euclid’s division algorithm to find the HCF of'),
                                'description' => json_encode('As you can see, from the question 225 is greater than 135. Therefore, by Euclid’s division algorithm, we have,'),
                                'icon' => 'icon_real_number',
                                'language_id' => 1,
                                'created_by' => 1,
                                'updated_by' => 1,
                                'parent_id' => NULL,
                                'board_id' => 1,
                                'standard_id' => 1,
                                'tags' => ['real_number']
                            ]
                        ]
                    ]
                ]
            ]
        ];

        foreach($inputs as $input)
        {
            // Firstly we will add subject
            $subject = [
                'label' => $input['label'],
                'description' => $input['description'],
                'icon' => $input['icon'],
                'language_id' => $input['language_id'],
                'created_by' => $input['created_by'],
                'updated_by' => $input['updated_by'],
                'parent_id' => $input['parent_id'],
                'board_id' => $input['board_id'],
                'standard_id' => $input['standard_id'],
            ];
            $subjectCreated = Subject::create($subject);
            $subjectCreated->attachTags($input['tags']);

            // Secondly we will add chapters
            foreach($input['chapters'] as $chapter) {
                //print_r($chapter);
                $chapterInput = [
                    'label' => $chapter['label'],
                    'description' => $chapter['description'],
                    'icon' => $chapter['icon'],
                    'parent_id' => $subjectCreated->id,
                    'language_id' => $chapter['language_id'],
                    'created_by' => $chapter['created_by'],
                    'updated_by' => $chapter['updated_by'],
                    'board_id' => $input['board_id'],
                    'standard_id' => $input['standard_id'],
                ];
                $chapterCreated = Chapter::create($chapterInput);
                $chapterCreated->attachTags($chapter['tags']);

                foreach($chapter['topics'] as $topic) {
                    $toicInput = [
                        'label' => $topic['label'],
                        'description' => $topic['description'],
                        'icon' => $topic['icon'],
                        'parent_id' => $chapterCreated->id,
                        'language_id' => $topic['language_id'],
                        'created_by' => $topic['created_by'],
                        'updated_by' => $topic['updated_by'],
                        'board_id' => $input['board_id'],
                        'standard_id' => $input['standard_id'],
                    ];
                    $topicCreated = Topic::create($toicInput);
                    $topicCreated->attachTags($topic['tags']);
                }
            }
        }
    }
}
