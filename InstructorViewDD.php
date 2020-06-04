<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dropbtn {
	background-color: #2196F3;
	color: white;
	padding: 16px;
	font-size: 16px;
	border: none;
}

.dropdown {
	position: relative;
	display: inline-block;
}

.dropdown-content {
	display: none;
	position: absolute;
	background-color: #2196F3;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
}

.dropdown-content a {
color: black;
padding: 12px 16px;
text-decoration: none;
display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #2196F3;}
</style>
</head>
<body>

<h2>Select one of the following member options to evaluate:</h2>

<div class="dropdown">
	<button class="dropbtn">Survey Options</button>
	<div class= "dropdown-content">
		<a href="#">Only Evaluate Peers</a>
		<a href="#">Only Evaluate Project Manager</a>
		<a href="#">Evaluate Peers and Project Managers</a>
	</div>
</div>

</body>
</html>

