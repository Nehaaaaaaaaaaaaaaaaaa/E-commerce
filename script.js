document.addEventListener('DOMContentLoaded', function() {
  const products = document.querySelectorAll('.product');

  const options = {
    rootMargin: '0px',
    threshold: 0.5
  };

  const observer = new IntersectionObserver(function(entries, observer) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('fade-in');
      } else {
        entry.target.classList.remove('fade-in');
      }
    });
  }, options);

  products.forEach(product => {
    observer.observe(product);
  });
});
