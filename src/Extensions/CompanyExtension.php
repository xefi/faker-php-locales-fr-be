<?php

namespace Xefi\Faker\FrBe\Extensions;

use Xefi\Faker\Extensions\Extension;

class CompanyExtension extends Extension
{
    public function getLocale(): string|null
    {
        return 'fr_BE';
    }

    private array $companies = [
        "Delhaize Groupe SA", "Bruxelles Innovation", "Namur Conseil SRL",
        "Liège Industrie", "Technobel Solutions", "Wallonie Développement",
        "Flandres Consulting", "Groupe Ardennes", "Espace Digital BE",
        "Studio Atomium", "Brabant Energie", "Solutions Hainaut",
        "Anvers Technologies", "BlueChips Belgium", "Charleroi Tech Group",
        "Pixel BXL", "BioNamur", "Société Générale de Wallonie",
        "Green Ardennes", "LuxTech SRL", "Média Mons",
        "Université Libre Conseil", "Port d'Anvers Logistique", "Neuchâteau Finance",
        "Binche Industrie", "Groupe Bruges", "Haute Meuse Design",
        "Invest BXL", "Tourisme & Culture BE", "Tournai Bâtiments"
    ];

    public function company(): string
    {
        return $this->pickArrayRandomElement($this->companies);
    }

    public function companyNumber(): string
    {
        return sprintf('%010d', $this->randomizer->getBytesFromString(implode(range(0, 9)), 9));
    }

    public function vat(): string
    {
        return 'BE' . $this->companyNumber();
    }
}
