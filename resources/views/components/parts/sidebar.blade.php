<aside id="default-sidebar" class="fixed top-15 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
  <div class="h-fulll px-3 py-4 overflow-y-auto bg-gray-300 dark:bg-gray-900 rounded-lg">
    <ul class="mt-3 space-y-2 font-medium">
      @include('components.parts.sidebarRows.sidebarRows')
    </ul>
  </div>
</aside>


<style>
  .handle {
    cursor: grab;
    padding: 2px;
  }
  .handle:active {
    cursor: grabbing;
  }

  #default-sidebar {
    transition: transform 0.1s ease-out;
  }
  #default-sidebar.minimized {
    transform: translateX(-100%);
  }

  .hide {
    display: none;
  }
</style>

<!-- JavaScript to enable drag and drop -->
<script>
const handle = document.querySelector('.handle');
const sidebar = document.querySelector('#default-sidebar');
const minimizeButton = document.querySelector('#minimize-sidebar');

let isDragging = false;
let isMinimized = false;
let initialX;
let initialY;
let offsetX = 0;
let offsetY = 0;

handle.addEventListener('mousedown', (event) => {
  isDragging = true;
  initialX = event.clientX - offsetX;
  initialY = event.clientY - offsetY;
});

document.addEventListener('mousemove', (event) => {
  if (isDragging && !isMinimized) {
    const currentX = event.clientX;
    const currentY = event.clientY;

    // Calculate the new position of the sidebar
    const newOffsetX = currentX - initialX;
    const newOffsetY = currentY - initialY;

    // Get the maximum and minimum allowed positions for the sidebar
    const maxWidth = window.innerWidth - sidebar.offsetWidth;
    const maxHeight = window.innerHeight - sidebar.offsetHeight;

    // Clamp the new position to the allowed range
    offsetX = Math.min(Math.max(newOffsetX, 0), maxWidth);
    offsetY = Math.min(Math.max(newOffsetY, 0), maxHeight);

    // Update the position of the sidebar
    sidebar.style.transform = `translate(${offsetX}px, ${offsetY}px)`;
  }
});

document.addEventListener('mouseup', () => {
  isDragging = false;
  localStorage.setItem('sidebarPosition', JSON.stringify({x: offsetX, y: offsetY}));
});

// Read the saved position from localStorage on page load
const savedPosition = localStorage.getItem('sidebarPosition');
if (savedPosition) {
  const position = JSON.parse(savedPosition);
  offsetX = Math.min(Math.max(position.x, 0), window.innerWidth - sidebar.offsetWidth);
  offsetY = Math.min(Math.max(position.y, 0), window.innerHeight - sidebar.offsetHeight);
  sidebar.style.transform = `translate(${offsetX}px, ${offsetY}px)`;
}

// Minimize button
minimizeButton.addEventListener('click', () => {
  isMinimized = true;
  sidebar.style.transform = `translateX(-${sidebar.offsetWidth}px)`;
});

// Maximize button
maximizeButton.addEventListener('click', () => {
  isMinimized = false;
  sidebar.style.transform = `translate(${offsetX}px, ${offsetY}px)`;
});

</script>




{{--

<li>
   <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
      <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
      <span class="flex-1 ml-3 whitespace-nowrap">Products</span>
      <span class="inline-flex items-center justify-center w-3 h-3 p-5 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-xl dark:bg-blue-900 dark:text-blue-300">Soon</span>
   </a>
</li> --}}
