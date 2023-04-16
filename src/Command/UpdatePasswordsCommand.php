<?php
//---------Hasher les mots de passe enregistré en clair de la table ass_mat-(php bin/console app:update-passwords)--------
namespace App\Command;


use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdatePasswordsCommand extends Command
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('app:update-passwords')
            ->setDescription('Mise à jour des mots de passe stockés en clair en les hachant avec bcrypt');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Récupérer tous les utilisateurs de la table ass_mat, y compris les mots de passe en clair
        $query = 'SELECT * FROM ass_mat';
        $stmt = $this->connection->executeQuery($query);
        $users = $stmt->fetchAllAssociative();

        // Hacher le mot de passe de chaque utilisateur avec bcrypt et le mettre à jour dans la base de données
        foreach ($users as $user) {
            $id = $user['id'];
            $plainPassword = $user['password'];

            $hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);

            $this->connection->executeQuery('UPDATE ass_mat SET password = ? WHERE id = ?', [$hashedPassword, $id]);
        }

        $output->writeln('Mise à jour des mots de passe terminée.');
        return Command::SUCCESS;
    }
}