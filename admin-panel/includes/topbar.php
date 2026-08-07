<?php
require_once "assets/classes/Database.php";
require_once "assets/classes/message.php";

$MSG_COUNT_OBJ = new message();
$total_messages = $MSG_COUNT_OBJ->get_total_count();
?>
<header class="topbar">
    <div class="topbar-left">
        <a href="index.php" class="topbar-logo" style="display: flex; align-items: center; text-decoration: none;">
            
            <span class="topbar-logo-text" style="font-size: 18px; font-weight: bold; color: #052822;">Admin Panel</span>
        </a>
    </div>
    <div class="topbar-right" style="display: flex; align-items: center; gap: 15px; position: relative;">
        <!-- Notification Badge -->
        <div class="icon-badge" title="Notifications" style="position: relative; cursor: pointer;">
            <i class="fa-regular fa-bell"></i>
            <span class="badge yellow">0</span>
        </div>

        <!-- Chat Badge -->
        <a href="message.php" class="icon-badge" title="Messages" style="position: relative; cursor: pointer; text-decoration: none; color: inherit;">
            <i class="fa-regular fa-comments"></i>
            <?php if ($total_messages > 0): ?>
                <span class="badge green"><?= $total_messages; ?></span>
            <?php endif; ?>
        </a>

        <!-- Admin Profile Avatar Link -->
        <a href="profile.php" title="View Profile" style="display: flex; align-items: center;">
            <img src="assets/images/profile.png" alt="Admin Profile" class="topbar-avatar" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover; cursor: pointer;" onerror="this.src='https://via.placeholder.com/35?text=Admin'">
        </a>

        <!-- Settings Icon with Dropdown Menu -->
        <div class="settings-dropdown-wrapper" style="position: relative;">
            <i class="fa-solid fa-gear" id="settingsMenuBtn" style="cursor: pointer; font-size: 18px; color: #555;" title="Settings"></i>

            <!-- Dropdown Menu Content -->
            <div id="settingsDropdown" style="display: none; position: absolute; right: 0; top: 35px; background: #ffffff; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.15); width: 200px; padding: 10px 0; z-index: 1000; border: 1px solid #eee;">
                
                <!-- Language Selector -->
                <div style="padding: 8px 15px; font-size: 13px; color: #666; font-weight: 600; border-bottom: 1px solid #f0f0f0;">
                    <i class="fa-solid fa-language" style="margin-right: 8px; color: #00a8ff;"></i> Language
                    <select id="languageSelect" style="width: 100%; margin-top: 5px; padding: 4px; border: 1px solid #ddd; border-radius: 4px; font-size: 12px; outline: none; background: #fff; color: #333;">
                        <option value="en" selected>English</option>
                        <option value="si">Sinhala (සිංහල)</option>
                    </select>
                </div>

                <!-- Dark / Light Mode Toggle -->
                <a href="javascript:void(0);" id="themeToggleBtn" onclick="toggleTheme()" style="display: flex; align-items: center; justify-content: space-between; padding: 10px 15px; text-decoration: none; color: #333; font-size: 13px; border-bottom: 1px solid #f0f0f0;">
                    <span><i class="fa-solid fa-moon" id="themeIcon" style="margin-right: 8px; color: #70a1ff;"></i> Dark Mode</span>
                </a>

                <!-- Profile Link -->
                <a href="profile.php" style="display: flex; align-items: center; padding: 10px 15px; text-decoration: none; color: #333; font-size: 13px; border-bottom: 1px solid #f0f0f0;">
                    <i class="fa-solid fa-user-gear" style="margin-right: 8px; color: #2ed573;"></i> Profile Settings
                </a>

                <!-- Logout Link -->
                <a href="login.php" style="display: flex; align-items: center; padding: 10px 15px; text-decoration: none; color: #ff4757; font-size: 13px; font-weight: 500;">
                    <i class="fa-solid fa-right-from-bracket" style="margin-right: 8px; color: #ff4757;"></i> Logout
                </a>
            </div>
        </div>
    </div>
</header>
