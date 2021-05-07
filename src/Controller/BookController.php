<?php

namespace App\Controller;

use App\Service\BookFetcher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    public function __construct()
    {
    }

    #[Route('/', name: 'book')]
    public function index(BookFetcher $bookFetcher): Response
    {
        $books = $bookFetcher->fetch();
        return $this->render('book/index.html.twig', [
            'books' => $books
        ]);
    }
}
