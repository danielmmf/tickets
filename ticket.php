<!DOCTYPE html>
<html  ng-app="sampleApp">
<head>
	<title>Venda de convites</title>
</head>
<body ng-controller="SampleCtrl">
Convites Vendidos
	<ul>
      <li ng-repeat="message in messages" ng-show="message.qrCode == convite">
        <!-- edit a message -->
        <span>{{message.clientName}} - {{message.clientPhone}} - {{message.ticketValue}} - {{message.paymentMethod}}</span>
        <!-- delete a message -->
        <button ng-click="messages.$remove(message)">Remover convite</button>
      </li>
    </ul>
    <hr>
   <a href="/vendas.html" class="btn btn-outline-primary">Voltar</a>
    
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>

<!-- Firebase -->
<script src="https://www.gstatic.com/firebasejs/3.6.6/firebase.js"></script>

<!-- AngularFire -->
<script src="https://cdn.firebase.com/libs/angularfire/2.3.0/angularfire.min.js"></script>
<script type="text/javascript">
	var config = {
	    apiKey: "AIzaSyCs7QgMjDqRJJ6lw9heZFEYNERaWi3ja74",
	    authDomain: "gr-360.firebaseapp.com",
	    databaseURL: "https://gr-360.firebaseio.com",
	    projectId: "gr-360",
	    storageBucket: "gr-360.appspot.com",
	    messagingSenderId: "686521366589",
	    appId: "1:686521366589:web:1f0aceba681a0c5e869254",
	    measurementId: "G-YRTC6WYQ2D"
	  };
  firebase.initializeApp(config);
	var app = angular.module("sampleApp", ["firebase"]);
	app.controller("SampleCtrl", function($scope, $firebaseArray) {
	  var ref = firebase.database().ref().child("messages");
	  // create a synchronized array
	  $scope.messages = $firebaseArray(ref);
	  $scope.convite = "<?php echo $_GET['qr'];?>";
	  // add new items to the array
	  // the message is automatically added to our Firebase database!
	  $scope.addMessage = function() {
	    $scope.messages.$add({
	      text: $scope.newMessageText
	    });
	  };
	  // click on `index.html` above to see $remove() and $save() in action
	});
</script>
</body>
</html>