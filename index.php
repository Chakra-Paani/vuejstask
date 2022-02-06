
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
					<b-alert variant="success" :show="showAlert">{{ titlename }} <b-btn variant="primary"  style="float:right;" href="/vuejstasks/">Home</b-btn> </b-alert>
				</b-row>
			</b-container>
			<b-container>
				<b-row>
					<b-col lg="8">
						<h4>List Of Quiz Categories</h4>
					</b-col lg="8">
					<b-col lg="4">
						<b-btn variant="primary" v-on:click="show = !show" style="float:right;">Add +</b-btn>
					</b-col lg="4">
					<br/>
				</b-row>
				<b-col lg="8" style="margin:auto;padding:bottom:1rem;">
				<template>
					<div>
						<div v-if="show">
							 <template>
								<b-container class="formcontainer">
									<form @submit.prevent="handleSubmit">
									
										<div class="row">
										  <div class="col-25">
											<label for="fname">Quiz Name</label>
										  </div>
										  <div class="col-75">
											<input class="form-control" type="name" placeholder="Quiz Name" v-model="quizname" />
										  </div>
									
											<b-btn variant="secondary" class="submitbtn" type="submit" style="margin:1rem auto;">Submit</b-btn>
										</div>
										
									</form>
								</b-container>
							</template>
						</div>
				 </div>
				</template>
				</b-col lg="8">
			<b-row>
				
			  <b-col lg="8" class="pb-2" style="margin:auto;">
				<table class="table">
					<thead>
					  <tr>
						<th>S No</th>
						<th>Category</th>
						<th>Manage Test</th>
					  </tr>
					</thead>
					<tbody>
					  <tr v-for='(event,index) in events'>
						<td>{{ index+1 }}</b-td>
						<td>{{ event.name }}</b-td>
						<td><a :href="'Addquiztest.php/' + event.cid"><b-button variant="primary" style="width:100%" >Add Questions </b-button></a>
						</td>
					  </tr>
					  
					</tbody>
				  </table>
					
				</b-col lg="8">
				 
			</b-row>
		  </b-container>
		  
		</div>
	
    <!-- Start running your app -->
	<script>
		Vue.use(VeeValidate);	
      window.app = new Vue({
        el: '#app',
        data: {
          titlename: 'Welcome.. Click On The Add Button To Add Quiz Category',
		  events: "",
		  quizname: "",
		  show: false,

        },
		
		methods: {
			getEvents: function () {
				axios.post('/vuejstasks/actions.php', {
				events: 'All'
				})
				.then(function (response) {
					
					app.events = response.data;
						  
					})
					.catch(function (error) {
						  console.log(error);
					});
			},
			handleSubmit:function()
			{
				  console.log(this.quizname);
				  if(this.quizname!='')
				  {
					  const formData = new FormData()
					  
					  formData.append('name', this.quizname)
					  axios.post('quizactions.php', formData, {
					  }).then((res) => {
						if(res.data == "Submitted")
						{
							this.show=false;
							this.getEvents();
							this.quizname="";
						}
						
					  })
				  }
		
			},
			
		},
		beforeMount(){
			this.getEvents();
			
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