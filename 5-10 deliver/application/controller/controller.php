<?php
// Create the controller class for the MVC design pattern
class Controller {

	// Declare public variables for the controller class
	public $load;
	public $model;
	
	// Create functions for the controller class
	function __construct($pageMethod = null)
	{
		// echo $pageURI;
		$this->load = new Load();
		$this->model = new Model();
	
		
		// Determine what page you are on
		$this->$pageMethod();
	}
	// Load the home page mmethod — this method is loaded by default — http://localhost:8888/3D_Apps_2019/lab9/index.php/
	// The view here is my Coca Cola Virtual Museum, which s simply a repository of all the things we have done from lab 1 to Lab 8
    function home()
	{
		// At the moment data is input from a JSON file directly from the getJsonData.js file using the JQuery AJAX method .getJson()
		// $.getJSON('../application/model/data.json', function(jsonObj) {handler goes here} — The URL here should really be a path to this home() method.
		// Then you would:
		
		// Insert code to access a method in the Model class that returns a PHP array with the data you need, e.g.
		// $data = $this->model->apiGetJsonMuseumData();
		$this->load->view('viewCocaCola');
		// Echo the data out to the browser and trap it in the $.getJSON() handler and inject it into the view as before
		// echo ($data);

	}

	
	function addComment(){
		$brandName = $_GET['comment'];
		echo $_GET["comment"];
		$this->model->dbAddInfor($brandName);
		echo json_encode("{add:'successful'}");
	
	}

	function getAllComment(){
		$data = $this->model->dbgetAllInfor();
		echo json_encode($data);
	}

	
	function deleteAllData(){
		$data = $this->model->dbDeleteData();
		echo json_encode($data);
	}


	
	function viewComment(){

		// $brandName = $_GET['];
		$this->load->view('viewComment');
	}
	
	function viewMain(){
		$this->load->view('viewCocaCola');	
	}
	
	function viewCreateTable(){
		$this->model->dbCreateTable();
		echo json_encode("{res:111}");
	}
	

	// Load the Coca Cola view and get data from the model — this is the same as the home() method.
	function apiCocaCola()
	{
		$this->load->view('viewCocaCola');	
	}

	// We can see from this method how to get data from the model and echo it out to the view
	// You should be able to see how to combine this with the method above to arrive at the suggested home() method.
	function apiGetCokeData()
	{
		$data = $this->model->dbGetData();
		echo json_encode($data);
	}  	 

	
}
?>    