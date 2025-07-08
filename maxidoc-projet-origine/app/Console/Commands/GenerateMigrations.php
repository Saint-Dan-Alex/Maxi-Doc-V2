<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use InvalidArgumentException;

class GenerateMigrations extends Command
{
    protected $signature = 'make:migrations';
    protected $description = 'Generate all migrations at once';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $commands = [
    'create_agents_table',
    'create_adresses_table',
    'create_accuse_receptions_table',
    'create_agent_brouillons_table',
    'create_agent_statuts_table',
    'create_archive_permissions_table',
    'create_assistanats_table',
    'create_authentication_log_table',
    'create_brouillons_table',
    'create_brouillon_commentaires_table',
    'create_classeurs_table',
    'create_commentaires_table',
    'create_courriers_table',
    'create_courriers_annotations_table',
    'create_courriers_etapes_table',
    'create_courriers_partages_table',
    'create_courriers_traitements_agents_table',
    'create_courrier_categories_table',
    'create_courrier_destinateurs_table',
    'create_courrier_expediteurs_table',
    'create_courrier_followers_table',
    'create_courrier_natures_table',
    'create_courrier_traitements_table',
    'create_courrier_types_table',
    'create_courrier_types_traitements_table',
    'create_delegue_permissions_table',
    'create_directions_table',
    'create_divisions_table',
    'create_documents_table',
    'create_document_followers_table',
    'create_document_natures_table',
    'create_document_notes_table',
    'create_document_statuts_table',
    'create_document_templates_table',
    'create_document_types_table',
    'create_dossiers_table',
    'create_dossier_passwords_table',
    'create_etapes_table',
    'create_etats_table',
    'create_failed_jobs_table',
    'create_fonctions_table',
    'create_grades_table',
    'create_historiques_table',
    'create_images_table',
    'create_jobs_table',
    'create_lieu_affectations_table',
    'create_menus_table',
    'create_menu_items_table',
    'create_migrations_table',
    'create_model_has_permissions_table',
    'create_model_has_roles_table',
    'create_modules_table',
    'create_notifications_table',
    'create_password_resets_table',
    'create_permissions_table',
    'create_pivot_agent_fonctions_table',
    'create_pivot_documents_agents_table',
    'create_pivot_documents_notes_table',
    'create_pivot_taches_agents_table',
    'create_pivot_taches_cibles_table',
    'create_pivot_user_conges_table',
    'create_pivot_user_taches_table',
    'create_pointages_table',
    'create_priorites_table',
    'create_push_subscriptions_table',
    'create_revisions_table',
    'create_roles_table',
    'create_role_has_permissions_table',
    'create_secretariats_table',
    'create_sections_table',
    'create_services_table',
    'create_sessions_table',
    'create_statuts_table',
    'create_taches_table',
    'create_taches_statuts_table',
    'create_tache_documents_table',
    'create_tache_objectifs_table',
    'create_type_notifications_table',
    'create_users_table',
    'create_views_table',
    // Ajouts supplémentaires
    'create_pivot_table_agent_dossiers',
    'create_pivot_table_agents_documents',
    'create_user_activity_log_table',
    'create_user_sessions_table',
    'create_task_assignees_table',
    'create_notification_preferences_table',
    'create_task_dependencies_table',
    'create_user_roles_table',
    'create_auth_user_tokens_table',
    'create_media_table',
    'create_file_uploads_table'
];


        foreach ($commands as $command) {
            $className = $this->migrationClassName($command);

            if ($this->migrationExists($className)) {
                $this->warn("Migration '{$className}' existe déjà, création ignorée.");
                continue;
            }

            try {
                $this->call('make:migration', ['name' => $command]);
                $this->info("Migration '{$command}' créée avec succès.");
            } catch (InvalidArgumentException $e) {
                $this->warn("Erreur lors de la création de la migration '{$command}': " . $e->getMessage());
            }
        }

        $this->info('Traitement terminé.');
    }

    /**
     * Génère le nom de la classe migration attendu
     */
    protected function migrationClassName(string $migrationName): string
    {
        // Convertit "create_agents_table" en "CreateAgentsTable"
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $migrationName)));
    }

    /**
     * Vérifie si une migration avec cette classe existe déjà dans le dossier migrations
     */
    protected function migrationExists(string $className): bool
    {
        $migrationsPath = database_path('migrations');
        $files = glob($migrationsPath . '/*.php');

        foreach ($files as $file) {
            $contents = file_get_contents($file);
            if (preg_match('/class\s+' . preg_quote($className, '/') . '\b/', $contents)) {
                return true;
            }
        }

        return false;
    }
}
