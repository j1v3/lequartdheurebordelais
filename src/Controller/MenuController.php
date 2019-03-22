<?php
// src/controller/MenuController.php
namespace App\Controller;
  
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Contact;
use App\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class MenuController extends AbstractController
{
	/**
     * @Route("/menu", name="menu")
     */
	public function display()
	{
        $em = $this->getDoctrine()->getManager();
  
        $categories = $em->getRepository('App:Category')->findCategories();
  
        if (!$categories) {
        throw $this->createNotFoundException('Unable to find category !');
        }

        return $this->render('menu/display.html.twig', array(
            'categories' => $categories,
        ));   
	}
}