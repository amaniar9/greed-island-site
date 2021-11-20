
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Greed Island Cards</title>
  <meta name="description" content="LND">
  <meta name="author" content="Aakash">

  <link rel="stylesheet" href="styles.css?v=1.0">

<header><div class="topPart">
  <h1>Greed Island Cards</h1>
  <h3 class="headerText">An api for the Cards from Greed Island</h3>
  </div>
</header>

<body>
<div class="container">
<div class="infoColumn">
<h3>API Usage</h3>
    <h5>URL: https://greed-island-card-api.herokuapp.com/ </h5>
		<h4>/Cards</h4>
		<ul>
			<li>Url: <code>/api/cards</code></li>
			<li>Gets all cards in database</small>
				
		</li></ul> 
    <h4>/Cards/number</h4>
		<ul>
			<li>Url: <code>/api/cards/{number}</code></li>
			<li>Replace {number} with number of card to receive specific card</small>
				
		</li></ul> </li></ul> 

    <h4>/Cards/rank/{rank}</h4>
		<ul>
			<li>Url: <code>/api/cards/rank/{rank}</code></li>
			<li>Replace {rank} with any rank to receive all cards of that rank <br> 
    example: A-20</small>
				
	
      
		</li></ul> <hr>
    <div class="about">
    <h3>About</h3>
    <p> This project is a work in progress. I created this site to learn a few different
      concepts: Web-scraping, REST API, Deployment, Version Control, mostly the back-end of things. 
    Next step is scraping the Spell cards and Un-Restricted Slot Cards, as well as cosmetic changes, and mobile-friendliness. </p>
    Code will also be available on github shortly.</div>
  </div>
    


<div class="cardDisplay">
<?php
  require_once "vendor/autoload.php";
 
  use GuzzleHttp\Client;
  
  $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'https://greed-island-card-api.herokuapp.com/',
  ]);
    
  // //$response = $client->request('GET', '/api/cards');
   
  // //get status code using $response->getStatusCode();
   
  // $body = $response->getBody();
  // $arr_body = json_decode($body);
  // //print_r($arr_body);

  //getting 1 card
  $card = rand(0, 99);
  $response = $client->request('GET', '/api/cards/' .$card);
  $body = $response->getBody();
  $arr_body = json_decode($body);
 // print_r($arr_body);
  //print_r($arr_body[0]->img);
  $cNum = $arr_body[0]->number;
  $cName = $arr_body[0]->name;
  $cRank = $arr_body[0]->rank;
  $cDesc = $arr_body[0]->description;
  $cImg = $arr_body[0]->img;
  
  $image = base64_encode(file_get_contents($arr_body[0]->img));
  echo '<img src="data:image/jpeg;base64,'.$image.'" width="400" 
  height="600">';

  echo '<table class="customTable">
  <thead>
    <tr>
      <th><a  href="http://localhost/greed-island-site/">Refresh for Random Card</a></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Number</td>
      <td> '.$cNum.' </td>
    </tr>
    <tr>
      <td>Name</td>
      <td>'.$cName.'</td>
    </tr>
    <tr>
      <td>Rank</td>
      <td>'.$cRank.'</td>
    </tr>
    <tr>
      <td>Description</td>
      <td>'.$cDesc.'</td>
    </tr>
   
  </tbody>
</table>';



?>
</div>
</div>


  


 
</body>

<footer>
<div class="footy">
    
    <p> Data scraped from https://hunterxhunter.fandom.com/wiki/Greed_Island_Card_Lists </p>
    </div>

</footer>
</html>