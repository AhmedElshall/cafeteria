let userRow = $(".checks .user-checks");
let userData = $(".checks .user-checks ");
console.log(userData);

userRow.each(function() {
  $(this).on("click", ".user", function() {
    $(this)
      .next()
      .slideToggle("slow");
    $(this)
      .find("i")
      .toggleClass("fa-minus-square fa-plus-square", 1000);
  });
});

userData.each(function() {
  $(this).on("click", ".user .user__data", function() {
    $(this)
      .next()
      .slideToggle("700");
  });
});
