<?php 


session_start();

function massage() {
	if (isset($_SESSION["massage"])){
				$output  = "<div class=\"massage\">";
				$output .= htmlentities($_SESSION["massage"]);
				$output .= "</div>";
				$_SESSION["massage"] = null;
				return $output;
				}
}

function errors() {
	if (isset($_SESSION["errors"])){
				$errors = $_SESSION["errors"];		
				$_SESSION["errors"] = null;
				return $errors;
				}
}

?>