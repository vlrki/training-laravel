<?php

namespace App\Observers;

use App\Models\BlogPost;
use App\Repositories\BlogPostRepository;
use Carbon\Carbon;

class BlogPostObserver
{
    /**
     * Handle the blog post "creating" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function creating(BlogPost $blogPost)
    {
        $this->setPublished($blogPost);
        $this->setSlug($blogPost);
    }
    
    /**
     * Handle the blog post "created" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "updating" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updating(BlogPost $blogPost)
    {
        // $test[] = $blogPost->isDirty();
        // $test[] = $blogPost->isDirty('is_published');
        // $test[] = $blogPost->isDirty('user_id');
        // $test[] = $blogPost->getAttribute('is_published'); // Новое значение
        // $test[] = $blogPost->is_published; // Новое значение
        // $test[] = $blogPost->getOriginal('is_published'); // Старое значение

        // dd($test);

        $this->setPublished($blogPost);
        $this->setSlug($blogPost);
    }

    /**
     * Handle the blog post "updated" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "restored" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }
    
    /**
     * Если дата публикации не установлена и происходит установка флага "Опубликовано",
     * то устанавливаем дату публикации на текущую.
     *
     * @param  mixed $blogPost
     * @return void
     */
    private function setPublished(BlogPost $blogPost)
    {
        if (empty($blogPost->published_at) && $blogPost->is_published) {
            $blogPost->published_at = Carbon::now();
        }
    }
    
    /**
     * Если слаг пустой, то заполняем его.
     *
     * @param  mixed $blogPost
     * @return void
     */
    private function setSlug(BlogPost $blogPost)
    {
        if (empty($blogPost->slug)) {
            $blogPost->slug = \Str::slug($blogPost->title);
        }
    }
}
