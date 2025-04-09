<?php

namespace Xefi\Faker\FrBe\Extensions;

use Xefi\Faker\Extensions\Extension;

class AddressExtension extends Extension
{
    protected $provinces = [
        'Brabant Wallon', 'Hainaut', 'Liège', 'Luxembourg', 'Namur', 'Anvers', 'Brabant Flamand',
        'Flandre Occidentale', 'Flandre Orientale', 'Flandre', 'Bruxelles-Capitale',
    ];

    protected $regions = [
        'Bruxelles-Capitale', 'Flandre', 'Wallonie',
    ];

    protected $cities = [
        'Bruxelles', 'Anvers', 'Liège', 'Charleroi', 'Bruges', 'Namur', 'Leuven', 'Mons', 'La Louvière', 'Arlon',
        'Ottignies-Louvain-la-Neuve', 'Wavre', 'Hasselt', 'Tournai', 'Seraing', 'Genk', 'Sint-Niklaas', 'Kortrijk',
        'Schaerbeek', 'Ixelles', 'Anderlecht', 'Uccle', 'Jodoigne',
    ];

    protected $streetTypes = ['Rue', 'Avenue', 'Boulevard', 'Chemin', 'Impasse', 'Place', 'Quai', 'Allée', 'Voie', 'Cours'];

    protected $streetNames = [
        'Victor Hugo', 'Jean Jaurès', 'de la Paix', 'des Lilas', 'du Chêne', 'de l\'Église', 'de la République',
        'de Gaulle', 'Molière', 'Voltaire', 'Pasteur', 'Camille Claudel', 'des Fleurs', 'des Écoles', 'des Acacias',
        'du Général Leclerc', 'des Champs', 'de la Liberté', 'de la Fontaine', 'Saint-Martin', 'Jean Moulin',
        'Jules Ferry', 'Louis Pasteur', 'Albert Camus', 'André Malraux', 'de la Gare', 'des Cerisiers', 'des Rosiers',
        'de la Forêt', 'des Peupliers', 'du Château', 'des Sources', 'de la Plage', 'des Prés', 'des Vignes',
        'des Marronniers', 'du Parc', 'des Horizons', 'du Stade', 'de Bellevue', 'du Moulin', 'de la Tuilerie'
    ];

    public function region(): string
    {
        return $this->pickArrayRandomElement($this->regions);
    }

    public function province(): string
    {
        return $this->pickArrayRandomElement($this->provinces);
    }

    public function city(): string
    {
        return $this->pickArrayRandomElement($this->cities);
    }

    public function postcode(): int
    {
        return $this->randomizer->getInt(1000, 9999);
    }

    public function houseNumber(): int
    {
        return $this->randomizer->getInt(1, 2000);
    }

    public function streetName(): string
    {
        $streetType = $this->pickArrayRandomElement($this->streetTypes);
        $name = $this->pickArrayRandomElement($this->streetNames);

        return sprintf('%s %s', $streetType, $name);
    }

    public function streetAddress(): string
    {
        $streetName = $this->streetName();
        $houseNumber = $this->houseNumber();

        return sprintf('%s %d', $streetName, $houseNumber);
    }

    public function fullAddress(): string
    {
        $streetAddress = $this->streetAddress();
        $postcode = $this->postcode();
        $city = $this->city();
        return sprintf('%s, %s %s', $streetAddress, $postcode, $city);
    }
}
