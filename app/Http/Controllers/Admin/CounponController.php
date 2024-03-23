<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coupons\CreateCouponsRequest;
use App\Http\Requests\Coupons\UpdateCouponsRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CounponController extends Controller
{

    protected $coupon;

    public function __construct(Coupon $counpon)
    {
        $this->coupon = $counpon;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = $this->coupon->latest('id')->paginate(5);

        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCouponsRequest $request)
    {
        $dataCreate = $request->all();

        $this->coupon->create($dataCreate);

        return redirect()->route('coupons.index')->with(['message' => 'Create coupon success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = $this->coupon->findOrFail($id);

        return view('admin.coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponsRequest $request, $id)
    {
        $coupon = $this->coupon->findOrFail($id);
        $dataUpdate = $request->all();
        $coupon->update($dataUpdate);

        return redirect()->route('coupons.index')->with(['message' => 'Update coupon success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = $this->coupon->findOrFail($id);
        $coupon->delete();

        return redirect()->route('coupons.index')->with(['message' => 'Delete ' . $coupon->name . ' success']);
    }
}
