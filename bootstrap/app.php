<?php

use App\Models\Rentbook;
use App\Models\userHasMembership;
use Carbon\Carbon;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isAdmin' => App\Http\Middleware\isAdmin::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withSchedule(function (Schedule $schedule) {
        $schedule->call(function () {
            UserHasMembership::where('endingDate', '<', Carbon::now())
                ->update(['status' => 'Completed']);
        })->daily();
        $schedule->call(function () {
            // Retrieve overdue rent books
            $overdueRentBooks = Rentbook::where('endingDate', '<', Carbon::now())->get();

            // Update each overdue rent book
            foreach ($overdueRentBooks as $rentbook) {
                // Calculate new penalty amount
                $amount = $rentbook->penaltyAmount;
                $newAmount = $amount + 100;

                // Update the rent book
                $rentbook->update([
                    'isLate' => 1,
                    'penaltyAmount' => $newAmount
                ]);
            }
        })->daily();

    })
    ->create();
