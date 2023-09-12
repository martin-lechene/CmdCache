<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Laravel\Prompts\Prompt;
use Laravel\Prompts\TextPrompt;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use function Laravel\Prompts\text;
use function Laravel\Prompts\password;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\choice;
use function Laravel\Prompts\select;
use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\suggest;
use function Laravel\Prompts\search;


class Cache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Easily clear your cache';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $caches = multiselect(
            label: 'Select caches to clear:',
            options: [
                "clear" => "Flush the application cache (clear)", "view:clear" => "Flush the application cache (view:clear)",
                "view:cache" => "Compile all of the application's Blade templates (view:cache)",
                "route:cache" => "Create a route cache file for faster route registration (route:cache)",
                "route:clear" => "Remove the route cache file (route:clear)",
                "config:cache" => "Create a cache file for faster configuration loading (config:cache)",
                "config:clear" => "Remove the configuration cache file (config:clear)",
                "cache:clear" => "Flush the application cache (cache:clear)",
                "cache:prune-stale-tags" => "Prune stale cache tags from the cache (Redis only) (cache:prune-stale-tags)",
                "cache:table" => "Create a migration for the cache database table (cache:table)",
                "auth:clear-resets" => "Flush expired password reset tokens (auth:clear-resets)",
                "event:cache" => "Discover and cache the application's events and listeners (event:cache)",
                "event:clear" => "Clear all cached events and listeners (event:clear)",
                "optimize:clear" => "Remove the cached bootstrap files (optimize:clear)",
                "queue:clear" => "Delete all of the jobs from the specified queue (queue:clear)",
                "all" => "Clear all caches",
            ],
        );

        foreach ($caches as $cache) {
            switch ($cache) {
                case 'clear':
                    $this->call('clear');
                    break;
                case 'view:clear':
                    $this->call('view:clear');
                    break;
                case 'view:cache':
                    $this->call('view:cache');
                    break;
                case 'route:cache':
                    $this->call('route:cache');
                    break;
                case 'route:clear':
                    $this->call('route:clear');
                    break;
                case 'config:cache':
                    $this->call('config:cache');
                    break;
                case 'config:clear':
                    $this->call('config:clear');
                    break;
                case 'cache:clear':
                    $this->call('cache:clear');
                    break;
                case 'cache:prune-stale-tags':
                    $this->call('cache:prune-stale-tags');
                    break;
                case 'cache:table':
                    $this->call('cache:table');
                    break;
                case 'auth:clear-resets':
                    $this->call('auth:clear-resets');
                    break;
                case 'event:cache':
                    $this->call('event:cache');
                    break;
                case 'event:clear':
                    $this->call('event:clear');
                    break;
                case 'optimize:clear':
                    $this->call('optimize:clear');
                    break;
                case 'queue:clear':
                    $this->call('queue:clear');
                    break;
                case 'all':
                    $this->call('clear');
                    $this->call('view:clear');
                    $this->call('view:cache');
                    $this->call('route:cache');
                    $this->call('route:clear');
                    $this->call('config:cache');
                    $this->call('config:clear');
                    $this->call('cache:clear');
                    $this->call("cache:prune-stale-tags");
                    $this->call("cache:table");
                    $this->call("auth:clear-resets");
                    $this->call("event:cache");
                    $this->call("event:clear");
                    $this->call("optimize:clear");
                    $this->call("queue:clear");
                    break;
                default:
                    $this->error('Invalid cache type: ' . $cache);
            }
        }

        $this->info('Caches cleared successfully.');


    }
}
