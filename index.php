
<?php
//To sync repo to web server via remote terminal: git.exe pull --progress --no-rebase -v

print("<!doctype html><html lang=\"en\"><head><meta charset=\"utf-8\"\></head><body>");
print("COMPUTER-GENERATED POSTMODERN \"ARTIST STATEMENT\" DRAWING HAT<br/><br/>May you find the following as meaningful as <a href=\"https://www.canopycanopycanopy.com/contents/international_art_english\">so many other</a> <em>genuine</em> statements. This writing is in the Public Domain; you may use it for any purpose. To get another statement, <a href=\"index.php\">reload the page</a>.<br/><br/>----<br/>");

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
echo file_get_contents($gibdir.$source_files_array[$file]);		// get the contents, and echo it out.
print("<br/>----<br/><br/>You may contribute to these horrors by editing raw output <a href=\"https://github.com/r-alex-hall/gibberish_computer_generated/tree/master/International_Art_English_styled_generated_gibberish/pyMarkovGibbGen/raw_output\">hither</a> and moving it <a href=\"https://github.com/r-alex-hall/gibberish_computer_generated/tree/master/International_Art_English_styled_generated_gibberish/pyMarkovGibbGen/edited\">yon</a> (or by \"fixing up\" anything yon). See the <a href=\"https://github.com/r-alex-hall/gibberish_computer_generated/blob/master/README.md\">README.md</a> file. This \"statement\" is from the source text file <a href=\"International_Art_English_styled_generated_gibberish/pyMarkovGibbGen/edited/" . $source_files_array[$file] . "\"> $source_files_array[$file] </a>.<br/><br/>");
print("</body></html>");
}
?>
