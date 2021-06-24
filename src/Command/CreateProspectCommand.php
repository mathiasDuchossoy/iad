<?php

namespace App\Command;

use App\Entity\Address;
use App\Entity\Prospect;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateProspectCommand extends Command
{
    protected static $defaultName = 'app:create-prospect';
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em, string $name = null)
    {
        parent::__construct($name);
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setDescription('Creates a new prospect.')
            ->addArgument('email', InputArgument::REQUIRED, 'Prospect email')
            ->setHelp('This command allows you to create a prospect...');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Prospect Creator');
        $email = $input->getArgument('email');

        if ($email) {
            $io->note(sprintf('You passed an argument: %s', $email));
        }

        $prospect = (new Prospect())->setMail($email);
        $prospect->setName('Duchossoy');
        $prospect->setFirstname('Mathias');

        $address = new Address();
        $address->setNumber(1);
        $address->setCity('Paris');
        $address->setStreet('Rue de Rivoli');
        $address->setZipCode(75001);

        $prospect->setAddress($address);

        $this->em->persist($prospect);
        $this->em->flush();

        $io->success('create a prospect.');

        return Command::SUCCESS;
    }
}
