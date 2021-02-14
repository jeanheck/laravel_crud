window.onload = (event) => {
  generateProductsList();
};

function generateProductsList(){
  const formated = JSON.parse(productsAtOrder.replace(/(&quot;)/g, '"'));

  formated.forEach(product => {
    add({
      id: product.id,
      amount: product.pivot.amount
    });
  });
}

const products = JSON.parse(productsData.replace(/(&quot;)/g, '"'));
let items = [];

function add(item) {
  items.push(item);
  let index = items.length - 1;

  document.getElementById("productsList").innerHTML +=
    `
    <div class="row" id="productOnList${index}" name="productOnList${index}">
      <div class="col-4">
        <select class="form-control" name="productOnList[]" id="productOnList[]">
          ${getProductsOptions(item)}
        </select>
      </div>
      <div class="col-2">
        <input class="form-control" type="number" name="productOnListAmount[]" id="productOnListAmount[]" value="${item.amount}">
      </div>
      <div class="col-2">
        <a href="#" id="removeItem" name="removeItem" onClick="remove(${index})">
          <i class="bi-trash delete-icon"></i>
        </a>
      </div>
    </div>`;
}
function remove(index) {
  document.getElementById(`productOnList${index}`).remove();
  items.splice(index, 1);
}
function getProductsOptions(selectedItem){
  let options;

  products.forEach(product => {
    let selected = product.id == selectedItem.id ? 'selected' : '';
    options += `<option value="${product.id}" ${selected}>${product.name}</option>`;
  });

  return options;
}

document.getElementById("add").onclick = () => {
  let product = document.getElementById("product").value;
  let amount = document.getElementById("amount").value;
  
  add({
    id: product,
    amount: amount
  });
};
