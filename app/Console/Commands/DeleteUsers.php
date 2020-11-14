<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class DeleteUsers extends Command
{
    /*
        Argumento 1 Minuto (0 - 59)
        Argumento 2 Hora (0 - 23)
        Argumento 3 Dia del mes (1 - 31)
        Argumento 4 Mes (1 - 12)
        Argumento 5 Dia de la semana (0 - 6)
        Argumento 6 Comando que se va a ejecutar
    */
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all users that the name start with Mr.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        User::where('name', 'LIKE', 'Mr.%')->delete();
        Log::info('usuarios eliminados ...');
        logger("users deleted");
    }
}
