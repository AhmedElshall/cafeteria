//* ////////////////////////////////////////////////////////////////////////
//! 02_user
let addItem = $(".choosen-items .item-counter .add"),
  subItem = $(".choosen-items .item-counter .sub"),
  removeItem = $(".choosen-items .price .remove"),
  priceArr = [];
function getSum(total, num) {
  return total + num;
}

$(".all-products .products .each-order").on("click", function() {
  let itemPrice = parseInt(
      $(this)
        .find("input")
        .val()
    ),
    itemName = $(this)
      .find("input")
      .attr("name");

  let choosenItems = $(".choosen-items ul"),
    newItem = `<li> 
                <div class='item-info'> 
                  <h5> ${itemName} </h5> 
                  <div class='item-counter'>
                    <span>1</span>
                    <i class='add'>+</i>
                    <i class='sub'>-</i>
                  </div>
                  <div class="price">
                    <span>EGP <span>${itemPrice}</span></span>
                    <i class="remove">X</i>
                  </div>
                  <input type="text" name="${itemName}" value="${itemPrice}" hidden />
                  <span class="itemPrice hidden">${itemPrice}</span>
                </div>
              </li>`;
  choosenItems.append(newItem);
  let totalPrice = $(".orders-panel .total-price span span");
  priceArr.push(itemPrice);
  let total = priceArr.reduce(getSum);
  totalPrice.text(total);
  // .appendTo(choosenItems);
  // alert(itemName);
});

$(".choosen-items").on("click", ".item-counter .add", function() {
  // addItem.on("click", function() {
  let itemPrice = parseInt(
    $(this)
      .parents(".item-info")
      .find(".itemPrice")
      .html()
  );
  // let itemTotalPrice = parseInt(
  //   $(this)
  //     .parents(".item-info")
  //     .find("input")
  //     .attr("value")
  // );
  let itemCounter = $(this)
    .parent()
    .find("span")
    .html();
  let newPrice = parseInt(
    $(this)
      .parents(".item-info")
      .find(".price span span")
      .text()
  );
  let totalPrice = $(".orders-panel .total-price span span");
  itemCounter++;
  newPrice = newPrice + itemPrice;
  $(this)
    .parent()
    .find("span")
    .text(itemCounter);
  $(this)
    .parents(".item-info")
    .find(".price span span")
    .text(newPrice);
  $(this)
    .parents(".item-info")
    .find("input")
    .attr("value", newPrice);
  priceArr.push(itemPrice);
  let total = priceArr.reduce(getSum);
  totalPrice.text(total);
  console.log(priceArr);
  console.log(total);
});
// });

$(".choosen-items").on("click", ".item-counter .sub", function(e) {
  // subItem.on("click", function() {
  let itemPrice = parseInt(
    $(this)
      .parents(".item-info")
      .find(".itemPrice")
      .html()
  );
  // let itemPrice = parseInt(
  //   $(this)
  //     .parents(".item-info")
  //     .find("input")
  //     .attr("value")
  // );
  let itemCounter = $(this)
    .parent()
    .find("span")
    .html();
  let newPrice = parseInt(
    $(this)
      .parents(".item-info")
      .find(".price span span")
      .text()
  );
  let totalPrice = $(".orders-panel .total-price span span");
  itemCounter--;
  newPrice = newPrice - itemPrice;
  if (itemCounter <= 0) {
    newPrice = 0;
    itemCounter = 0;
  }
  // if (newPrice <= 0) {
  //   e.preventDefault();
  // }
  $(this)
    .parent()
    .find("span")
    .text(itemCounter);
  $(this)
    .parents(".item-info")
    .find(".price span span")
    .text(newPrice);
  $(this)
    .parents(".item-info")
    .find("input")
    .attr("value", newPrice);
  priceArr.splice(priceArr.indexOf(itemPrice), 1);
  let total;
  total = priceArr.reduce(getSum, 0);
  totalPrice.text(total);
  console.log(priceArr);
  console.log(total);
});
// });

$(".choosen-items ").on("click", ".price .remove", function() {
  $(this)
    .parents("li")
    .remove();
});

//* ////////////////////////////////////////////////////////////////////////
