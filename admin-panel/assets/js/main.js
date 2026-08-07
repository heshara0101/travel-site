document.addEventListener('DOMContentLoaded', function () {
    // 1. Accordion Sidebar Menu Toggle
    const submenus = document.querySelectorAll('.has-submenu > a');
    
    submenus.forEach(menu => {
        menu.addEventListener('click', function(e) {
            e.preventDefault();
            const parent = this.parentElement;
            parent.classList.toggle('open');
            
            const icon = this.querySelector('.toggle-icon');
            if (icon) {
                icon.classList.toggle('fa-plus');
                icon.classList.toggle('fa-minus');
            }
        });
    });

    // 2. Initialize TinyMCE Editor
    if (document.getElementById("editor")) {
        tinymce.init({
            selector: '#editor',
            height: 250,
            menubar: 'file edit view format',
            plugins: 'lists link table',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist'
        });
    }

    // 3. Topbar Settings Dropdown Menu
    const btn = document.getElementById('settingsMenuBtn');
    const dropdown = document.getElementById('settingsDropdown');

    if (btn && dropdown) {
        // Toggle settings dropdown visibility
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        });

        // Close dropdown when clicking anywhere outside
        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target) && e.target !== btn) {
                dropdown.style.display = 'none';
            }
        });
    }
});

// 4. Dark/Light Mode Switcher Logic (Global scope for inline onclick handler)
// Helper function to update UI elements and HTML body class
function applyTheme(isDark) {
    const themeIcon = document.getElementById('themeIcon');
    const themeText = document.getElementById('themeText');

    if (isDark) {
        document.body.classList.add('dark-mode');
        if (themeIcon) {
            themeIcon.className = 'fa-solid fa-sun';
            themeIcon.style.color = '#f1c40f'; // Sun Yellow
        }
        if (themeText) {
            themeText.textContent = 'Light Mode';
        }
    } else {
        document.body.classList.remove('dark-mode');
        if (themeIcon) {
            themeIcon.className = 'fa-solid fa-moon';
            themeIcon.style.color = '#70a1ff'; // Moon Blue
        }
        if (themeText) {
            themeText.textContent = 'Dark Mode';
        }
    }
}

// Toggle function triggered on click
function toggleTheme() {
    const isDark = !document.body.classList.contains('dark-mode');
    localStorage.setItem('admin_theme', isDark ? 'dark' : 'light');
    applyTheme(isDark);
}

// Automatically apply saved theme when page loads
document.addEventListener('DOMContentLoaded', function () {
    const savedTheme = localStorage.getItem('admin_theme');
    if (savedTheme === 'dark') {
        applyTheme(true);
    }
});
