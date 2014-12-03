<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Where do I go for that?</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>
<body>
    <div class="container">

        <h1>Where do I go for that?</h1>

		<br />

		{{ Form::open(array('url' => '/')) }}

		    {{ Form::text('search', null, array('placeholder' => 'Enter your search')) }}

		    <br /><br />

		    {{ Form::submit('Tell me!', array('class' => 'btn btn-primary')) }}

		{{ Form::close() }}

		<?php
			if (count($errors) > 0) {
				echo '<br /><div class="error">' . $errors->first('search') . '</div>';
			}
		?>

        @yield('results')

    </div>

</body>
</html>