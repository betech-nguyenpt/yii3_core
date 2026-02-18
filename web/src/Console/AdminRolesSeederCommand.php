<?php

declare(strict_types=1);

namespace App\Console;

use App\Seeder\AdminRolesSeeder;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Yiisoft\Db\Connection\ConnectionInterface;

#[AsCommand(name: 'seeder:admin-roles', description: 'Seed the admin_roles table with initial data')]
final class AdminRolesSeederCommand extends Command
{
    public function __construct(private ConnectionInterface $db)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $seeder = new AdminRolesSeeder($this->db);
            $seeder->run();
            $output->writeln('<info>Admin roles seeded successfully!</info>');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $output->writeln('<error>Error seeding admin roles: ' . $e->getMessage() . '</error>');
            return Command::FAILURE;
        }
    }
}
