<!DOCTYPE html>
<html  ng-app="sampleApp">
<head>
	<title>Venda de convites</title>
</head>
<body ng-controller="SampleCtrl">

	<form ng-submit="addMessage()">
		Nome do Cliente :<input type="text" name="nome" ng-model="clientName"><br>
		Telefone do Cliente :<input type="text" name="telefone" ng-model="clientPhone"><br>
		Ingresso:
		<select ng-model="ticketValue">
			<option value="35,00">Crianças acima de 10 anos</option>
			<option value="60,00">Combo mãe e filho(um ingresso)</option>
			<option value="50,00">Combo casal (2 adultos sem criança)</option>
			<option value="90,00">Combo família (3 pessoas)</option>
			<option value="110,00">Combo família II (4 pessoas) - R$ 110,00</option>
			<option value="525,00">Combo Mega (15 pessoas, 30 min + avulso)</option>
		</select>
		<br>
		<br>
		Pagamento :
		<select  ng-model="paymentMethod"> 
			<option value="Dinheiro">Dinheiro</option>
			<option value="Cartao">Cartão</option>
			<option value="Cobrar">Cobrar</option>
		</select>
		<br>
		<br>
		<input type="submit" name="Finalizar" value="comprar">
	</form>
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

	  // add new items to the array
	  // the message is automatically added to our Firebase database!
	  $scope.addMessage = function() {
	    $scope.messages.$add({
	      clientName: $scope.clientName,
	      clientPhone: $scope.clientPhone,
	      qrCode: "<?php echo $_GET['qr'];?>",
	      ticketValue: $scope.ticketValue,
	      paymentMethod: $scope.paymentMethod,
	    });
	    window.location.replace("/tickets/qr.html");
	  };
	  // click on `index.html` above to see $remove() and $save() in action
	});
</script>
</body>
</html>