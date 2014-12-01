<?php

class SearchController extends BaseController {

	public function getSearchForm() {
		return View::make('index');
	}

	public function postSearchForm() {

		$url = 'http://api.lib.harvard.edu/v2/items.json?q=' . Input::get('search') . '&facets=physicalLocation';
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