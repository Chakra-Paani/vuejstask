<?php
session_start();
if (time() - $_SESSION['expire'] > 1800) 
	{
		// last request was more than 30 minutes ago
		session_unset();     // unset $_SESSION variable for the run-time 
		session_destroy();   // destroy session data in storage
		header("Location: /vuejstasks");
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

    <title>Vuejs Quiz app</title>

    <!-- Required Stylesheets -->
    <link
      type="text/css"
      rel="stylesheet"
      href="https://unpkg.com/bootstrap/dist/css/bootstrap.min.css"
    />
    <link
      type="text/css"
      rel="stylesheet"
      href="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css"
    />

    <!-- Load polyfills to support older browsers -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es2015%2CIntersectionObserver"></script>

    <!-- Required scripts -->
    <script src="https://npmcdn.com/vue/dist/vue.js"></script>
	<script src="https://npmcdn.com/vue-router/dist/vue-router.js"></script>
    <script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>
	
	 <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
			<h4>Start Your Quiz By Selecting Any Subject</h4><br/>
			<b-row>
				
			  <b-col lg="2" class="pb-2" v-for='event in events'>
					<a :href="'quiztest.php/' + event.cid"><b-button variant="primary" style="width:100%" >{{ event.name }}</b-button></a>
				</b-col lg="2">
				 
			</b-row>
		  </b-container>
		</div>

    <!-- Start running your app -->
	<script>
	
      window.app = new Vue({
        el: '#app',
        data: {
          name: '<?=$_SESSION["user_first_name"]." ".$_SESSION["user_last_name"];?>',
		  events: "",
        },
		methods: {
			getEvents: function () {
				axios.post('actions.php', {
				events: 'All'
				})
				.then(function (response) {
					console.log(response.data);
					app.events = response.data;
						  
					})
					.catch(function (error) {
						  console.log(error);
					});
			},
			goToTest(id){
				console.log(id);			
				},
		},
		beforeMount(){
    	this.getEvents()
    },
        computed: {
          showAlert() {
            return this.name.length > 4 ? true : false
          }
        }
      })
    </script>

  </body>
</html>