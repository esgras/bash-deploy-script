<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\NoteService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaticController extends AbstractController
{
    private NoteService $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    /**
     * @Route("/")
     */
    public function index(): Response
    {
        return $this->render('static/index.html.twig');
    }

    /**
     * @Route("/notes")
     */
    public function notes(): Response
    {
        return $this->render('static/notes.html.twig', ['notes' => $this->noteService->all()]);
    }

    /**
     * @Route("/notes/{id}/finish")
     */
    public function finish(int $id): JsonResponse
    {
        $this->noteService->finish($id);

        return new JsonResponse(['success' => true]);
    }
}
