<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/11/2018
 * Time: 16:26
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\DTO\ContactDTO;
use App\Form\ContactType;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact_page")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        $contact = new ContactDTO();
        $formContact = $this
            ->createForm(ContactType::class, $contact)
            ->handleRequest($request);

        if ($formContact->isSubmitted() && $formContact->isValid()) {
            // Test recaptcha
            $secret = getenv('API_SECRET'); // votre clé privée
            $response = $_POST['g-recaptcha-response'];// Paramètre renvoyé par le recaptcha
            $remoteip = $_SERVER['REMOTE_ADDR'];// On récupère l'IP de l'utilisateur
            $api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
                . $secret
                . "&response=" . $response
                . "&remoteip=" . $remoteip;

            $decode = json_decode(file_get_contents($api_url), true);

            if ($decode['success'] == true) {
                $monMail = getenv('mail_address');

                $message = (new \Swift_Message("Cocorico Digital - Demande de devis"))
                    ->setFrom(['cocorico-digital@mail.com' => 'Site web Cocorico Digital'])
                    ->setTo($monMail)
                    ->setBody(
                        $this->renderView(
                            'mail/mailContact.html.twig', [
                                'contact' => $contact
                            ]
                        ),
                        'text/html'
                    );

                $mailer->send($message);

                $this->addFlash('notice', "COCORICO, message bien reçu ! Nous revenons vers vous au plus vite.");

                return $this->redirect($request->getUri());
            } else {
                $this->addFlash('error', "Votre mail n'a pu être envoyé. Veuillez réessayer.");

                return $this->redirect($request->getUri());
            }
        }

        return $this->render('contact.html.twig', [
            'form' => $formContact->createView(),
        ]);
    }
}