<?php

declare(strict_types=1);

namespace App\Console;

use App\Seeder\AdminUsersSeeder;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Yiisoft\Db\Connection\ConnectionInterface;

#[AsCommand(name: 'seeder:admin-users', description: 'Seed the admin_users table with initial data')]
final class AdminUsersSeederCommand extends Command
{
    public function __construct(private ConnectionInterface $db)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $seeder = new AdminUsersSeeder($this->db);
            $seeder->run();
            $output->writeln('<info>Admin users seeded successfully!</info>');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $output->writeln('<error>Error seeding admin users: ' . $e->getMessage() . '</error>');
            return Command::FAILURE;
        }
    }
}
