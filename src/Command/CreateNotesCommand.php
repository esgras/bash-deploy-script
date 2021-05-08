<?php

namespace App\Command;

use App\DataFixtures\NoteFixtures;
use App\Dto\CreateNoteDto;
use App\Service\NoteService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateNotesCommand extends Command
{
    public static $defaultName = 'create:notes';
    protected static $defaultDescription = 'Add notes to new database';
    private NoteService $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
        parent::__construct(self::$defaultName);
    }

    protected function configure(): void
    {
        $this->setDescription(self::$defaultDescription);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        foreach (NoteFixtures::NOTES as $noteName) {
            $this->noteService->create(new CreateNoteDto($noteName));
        }

        $io->success('You have successfully add new notes to database.');

        return Command::SUCCESS;
    }
}
