document.addEventListener('DOMContentLoaded', () => {
  const toggleCollapse = (event) => {
    const elementButton = event.currentTarget; 
    const ref = elementButton.dataset.ref;
    const targetId = `${ref}-data`;
    const moreLabelId = `${ref}-more`;
    const hideLabelId = `${ref}-hide`;
    const targetElement = document.getElementById(targetId);
    const moreElement = document.getElementById(moreLabelId);
    const hideElement = document.getElementById(hideLabelId);
  
    targetElement.classList.toggle('hidden');
    moreElement.classList.toggle('hidden');
    hideElement.classList.toggle('hidden');
  }
  document.querySelectorAll('.collapse-button').forEach((button, index) => {
    button.addEventListener('click', toggleCollapse);
  });
});