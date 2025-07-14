<?php

namespace App\Console\Commands;

use App\Category;
use App\Post;
use App\Setting;
use Illuminate\Console\Command;

class UpdateAddress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->updatePost('Đà Lạt', 'A Lưới');
        $this->updatePost('Đà lạt', 'A Lưới');
        $this->updatePost('2022', '2025');
        $this->updatePost('da-lat', 'a-luoi');
        return 0;
    }

    public function updatePost($oldValue, $newValue)
{
    // Tìm tất cả record có chứa $oldValue trong name, slug, description, content
    $locations = Post::where('name', 'like', "%$oldValue%")
        ->orWhere('slug', 'like', "%$oldValue%")
        ->orWhere('description', 'like', "%$oldValue%")
        ->orWhere('content', 'like', "%$oldValue%")
        ->get();

    foreach ($locations as $location) {
        $location->name = str_replace($oldValue, $newValue, $location->name);
        $location->slug = str_replace($oldValue, $newValue, $location->slug);
        $location->description = str_replace($oldValue, $newValue, $location->description);
        $location->content = str_replace($oldValue, $newValue, $location->content);
        $location->save();
    }
    $this->updateCategories($oldValue, $newValue);
    $this->updateConfigAddress($oldValue, $newValue);
}

public function updateCategories($oldValue, $newValue)
{
    // Tìm tất cả record có chứa $oldValue trong name, slug, description, content
    $locations = Category::where('name', 'like', "%$oldValue%")
        ->orWhere('slug', 'like', "%$oldValue%")
        ->orWhere('description', 'like', "%$oldValue%")
        ->orWhere('meta_title', 'like', "%$oldValue%")
        ->get();

    foreach ($locations as $location) {
        $location->name = str_replace($oldValue, $newValue, $location->name);
        $location->slug = str_replace($oldValue, $newValue, $location->slug);
        $location->description = str_replace($oldValue, $newValue, $location->description);
        $location->meta_title = str_replace($oldValue, $newValue, $location->meta_title);
        $location->save();
    }
}

public function updateConfigAddress($oldValue, $newValue)
{
    // Tìm tất cả record có chứa $oldValue trong name, slug, description, content
    $locations = Setting::where('config_value', 'like', "%$oldValue%")
        ->get();

    foreach ($locations as $location) {
        $location->config_value = str_replace($oldValue, $newValue, $location->config_value);
        $location->save();
    }
}

}
