app.factory("macaronCart",["$http","$log","$rootScope",function($http,$log,$rootScope){

  var cart = {};

  cart.macarons = [];

  cart.days = [];

  cart.itemCount = 0;

  cart.flavor = {};

  cart.checkoutArray = [];

  cart.total = 0;

  cart.retrieveMacarons = function () {
    return cart.macarons;
  };

  cart.getFlavor = function () {
    return cart.flavor;
  };

  cart.getDays = function () {
    return cart.days;
  };

  cart.generateFlavor = function (date) {
    for(var i = 0; i < cart.macarons.length; i++){
      if(cart.macarons[i].day == date){
        cart.macarons[i].category = '1';
        cart.flavor = cart.macarons[i];
        cart.macarons.splice(i,1);
        cart.macarons.unshift(cart.flavor);
        cart.broadcastItem();
      }
    }
  };

  cart.generateCheckout = function () {
    var checkoutArray = [];
    for(var i = 0; i < cart.macarons.length; i++){
      var item = cart.macarons[i];
      if(item.count > 0){
        item.itemTotal = item.count * item.cost;
        checkoutArray.push(item);
      }
    }
    cart.checkoutArray = checkoutArray;
    return cart.checkoutArray;
  };

  cart.updateMacarons = function (array) {
    cart.macarons = array;
    cart.getItemCount();
    cart.calculateTotal();
    cart.broadcastItem();
  };

  cart.getItemCount = function () {
    var counter = 0;
    for(var i=0; i<cart.macarons.length; i++){
      var macaron = cart.macarons[i];
      counter += macaron.count;
    }
    cart.itemCount = counter;
  };

  cart.calculateTotal = function () {
    var total = 0;
    for(var i = 0; i<cart.checkoutArray.length; i++){
      total += cart.checkoutArray[i].cost * cart.checkoutArray[i].count;
    }
    cart.total = total;
    return cart.total;
  };

  cart.broadcastItem = function () {
    $rootScope.$broadcast('handleBroadcast');
  };

  cart.httpMacaron = function () {
    return $http.get("tevinmantock.com/mb_php/mysql_connect.php")
    .success(function(data) {
      var date = new Date();
      var weekday = new Array(7);
      weekday[0] = "Sunday"; weekday[1]="Monday"; weekday[2]="Tuesday"; weekday[3]="Wednesday"; weekday[4]="Thursday"; weekday[5]="Friday"; weekday[6]="Saturday";
      var day = weekday[date.getDay()];

      var days = [];
      for(var index in data){
        data[index].count = 0;
        if(parseInt(data[index].category) === 2){
          days.push(data[index]);
        }
      }

      cart.days = days;
      cart.macarons = data;
      cart.generateFlavor(day);

      $log.log("Shopping Data Retrieved");
      return data;
    })
    .error(function (err) {
      $log.warn(err);
      return err;
    });
  };

  cart.httpMacaron();

  return cart;
}]);
