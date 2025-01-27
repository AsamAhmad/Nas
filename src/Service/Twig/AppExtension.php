<?php

namespace App\Service\Twig;


use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use App\Entity\Produit;

class AppExtension extends AbstractExtension
{
    /** Cette fonction permet de réduire la taille des 
     * onglets lors de la descriptions de la fiche produit */

    public function sumtabs()
    {
        return [
            new TwigFilter('summarize_tabs', function( $contenu ) {

                // Suppression des balises HTML
                $string = strip_tags($contenu);
                // Si mon $string est supérieur à 3, je continue
                if (strlen($string) > 3) {
                    // Je coupe ma chaine à 3 caractères
                    $stringCut = substr($string, 0, 3);
                    $string = substr($stringCut, 3, strrpos($stringCut, ' '));
                }
                return $string . '...';

            }, array( 'is_safe' => array( 'html' ) ) )
        ];
    }



    /** Cette fonction permet de réduire la taille des 
     * onglets lors de la descriptions de la fiche produit */

    public function getFilters()
    {
        return [

            new TwigFilter('summarize_categorie', function( $description ) {

                // Suppression des balises HTML
                $string = strip_tags($description);
                // Si mon $string est supérieur à 3, je continue
                if (strlen($string) > 300 ) {
                    // Je coupe ma chaine à 3 caractères
                    $stringCut = substr($string, 0, 200);
                    $string = substr($stringCut, 0);
                }
                return $string . '…';

            }, array( 'is_safe' => array( 'html' ) ) ),


            new TwigFilter('summarize', function( $contenu ) {

                // Suppression des balises HTML
                $string = strip_tags($contenu);
                // Si mon $string est supérieur à 150, je continue
                if (strlen($string) > 150 && strlen($string) < 21) {
                    // Je coupe ma chaine à 150
                    $stringCut = substr($string, 21, 150);
                    // Je m'assure de ne pas couper un mot.
                    // En recherchant la position du dernier espace.
                    $string = substr($stringCut, 21, strrpos($stringCut, ' '));
                
                return $string . '...';}

            }, array( 'is_safe' => array( 'html' ) ) ) ,
        ];
    }
}