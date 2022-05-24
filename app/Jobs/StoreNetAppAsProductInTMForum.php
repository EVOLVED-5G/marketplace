<?php

namespace App\Jobs;

use App\BusinessLogicLayer\TMForumAPI\ForumAPIManager;
use App\Models\Netapp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreNetAppAsProductInTMForum implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $netapp;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Netapp $netapp) {
        $this->onQueue('tmforum-products');
        $this->netapp = $netapp;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ForumAPIManager $forumAPIManager) {
        $data = [
            'name' => $this->netapp->name,
            'description' => $this->netapp->about,
            'price' => $this->netapp->fix_price,
            'netapp_id' => $this->netapp->id
        ];
        if ($this->netapp->tm_forum_id)
            $forumAPIManager->updateProduct($this->netapp->tm_forum_id, $data);
        else
            $forumAPIManager->createProduct($data);
    }
}
