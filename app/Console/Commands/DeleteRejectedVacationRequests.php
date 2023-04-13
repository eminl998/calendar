<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\VacationRequest;

class DeleteRejectedVacationRequests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vacation-requests:delete-rejected';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete rejected vacation requests after 3 days.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $rejectedRequests = VacationRequest::where('status', 'rejected')
            ->where('updated_at', '<', Carbon::now()->subDays(10))
            ->get();

        foreach ($rejectedRequests as $request) {
            $request->delete();
        }

        $this->info('Deleted ' . $rejectedRequests->count() . ' rejected vacation requests.');

        return 0;
    }

}