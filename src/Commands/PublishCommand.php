<?php

namespace RTippin\MessengerUi\Commands;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'messenger:ui:publish {--force : Overwrites all resources}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish all of the messenger-ui assets and configs!';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->comment('Publishing Messenger UI Configuration...');

        $this->callSilent('vendor:publish', [
            '--tag' => 'messenger-ui.config',
            '--force' => $this->option('force'),
        ]);

        $this->callSilent('vendor:publish', [
            '--tag' => 'messenger-ui.views',
            '--force' => $this->option('force'),
        ]);

        $this->callSilent('vendor:publish', [
            '--tag' => 'messenger-ui.assets',
            '--force' => $this->option('force'),
        ]);

        $this->info('Messenger UI assets published successfully!');
    }
}
