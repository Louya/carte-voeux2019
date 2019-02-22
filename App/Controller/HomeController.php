<?php

namespace App\Controller;

use Framework\Controller;

class HomeController extends Controller{

    /**Route '/ */
    public function index(){
        return $this->twig->render('home.twig', []);
    }

    /**Route '/mail */
    public function mail(){

        //Récupération des variables du formulaire
        $nameFrom = $_POST['nomExpediteur'];
        $nameTo = $_POST['nomDestinataire'];
        $emailTo = $_POST['mailDestinataire'];
        
        //Définition des paramètres du mail
        $to = $emailTo;
    
        $subject = $nameFrom.' vous a envoyé une carte de voeux animée !';
        
        $headers = 'MIME-Version: 1.0' . "\n";
        
        $headers .= 'Content-Type: text/html; charset=UTF-8' . "\n";
        
        $msg = $this->twig->render('mail.twig', array('prenom'=>$nameFrom, 'name'=>$nameTo));
        // $msg = 'coucou';
        $headers .= 'From: SpaceCard 2019';
        
        //Envoie du mail
        mail($to, $subject, $msg, $headers);

        //Message à rendre
        $message = 'Votre carte a bien été envoyée ! :D';
        //Rendu de la page de message
        return $this->twig->render('message.twig', ['message'=> $message]);
    }
}