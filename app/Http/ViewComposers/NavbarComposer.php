<?php

namespace App\Http\ViewComposers;

use App\Taxonomy;
use Illuminate\View\View;

class NavbarComposer
{
	/**
	 * Create a new profile composer.
	 *
	 * @param  UserRepository  $users
	 * @return void
	 */
	public function __construct()
	{
		// Dependencies automatically resolved by service container...
	}
	
	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$taxonomies = Taxonomy::all();
		
		$view->with('taxonomies', $taxonomies);
	}
}