<?php
// src/Twig/AppExtension.php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('listePresta', [$this, 'getListePrestaJs']),
        ];
    }

    /**
     * Undocumented function
     *
     * @param [type] $datas
     * @return void
     */
    public function getListePrestaJs($datas){
        $s = '[';

        $i=0;
        foreach($datas as $categorie){
            if($i==0){
                $s .= '"' . $categorie->getNom() . '"';
            }else{
                $s .= ', "' . $categorie->getNom() . '"';
            }
            $i++;
        }

        $s .= ']';
        return $s;
    }
}