<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the resources.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function browse()
    {
        $requests = Auth::user()->requests()->paginate(15);
        return view('user.orders.list')->with(compact('requests'));
    }

    /**
     * Show the creation form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('user.orders.create');
    }

    /**
     * Show the creation form.
     *
     * @param Request $request
     *
     * @throws
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function insert(Request $request)
    {
        $this->validate($request, [
           'title'  => ['required', 'string', 'max:500'],
           'description'    => ['nullable', 'string', 'max:5000'],
           'order_from'     => ['required', 'string', 'max:500'],
            'ref_link'      => ['required', 'string', 'max:1000'],
            'pickup_date'   => ['required', 'date']
        ]);

        $request->merge(['user_id' => Auth::user()->id]);

        Order::create($request->except('_token'));

        return redirect()->route('user.order.list')->withSuccess('Request saved successfully!');
    }
}
