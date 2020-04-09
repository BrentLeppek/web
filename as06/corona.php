<?php 

main();

#-----------------------------------------------------------------------------
# FUNCTIONS
#-----------------------------------------------------------------------------
function main () {
	
	$apiCall = 'https://api.covid19api.com/summary';
	// line below stopped working on CSIS server
    //$string = file_get_contents($apiCall); 
    //$json = json_decode($string);
	$json_string = curl_get_contents($apiCall);
	$obj = json_decode($json_string);
	$data = $obj->Global->NewConfirmed;
	
	//Creates array of countries that will be the main use of the program
	$countiresArray = $obj->Countries;


	// echo html head section
	echo '<html>';
	echo '<head>';
	echo '<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">';
	echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>';
	echo '<style> h2 {text-align:center; } </style>';
	echo '</head>';
	
	// open html body section
	echo '<body onload="loadDoc()">';

	//Header for site
	echo '<h2>Live Top 10 Coronavirus Cases Worldwide</h2>';

	//function comapares cases and is sorted in descending order
	function caseCompare($a, $b) {
		if($a->TotalConfirmed == $b->TotalConfirmed)
			return 0;
		if($a->TotalConfirmed < $b->TotalConfirmed)
			return 1;
		return -1;		
	}
	
	//usort adds the array and executes the caseCompare function
	usort($countiresArray, "caseCompare");	

	//creates a counter to count the number of iterations in the loop
	//counter also determines rank for each country
	$counter = 1;

	//creates table to print out the data
	echo '<table class="table table-dark">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>Rank</th>';
	echo '<th>Country</th>';
	echo '<th>Confirmed Cases</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	foreach($countiresArray as $k => $cur) {
		echo '<tr>';
		echo '<td>' . $counter . '</td>';
		echo '<td>' . $cur->Country . '</td>';
		echo '<td>' . $cur->TotalConfirmed . '</td>';
		echo '</tr>';
		if (++$counter == 11) break;
	}
	echo '</tbody>';
	echo '</table>';

	// close html body section
	echo '</body>';
	echo '</html>';
}


#-----------------------------------------------------------------------------
// read data from a URL into a string
function curl_get_contents($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
?>












