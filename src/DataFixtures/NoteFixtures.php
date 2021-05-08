<?php

namespace App\DataFixtures;

use App\Dto\CreateNoteDto;
use App\Service\NoteService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NoteFixtures extends Fixture
{
    public const NOTES = ['First note', 'Second note', 'Third note', 'Fourth note', 'Fifth note'];
    private NoteService $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function load(ObjectManager $manager)
    {
        foreach (self::NOTES as $note) {
            $this->noteService->create(new CreateNoteDto($note));
        }
    }
}
