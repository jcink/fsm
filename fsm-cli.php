<?php
		
/**
 * Finite State Machine Command Line Interface
 * 
 * @author John Cuppi
 * @date 11:57 AM Sunday, December 15, 2013
 **/

/**
 * Load Library
 **/

require('libfsm.php');

$fsm = new state_machine();


/**
 * Show options
 **/
 
print "========================= \n";
print "Finite State Machine\n";
print "========================= \n\n";
echo  "Options:\n\n";
echo "1. Enter input strings\n";
echo "2. Print states and transitions\n";
echo "3. Quit\n";

echo "\n\n";
echo "Enter a number choice to select: ";

$cin = fopen ("php://stdin","r"); // cin >> equivalent
$line = fgets($cin);

/**
 * Enter input strings
 **/
 
if(trim($line) == 1){

	while(1) {
	
		echo "Enter an input string (or 'q' to quit): ";
		$cin = fopen ("php://stdin","r");
		
		$fsm->bin_str = fgets($cin);
		
		if(trim($fsm->bin_str) == 'q'){
		exit;
		}
		
		// Set the starting state to 0
		$fsm->set_state(0);
				
		// Filter the strings to remove bad characters
		$fsm->filter_bin_string();

		// Process bin string input/output selection
		$fsm->process_bin_string();
				
		if($fsm->output >= 1){ 
			echo "String is ACCEPTED.\n";
			echo "Output: {$fsm->output}";
		} else {
			echo "String is NOT ACCEPTED\n";
			echo "Output: {$fsm->output}";
		}		
		
		echo "\n";
		

	}

}

/**
 * Print states and transitions
 **/
  
if(trim($line) == 2){

	$fsm->print_transitions();
	
	sleep(5);
	
    exit;
}


/**
 * Quit
 **/
  
if(trim($line) == 3){
    exit;
}

?>