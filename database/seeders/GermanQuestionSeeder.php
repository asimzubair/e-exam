<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GermanQuestionSeeder extends Seeder
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
                'question' => 'Woran ist der Hochvoltkabelstrang im Kraftfahrzeug zu erkennen?',
                'type' => 'multiple_choice'
            ],
            [
                'question' => 'Eine defekte Glühlampe soll ersetzt werden. Worauf ist bei der Auswahl der Ersatzglühlampe unter anderem zu achten?',
                'type' => 'multiple_choice'
            ],
            [
                'question' => 'Welche Stromart entsteht in den Ständerwicklungen eines Drehstromgenerators?',
                'type' => 'multiple_choice'
            ],
            [
                'question' => 'Auf einem Kundenfahrzeug ist folgendes Rad montiert: Reifenbreite b = 205 mm, Felgendurchmesser d = 381 mm und Reifenhöhe h = 133,25 mm.',
                'type' => 'multiple_choice'
            ],
            [
                'question' => 'Welches Messgerät wird im Bild gezeigt?',
                'type' => 'multiple_choice'
            ],
            [
                'question' => 'Nennen Sie vier Punkte, die bei der Sichtprüfung und Montage von Bremsleitungen besonders zu beachten sind.',
                'type' => 'blanks_no_sequence'
            ],
            [
                'question' => 'Nennen Sie die Besonderheit des Sonderwerkzeugs VAS 6056/6.',
                'type' => 'dropdown'
            ],
            [
                'question' => 'Sie wollen das beschädigte Stück der Bremsleitung erneuern. Ermitteln Sie die erforderlichen Arbeitsschritte in der richtigen Reihenfolge, bevor Sie mit dem Schälwerkzeug arbeiten können.',
                'type' => 'blanks_sequence'
            ],
            [
                'question' => 'Nennen Sie die Aufgabe des Schälwerkzeugs.',
                'type' => 'textarea'
            ],
            [
                'question' => 'Erstellen Sie für die durchgeführten Arbeiten eine Kundenrechnung.',
                'type' => 'invoice'
            ]
        ];

        DB::table('questions')->truncate();
        DB::table('questions')->insert($questions);

        $options = [
            [
                'question_id' => 1,
                'option' => 'An der roten Einfärbung',
                'is_correct' => 0
            ],
            [
                'question_id' => 1,
                'option' => 'An der schwarzen Einfärbung',
                'is_correct' => 0
            ],
            [
                'question_id' => 1,
                'option' => 'An der orangen Einfärbung',
                'is_correct' => 1
            ],
            [
                'question_id' => 1,
                'option' => 'An der grünen Einfärbung',
                'is_correct' => 0
            ],
            [
                'question_id' => 1,
                'option' => 'An der gelben Einfärbung',
                'is_correct' => 0
            ],
            [
                'question_id' => 2,
                'option' => 'Nur auf die Wattzahl',
                'is_correct' => 0
            ],
            [
                'question_id' => 2,
                'option' => 'Nur auf die Voltzahl',
                'is_correct' => 0
            ],
            [
                'question_id' => 2,
                'option' => 'Auf die Ampere- und die Wattzahl',
                'is_correct' => 0
            ],
            [
                'question_id' => 2,
                'option' => 'Auf die Volt- und die Wattzahl',
                'is_correct' => 1
            ],
            [
                'question_id' => 2,
                'option' => 'Auf die Volt- und die Amperezahl',
                'is_correct' => 0
            ],
            [
                'question_id' => 3,
                'option' => 'Gleichstrom',
                'is_correct' => 0
            ],
            [
                'question_id' => 3,
                'option' => 'Pulsierender Wechselstrom',
                'is_correct' => 0
            ],
            [
                'question_id' => 3,
                'option' => 'Gleichgerichteter Wechselstrom',
                'is_correct' => 0
            ],
            [
                'question_id' => 3,
                'option' => 'Einphasiger Wechselstrom',
                'is_correct' => 0
            ],
            [
                'question_id' => 3,
                'option' => 'Dreiphasiger Wechselstrom',
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
                'option' => 'Ein Vielfachmessgerät mit Strommesszange in analoger Ausführung',
                'is_correct' => 0
            ],
            [
                'question_id' => 5,
                'option' => 'Ein Vielfachmessgerät mit Strommesszange in digitaler Ausführung',
                'is_correct' => 1
            ],
            [
                'question_id' => 5,
                'option' => 'Ein Vielfachmessgerät mit Spannungszange in analoger Ausführung',
                'is_correct' => 0
            ],
            [
                'question_id' => 5,
                'option' => 'Ein Vielfachmessgerät mit Spannungszange in digitaler Ausführung',
                'is_correct' => 0
            ],
            [
                'question_id' => 5,
                'option' => 'Ein Vielfachmessgerät mit Befestigungsmöglichkeit in digitaler Ausführung',
                'is_correct' => 0
            ],

            //6
            [
                'question_id' => 6,
                'option' => 'Nicht genickt werden',
                'is_correct' => 1
            ],
            [
                'question_id' => 6,
                'option' => 'nicht an der Karosserie oder den Fahrzeugachsen scheuern',
                'is_correct' => 1
            ],
            [
                'question_id' => 6,
                'option' => 'nicht unter Spannung verbaut werden',
                'is_correct' => 1
            ],
            [
                'question_id' => 6,
                'option' => 'nicht von starken Rost befallen werden',
                'is_correct' => 1
            ],
            [
                'question_id' => 6,
                'option' => 'keine Vorbeschödigungen aufweisen',
                'is_correct' => 1
            ],
            [
                'question_id' => 6,
                'option' => 'nicht gequescht sein',
                'is_correct' => 1
            ],
            [
                'question_id' => 6,
                'option' => 'keine Scheuerstellen',
                'is_correct' => 1
            ],
            [
                'question_id' => 6,
                'option' => 'Keine Rostnarben',
                'is_correct' => 1
            ],

            //7
            [
                'question_id' => 7,
                'option' => 'Die Bördelbacken VAS 6056/6 sind für braune Bremsleitungen zu verwenden.',
                'is_correct' => 0
            ],
            [
                'question_id' => 7,
                'option' => 'Die Bördelbacken VAS 6056/6 sind für gelbe Bremsleitungen zu verwenden.',
                'is_correct' => 0
            ],
            [
                'question_id' => 7,
                'option' => 'Die Bördelbacken VAS 6056/6 sind für schwarze Bremsleitungen zu verwenden.',
                'is_correct' => 1
            ],
            [
                'question_id' => 7,
                'option' => 'Die Bördelbacken VAS 6056/6 sind für blaue Bremsleitungen zu verwenden.',
                'is_correct' => 0
            ],

            //8
            [
                'question_id' => 8,
                'option' => 'Bremsleitung vom Radbremszylinder abschrauben, die dabei auslaufende Bremsflüssigkeit auffangen und vorschriftsmäßig entsorgen',
                'is_correct' => 1
            ],
            [
                'question_id' => 8,
                'option' => 'Bremsleitung an geeigneter Stelle (gerades, freizugängiges Stück) mit dem Rohrabschneider durchtrennen',
                'is_correct' => 1
            ],
            [
                'question_id' => 8,
                'option' => 'Auszutauschendes Stück entfernen',
                'is_correct' => 1
            ],
            [
                'question_id' => 8,
                'option' => 'Bremsleitungsoberfläche entfetten',
                'is_correct' => 1
            ],
            [
                'question_id' => 8,
                'option' => 'Bremsleitung in der Gripzange so einklemmen, dass etwa 50 mm aus den Kunststoffbacken herausschauen',
                'is_correct' => 1
            ],


            //9
            [
                'question_id' => 9,
                'option' => 'Mit dem Schälwerkzeug wird die Beschichtung der Bremsleitung entfernt und auch entgratet.',
                'is_correct' => 1
            ],

            //10
            [
                'question_id' => 10,
                'option' => 'Gesamt: 224,79 EUR',
                'is_correct' => 1
            ]
        ];

        DB::table('options')->truncate();
        DB::table('options')->insert($options);
    }
}
