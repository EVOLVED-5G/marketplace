<?php

namespace App\Http\Controllers;

use App\Http\Resources\NetappResource;
use App\Http\Resources\PurchasedNetappResource;
use App\Http\Resources\UserResource;
use App\Models\Netapp;
use App\Models\PurchasedNetapp;
use App\Models\User;
use Illuminate\Http\Request;

class MarketplaceOverviewController extends Controller
{
    public function index()
    {
        $netapps = Netapp::query();
        $totalUsers = User::count();
        $totalNetapps = $netapps->count();
        $totalPurchase = PurchasedNetapp::count();
        $totalCompnies = $netapps->where('published_by', 'business')->count();
        return view('admin.marketplace-overview', compact('totalUsers', 'totalNetapps', 'totalCompnies', 'totalPurchase'));
    }
    public function netappTable()
    {
        return  NetappResource::collection(Netapp::with('user')->paginate(10));
    }
    public function companyTable()
    {
        return NetappResource::collection(Netapp::where('published_by', 'business')->with(['logo', 'user' => function ($q) {
            $q->withCount('netapps', 'purchasedNetapp');
        }])->paginate(10));
    }
    public function purchasedNetappTable()
    {
        return PurchasedNetappResource::collection(PurchasedNetapp::with('user', 'netapp.user')->paginate(10));
    }
    public function userTable()
    {
        return UserResource::collection(User::withCount('netapps', 'purchasedNetapp')->paginate(10));
    }
}
