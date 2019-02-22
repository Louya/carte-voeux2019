<?php

namespace App\Controller;

use Framework\Controller;

class CardController extends Controller {


    /**Route '/carte */
    public function carte($params){

        extract($params); 
        return $this->twig->render('carte.twig', ['prenom'=>$name]);
    }
}

