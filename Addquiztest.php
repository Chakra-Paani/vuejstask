
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
	<script src="https://unpkg.com/vee-validate@2.0.0-rc.18/dist/vee-validate.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vee-validate@3.3.8/dist/rules.umd.js"></script>
	<script src="https://unpkg.com/axios@0.17.0/dist/axios.js"></script>
	
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
		
		/* Form Styles */
		.formcontainer
		{
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
		}
		.col-25 
		{
		  float: left;
		  width: 25%;
		  margin-top: 6px;
		}

		.col-75 
		{
		  float: left;
		  width: 75%;
		  margin-top: 6px;
		}
		.submitbtn
		{
		  background-color: #04AA6D;
		  color: white;
		  padding: 12px 20px;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		  float: right;
		  width:auto;
		}
		/* Form Styles Ends */
		
	</style>	
	 
  </head>
  <body>
  
		 <!-- Our application root element -->
		<div id="app">
			<b-container>
				<b-row>
					<b-alert variant="success" :show="showAlert">{{ titlename }} <b-btn variant="primary"  style="float:right;" href="/vuejstasks/Admin/">Back</b-btn> </b-alert>
				</b-row>
			</b-container>
			<b-container>
				<b-row>
					<b-col lg="8">
						<h4>{{ quizname }} Quiz Questions</h4>
					</b-col lg="8">
					<b-col lg="4">
						<b-btn variant="primary" v-on:click="show = !show" style="float:right;">Add +</b-btn>
					</b-col lg="4">
					<br/>
				</b-row>
				<b-col lg="10" style="margin:auto;padding:bottom:1rem;">
				<template>
					<div>
						<div v-if="show">
							<template>
								<b-container class="formcontainer">
									<div id="addqnsform">
									<form @submit.prevent="handleSubmit">
									
										<div class="row">
											
										  <div class="col-25">
											<b><label for="fname">Quiz Name</label></b>
										  </div>
										  <div class="col-75">
											<input class="form-control" type="text" placeholder="Quiz Question" v-model="quizquestion" />
										  </div>
										  
										  <div class="col-25">
											<b><label for="fname">Choose Level</label></b>
										  </div>
										  <div class="col-75">
											<select class="form-control" type="select" v-model="quizlevel">
											<option value="">Select Quiz Level</option>
											<option value="1">Beginner</option>
											<option value="2">Intermediate</option>
											<option value="3">Professional</option>
											</select>
										  </div>
										  
										  <div class="col-25">
											<b><label for="fname">Option 1</label></b>
										  </div>
										  <div class="col-75">
											<input class="form-control" type="text" placeholder="Enter Option 1" v-model="option1" />
										  </div>
										  
										 
										  <div class="col-25">
											<b><label for="fname">Option 2</label></b>
										  </div>
										  <div class="col-75">
											<input class="form-control" type="text" placeholder="Enter Option 2" v-model="option2" />
										  </div>
										  
										  <div class="col-25">
											<b><label for="fname">Option 3</label></b>
										  </div>
										  <div class="col-75">
											<input class="form-control" type="text" placeholder="Enter Option 3" v-model="option3" />
										  </div>
										   
										 
										  <div class="col-25">
											<b><label for="fname">Option 4</label></b>
										  </div>
										  <div class="col-75">
											<input class="form-control" type="text" placeholder="Enter Option 1" v-model="option4" />
										  </div>
										  
										  <div class="col-25">
											<b><label for="fname">Answer</label></b>
										  </div>
										  <div class="col-75">
											<input type="radio" name="answer" value="option1" v-model="answer" />
											<label for="Option 1" style="padding-right: 1rem;">Option 1</label>
											<input type="radio" name="answer" value="option2" v-model="answer" />
											<label for="Option 2" style="padding-right: 1rem;">Option 2</label>
											<input type="radio" name="answer" value="option3" v-model="answer" />
											<label for="Option 3" style="padding-right: 1rem;">Option 3</label>
											<input type="radio" name="answer" value="option4" v-model="answer" />
											<label for="Option 4" style="padding-right: 1rem;">Option 4</label>
										  </div>
										  
											<b-btn variant="secondary" class="submitbtn" type="submit" style="margin:1rem auto;">Submit</b-btn>
										</div>
										
									</form>
									</div>
								</b-container>
							</template>
						</div>
				 </div>
				</template>
				</b-col lg="10">
			<b-row>
				
			  <b-col lg="10" class="pb-2" style="margin:auto;">
				<table class="table table-striped table-bordered">
					<thead>
					  <tr>
						<th>S No</th>
						<th>Name</th>
						<th>Difficulty</th>
						<th>Question</th>
						<th>Option 1</th>
						<th>Option 2</th>
						<th>Option 3</th>
						<th>Option 4</th>
						<th>Answer</th>
						
					  </tr>
					</thead>
					<tbody>
					  <tr v-for='(quizqns,index) in quizdata'>
						<td>{{ index+1 }}</td>
						<td>{{ quizqns.name }}</td>
						<td v-if="quizqns.level==1">Beginner</td>
						<td v-if="quizqns.level==2">Intermediate</td>
						<td v-if="quizqns.level==3">Professional</td>
						<td>{{ quizqns.qtitle }}</td>
						<td>{{ quizqns.option1 }}</td>
						<td>{{ quizqns.option2 }}</td>
						<td>{{ quizqns.option3 }}</td>
						<td>{{ quizqns.option4 }}</td>
						<td>{{ quizqns.answer }}</td>
						
					  </tr>
					  
					</tbody>
				  </table>
					
				</b-col lg="10">
				 
			</b-row>
		  </b-container>
		  
		</div>
	
    <!-- Start running your app -->
	
	<script>
		var currentUrl = window.location.pathname;
		let newArr = currentUrl.split('/');
		let testval = newArr[newArr.length - 1];
		
      window.app = new Vue({
        el: '#app',
        data: {
          titlename: 'Welcome.. Click On The Add Button To Add Quiz Category',
		  quizname: "",
		  quizquestion: "",
		  quizlevel: "",
		  option1: "",
		  option2: "",
		  option3: "",
		  option4: "",
		  answer: "",
		  show: false,
		  quizdata: "",
		  
        },
		mounted() {
			var _this = this;
		},
		methods: {
			getQuizName: function (testval) {
				axios.post('/vuejstasks/Admin/quizactions.php', {
				events: testval,
				getdata: 'Name',
				})
				.then(function (response) {
					//console.log(response.data);
					app.quizname = response.data;
						  
					})
					.catch(function (error) {
						  console.log(error);
					});
			},
			getQuizData: function (testval) {
				axios.post('/vuejstasks/Admin/quizactions.php', {
				events: testval,
				getdata: 'Allqns',
				})
				.then(function (response) {
					console.log(response.data);
					app.quizdata = response.data;
						  
					})
					.catch(function (error) {
						  console.log(error);
					});
			},
			handleSubmit:function()
			{
				console.log(this.quizquestion);
				console.log(this.option1);
				console.log(this.option2);
				console.log(this.option3);
				console.log(this.option4);
				console.log(this.answer);
				let quizquestion = this.quizquestion;
				let quizlevel = this.quizlevel;
				let option1 = this.option1;
				let option2 = this.option2;
				let option3 = this.option3;
				let option4 = this.option4;
				let answer 	= this.answer;
				let cid 	= testval;
			
				var isValid =true;
				$("input").each(function() 
				{
					var element = $(this);
					if (element.val() == "") 
					{
						isValid = false;
					}
				});
				if(document.querySelector('input[name="answer"]:checked'))
				{
					isValid = true;
				}
				else
				{
					
					isValid = false;
				}
				
				if(isValid)
				{
					
					axios.post('/vuejstasks/Admin/quizactions.php', {
				events: testval,
				getdata: 'insertqns',
				quizquestion : quizquestion,
				quizlevel 	 : quizlevel,
				quizoption1  : option1,
				quizoption2  : option2,
				quizoption3  : option3,
				quizoption4  : option4,
				quizanswer   : answer,
				
				})
				.then(function (response) {
					console.log(response.data);
					if(response.data == "Submitted")
						{
							
							window.location.reload();
						}
						
						  
					})
					.catch(function (error) {
						  console.log(error);
					});
				}
				
		
			},
			
		},
		beforeMount(){
			this.getQuizName(testval);
			this.getQuizData(testval);
			
		},
        computed: {
          showAlert() {
            return this.titlename.length > 4 ? true : false
          }
		 
        }
      });
	  
	
    </script>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </body>
</html>