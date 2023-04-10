<?php

namespace App\Controller;

use App\Entity\Code;
use App\Entity\User;
use App\Security\EmailVerifier;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Symfony\Component\Mime\Address;
use Symfony\Component\Form\FormError;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        //---------------------------------------------------------------
        if ($form->isSubmitted() && $form->isValid()) {

            // Récupérer la valeur de l'email soumis dans le formulaire
            $email = $form->get('email')->getData();

            // Vérification de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // si l'email n'est pas valide, afficher un message d'erreur
                $this->addFlash('verify_email_error', 'L\'email n\'est pas valide.');
                return $this->render('registration/register.html.twig', [
                    'registrationForm' => $form->createView(),
                ]);
            }
            
            //----------------TEST CODE de VALIDATION----------------

            // Récupérer la valeur du champ "code" soumis dans le formulaire
            $codeValue = $form->get('code')->getData();

            // Recherche le code correspondant
            // $code = $entityManager->getRepository(Code::class)->findOneBy(['valeur_code' => $form->get('code')->getData()]);
            $code = $entityManager->getRepository(Code::class)->findOneBy(['valeur_code' => $codeValue]);


            if (!$code) {
                //si code pas valide on envoi message 
                $this->addFlash('verify_code_error', 'Le code d\'inscription n\'est pas valide.');
                return $this->render('registration/register.html.twig', [
                    'registrationForm' => $form->createView(),
                ]);
            }
                // Récupère l'Assmat correspondant au code
                $assmat = $code->getIdAssMat();

                // Associe l'Assmat à l'utilisateur
                $user->setAssMat($assmat);
            

            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            //-------------FIN---TEST CODE de VALIDATION----------------
            $entityManager->persist($user);
            $entityManager->flush();


            //------------Verification de l'email------------
            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation(
                'app_verify_email',
                $user,
                (new TemplatedEmail())
                    ->from(new Address('contact@mambrindereves.fr', 'Mam Brin de Reves'))
                    ->to($user->getEmail())
                    ->subject('Veuillez confirmer votre email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator, UserRepository $userRepository): Response
    {
        $id = $request->get('id');

        if (null === $id) {
            return $this->redirectToRoute('app_register');
        }

        $user = $userRepository->find($id);

        if (null === $user) {
            return $this->redirectToRoute('app_register');
        }

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $user);
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Email verifié avec succès.');

        return $this->redirectToRoute('home');
    }
}
