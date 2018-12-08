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
    public function contact(Request $request)
    {
        $contact = new ContactDTO();
        $formContact = $this
            ->createForm(ContactType::class, $contact)
            ->handleRequest($request);

        if ($formContact->isSubmitted() && $formContact->isValid()) {
            $monMail = $this->container->getParameter('mail_address');

            $message = (new \Swift_Message("Cocorico Digital - Demande de devis"))
                ->setFrom(['cocorico-digital@mail.com' => 'Site web Cocorico Digital'])
                ->setTo($monMail)
                ->setBody(
                    $this->renderView(
                        'contact.html.twig', [
                            'contact' => $contact
                        ]
                    ),
                    'text/html'
                );

            try {
                $this->get('mailer')->send($message);
            } catch (\Exception $exception) {
            }

            $this->addFlash('notice', "Votre mail a bien été envoyé.");

            //$this->addFlash('error', "Votre mail n'a pu être envoyé. Veuillez réessayer.");

            return $this->render('contact.html.twig', [
                'form' => $formContact->createView()
            ]);
        }

        return $this->render('contact.html.twig', [
            'form' => $formContact->createView(),
        ]);
    }
}