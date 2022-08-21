<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function front()
    {
        return view('front.page');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchValues = preg_split('/\s+/', $request->s, -1, PREG_SPLIT_NO_EMPTY);
        if ($request->s != '') {
            $hotels = DB::table('hotels')
                ->join('countries', 'countries.id', '=', 'hotels.country_id')
                ->select('hotels.*', 'countries.*')
                ->where(function ($q) use ($searchValues) {
                    foreach ($searchValues as $value) {
                        $q->orWhere('hotels.hotel_name', 'like', "%{$value}%");
                    }
                })
                ->orderBy('hotels.hotel_name')->get();
            return view('front.index', ['hotels' => $hotels]);
        } else {
            if (!$request->country_id) {
                $hotels = match($request->sort) {
                    'high' => DB::table('hotels')
                    ->join('countries', 'countries.id', '=', 'hotels.country_id')
                    ->select('hotels.*', 'countries.*')
                    ->orderByDesc('hotels.price')->get(),
                    'low' => DB::table('hotels')
                    ->join('countries', 'countries.id', '=', 'hotels.country_id')
                    ->select('hotels.*', 'countries.*')
                    ->orderBy('hotels.price')->get(),
                    default => DB::table('hotels')
                    ->join('countries', 'countries.id', '=', 'hotels.country_id')
                    ->select('hotels.*', 'countries.*')
                    ->get(),
                };
                return view('front.index', ['hotels' => $hotels]);
            }
            else{
                $hotels = match($request->sort) {
                    'higt' => DB::table('hotels')
                    ->join('countries', 'countries.id', '=', 'hotels.country_id')
                    ->select('hotels.*', 'countries.*')
                    ->where('countries.id', $request->country_id)
                    ->orderByDesc('hotels.price')->get(),
                    'low' => DB::table('hotels')
                    ->join('countries', 'countries.id', '=', 'hotels.country_id')
                    ->select('hotels.*', 'countries.*')
                    ->where('countries.id', $request->country_id)
                    ->orderBy('hotels.price')->get(),
                    default => DB::table('hotels')
                    ->join('countries', 'countries.id', '=', 'hotels.country_id')
                    ->select('hotels.*', 'countries.*')
                    ->where('countries.id', $request->country_id)
                    ->get(),
                };
                return view('front.index', ['hotels' => $hotels]);
            }
         
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderList(int $userId)
    {
        $orders = Order::where('user_id', $userId)->orderBy('id', 'desc')->get();
        return view('front.orderList', ['orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(int $hotelId, Request $request)
    {
        $order = new Order;
        $reqTime = date('Y-m-d', strtotime("$request->timeD"));
        $timeToCount = Carbon::create($reqTime);
        $timeToCount->addDays(DB::table('hotels')->where('id', $hotelId)->value('duration'));
        $timeFinish = $timeToCount->format('Y-m-d');
        $order->user_id = Auth::user()->id;
        $order->hotel_id = $hotelId;
        $order->holi_day = $timeFinish;
        $order->save();
        return redirect()->route('order-orderList', Auth::user()->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function pdf_print(Order $order)
    {
        $pdf = Pdf::loadView('front.pdf', ['order' => $order]);
        return $pdf->download('order-' . $order->id . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit()
    { {
            $orders = Order::all()->sortDesc();
            return view('front.edit', ['orders' => $orders]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Order $order)
    {
        $order->status = 'approved';
        $order->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back();
    }
}
