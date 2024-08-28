function dismisAlert(element) {
  element.parentElement.classList.add('alert-remove');
  setTimeout(() => {
    element.parentElement.remove();
  }, 500);
}
