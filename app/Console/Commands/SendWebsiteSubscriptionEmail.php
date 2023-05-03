<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Notifications\WebsitePostNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendWebsiteSubscriptionEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:website-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email of Post to subscribed users';

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
        $startDay = Carbon::now()->startOfDay();
        $endDay   = $startDay->copy()->endOfDay();

        $posts = Post::whereBetween('created_At',[$startDay,$endDay])->get();
        // \Log::info($posts);
        $posts->each(function ($post) {
            
            $post->website->subscribers->each(function ($subscriber) use ($post) {
                $subscriber->notify(new WebsitePostNotification($post));
            });
        });
    }
}
