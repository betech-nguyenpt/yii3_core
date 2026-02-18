<?php

declare(strict_types=1);

namespace App\Console;

use App\Seeder\AdminRolesSeeder;
use App\Seeder\AdminUsersSeeder;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Yiisoft\Db\Connection\ConnectionInterface;

#[AsCommand(name: 'seeder', description: 'Seed all database tables with initial data')]
final class SeederCommand extends Command
{
    public function __construct(private ConnectionInterface $db)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $output->writeln('<info>Starting all seeders...</info>');
            $output->writeln('');

            // Seed admin roles first
            $output->writeln('<comment>Seeding admin_roles table...</comment>');
            $rolesSeeder = new AdminRolesSeeder($this->db);
            $rolesSeeder->run();
            $output->writeln('<info>✓ Admin roles seeded successfully!</info>');
            $output->writeln('');

            // Then seed admin users
            $output->writeln('<comment>Seeding admin_users table...</comment>');
            $usersSeeder = new AdminUsersSeeder($this->db);
            $usersSeeder->run();
            $output->writeln('<info>✓ Admin users seeded successfully!</info>');
            $output->writeln('');

            $output->writeln('<info>All seeders completed successfully!</info>');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $output->writeln('<error>Error running seeders: ' . $e->getMessage() . '</error>');
            return Command::FAILURE;
        }
    }
}
