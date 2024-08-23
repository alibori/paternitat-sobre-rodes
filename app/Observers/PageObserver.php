<?php

declare(strict_types=1);

namespace App\Observers;

use App\Enums\PageStatusEnum;
use App\Models\Page;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class PageObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Page "created" event.
     */
    public function created(Page $page): void
    {
        $this->createPageBladeFile($page);
    }

    /**
     * Handle the Page "updated" event.
     */
    public function updated(Page $page): void
    {
        if ($page->status === PageStatusEnum::Published->value) {
            $this->createPageBladeFile($page);
        } else {
            $this->deletePageBladeFile($page);
        }
    }

    /**
     * Handle the Page "deleted" event.
     */
    public function deleted(Page $page): void
    {
        $this->deletePageBladeFile($page);
    }

    /**
     * Handle the Page "restored" event.
     */
    public function restored(Page $page): void
    {
        $this->createPageBladeFile($page);
    }

    /**
     * Handle the Page "force deleted" event.
     */
    public function forceDeleted(Page $page): void
    {
        $this->deletePageBladeFile($page);
    }

    /**
     * @param Page $page
     * @return void
     */
    private function createPageBladeFile(Page $page): void
    {
        if ($page->status !== PageStatusEnum::Published->value) {
            return;
        }

        // Create blade file from the page.blade.stub file in the resources/stubs directory
        $stub = file_get_contents(resource_path('stubs/page.blade.stub'));

        if (!$stub) {
            return;
        }

        $stub = str_replace('{{ title }}', $page->title, $stub);

        $stub = str_replace('{{ content }}', $page->content, $stub);

        $path = resource_path('views/pages/'.$page->slug.'.blade.php');

        file_put_contents($path, $stub);
    }

    /**
     * @param Page $page
     * @return void
     */
    private function deletePageBladeFile(Page $page): void
    {
        $path = resource_path('views/pages/'.$page->slug.'.blade.php');

        if (file_exists($path)) {
            unlink($path);
        }
    }
}
