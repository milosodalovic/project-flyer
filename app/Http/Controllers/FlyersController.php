<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Http\Requests\AddPhotoRequest;
use App\Http\Requests\FlyerRequest;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FlyersController extends Controller
{
    /**
     * FlyersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth' , ['except' => ['show']]);

        parent::__construct();
    }

    public function create()
    {
        return view('flyers/create');
    }

    /**
     * Snowing a flyer on a page
     *
     * @param $zip
     * @param $street
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);
        return view('flyers/show', compact('flyer'));
    }

    public function getPriceAttribute($price)
    {
        return '$' . number_format($price);
    }

    public function store(FlyerRequest $request)
    {
        $flyer = $this->user->publish(
            new Flyer($request->all())
        );

        flash()->success('Success','Your flyer has been created');

        return redirect(flyer_path($flyer));

    }
}
