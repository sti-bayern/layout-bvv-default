<?php

namespace Sti\LayoutBvvDefault\Commands;

use Illuminate\Console\Command;

class LayoutBvvDefaultCommand extends Command
{
    public $signature = 'layout-bvv-default';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
