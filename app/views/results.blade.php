@extends('_master')

@section('results')

	<br />

{{--No search results--}}

	@if ($data['pagination']['numFound'] == 0)

		<h2>Sorry, no results for that search.</h2>

{{-- Results from multiple libraries --}}

	@elseif (count($data['facets']['facetField']['facet']) > 2)

		<h2>You should go to <span id="first_result">

		<?php $first = reset($data['facets']['facetField']['facet']);
		echo $first['term'];
		?>

		</span> for that.</h2><br />

		<p>But here are the full results just in case:</p>

		<div class="row">
			<div class="col-md-3"><b>Library</b></div>
			<div class="col-md-3"><b>Hits</b></div>
		</div>

		@foreach ($data['facets']['facetField']['facet'] as $item)
		<div class="row">
			<div class="col-md-3"><?php print $item['term']; ?></div>
			<div class="col-md-3"><?php print $item['count']; ?></div>
		</div>
		@endforeach

{{-- Results from only one library --}}

	@else

		<h2>You should go to <span id="first_result">{{ $data['facets']['facetField']['facet']['term'] }}</span> for that.</h2><br />

		<p>Full results:</p>

		<div class="row">
			<div class="col-md-3"><b>Library</b></div>
			<div class="col-md-3"><b>Hits</b></div>
		</div>

		<div class="row">
			<div class="col-md-3">{{ $data['facets']['facetField']['facet']['term'] }}</div>
			<div class="col-md-3">{{ $data['facets']['facetField']['facet']['count'] }}</div>
		</div>

	@endif

@stop