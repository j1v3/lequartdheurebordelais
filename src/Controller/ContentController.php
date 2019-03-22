<?php
// src/Controller/BlogController.php
  
namespace App\Controller;
  
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Content controller.
 */
class ContentController extends AbstractController
{
    /**
     * Show a content
     *
     * @Route("/content/{slug}", name="content_show", slug="\d+")
     * @Method("GET")
     */
    public function show($slug)
    {
        $em = $this->getDoctrine()->getManager();
  
        $content = $em->getRepository('App:Content')->find($slug);
  
        if (!$content) {
        throw $this->createNotFoundException('Unable to find this content !');
        }
  
        $comments = $em->getRepository('App:Comment')
                       ->getCommentsForContent($content->getId());
  
        return $this->render('content/show.html.twig', array(
            'content'      => $content,
            'comments'  => $comments
        ));        
    }
     
}