{{-- <aside id="default-sidebar" class="fixed top-15 left-0 z-40  h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
  <div class="h-fulll px-2 py-2 overflow-y-auto bg-gray-300 dark:bg-gray-900 rounded-lg">
    <ul class=" space-y-2 font-medium">
      @include('components.parts.sidebarRows.sidebarRows')
    </ul>
  </div>
</aside>


<style>
  .handle {
    cursor: grab;
    padding: 3px;
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
  offsetY = event.clientY - sidebar.offsetTop;
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

</script> --}}

{{--

<li>
   <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
      <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
      <span class="flex-1 ml-3 whitespace-nowrap">Products</span>
      <span class="inline-flex items-center justify-center w-3 h-3 p-5 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-xl dark:bg-blue-900 dark:text-blue-300">Soon</span>
   </a>
</li> --}}


<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  @include('components.parts.sidebarRows.sidebarRows')
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">&#9776; Open Sidebar</button>
</div>
 <style>
    /* The sidebar menu */
.sidebar {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0;
  left: 0;
  background-color: rgb(226, 226, 226); /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 20px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidebar */
}

/* The sidebar links */
.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 15px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidebar a:hover {
  color: #5500ff;
}

/* Position and style the close button (top right corner) */
.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* The button used to open the sidebar */
.openbtn {
  font-size: 15px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 10px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-left .5s; /* If you want a transition effect */
  padding: 20px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
 </style>
 <script>
    /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
 </script>
