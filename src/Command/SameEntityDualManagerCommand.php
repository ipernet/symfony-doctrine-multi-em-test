<?php

namespace App\Command;

use App\Entity\Cat;
use App\Entity\Dog;
use App\Entity\Duck;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

class SameEntityDualManagerCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:test';

    /**
     * @var ManagerRegistry
     */
    private $registry;

    public function __construct(ManagerRegistry $registry)
    {
        $this->registry = $registry;
        $this->defautEm = $this->registry->getManager('default');
        $this->otherEm = $this->registry->getManager('em2');

        parent::__construct();
    }

    protected function configure()
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $output;

        $this->testEntityWithNoCustomRepository();
        $this->testEntityWithNoCustomRepositoryUsingRegistryRepository();

        $this->testEntityWithCustomRepositoryExtendingServiceEntityRepository();
        $this->testEntityWithCustomRepositoryExtendingServiceEntityRepositoryUsingRegistryRepository();

        $this->testEntityWithCustomRepositoryExtendingEntityRepository();
        $this->testEntityWithCustomRepositoryExtendingEntityRepositoryUsingRegistryRepository();
    }

    /**
     *
     * @return void
     */
    private function testEntityWithNoCustomRepository()
    {
        $entityDefaultEm = $this->defautEm->getRepository(Dog::class)->findOneBy(['id' => 1]);
        $entityEm2 = $this->otherEm->getRepository(Dog::class)->findOneBy(['id' => 1]);

        $this->testResult($entityDefaultEm, $entityEm2);
        $this->output->writeln(' - '.__FUNCTION__);
    }

    /**
     *
     * @return void
     */
    public function testEntityWithNoCustomRepositoryUsingRegistryRepository()
    {
        $entityDefaultEm = $this->registry->getRepository(Dog::class, 'default')->findOneBy(['id' => 1]);
        $entityEm2 = $this->registry->getRepository(Dog::class, 'em2')->findOneBy(['id' => 1]);

        $this->testResult($entityDefaultEm, $entityEm2);
        $this->output->writeln(' - '.__FUNCTION__);
    }

    /**
     * @return void
     */
    private function testEntityWithCustomRepositoryExtendingServiceEntityRepository()
    {
        $entityDefaultEm = $this->defautEm->getRepository(Cat::class)->findOneBy(['id' => 1]);
        $entityEm2 = $this->otherEm->getRepository(Cat::class)->findOneBy(['id' => 1]);

        $this->testResult($entityDefaultEm, $entityEm2);
        $this->output->writeln(' - '.__FUNCTION__);
    }

    /**
     *
     * @return void
     */
    public function testEntityWithCustomRepositoryExtendingServiceEntityRepositoryUsingRegistryRepository()
    {
        $entityDefaultEm = $this->registry->getRepository(Cat::class, 'default')->findOneBy(['id' => 1]);
        $entityEm2 = $this->registry->getRepository(Cat::class, 'em2')->findOneBy(['id' => 1]);

        $this->testResult($entityDefaultEm, $entityEm2);
        $this->output->writeln(' - '.__FUNCTION__);
    }

    /**
     *
     * @return void
     */
    public function testEntityWithCustomRepositoryExtendingEntityRepository()
    {
        $entityDefaultEm = $this->defautEm->getRepository(Duck::class)->findOneBy(['id' => 1]);
        $entityEm2 = $this->otherEm->getRepository(Duck::class)->findOneBy(['id' => 1]);

        $this->testResult($entityDefaultEm, $entityEm2);
        $this->output->writeln(' - '.__FUNCTION__);
    }

    /**
     *
     * @return void
     */
    public function testEntityWithCustomRepositoryExtendingEntityRepositoryUsingRegistryRepository()
    {
        $entityDefaultEm = $this->registry->getRepository(Duck::class, 'default')->findOneBy(['id' => 1]);
        $entityEm2 = $this->registry->getRepository(Duck::class, 'em2')->findOneBy(['id' => 1]);

        $this->testResult($entityDefaultEm, $entityEm2);
        $this->output->writeln(' - '.__FUNCTION__);
    }

    private function testResult($entityDefaultEm, $entityEm2)
    {
        if (spl_object_hash($entityDefaultEm) === spl_object_hash($entityEm2)) {
            $this->output->write('<error>NOT OK: The two entities should not be the same object</error>');
        } else {
            $this->output->write('<info>OK: The two entities are different objects</info>');
        }
    }
}