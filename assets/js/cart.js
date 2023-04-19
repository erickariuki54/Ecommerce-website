/*delete items from the cart */
$(document).ready(function() {
  // Listen for clicks on the delete button
  $('button.delete-item').on('click', function() {
    // Get the cart item ID from the data-id attribute
    var cartItemId = $(this).data('id');
    
    // Send an AJAX request to delete the item from the database
    $.ajax({
      url: 'redirect.php',
      type: 'POST',
      data: {
        cartItemId1: cartItemId
      },
      success: function(response) {
        // If the delete was successful, remove the row from the table
        $('tr[data-id="' + cartItemId + '"]').remove();
        
        // Update the total price on the page
        var total = parseFloat(response);
        $('#total-price').text(total.toFixed(2));
      },
      error: function(xhr, status, error) {
        // Handle errors here
        console.log('Error deleting item:', error);
      }
    });
    // Remove the row from the table
    $(this).closest('tr').remove();
    
    
  });
});

  $(document).ready(function() {
  updateCartSummary();
  
  $('.table1').on('change', 'input[type="number"]', function() {
    updateCartSummary();
  });
});

function updateCartSummary() {
  var totalQuantity = 0;
  var totalAmount = 0;

  $('.table1 tbody tr').each(function() {
    var quantity = parseInt($(this).find('input[type="number"]').val());
    var price = parseFloat($(this).find('td:nth-child(4)').text().replace('KSHS.', ''));
    var total = quantity * price;

    $(this).find('td:nth-child(5)').text('KSHS.' + total.toFixed(2));

    totalQuantity += quantity;
    totalAmount += total;
  });

  $('#total-quantity').text(totalQuantity);
  $('#total-amount').text('KSHS.' + totalAmount.toFixed(2));
}
/*update the quantity value to the database in realtime*/
$(document).ready(function() {
  // Listen for changes to the quantity input field
  $('input[data-id]').on('change', function() {
    // Get the cart item ID from the data-id attribute
    var cartItemId = $(this).data('id');
    
    // Get the new quantity value
    var quantity = $(this).val();
    
    // Send an AJAX request to update the quantity value in the database
    $.ajax({
      url: 'redirect.php',
      type: 'POST',
      data: {
        cartItemId: cartItemId,
        quantity: quantity
      },
      success: function(response) {
        // If the update was successful, update the total price on the page
        var total = parseFloat(response);
        $('#total-price').text(total.toFixed(2));
      },
      error: function(xhr, status, error) {
        // Handle errors here
        console.log('Error updating quantity:', error);
      }
    });
  });
});/*delete items from the cart */
$(document).ready(function() {
// Listen for clicks on the delete button
$('button.delete-item').on('click', function() {
  // Get the cart item ID from the data-id attribute
  var cartItemId = $(this).data('id');
  
  // Send an AJAX request to delete the item from the database
  $.ajax({
    url: 'redirect.php',
    type: 'POST',
    data: {
      cartItemId1: cartItemId
    },
    success: function(response) {
      // If the delete was successful, remove the row from the table
      $('tr[data-id="' + cartItemId + '"]').remove();
      
      // Update the total price on the page
      var total = parseFloat(response);
      $('#total-price').text(total.toFixed(2));
    },
    error: function(xhr, status, error) {
      // Handle errors here
      console.log('Error deleting item:', error);
    }
  });
  updateCartBadge();
  // Remove the row from the table
  $(this).closest('tr').remove();
  updateCartBadge();
  updateCartSummary();
  
  
});
});

$(document).ready(function() {
updateCartSummary();

$('.table1').on('change', 'input[type="number"]', function() {
  updateCartSummary();
});
});

function updateCartSummary() {
  var totalQuantity = 0;
  var totalAmount = 0;

  $('.table1 tbody tr').each(function() {
    var quantity = parseInt($(this).find('input[type="number"]').val());
    var price = parseFloat($(this).find('td:nth-child(4)').text().replace('KSHS.', ''));
    var total = quantity * price;

    $(this).find('td:nth-child(5)').text('KSHS.' + total.toFixed(2));

    totalQuantity += quantity;
    totalAmount += total;
  });

  $('#total-quantity').text(totalQuantity);
  $('#total-amount').text('KSHS.' + totalAmount.toFixed(2));
}
/*update the quantity value to the database in realtime*/
$(document).ready(function() {
  // Listen for changes to the quantity input field
    $('input[data-id]').on('change', function() {
    // Get the cart item ID from the data-id attribute
    var cartItemId = $(this).data('id');
    
    // Get the new quantity value
    var quantity = $(this).val();
    
    // Send an AJAX request to update the quantity value in the database
    $.ajax({
      url: 'redirect.php',
      type: 'POST',
      data: {
        cartItemId: cartItemId,
        quantity: quantity
      },
      success: function(response) {
        // If the update was successful, update the total price on the page
        var total = parseFloat(response);
        $('#total-price').text(total.toFixed(2));
      },
      error: function(xhr, status, error) {
        // Handle errors here
        console.log('Error updating quantity:', error);
      }
    });
  });
});
/*number of items in the cart*/
// Update the cart badge count on page load
$(document).ready(function() {
  updateCartBadge();
});


function updateCartBadge() {
  // Send an AJAX request to fetch the updated badge count from the server
  $.ajax({
    url: 'number_cart.php',
    type: 'GET',
    data:{cartupdate:1},
    
    success: function(response) {
      // Update the cart badge value with the updated count
      $('.cart-badge').text(response);
    },
    error: function(xhr, status, error) {
      console.log('Error fetching badge count:', error);
    }
  });
}

