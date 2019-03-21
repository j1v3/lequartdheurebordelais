<?php
//src/Controller/LocaleSwitchController.php
  
namespace App\Controller;
  
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LocaleSwitchController extends AbstractController {
    /**
     * @Route("/switchfrench", name="switch_language_french")
     */
    public function switchLanguageFrenchAction() {
        return $this->switchLanguage('fr');
    }

    /**
     * @Route("/switchenglish", name="switch_language_english")
     */
    public function switchLanguageEnglishAction() {
        return $this->switchLanguage('en');
    }
        
    private function switchLanguage($locale) {
        $this->get('session')->set('_locale', $locale);
        return $this->redirect($this->generateUrl('homepage'));
    }     
}