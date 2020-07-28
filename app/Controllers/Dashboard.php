<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['mydata1'] = "testing1";
        $data['mydata2'] = "testing2";
        return view('form', $data);
    }

    protected function helloWord($slug = null, $id = null)
    {
        echo $slug . "<br>";
        echo $id . "<br>";
    }

    public function template(){
        $parser = \Config\Services::parser();
        $data=[
            'title' => 'My Website Title',
            'content' => 'laudantium aut quibusdam',
            'footer' => 'Goodbye'
        ];

        echo $parser->setData($data)->render('template');
    }
}
