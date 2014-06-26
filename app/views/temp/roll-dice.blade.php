<!doctype html>
<html lang="en">
<head>
    <title>My First View</title>
</head>
<body>
	<p>Your Guess: {{{$user_guess}}}!</p>
	<p>Random Number: {{{$random_guess}}}</p>
	@if ($user_guess == $random_guess)
	<p>You win!</p>
	@else
	<p>You lose!</p>
	@endif
</body>
</html>