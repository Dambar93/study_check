<?php

namespace App\Mail;

use App\Models\News;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsCreated extends Mailable
{
    use Queueable, SerializesModels;

    private News $news;


    public function __construct(News $news)
    {
        $this->news = $news;   
    }

    public function build()
    {
        return $this->to('random@mail.vom')
            ->markdown('emails.news.news_created_mail')
            ->with([
                'news' => $this->news,
            ]);
    }
}
