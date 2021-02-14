const products = JSON.parse(productsData.replace(/(&quot;)/g, '"'));
let items = [];

function add(item) {
  items.push(item);
  let index = items.length - 1;
  
  document.getElementById("productsList").append(createNewLine(item, index));
}

function createNewLine(item, index){
  let divRow = document.createElement("div");
  divRow.setAttribute("class", "row");
  divRow.setAttribute("id", `productOnList${index}`);
  divRow.setAttribute("name", `productOnList${index}`);

  let divCol4 = document.createElement("div");
  divCol4.setAttribute("class", "col-4");

  let select = document.createElement("select");
  select.setAttribute("class", "form-control");
  select.setAttribute("name", "productOnList[]");
  select.setAttribute("id", "productOnList[]");

  products.forEach(product => {
    let option = document.createElement("option");
    option.setAttribute("value", `${product.id}`);
    if(product.id == item.id){
      option.setAttribute("selected", "selected");
    }
    option.textContent = product.name;

    select.append(option);
  });

  let divCol2a = document.createElement("div");
  divCol2a.setAttribute("class", "col-2");

  let divCol2b = document.createElement("div");
  divCol2b.setAttribute("class", "col-2");

  let input = document.createElement("input");
  input.setAttribute("class", "form-control");
  input.setAttribute("type", "number");
  input.setAttribute("name", "productOnListAmount[]");
  input.setAttribute("id", "productOnListAmount[]");
  input.setAttribute("value", `${item.amount}`);

  let a = document.createElement("a");
  divCol2b.setAttribute("href", "#");
  divCol2b.setAttribute("id", "removeItem");
  divCol2b.setAttribute("name", "removeItem");
  divCol2b.setAttribute("onClick", `remove(${index})`);

  let i = document.createElement("a");
  i.setAttribute("class", "bi-trash delete-icon");

  divRow.append(divCol4);
    divCol4.append(select);
  divRow.append(divCol2a);
    divCol2a.append(input);
  divRow.append(divCol2b);
    divCol2b.append(a);
      a.append(i);

  return divRow;
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
