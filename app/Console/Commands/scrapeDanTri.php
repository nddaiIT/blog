<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte;
use App\Post;
class scrapeDanTri extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:dantri';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    protected $category=[
        "kinh-doanh.htm",
        "nhip-song-tre.htm",
        "o-to-xe-may.htm",
        "the-gioi.htm",

    ];
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
     * @return mixed
     */
    public function handle()
    {
        foreach ($this->category as $category) {
            $crawler = Goutte::request('GET', env("DAN_TRI")."/".$category);
            $linkPost=$crawler->filter('a.fon6')->each(function ($node) {
                return $node->attr("href");
            });
            foreach ($linkPost as $link) {
                $l=env("DAN_TRI").$link;
                self::scrapePost($l);
            }
        }
    }

    public static function scrapePost($url)
    {
        $crawler = Goutte::request('GET', $url);
        $title=$crawler->filter('h1.fon31.mgb15')->each(function ($node) {
            return $node->text();
        });

        if (isset($title[0])) {
            $title=$title[0];
        }

        $slug=str_slug($title);
        $description=$crawler->filter('h2.fon33.mt1.sapo')->each(function($node){
            return $node->text();
        });

        if (isset($description[0])) {
            $description=$description[0];
        }

        $description=str_replace('Dân trí','', $description);
        $content=$crawler->filter('div#divNewsContent.detail-content')->each(function($node){
            $content=str_replace('Dân trí','',$node->html());
            return $content;
        });

        if (isset($content[0])) {
            $content=$content[0];
        }

        $image=$crawler->filter('div#divNewsContent.detail-content .VCSortableInPreviewMode img')->each(function($node){
            return $node->attr('src');
        });

        if (isset($image[0])) {
            $image=$image[0];
        }
        $data =[
            'title' => $title,
            'content' =>$content,
            'description' =>$description,
            'slug'=>$slug,
            'image'=>$image,
        ];

        Post::create($data);

        print('lay du lieu thanh cong'."\n");
    }
}
