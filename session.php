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


}function delete_img() {
	if (isset($_SESSION["delete_img"])){
				$output .= "<dialog>";
				$output .= htmlentities($_SESSION["delete_img"]);
				$output .= "<button id=\"close\">Закрыть</button>
				</dialog>";
				$output  = "<div class=\"delete_img\">";
				$output .= htmlentities($_SESSION["delete_img"]);
				$output .= "</div>";
				$_SESSION["delete_img"] = null;
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