let orderRow = $(".admin-orders table");

orderRow.each(function() {
  $(this).on("click", ".order", function() {
    $(this)
      .next()
      .fadeToggle("700");
    $(this)
      .find("i")
      .toggleClass("fa-minus-square fa-plus-square", 1000);
  });
});
