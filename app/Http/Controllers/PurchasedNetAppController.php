<?php

namespace App\Http\Controllers;

use App\BusinessLogicLayer\PurchasedNetapp\PurchasedNetAppManager;
use App\Models\Netapp;
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

    public function downloadDockerImages(Request $request): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        $netappId = $request->query->get("id");
        $netapp = Netapp::where('id', $netappId)->first();
        $githubUrlExploded = explode("/",$netapp->github_url);
        $netappName =$githubUrlExploded[count($githubUrlExploded)-1];
        $url = config("app.netapp_fingerprint_base_url") . $netappName . "/" . $netapp->version . "/". $netappName . ".tar.gz";

        $filename= $netappName."_docker_images.tar.gz";
        $headers = [
            'Content-Type' => 'application/gzip',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ];

        return response()->streamDownload(function() use ($url) {

            $opts=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
            );
            $file = fopen($url, 'rb', false, stream_context_create($opts));

            while(!feof($file)) {
                echo fread($file, 1024*8);
                flush();
            }

            fclose($file);
        }, $filename, $headers);
    }


    public function test_download_url(Request $request)
    {
        $netappId = $request->query->get("id");
        $netapp = Netapp::where('id', $netappId)->first();
        $githubUrlExploded = explode("/",$netapp->github_url);
        $netappName =$githubUrlExploded[count($githubUrlExploded)-1];
        $url = config("app.netapp_fingerprint_base_url") . $netappName . "/" . $netapp->version . "/". $netappName . ".tar.gz";

        return response($url, 200)
            ->header('Content-Type', 'text/plain');
    }

    public function test_download(Request $request): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        $netappId = $request->query->get("id");
        $netapp = Netapp::where('id', $netappId)->first();
        $githubUrlExploded = explode("/",$netapp->github_url);
        $netappName =$githubUrlExploded[count($githubUrlExploded)-1];
        $url = config("app.netapp_fingerprint_base_url") . $netappName . "/" . $netapp->version . "/". $netappName . ".tar.gz";

        $filename= $netappName."_docker_images.tar.gz";
        $headers = [
            'Content-Type' => 'application/gzip',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ];
        return response()->streamDownload(function() use ($url) {

            $opts=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
            );
            $file = fopen($url, 'rb', false, stream_context_create($opts));

            while(!feof($file)) {
                echo fread($file, 1024*8);
                flush();
            }

            fclose($file);
        }, $filename, $headers);
    }

    public function test_download_03(Request $request): \Symfony\Component\HttpFoundation\StreamedResponse
    {

        $filename="test_image.jpeg";
        $headers = [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ];
        $url = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFx1pD-5y61mO3S-e1grpCuf24c6zMIGanYrbzcIwB&s";
        return response()->streamDownload(function() use ($url) {

            $opts=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
            );
            $file = fopen($url, 'rb', false, stream_context_create($opts));

            while(!feof($file)) {
                echo fread($file, 1024*8);
                flush();
            }

            fclose($file);
        }, $filename, $headers);
    }



}
