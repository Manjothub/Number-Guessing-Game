<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{
    #[Route('/lucky/number', name: 'handle_guess', methods: ['GET', 'POST'])]
    public function handleGuess(Request $request): Response
    {
        // Check if the form is submitted
        if ($request->isMethod('POST')) {
            $number = $request->request->get('number');

            // Generate a random number
            $randomNum = rand(0, 100);

            // Compare the submitted number with the random number
            if ($randomNum == $number) {
                $output = "Bingo! You Guessed the Right Number. Number Was: " . $randomNum;
            } else {
                $output = "Sorry, You Guessed the Wrong Number. Number Was: " . $randomNum;
            }
        } else {
            $output = "Please submit the form.";
        }

        return $this->render('lucky/number.html.twig', [
            'output' => $output,
        ]);
    }
}
