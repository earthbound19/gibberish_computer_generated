<?php
//To sync repo to web server via remote terminal: git.exe pull --progress --no-rebase -v
// TO DO? store and print gibberish more elegantly than: echo file_get_contents($gibdir.$source_files_array[$file]);

// SET UP gib.
// $gibdir = "edited/";
$gibdir = "International_Art_English_styled_generated_gibberish/pyMarkovGibbGen/edited/";
// Open a known directory, and read its contents
$source_files_array = array();
if (is_dir($gibdir)) {
    if ($dh = opendir($gibdir)) {
        while (($file = readdir($dh)) !== false) {
					// echo "filename: $file : filetype: " . filetype($gibdir . $file) . "\n";
		array_push($source_files_array, $file);
				// print_r($file."<br/>");
        }
        closedir($dh);
	// because the first two elements are the noy-here-useful . and .. :
	array_shift ($source_files_array);
	array_shift ($source_files_array);
    }
$file = array_rand($source_files_array);
		// print($gibdir.$source_files_array[$file]);
}


// PRINT gib.
// IF any get parameter is passed to this script, fetch a random gibberish artist statement and print it as text/plain. Otherwise, display it with an HTML page.
if (empty($_GET)) {
	  //print gib with HTML and commentary.
	  header("Content-Type: text/html");
	  print("
	<!DOCTYPE html>
	<html>
	  <head>
		<title>~</title>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
		<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
		<link type=\"text/css\" rel=\"stylesheet\" href=\"assets/style.css\" />
		<link type=\"text/css\" rel=\"stylesheet\" href=\"assets/pilcrow.css\" />
		<link type=\"text/css\" rel=\"stylesheet\" href=\"assets/hljs-github.min.css\"/>
	  </head>
	<body><h1 id=\"~\"><a class=\"header-link\" href=\"#~\"></a>~</h1>
	<h2 id=\"artist-statement\"><a class=\"header-link\" href=\"#artist-statement\"></a>Artist Statement</h2>
	<p><em>");
	echo file_get_contents($gibdir.$source_files_array[$file]);		// get the contents, and echo it out.
	print("</em></p>
	<h3 id=\"~-1\"><a class=\"header-link\" href=\"#~-1\"></a>~</h3>
	<p>Wait what? What did you just read?</p>
	<p>I ask myself the same thing after I read a lot of real-life artist statements too similar to the above.</p>
	<h4 id=\"you-can-draw-these-from-a-hat-because-it's-all-farce\"><a class=\"header-link\" href=\"#you-can-draw-these-from-a-hat-because-it's-all-farce\"></a>You Can Draw These From a Hat Because It&#39;s All Farce</h4>
	<p>It&#39;s okay. It&#39;s supposed to be farce. Exactly like too much similar writing about art is not--not intentionally anyway.</p>
	<p>Folks have studied and named the fugly beast which is such writing. It is <a href=\"https://www.canopycanopycanopy.com/contents/international_art_english\">International Art English</a>, or IAE.</p>
	<h4 id=\"good-and-bad-artist-statements\"><a class=\"header-link\" href=\"#good-and-bad-artist-statements\"></a>Good and Bad Artist Statements</h4>
	<p>A good artist statement may be:</p>
	<ul class=\"list\">
	<li>Optional: if it is better that there is no statement, <em>please</em> make none</li>
	<li>Clear and accessible</li>
	<li>Usefully informative or descriptive of the art in away that may not be obvious to the observer, but which improves their experience or appreciation of the work upon learning.</li>
	</ul>
	<p>A bad artist statement probably:</p>
	<ul class=\"list\">
	<li>Lacks any of those qualities</li>
	<li>Is conceived for any of countless bad reasons which all artists should say no to</li>
	<li>Perhaps at worst profanely anoints and separates The Opaqueonaut: in reality the artist turned fool, but too few people see the emperor&#39;s clothes</li>
	</ul>
	<h4 id=\"how-this-works\"><a class=\"header-link\" href=\"#how-this-works\"></a>How This Works</h4>
	<p>This page randomly selects and serves pre-generated farcical artist statements, many of which were created with computer assistance; for example by statistical sentence recombobulation: training an AI on actual IAE, then having it gurgitate similar stuff.</p>
	<p>The statements, being AI-generated, are by nature (and if human-created, by dedication) in the Public Domain.</p>
	<p>To get another statement, <a href=\"./\">reload the page</a>.</p>
	<p>This &quot;statement&quot; is from this source file:</p>
	<p><a href=\"International_Art_English_styled_generated_gibberish/pyMarkovGibbGen/edited/" . $source_files_array[$file] . "\"> $source_files_array[$file] </a></p>
	<p>This page doubles as an API. To get a plain-text statement without this explanation, call the page with any GET variable declared, like this: <a href=\"http://earthbound.io/gibberish-artist-statements/index.php?gib=florf\">http://earthbound.io/gibberish-artist-statements/index.php?gib=florf</a></p>
	<h4 id=\"how-to-contribute\"><a class=\"header-link\" href=\"#how-to-contribute\"></a>How to Contribute</h4>
	<p>To contribute to these entertainments, clone the <a href=\"https://github.com/earthbound19/gibberish_computer_generated\">git repository</a>, do your stuff and submit a pull request.</p>
	<p><em>Back to <a href=\"../\">index</a>
	</body>
	</html>
	"
	);
} else {
  header("Content-Type: text/plain");
  echo file_get_contents($gibdir.$source_files_array[$file]);		// Print gibberish, in plain text only, with no other HTML or comments accompaniment.
}


?>