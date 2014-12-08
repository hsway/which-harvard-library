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

        <h1>Where do I go for that? <b>(wicked beta)</b></h1>

        <p>Enter a search term to find out which Harvard library has the most stuff on your topic.</p>

		<br />

		{{ Form::open(array('url' => '/')) }}

		    {{ Form::text('search', null, array('placeholder' => 'Enter your search')) }}&nbsp;
		    {{ Form::submit('Tell me!', array('class' => 'btn btn-primary')) }}

		{{ Form::close() }}

		<?php
			if (count($errors) > 0) {
				echo '<br /><div class="error">' . $errors->first('search') . '</div>';
			}
		?>

        @yield('results')

    </div>

    <footer>
        <div class="container">
            <p class="text-muted">
              Written by Hank Sway at the LibraryCloud Hackathon, Dec. 1 2014. Check out the <a href="https://wiki.harvard.edu/confluence/display/LibraryStaffDoc/Library+Cloud" target="_blank">LibraryCloud API</a> or <a href="https://github.com/hsway/which-harvard-library" target="_blank">this app's GitHub</a>.
            </p>
        </div>
    </footer>

</body>
</html>