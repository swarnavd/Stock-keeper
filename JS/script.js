$(document).ready(function () {
  /**
 * This function works when user clicks on delete button and it deleted a parti
 * cular stock.
 */
  $(document).on('click', '.remove', function () {
    let id = $(this).data('id');
    $.ajax({
      url: "ajax-delete.php",
      type: "post",
      data: {
        id: id
      },
      success: function (res) {
        $(".default-show").html(res);
      }
    })
  })

  /**
   * This function edit a particular stock's name and price when user clicks on edit button.
   */
  $(document).on('click', '.edit', function () {
    $(".edit-div").show();
    let id = $(this).data('id');
    $(document).on('click', '.cross', function () {
      $(".edit-div").hide();
    })
    $(document).on('click', '.editBtn', function () {
      let edit = $(".edit-field").val();
      let price = $(".price").val();
      $.ajax({
        url: "ajax-update.php",
        type: "post",
        data: {
          id: id,
          edit: edit,
          price: price
        },
        success: function (res) {
          $(".default-show").html(res);
          // Sets input field empty.
          $(".edit-field").val("")
        }
      })
      $(".edit-div").hide();
    })
  })
})
