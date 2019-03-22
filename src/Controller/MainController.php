<?php
// src/controller/MainController.php
namespace App\Controller;
  
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Contact;
use App\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('homepage/index.html.twig');
    }
  
    /**
     * @Route("/about", name="about")
     */
    public function about() {
        return $this->render('about/about.html.twig');
    }
  
    /**
     * @Route("/search", name="search")
     */
    public function search() {
        return $this->render('search/search.html.twig');
    }
 
    /**
     * @Route("/sidebar", name="sidebar")
     */
    public function sidebar() {
        return $this->render('sidebar/sidebar.html.twig');
    }
 
     /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        $enquiry = new Contact();
        $form = $this->createForm(ContactType::class, $enquiry);
     
         $this->request = $request;
            if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
     
     
            if ($form->isValid()) {
                // Perform some action, such as sending an email
                $message = (new \Swift_Message())
                    ->setSubject('Contact enquiry from Example')
                    ->setFrom('contact@lequartdheurebordealis.com')
                    ->setTo('contact@lequartdheurebordealis.com')
                    ->setBody($this->renderView('contact/contactEmail.txt.twig', array('enquiry' => $enquiry)))
                ;

                $mailer->send($message);

                $session = new Session();
                $session->getFlashbag()->add('blog-notice', 'Your contact enquiry was successfully sent. Thank you!');
  
                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('contact'));
            }
        }
     
        return $this->render('contact/contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
}