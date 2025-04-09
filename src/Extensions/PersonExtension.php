<?php

namespace Xefi\Faker\FrBe\Extensions;

use Xefi\Faker\Extensions\PersonExtension as BasePersonExtension;

class PersonExtension extends BasePersonExtension
{
    public function getLocale(): ?string
    {
        return 'fr_BE';
    }

    protected $firstNameMale = [
        'Jean', 'Marc', 'Luc', 'Michel', 'Patrick', 'Philippe', 'Daniel', 'Alain', 'Jacques', 'Claude', 'André',
        'Christian', 'Eric', 'Bernard', 'Pierre', 'Georges', 'Roger', 'René', 'Frédéric', 'Yves', 'Guy', 'Paul',
        'Christophe', 'Olivier', 'Joseph', 'Jérôme', 'Didier', 'Vincent', 'Nicolas', 'Pascal', 'Laurent', 'Hugues',
        'Gilbert', 'Serge', 'Fabrice', 'Etienne', 'Antoine', 'Arnaud', 'Thierry', 'Sébastien', 'Julien', 'Hervé',
        'Benjamin', 'Kevin', 'Maxime', 'Alexandre', 'Jonathan', 'David',
    ];

    protected $firstNameFemale = [
        'Marie', 'Anne', 'Isabelle', 'Sophie', 'Christine', 'Nathalie', 'Catherine', 'Nicole', 'Monique', 'Lucie',
        'Julie', 'Martine', 'Caroline', 'Chantal', 'Claudine', 'Elise', 'Laetitia', 'Valérie', 'Sandrine', 'Hélène',
        'Sylvie', 'Françoise', 'Alice', 'Jeanne', 'Colette', 'Emilie', 'Audrey', 'Sarah', 'Laura', 'Manon', 'Camille',
        'Mathilde', 'Amandine', 'Delphine', 'Louise', 'Florence', 'Marianne', 'Élodie', 'Fanny', 'Inès', 'Zoé',
        'Anaïs', 'Emma', 'Claire', 'Léa', 'Pauline',
    ];

    protected $lastName = [
        'Peeters', 'Janssens', 'Maes', 'Jacobs', 'Mertens', 'Willems', 'Claes', 'Goossens', 'De Smet', 'Dubois',
        'Lambert', 'Dupont', 'Simon', 'Leroy', 'Leclercq', 'Michel', 'François', 'Martin', 'Thomas', 'Robert',
        'Lemaire', 'Henry', 'Denis', 'Renard', 'Gillet', 'Hubert', 'Carlier', 'Masson', 'Declercq', 'Dumont',
        'Rousseau', 'Durand', 'Delcourt', 'Van Damme', 'Lejeune', 'Colin', 'Noël', 'Marchal', 'Herman', 'Collard',
        'Pirot', 'Verhoeven', 'Van de Velde', 'Desmet', 'De Vos', 'De Clercq', 'De Wolf', 'De Backer',
    ];

    protected $titleMale = ['M.', 'Dr.', 'Pr.', 'Me.'];
    protected $titleFemale = ['Mme.', 'Mlle', 'Dr.', 'Pr.', 'Me.'];

    public function rrn(?string $gender = null, bool $formatted = false): string
    {
        $year = $this->randomizer->getInt(0, 99);
        $month = $this->randomizer->getInt(1, 12);
        $day = $this->randomizer->getInt(1, 28);

        $birthDate = sprintf('%02d%02d%02d', $year, $month, $day);

        if ($gender === 'M') {
            $order = $this->randomizer->getInt(1, 997);
            if ($order % 2 === 0) {
                $order++;
            }
        } elseif ($gender === 'F') {
            $order = $this->randomizer->getInt(2, 998);
            if ($order % 2 !== 0) {
                $order++;
            }
        } else {
            $order = $this->randomizer->getInt(1, 998);
        }

        $orderStr = str_pad((string) $order, 3, '0', STR_PAD_LEFT);

        $baseNumber = $birthDate . $orderStr;

        // If birth year is before 2000, checksum is calculated with 97 - (number % 97)
        $check = 97 - ((int) $baseNumber % 97);

        // Since 2000, the number is prefixed with "2"
        if ($year >= 0 && $year < 20) {
            $baseNumberWith2 = '2' . $baseNumber;
            $check = 97 - ((int) $baseNumberWith2 % 97);
        }

        $checkStr = str_pad((string) $check, 2, '0', STR_PAD_LEFT);

        $rrn = $baseNumber . $checkStr;

        if ($formatted) {
            $rrn = substr($rrn, 0, 2) . '.' . substr($rrn, 2, 2) . '.' . substr($rrn, 4, 2) . '-' . substr($rrn, 6, 3) . '.' . substr($rrn, 9, 2);
        }

        return $rrn;
    }
}
