<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Boodschappenlijst</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link href="/css/default.css" rel="stylesheet" />
    <link href="/css/fonts.css" rel="stylesheet" />
	@yield ("css")
</head>
<body>
    <div id="header-wrapper">
	    <div id="header" class="container">
		    <div id="logo">
			    <h1><a href = "/">Boodschappenlijst</a></h1>
		    </div>
		    <div id="menu">
			    <ul>
				    <li class="{{ Request::path() === '/' ? 'current_page_item' : '' }}"><a href = "{{ route('groceries.index') }}" accesskey="1" title = "">Boodschappenlijst</a></li>
				    <li class="{{ Request::is('groceries/create') ? 'current_page_item' : '' }}"><a href = "{{ route('groceries.create') }}" accesskey="2" title = "">Boodschap Toevoegen</a></li>
			    </ul>
		    </div>
	    </div>
    </div>
    @yield ("content")
</body>
</html>
