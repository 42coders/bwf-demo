<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index()
    {
        $packages = $this->getOwnPackages();

        return view('packages.index')->with('packages', $packages);
    }

    /**
     * @return array
     */
    private function getOwnPackages(): array
    {
        $packages = [];
        $installedPackages = $this->getInstalledPackages();

        foreach ($installedPackages as $installedPackage) {
            if (strstr($installedPackage->name, '42coders')) {
                $packages[] = new Package($installedPackage);
            }
        }
        return $packages;
    }

    /**
     * @return array
     */
    private function getInstalledPackages(): array
    {
        $installedPackages = json_decode(file_get_contents(base_path('vendor/composer') . '/installed.json'));
        return $installedPackages;
    }
}
