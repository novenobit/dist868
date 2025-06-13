// ************************************************
// proCart API
// ************************************************

var proCart = (function() {
  // =============================
  // Private methods and propeties
  // =============================
  cart = [];

  // Constructor
  function Item(proName, proPrice, numItems) {
    this.proName = proName;
    this.proPrice = proPrice;
    this.numItems = numItems;
  }

  // Save cart
  function saveCart() {
    sessionStorage.setItem('proCart', JSON.stringify(cart));
  }

    // Load cart
  function loadCart() {
    cart = JSON.parse(sessionStorage.getItem('proCart'));
  }
  if (sessionStorage.getItem("proCart") != null) {
    loadCart();
  }


  // =============================
  // Public methods and propeties
  // =============================
  var obj = {};

  // Add to cart
  obj.addItemToCart = function(proName, proPrice, numItems) {
    for(var item in cart) {
      if(cart[item].proName === proName) {
        cart[item].numItems ++;
        saveCart();
        return;
      }
    }
    var item = new Item(proName, proPrice, numItems);
    cart.push(item);
    saveCart();
  }
  // Set numItems from item
  obj.setnumItemsForItem = function(proName, numItems) {
    for(var i in cart) {
      if (cart[i].proName === proName) {
        cart[i].numItems = numItems;
        break;
      }
    }
  };
  // Remove item from cart
  obj.removeItemFromCart = function(proName) {
      for(var item in cart) {
        if(cart[item].proName === proName) {
          cart[item].numItems --;
          if(cart[item].numItems === 0) {
            cart.splice(item, 1);
          }
          break;
        }
    }
    saveCart();
  }

  // Remove all items from cart
  obj.removeItemFromCartAll = function(proName) {
    for(var item in cart) {
      if(cart[item].proName === proName) {
        cart.splice(item, 1);
        break;
      }
    }
    saveCart();
  }

  // Clear cart
  obj.clearCart = function() {
    cart = [];
    saveCart();
  }

  // numItems cart
  obj.totalnumItems = function() {
    var totalnumItems = 0;
    for(var item in cart) {
      totalnumItems += cart[item].numItems;
    }
    return totalnumItems;
  }

  // Total cart
  obj.totalCart = function() {
    var totalCart = 0;
    for(var item in cart) {
      totalCart += cart[item].proPrice * cart[item].numItems;
    }
    return Number(totalCart.toFixed(2));
  }

  // List cart
  obj.listCart = function() {
    var cartCopy = [];
    for(i in cart) {
      item = cart[i];
      itemCopy = {};
      for(p in item) {
        itemCopy[p] = item[p];

      }
      itemCopy.total = Number(item.proPrice * item.numItems).toFixed(2);
      cartCopy.push(itemCopy)
    }
    return cartCopy;
  }

  // cart : Array
  // Item : Object/Class
  // addItemToCart : Function
  // removeItemFromCart : Function
  // removeItemFromCartAll : Function
  // clearCart : Function
  // numItemsCart : Function
  // totalCart : Function
  // listCart : Function
  // saveCart : Function
  // loadCart : Function
  return obj;
})();


// *****************************************
// Triggers / Events
// *****************************************
// Add item
$('.add-to-cart').click(function(event) {
  event.preventDefault();
  var proName = $(this).data('proName');
  var proPrice = Number($(this).data('proPrice'));
  proCart.addItemToCart(proName, proPrice, 1);
  displayCart();
});

// Clear items
$('.clear-cart').click(function() {
  proCart.clearCart();
  displayCart();
});


function displayCart() {
  var cartArray = proCart.listCart();
  var output = "";
  for(var i in cartArray) {
    output += "<tr>"
      + "<td>" + cartArray[i].proName + "</td>"
      + "<td>(" + cartArray[i].proPrice + ")</td>"
      + "<td><div class='input-group'><button class='minus-item input-group-addon ui button primary' data-proName=" + cartArray[i].proName + ">-</button>"
      + "<input type='number' class='item-numItems form-control' data-proName='" + cartArray[i].proName + "' value='" + cartArray[i].numItems + "'>"
      + "<button class='plus-item ui button primary input-group-addon' data-proName=" + cartArray[i].proName + ">+</button></div></td>"
      + "<td><button class='delete-item ui button danger' data-proName=" + cartArray[i].proName + ">X</button></td>"
      + " = "
      + "<td>" + cartArray[i].total + "</td>"
      +  "</tr>";
  }
  $('.show-cart').html(output);
  $('.total-cart').html(proCart.totalCart());
  $('.total-numItems').html(proCart.totalnumItems());
}

// Delete item button

$('.show-cart').on("click", ".delete-item", function(event) {
  var proName = $(this).data('proName')
  proCart.removeItemFromCartAll(proName);
  displayCart();
})


// -1
$('.show-cart').on("click", ".minus-item", function(event) {
  var proName = $(this).data('proName')
  proCart.removeItemFromCart(proName);
  displayCart();
})
// +1
$('.show-cart').on("click", ".plus-item", function(event) {
  var proName = $(this).data('proName')
  proCart.addItemToCart(proName);
  displayCart();
})

// Item numItems input
$('.show-cart').on("change", ".item-numItems", function(event) {
   var proName = $(this).data('proName');
   var numItems = Number($(this).val());
  proCart.setnumItemsForItem(proName, numItems);
  displayCart();
});

displayCart();
