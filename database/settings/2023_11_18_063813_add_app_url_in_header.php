<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('general.roadmap_project_url', '');
        $this->migrator->add('general.show_app_home_in_header', false);
        $this->migrator->add('general.app_home_name', '');
        $this->migrator->add('general.app_home_url', '');
    }
};
