const accordionItems = document.querySelectorAll('.accordion-item');

accordionItems.forEach(item => {
  const header = item.querySelector('.accordion-header');
  const icon = header.querySelector('.icon');
  const content = item.querySelector('.accordion-content');

  header.addEventListener('click', () => {
    // Toggle active class on accordion item
    item.classList.toggle('active');

    // Toggle icon rotation on accordion header
    icon.classList.toggle('rotate');

    // Toggle display of accordion content
    if (content.style.display === 'block') {
      content.style.display = 'none';
    } else {
      content.style.display = 'block';
    }
  });
});
