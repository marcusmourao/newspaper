<?php

namespace newspaper\Http\Controllers;

use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use newspaper\Http\Requests;
use newspaper\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = DB::select('select * from news ORDER By publishDateTime DESC');
        return view('news/index')->with('news', $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('news/create');
    }

    public function path(){
        $path = getcwd();
        $path .= '/images/news';
        if(file_exists($path)){
            return "File alredy exists";
        }
        else{
            mkdir($path);
            return $path;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $text = nl2br($request->input('text'));
        $category = $request->input('category');
        $author = $request->input('author');
        $publishDate = $request->input('publishDate');
        $publishTime = $request->input('publishTime');
        $publishDateTime = $publishDate . " - " . $publishTime;
        $currentDate = date("Y/m/d - h:i:sa");
        $uri = $publishDate ."/" . str_replace(' ', '-', $title);
        $path = "public/images/news/$uri";
            $file = $request->file('photo');
        $count = 1;
            foreach ($file as $f){
                $name = 'image' . $count . '.png';
                $f->storeAs($path, $name);
                $count = $count +1;
            }





        DB::insert('insert into news (title,  text, category, createDate, publishDate, publishTime, publishDateTime, lastUpdate, author, uri) values (?,?,?,?,?,?,?,?,?,?)',
            array($title,  $text, $category, $currentDate , $publishDate, $publishTime, $publishDateTime, $currentDate ,$author,$uri));

        return redirect('/news');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $year = $request->route('year');
        $month = $request->route('month');
        $day = $request->route('day');
        $title = $request->route('title');
        $uri = $year . "/" . $month . "/" . $day . "/" . $title;
        $resposta = DB::select('select * from news where uri = ?', [$uri]);
        if(empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('news/show')->with('new', $resposta[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
