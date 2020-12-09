<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use Auth;

class ProviderController extends Controller
{
	public function index(){
		// hacemos uso de cache en el controlador
		$providers = cache()->tags(['providers'])->rememberForever('providers'.Auth::user()->id, function(){
			return Provider::all();
		});
		//$providers = Provider::all();
		return view('providers.index', compact('providers'));
	}

	public function create(){
		return view('providers.create');
	}

    public function store(Request $request){
    	$provider = new Provider();
    	$provider->name = $request->name;
    	$provider->description = $request->description;
    	$provider->save();
    	// eliminamos el cache con el tag providers, para que se actualice con los nuevos registros
    	//cache()->tags(['providers'])->flush();

    	return redirect()->route('provider.index');
    }

    public function show(Provider $provider){
		return view('providers.show', compact('provider'));
	}

	public function flush(){
		cache()->tags(['providers'])->flush();
		return redirect()->route('provider.index');
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
