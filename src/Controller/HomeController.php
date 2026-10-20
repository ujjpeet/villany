<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $nev          = trim($request->request->get('nev', ''));
            $telefon      = trim($request->request->get('telefon', ''));
            $szolgaltatas = trim($request->request->get('szolgaltatas', ''));

            if ($nev && $telefon && $szolgaltatas) {
                // TODO: send email notification here
                $this->addFlash('success', 'Köszönjük megkeresését, ' . htmlspecialchars($nev) . '! Hamarosan felvesszük Önnel a kapcsolatot.');
            }

            return $this->redirectToRoute('app_home', ['_fragment' => 'arajanlat']);
        }

        return $this->render('home/index.html.twig');
    }
}
