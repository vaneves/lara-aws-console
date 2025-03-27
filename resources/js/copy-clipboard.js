document.addEventListener('DOMContentLoaded', () => {
  const showTooltip = (element, message) => {

    const tooltip = document.createElement('span');
    tooltip.innerText = message;
    tooltip.className = 'absolute px-3 py-1 font-normal text-sm text-green-600 bg-white border-1 border-gray-300 rounded opacity-0 transition-opacity duration-300';

    const rect = element.getBoundingClientRect();
    tooltip.style.position = 'absolute';
    tooltip.style.top = `${rect.top - 30}px`;
    tooltip.style.left = `${rect.left + rect.width / 2}px`;
    tooltip.style.transform = 'translateX(-50%)';
    tooltip.style.opacity = '0';

    document.body.appendChild(tooltip);

    setTimeout(() => tooltip.style.opacity = '1', 50);

    setTimeout(() => {
      tooltip.style.opacity = '0';
      setTimeout(() => tooltip.remove(), 300);
    }, 5000);
}
  
  document.querySelectorAll('.copy-clipboard').forEach((button) => {
    button.addEventListener('click', () => {
      const textToCopy = button.getAttribute('data-copy');
      navigator.clipboard.writeText(textToCopy).then(() => {
          showTooltip(button, 'Copied!');
      });
    });
  });
});