<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Device;

class DeviceController extends Controller
{
    private $apiURL = 'https://region0.deviceatlascloud.com/v1/detect/properties';
    private $licenseKey = 'e6ce0b9455cab0e494be4587d016c7c2';

    private $userAgents = [
        "Mozilla/5.0 (Linux; Android 7.0; Pixel C Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/52.0.2743.98 Safari/537.36",
        "Mozilla/5.0 (Linux; Android 10; MAR-LX1A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Mobile Safari/537.36",
        "Mozilla/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.0 Mobile/15E148 Safari/604.1",
        "Mozilla/5.0 (Linux; Android 4.4.3; KFTHWI Build/KTU84M) AppleWebKit/537.36 (KHTML, like Gecko) Silk/47.1.79 like Chrome/47.0.2526.80 Safari/537.36",
        "Mozilla/5.0 (iPad; CPU OS 18_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/112.0.5615.46 Mobile/15E148 Safari/604.1",
        "Mozilla/5.0 (Linux; Android 12; Redmi Note 9 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Mobile Safari/537.36",
        "Mozilla/5.0 (Linux; Android 12; SM-X906C Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36",
        "Dalvik/2.1.0 (Linux; U; Android 10; ACTAB1021 Build/QP1A.190711.020)",
        "Mozilla/5.0 (Linux; Android 13; SM-A515U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Mobile Safari/537.36",
        "Mozilla/5.0 (Linux; Android 5.0.2; LG-V410/V41020c Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/34.0.1847.118 Safari/537.36",
        
    ];

    public function getData()
    {
        foreach ($this->userAgents as $userAgent) {
            $response = Http::get($this->apiURL, [
                'licencekey' => $this->licenseKey,
                'useragent' => $userAgent
            ]);

            $data = $response->json();

            if (isset($data['properties'])) {
                Device::updateOrCreate(
                    ['user_agent' => $userAgent],
                    [
                        'primary_hardware_type' => $data['properties']['primaryHardwareType'] ,
                        'os_version' => $data['properties']['osVersion'] ,
                        'vendor' => $data['properties']['vendor'] ,
                        'browser_name' => $data['properties']['browserName'] ,
                        'model' => $data['properties']['model'] ,
                        'os_name' => $data['properties']['osName'] ,
                        'browser_rendering_engine' => $data['properties']['browserRenderingEngine'] 
                    ]
                );
            }
        }

       return redirect('/tablets')->with('success', 'Data fetched successfully!');
    }

    public function showData()
    {
       // echo "inside tablets";
        $tablets = Device::where('primary_hardware_type', 'Tablet')
        ->orderByRaw("CAST(SUBSTRING_INDEX(os_version, '.', 1) AS UNSIGNED) DESC")
        ->orderByRaw("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(os_version, '.', 2), '.', -1) AS UNSIGNED) DESC")
        ->orderByRaw("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(os_version, '.', 3), '.', -1) AS UNSIGNED) DESC")
        ->get();

        return view('tablets', compact('tablets'));
    }
}
