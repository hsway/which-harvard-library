@extends('index')

@section('results')
<br />

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

@stop