<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\News;

class ParserController extends Controller
{
    public function index()
    {
        //dd('Hello');
        $xml = XmlParser::load('https://3dnews.ru/news/rss/');
        $data = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_description' => ['uses' => 'channel.description'],
            'channel_items' => ['uses' => 'channel.item[title,description,pubDate,category]'],
        ]);
        $arrayNewsRSS = $data['channel_items'];

        //dd($arrayNewsRSS);
        if (!is_null($arrayNewsRSS)) {
            foreach ($arrayNewsRSS as $key => $item) {
            //dd($item);
            $user = new News();
            $user->fill([
                'title' => $item['title'],
                'description' => $item['description'],
                'source' => 'www.3dnews.ru',
                'publish_date' => $item['pubDate'],
                'created_at' => now(),
                'updated_at' => now(),
                'id_category' => 5,
            ])->save();
            }
        return redirect()->route('admin_news');
        }
    }
}
 