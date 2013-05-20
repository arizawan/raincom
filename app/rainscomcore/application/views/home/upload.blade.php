<h1>My Awesome URL Shorter</h1>
{{ Form::open_for_files('/','POST') }}
	{{ Form::file('headshot') }}
	{{Form::submit('Click Me!');}}
{{ Form::close() }}

{{ $errors->first('url', '<p class="error">:message</p>') }}