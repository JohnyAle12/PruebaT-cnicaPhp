<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;

class ProviderController extends Controller
{
	public function index(){
		$providers = Provider::all();
		return view('providers.index', compact('providers'));
	}

    public function store(Request $request){
    	$provider = new Provider();
    	$provider->name = $request->name;
    	$provider->description = $request->description;
    	$provider->save();

    	return redirect()->route('provider.show', $provider->id);
    }

    public function show(Provider $provider){
		return view('providers.show', compact('provider'));
	}

	public function update(Provider $provider, Request $request){
		Provider::find($provider->id)->update([
			'name' => $request->name,
			'description' => $request->description
		]);

		return redirect()->route('provider.show', $provider->id);
	}

	public function destroy(Provider $provider){
		$provider->delete();
		return redirect()->route('provider.index');
	}
}
