<?php

namespace App\Http\Controllers;

use App\BusinessLogicLayer\PurchasedNetapp\PurchasedNetAppManager;
use App\Models\PurchasedNetApp;
use App\Models\User;
use App\Repository\PurchasedNetAppRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PurchasedNetAppController extends Controller
{
    protected $purchasedNetAppManager;
    protected $purchasedNetAppRepository;

    public function __construct(
        PurchasedNetAppManager    $purchasedNetAppManager,
        PurchasedNetAppRepository $purchasedNetAppRepository
    ) {
        $this->purchasedNetAppManager = $purchasedNetAppManager;
        $this->purchasedNetAppRepository = $purchasedNetAppRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return PurchasedNetApp|User
     */
    public function purchase(Request $request)
    {
        return $this->purchasedNetAppManager->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function showRevenue($id)
    {
        $purchasedNetApps = PurchasedNetApp::where('netapp_id', $id)->where('user_id', '!=', auth()->id())->get();
        return view('revenue-page', compact('purchasedNetApps'));
    }

    /**
     * Show a view with all purchased Netapps.
     *
     * @return Application|Factory|View
     */
    public function myPurchasedNetApps() {
        $purchasedNetApps = $this->purchasedNetAppManager->getPurchasedNetAppsForUser(auth()->id());
        return view('purchased-netapps', compact('purchasedNetApps'));
    }

    public function download(Request $request): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        $url = $request->query->get("url");
        $headers = [
            'Content-Type' => 'application/vnd.docker.distribution.manifest.v2+json',
            'Content-Disposition' => 'attachment; filename="docker-image"',
        ];
        return response()->streamDownload(function() use ($url) {

            $file = fopen($url, 'rb');

            while(!feof($file)) {
                echo fread($file, 1024*8);
                flush();
            }

            fclose($file);
        }, "docker-image", $headers);
    }


}
