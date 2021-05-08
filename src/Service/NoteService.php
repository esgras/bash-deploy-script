<?php
declare(strict_types=1);

namespace App\Service;

use App\Dto\CreateNoteDto;
use App\Entity\Note;
use App\Repository\NoteRepository;

class NoteService
{
    private $noteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    /**
     * @return Note[]
     */
    public function all(): array
    {
        return $this->noteRepository->findAll();
    }

    public function get(int $id): Note
    {
        return $this->noteRepository->get($id);
    }

    public function create(CreateNoteDto $dto): Note
    {
        $note = new Note($dto->getName());
        $this->noteRepository->save($note);

        return $note;
    }

    public function finish(int $id): Note
    {
        $note = $this->get($id);
        $note->finish();
        $this->noteRepository->save($note);

        return $note;
    }
}
