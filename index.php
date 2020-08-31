<!DOCTYPE html>
<html lang="no" dir="ltr">
<head>
	<link rel="stylesheet" href="style/global.css">
	<base href="/">
	<title>PRG1000 | Studentassistent</title>
	<script src="functions/table.js"></script>
</head>
<body>
<header class="headerMain">
	<div class="branding">
		<h3 class="name">PRG1000 Hjem</h3>
	</div>
	<nav class="navbar">
		<ul>
			<li>
				<div class="navItem">
					<a href="index.php"><h3 class="alt">Hjem</h3></a>
				</div>
			</li>
			<li>
				<div class="navItem">
					<a href=""><h3 class="alt">FAQ</h3></a>
				</div>
			</li>
			<li>
				<div class="navItem">
					<a href=""><h3 class="alt">Utfordring</h3></a>
				</div>
			</li>
			<li>
				<div class="dropdown">
					<button class="dropbtn"><h3 class="alt">Kapitler</h3></button>
					<div class="dropdown-content">
						<a href="#">Link 1</a>
						<a href="#">Link 2</a>
						<a href="#">Link 3</a>
					</div>
				</div>
			</li>
		</ul>
	</nav>
</header>

<div class="grid-container">
	<div class="welcomeMsg">
		<p>Velkommen melding og introduksjons til siden her!</p>
	</div>
	<div class="lastQuestions">
		<?php
		include("./access/database.php");

		$sql = "SELECT questionId, questionText, c.categoryType, questionAnswer, answerUser FROM prg1000.questions JOIN category c on questions.questionCategory = c.cateqoryId WHERE questionStatus='1' ORDER BY questionId DESC LIMIT 5;";
		$result = mysqli_query($db, $sql);
		$rows = mysqli_num_rows($result);

		print "<table class='lastQuestionsTable'>";

		for ($i = 0; $i <= $rows - 1; $i++) {
			$fetch = mysqli_fetch_array($result);

			$questionId = $fetch["questionId"];
			$questionText = $fetch["questionText"];
			$questionCategory = $fetch["categoryType"];
			$questionAnswer = $fetch["questionAnswer"];
			$answerUser = $fetch["answerUser"];
			print "<tr><td id='myTd$questionId' class='myTd' onclick='tdclick($questionId)'> $questionText | $questionCategory | $questionAnswer | $answerUser</td></tr>
					<tr><td id='hiddenTd$questionId' class='hiddenTd' style='display: table-row;'>$questionAnswer</td></tr>";
		}

		print "</table>";
		?>
	</div>
	<div class="newestPost">
		<p>5 siste oppdatering fra temaer kommer her</p>
	</div>
</div>

<ul class="firstfooter">
	<li class="footerDesc"><h5>Fine ressurser</h5>
	<li class="footerDesc2"><h5>Om oss</h5></li>
</ul>
<figure class="footerFigure">

<section class="footerSectionOne">

<ul class="footerNavOne">
<li><a href="usn.no"><h3 class="footerNav">USN</h3></a></li>
<li><a href="https://www.usn.no/om-usn/it-tjenester/canvas/"><h3 class="footerNav">Canvas</h3></a></li>
<li><a href="https://www.usn.no/om-usn/kvalitetssystemet/si-ifra/"><h3 class="footerNav">Si i fra</h3></a></li>
<li><a href="https://www.usn.no/aktuelt/"><h3 class="footerNav">Aktuelle nyheter</h3></a></li>
<li><a href="https://www.usn.no/om-usn/it-tjenester/"><h3 class="footerNav">IT hjelp</h3></a></li>
</ul>
</section>

<section class="footerSectionTwo">

<ul class="footerNavTwo">
<li><a href="om.php"><h3 class="footerNav">Om oss</h3></a></li>
<li><a href="hjelp.php"><h3 class="footerNav">Hjelp</h3></a></li>
<li><a href="nyheter.php"><h3 class="footerNav">Endringslogg</h3></a></li>
<li><a href="tilbakemelding.php"><h3 class="footerNav">tilbakemelding</h3></a></li>
<li><a href="soking.php"><h3 class="footerNav">Hvordan søker jeg?</h3></a></li>
</ul>
</section>

</figure>


</body>
</html>