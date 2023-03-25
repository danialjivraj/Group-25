// this is used to get the form and its elements
const filterForm = document.querySelector('.filter-form');
const categorySelect = document.querySelector('#category-select');
const stockCheckbox = document.querySelector('#stock-checkbox');

// this is used for listen for changes to the form elements
filterForm.addEventListener('submit', (event) => {
  // Prevent the default form submission behavior
  event.preventDefault();

  // i used this to build the query string based on the form element values
  let queryString = '';
  if (categorySelect.value !== '') {
    queryString += `filter_by_category=${categorySelect.value}&`;
  }
  if (stockCheckbox.checked) {
    queryString += 'filter_by_stock=1&';
  }

  
  queryString = queryString.slice(0, -1);

  // update the URL with the new query string
  const url = `${window.location.pathname}?${queryString}`;
  window.location.href = url;
});

// this will set the initial state of the form elements based on the query string
const queryParams = new URLSearchParams(window.location.search);
const category = queryParams.get('filter_by_category');
const inStock = queryParams.get('filter_by_stock');
if (category !== null) {
  categorySelect.value = category;
}
if (inStock !== null) {
  stockCheckbox.checked = true;
}
