<?php

class SearchController extends BaseController {

	public function getSearchForm() {
		return View::make('_master');
	}

	public function postSearchForm() {

		$rules = array(
			'search' => 'required|alpha_num'
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

		foreach ($data['facets']['facetField']['facet'] as &$item) {
			$item['term'] = str_replace('GUT', 'Gutman', $item['term']);
			$item['term'] = str_replace('NET', 'online stuff', $item['term']);
  			$item['term'] = str_replace('WID', 'Widener', $item['term']);
  			$item['term'] = str_replace('WOL', 'Wolbach', $item['term']);
		}

		return View::make('results')->with('data', $data);

	}

}