<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'question' => 'How can the high-voltage wiring harness in the motor vehicle be identified?',
                'type' => 'multiple_choice'
            ],
            [
                'question' => 'A defective bulb is to be replaced. What should I look for when selecting a replacement bulb?',
                'type' => 'multiple_choice'
            ],
            [
                'question' => 'What type of current is generated in the stator windings of a three-phase generator?',
                'type' => 'multiple_choice'
            ],
            [
                'question' => 'The following wheel is mounted on a customer vehicle: Tire width b = 205 mm, rim diameter d = 381 mm and tire height h = 133.25 mm.',
                'type' => 'multiple_choice'
            ],
            [
                'question' => 'Which measuring device is shown in the picture?',
                'type' => 'multiple_choice'
            ],
            [
                'question' => 'List four points that require special attention when visually inspecting and installing brake lines.',
                'type' => 'blanks_no_sequence'
            ],
            [
                'question' => 'State the special feature of the VAS 6056/6 special tool.',
                'type' => 'dropdown'
            ],
            [
                'question' => 'You want to renew the damaged piece of the brake line. Determine the necessary steps in the correct order before you can work with the peeling tool.',
                'type' => 'blanks_sequence'
            ],
            [
                'question' => 'State the task of the peeling tool.',
                'type' => 'textarea'
            ]
            
        ];

        DB::table('questions')->truncate();
        DB::table('questions')->insert($questions);

        $options = [
            [
                'question_id' => 1,
                'option' => 'At the red coloring',
                'is_correct' => 0
            ],
            [
                'question_id' => 1,
                'option' => 'Black coloring',
                'is_correct' => 0
            ],
            [
                'question_id' => 1,
                'option' => 'Orange coloring',
                'is_correct' => 1
            ],
            [
                'question_id' => 1,
                'option' => 'Green coloring',
                'is_correct' => 0
            ],
            [
                'question_id' => 1,
                'option' => 'On the yellow coloring',
                'is_correct' => 0
            ],
            [
                'question_id' => 2,
                'option' => 'Only on the wattage',
                'is_correct' => 0
            ],
            [
                'question_id' => 2,
                'option' => 'Only on the volt number',
                'is_correct' => 0
            ],
            [
                'question_id' => 2,
                'option' => 'On the amperage and the wattage',
                'is_correct' => 0
            ],
            [
                'question_id' => 2,
                'option' => 'On the volts and watts',
                'is_correct' => 1
            ],
            [
                'question_id' => 2,
                'option' => 'On the volt and the ampere number',
                'is_correct' => 0
            ],
            [
                'question_id' => 3,
                'option' => 'Direct current',
                'is_correct' => 0
            ],
            [
                'question_id' => 3,
                'option' => 'Pulsating alternating current',
                'is_correct' => 0
            ],
            [
                'question_id' => 3,
                'option' => 'Rectified alternating current',
                'is_correct' => 0
            ],
            [
                'question_id' => 3,
                'option' => 'Single-phase alternating current',
                'is_correct' => 0
            ],
            [
                'question_id' => 3,
                'option' => 'Three-phase alternating current',
                'is_correct' => 1
            ],
            //4
            [
                'question_id' => 4,
                'option' => 'd = 5,2 Inch (Zoll)',
                'is_correct' => 0
            ],
            [
                'question_id' => 4,
                'option' => 'd = 8,0 Inch (Zoll)',
                'is_correct' => 0
            ],
            [
                'question_id' => 4,
                'option' => 'd = 15,0 Inch (Zoll)',
                'is_correct' => 1
            ],
            [
                'question_id' => 4,
                'option' => 'd = 18,0 Inch (Zoll)',
                'is_correct' => 0
            ],
            [
                'question_id' => 4,
                'option' => 'd = 20,0 Inch (Zoll)',
                'is_correct' => 0
            ],
           
            //5
            [
                'question_id' => 5,
                'option' => 'A multimeter with current clamp in analog version',
                'is_correct' => 0
            ],
            [
                'question_id' => 5,
                'option' => 'A multimeter with a digital current clamp',
                'is_correct' => 1
            ],
            [
                'question_id' => 5,
                'option' => 'One multimeter with voltage clamp in analog version',
                'is_correct' => 0
            ],
            [
                'question_id' => 5,
                'option' => 'One multimeter with voltage clamp in digital version',
                'is_correct' => 0
            ],
            [
                'question_id' => 5,
                'option' => 'One digital multimeter with fixing possibility',
                'is_correct' => 0
            ],

            //6
            [
                'question_id' => 6,
                'option' => 'Do not be nodded',
                'is_correct' => 1
            ],
            [
                'question_id' => 6,
                'option' => 'not rub against the bodywork or vehicle axles',
                'is_correct' => 1
            ],
            [
                'question_id' => 6,
                'option' => 'not be installed under tension',
                'is_correct' => 1
            ],
            [
                'question_id' => 6,
                'option' => 'not be affected by heavy rust',
                'is_correct' => 1
            ],
            [
                'question_id' => 6,
                'option' => 'not have any previous damage',
                'is_correct' => 1
            ],
            [
                'question_id' => 6,
                'option' => 'not be squeezed',
                'is_correct' => 1
            ],
            [
                'question_id' => 6,
                'option' => 'not have scuff marks',
                'is_correct' => 1
            ],
            [
                'question_id' => 6,
                'option' => 'not have rust scars',
                'is_correct' => 1
            ],

            //7
            [
                'question_id' => 7,
                'option' => 'The VAS 6056/6 flared jaws are to be used for brown brake lines.',
                'is_correct' => 0
            ],
            [
                'question_id' => 7,
                'option' => 'The VAS 6056/6 flaring jaws are to be used for yellow brake lines.',
                'is_correct' => 0
            ],
            [
                'question_id' => 7,
                'option' => 'The VAS 6056/6 flared jaws are to be used for black brake lines.',
                'is_correct' => 1
            ],
            [
                'question_id' => 7,
                'option' => 'The VAS 6056/6 flared jaws are to be used for blue brake lines.',
                'is_correct' => 0
            ],

            //8
            [
                'question_id' => 8,
                'option' => 'Unscrew the brake line from the wheel brake cylinder, collect the brake fluid that leaks out and dispose of it in accordance with the regulations.',
                'is_correct' => 1
            ],
            [
                'question_id' => 8,
                'option' => 'Cut the brake line at a suitable point (straight, free-flowing section) using the pipe cutter.',
                'is_correct' => 1
            ],
            [
                'question_id' => 8,
                'option' => 'Remove the piece to be replaced',
                'is_correct' => 1
            ],
            [
                'question_id' => 8,
                'option' => 'Degrease brake line surface',
                'is_correct' => 1
            ],
            [
                'question_id' => 8,
                'option' => 'Clamp the brake line in the grip pliers so that approx. 50 mm protrudes from the plastic jaws.',
                'is_correct' => 1
            ],

            //9
            [
                'question_id' => 9,
                'option' => 'The peeling tool is used to remove the coating from the brake line and also to deburr it.',
                'is_correct' => 1
            ]
        ];

        DB::table('options')->truncate();
        DB::table('options')->insert($options);
    }
}
