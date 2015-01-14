<?php

class SearchController extends BaseController {

	public function getSearchForm() {
		return View::make('_master');
	}

	public function postSearchForm() {

		$rules = array(
			'search' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {

			return Redirect::to('/')
				->withInput()
				->withErrors($validator);
		}

		$search = rawurlencode(Input::get('search'));

		$url = 'http://api.lib.harvard.edu/v2/items.json?q=' . $search . '&facets=physicalLocation';
		$json = file_get_contents($url);
		$data = json_decode($json, true);

/* Commenting out lib code to lib name conversion for now - only works for arrays, not strings 
(i.e. when results are returned from >1 library)
sample search with results from only one library: laravel
sample search with no results: asdfjkl

		foreach ($data['facets']['facetField']['facet'] as &$item) {
			$item['term'] = str_replace('GUT', 'Gutman', $item['term']);
			$item['term'] = str_replace('NET', 'online stuff', $item['term']);
  			$item['term'] = str_replace('WID', 'Widener', $item['term']);
  			$item['term'] = str_replace('WOL', 'Wolbach', $item['term']);
		}

*/		

		return View::make('results')->with('data', $data);

	}

}