<?php
session_start();
if (time() - $_SESSION['expire'] > 1800) 
	{
		// last request was more than 30 minutes ago
		session_unset();     // unset $_SESSION variable for the run-time 
		session_destroy();   // destroy session data in storage
		header("Location: /vuejstasks/");
	}

    else 
	{ 
		$_SESSION['expire'] = time(); // update last activity time stamp
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <title>Vue js Quiz app</title>

    <!-- Required Stylesheets -->
    <link type="text/css" rel="stylesheet" href="https://unpkg.com/bootstrap/dist/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css"/>

    <!-- Load polyfills to support older browsers -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es2015%2CIntersectionObserver"></script>

    <!-- Required scripts -->
    <script src="https://npmcdn.com/vue/dist/vue.js"></script>
	<script src="https://npmcdn.com/vue-router/dist/vue-router.js"></script>
    <script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>
	
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	
	<style>
	
		#qtext 
		{
			font-size: 18px;
		}	
		.pb-2 
		{
			padding-bottom: 0rem!important;
		}
		p 
		{
			margin-top: 1.2em;
			margin-bottom: 1.2em;
			font-size: 15px;
		}
		#quizform 
		{
			margin-top: 40px;
		}
		#altcontainer 
		{
			background-color: #fff;
			font-size: 120%;
			line-height: 1.7em;
		}
		#answerbuttoncontainer
		{
			padding-top:1rem;
		}
		.radiocontainer 
		{
			background-color: #E7E9EB;
			display: block;
			position: relative;
			padding: 10px 10px 10px 50px;
			margin-bottom: 1px;
			cursor: pointer;
			font-size: 18px;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			word-wrap: break-word;
		}
		.checkedlabel 
		{
			background-color: #ddd;
		}
		.radiocontainer input 
		{
			position: absolute;
			opacity: 0;
			cursor: pointer;
		}
		.radiocontainer input:checked ~ .checkmark 
		{
			background-color: #2196F3;
		}
		.radiocontainer input:checked ~ .checkmark:after 
		{
			display: block;
		}
		.checkmark:after 
		{
			content: "";
			position: absolute;
			display: none;
		}
		.radiocontainer .checkmark:after 
		{
			top: 6px;
			left: 6px;
			width: 7px;
			height: 7px;
			border-radius: 50%;
			background: white;
		}
		.ws-green 
		{
			background-color: #04AA6D!important;
			color: white!important;
		}
		.w3-btn, .w3-button {
			border: none;
			display: inline-block;
			padding: 8px 16px;
			vertical-align: middle;
			overflow: hidden;
			text-decoration: none;
			color: inherit;
			background-color: inherit;
			text-align: center;
			cursor: pointer;
			white-space: nowrap;
		}
		.answerbutton 
		{
			background-color: #04AA6D;
			padding: 12px 30px !important;
			font-size: 17px;
			border-radius: 5px;
		}
		.checkmark {
			position: absolute;
			top: 15px;
			left: 15px;
			height: 19px;
			width: 19px;
			background-color: #fff;
			border-radius: 50%;
		}
	</style>	
	 
  </head>
  <body>
  
		 <!-- Our application root element -->
		<div id="app">
			<b-container>
				<b-row>
					<b-alert variant="success" :show="showAlert">Hello {{ name }} <b-btn variant="primary"  style="float:right;" href="logout.php">Sign Out</b-btn> </b-alert>
				</b-row>
			</b-container>
		  <b-container>
			<h4>Welcome To The {{ quizname }} Quiz. Choose Answer and Click On Next</h4><br/>
			
			<b-row>
				<b-container>
				<div id="test">
					<form  @submit.prevent="getFormValues" id="quizform" name="quizform" method="post">
						  
						  <input type="hidden" name="answers" value="">
						  <input type="hidden" name="nextnumber">
						  
					<b-col lg="8" class="pb-2" v-for='(quizquestions, index) in events' style="margin:auto;">
	
						<div v-bind:id="'b'+(index+1)" v-bind:style= "[index+1 == 1 ? {display:'block'} : {display:'none'}]">
						<h3 v-if="events.length" >Question {{ index+1 }} of {{ events.length }}</h3>
						
						<p id="qtext">{{ quizquestions.qtitle }}</p>
						
						  <div style="position:relative;width:100%;">
							<div id="altcontainer" class="notranslate">
								<label class="radiocontainer" id="label1">{{ quizquestions.option1 }} 
									<input type="radio" v-bind:name="'quiz'+(index+1)" @click="clickRadio" value="option1" ><span class="checkmark"></span></label>
									
									<label class="radiocontainer" id="label2">{{ quizquestions.option2 }}
									<input type="radio" v-bind:name="'quiz'+(index+1)" @click="clickRadio" value="option2" ><span class="checkmark"></span></label>
									
									<label class="radiocontainer checkedlabel" id="label3"> {{ quizquestions.option3 }}
									<input type="radio" v-bind:name="'quiz'+(index+1)" @click="clickRadio" value="option3" ><span class="checkmark"></span></label>
									
									<label class="radiocontainer checkedlabel" id="label3"> {{ quizquestions.option4 }}
									<input type="radio" v-bind:name="'quiz'+(index+1)" @click="clickRadio" value="option4" ><span class="checkmark"></span></label>
									
							</div>
						  </div>
						  <div id="answerbuttoncontainer">
						  
							<b-button class="answerbutton w3-btn ws-green" :disabled=isDisabled type="button" @click="nextClick((index+1)+1)">
							
								<template v-if="index+1 != events.length">Next</template>
								<template v-if="index+1 == events.length">Submit</template>
								
							</b-button>
						  </div>
						</div>
						
					</b-col lg="8">
					</form>
				</div>
				
				<b-col lg="8">
					<div v-html = "htmlcontent"></div>
					
				</b-col lg="8">
				</b-container>
			</b-row>
		  </b-container>
		</div>
	
    <!-- Start running your app -->
	<script>
		var currentUrl = window.location.pathname;
		let newArr = currentUrl.split('/');
		let testval = newArr[newArr.length - 1];
		let length = "";
		let ans = [];
			
      window.app = new Vue({
        el: '#app',
		name: "Filter",
        data: {
          name: '<?=$_SESSION["user_first_name"]." ".$_SESSION["user_last_name"];?>',
		  events: "",
		  quizname: "",
		  quiz: "",
		  qans: "",
		  htmlcontent : "",
		  isDisabled: true,	 
        },
		methods: {
			getQuizname: function(itemId) {
				console.log(itemId);
				axios.post('/vuejstasks/actions.php', {
				eventname: itemId,
				
				})
				.then(function (response) {
					//console.log(response.data);
					let name = response.data[0]['name'];
					//console.log(name);
					app.quizname = name;
					  
					})
					.catch(function (error) {
						  console.log(error);
					});
			},
			getQuizquestions: function(itemId) {
				console.log(itemId);
				axios.post('/vuejstasks/actions.php', {
				eventquestions: itemId,
				eventname: itemId,
				events: '',
				})
				.then(function (response) {
					console.log(response.data);
					app.events = response.data;	
					length = response.data.length;
					//console.log(length);
					if(length == 0)
					{
						app.htmlcontent = "<div><h3 style='color:green;'>This Quiz Will be Coming Soon</h1></div><br/><a href='/vuejstasks/quizdashboard.php'><button class='btn btn-danger'>Go To Quiz</button></a>";
					}
					
					})
					.catch(function (error) {
						  console.log(error);
					});
			},
			clickRadio (e) {
				console.log(e.target.value);
				this.isDisabled=false;
			},
			nextClick: function(item)
			{
				console.log(item);
				if((item-1) == length)
				{
					console.log("submit");
					$('input[type=radio]:checked').each(function() {
						ans.push($(this).val());
					});
					$('#test').hide();
					this.postData(ans);
					
				}
				else
				{
					$('#b'+item).show();
					$('#b'+(item-1)).hide();
					this.isDisabled=true;
				}
			},
			postData: function(ans) {
				console.log(ans);
				console.log(testval);
				axios.post('/vuejstasks/actions.php', {
				submitquestions: ans,
				eventname: "",
				eventname1: testval,
				events: '',
				})
				.then(function (response) {
					console.log(response.data);
					let marksscored = response.data;	
					app.htmlcontent = "<div><h3 style='color:green;'>You scored "+marksscored+" Points in this Quiz</h1></div><br/><a href='/vuejstasks/quizdashboard.php'><button class='btn btn-danger'>Go To Quiz</button></a>";
					
					})
					.catch(function (error) {
						  console.log(error);
					}); 
			},
		
		},
		created() {
			console.log(testval);
		},
		beforeMount(){
			this.getQuizname(testval);
			this.getQuizquestions(testval);
		},
        computed: {
          showAlert() {
            return this.name.length > 4 ? true : false
          }
		 
        }
      });
	  
	
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </body>
</html>