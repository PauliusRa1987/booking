<?php

namespace App\Http\Controllers;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Country;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotel.index',['hotels' => $hotels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('hotel.create',['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHotelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel = new Hotel;
        if ($request->file('hotel_image')) {
            $photo = $request->file('hotel_image');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $img = Image::make($photo)->resize(50, 50);
            $img->save(public_path().'/img/'.$file);
            $hotel->photo = asset('/img') . '/' . $file;
        }
        $hotel->hotel_name = $request->hotel_name;
        $hotel->country_id = $request->country_id;
        $hotel->price = $request->price;
        $hotel->duration = $request->duration;
        $hotel->save();
        return redirect()->route('hotel-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        $countries = Country::all();
        return view('hotel.edit', ['hotel' => $hotel, 'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHotelRequest  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        if ($request->file('hotel_image')) {
            $name = pathinfo($hotel->photo, PATHINFO_FILENAME);
            $ext = pathinfo($hotel->photo, PATHINFO_EXTENSION);
            $path = public_path('/img') . '/' . $name . '.' . $ext;
            if ($name = '') {
                unlink($path);
            }
            $photo = $request->file('hotel_image');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $img = Image::make($photo)->resize(50, 50);
            $img->save(public_path().'/img/'.$file);
            $hotel->photo = asset('/img') . '/' . $file;
        }
        $hotel->hotel_name = $request->hotel_name;
        $hotel->country_id = $request->country_id;
        $hotel->price = $request->price;
        $hotel->duration = $request->duration;
        $hotel->save();
        return redirect()->route('hotel-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        if($hotel->hasOrders->count()){
            return 'You can`t delete, still have solgt holidays!';
        } 
        if ($hotel->photo) {
            $name = pathinfo($hotel->photo, PATHINFO_FILENAME);
            $ext = pathinfo($hotel->photo, PATHINFO_EXTENSION);
            $path = public_path('/img') . '/' . $name . '.' . $ext;
            if ($path) {
                unlink($path);
            }
        }
        $hotel->delete();
        return redirect()->back();
    }
}
